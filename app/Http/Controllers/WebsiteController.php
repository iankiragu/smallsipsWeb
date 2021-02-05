<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Billing\Mpesa;
use App\Hospital;
use App\Mail\ContactUs;
use App\Mpesatransaction;
use App\Paymentdetail;
use App\Specialization;
use App\Town;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class WebsiteController extends Controller
{
    public function index(Request $request){
        return view('website.home');
    }

    public function maps(Request $request){
        return view('website.maps');
    }

    public function hospitals($id=null){
        $towns = Town::with('hospitals')->get();
        $towns = collect($towns)->sortBy('name');
        if ($id == null){
            $town_id = $towns->first()->id;
            $hospitals = Hospital::where(['town_id'=>$town_id])->paginate(15);
        }else{
            $hospitals = Hospital::where(['town_id'=>$id])->paginate(15);
        }
        return view('website.hospitals',[
            'towns'=>$towns,'hospitals'=>$hospitals
        ]);
    }

    public function doctors(Request $request){
        $specs = User::with('specialization')->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->where('is_verified',1)->get();
        return view('website.doctors',['specs'=>$specs]);
    }

    public function contact(Request $request){
        return view('website.contact');
    }

    public function appointments(Request $request){
        $doctor_hospitals = User::with('hospital')->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->where('is_verified',1)->get();
        $specs = User::with('specialization')->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->where('is_verified',1)->get();
        return view('website.appointments',[
            'doctors_hospitals'=>$doctor_hospitals,'specs'=>$specs,
            'title'=>'Appointments'
        ]);
    }

    public function process_appointments(Request $request){
        $insert_data = [
            'phone_number'=>$request->phone_number,
            'user_id'=>$request->user_id,'doctor_id'=>$request->doctor_id,'description'=>$request->description,
            'date'=>Carbon::createFromDate($request->date)->toDateTimeString(),
            'time'=>$request->time, 'is_accepted'=>false,'has_paid'=>false
        ];
        $is_created = Appointment::create($insert_data);
        $id = $is_created->id;
        return ($is_created ? response()->json(['ok' => true, 'msg' => "Appointment made successfully. Please proceed to pay",'id'=>$id]):
            response()->json(['ok' => false, 'msg' => "Appointment was not successful. Please try again"]));
    }

    public function mpesapayments($id){
        $appointments = Appointment::with('patients')->where('id',$id)->get();

        return view('website.payments',['appointments'=>$appointments]);
    }

    public function stk_push(Request $request){
        try {
            $phone = '254'. $request->phone_number;
            $account_ref = 'Doctor Appointment Fees';
            $transaction_desc = 'Semester application fees';
            $timestamp = now()->format('Ymdhis');
            $user_id = $request->user_id;
            $phone_number = '254'. $request->phone_number;
            $appointment_id = $request->appointment_id;
            $amount = $request->amount;
            $callbackurl = url('/payment/process_mpesa');
            $mpesa_response = Mpesa::STKPush_processrequest($timestamp, $account_ref, $transaction_desc, $amount, $phone_number, $callbackurl);
            if (!isset($mpesa_response->ResponseCode) || $mpesa_response->ResponseCode !== '0') throw new Exception("Could not process payment request");
            $mpesa_transaction_details = [
                'MerchantRequestID' => $mpesa_response->MerchantRequestID,
                'CheckoutRequestID' => $mpesa_response->CheckoutRequestID,
                'user_id' => $user_id, 'appointment_id' => $appointment_id, 'status'=>'success'];
            // Please note that is simulates the payment process using the mpesa stk push
            Mpesatransaction::create($mpesa_transaction_details);
            Paymentdetail::create(['user_id'=>$user_id,'amount_paid'=>1000,'payment_reference'=>Str::upper(Str::random(7))]);
            Appointment::where('id',$appointment_id)->update(['has_paid'=>true]);
            //tag request credentials in the session
            $request->session()->put('MerchantRequestID', $mpesa_response->MerchantRequestID);
            $request->session()->put('CheckoutRequestID', $mpesa_response->CheckoutRequestID);
            return response()->json(
                [
                    'ok' => true,
                    'msg' => "STK Push has been sent to ".$phone_number.". Please pay first and wait for a message before confirming "
                ]);
        }catch (\Exception $e){
            return response()->json(['ok' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function confirm_payment(Request $request) {
        $status = 'success';
        $request->session()->forget('MerchantRequestID');
        $request->session()->forget('CheckoutRequestID');

        $response = [];
        try {
            if (!$status) throw new Exception('Payment failed please try again');
            if ($status === 'fail') throw new Exception("Payment transaction failed. Please try again :(");
            if ($status === NULL) throw new Exception("Payment transaction still being processed :|");
            if ($status === 'success') $response = array('ok' => true, 'msg' => 'Payment received successfully. Thank you for your time. :)');
        } catch (Throwable $th) {
            $response = array('ok' => false, 'msg' => $th->getMessage());
        }
        echo json_encode($response);
    }

    public function get_doctors_json($id){
        $doctor_hospitals = User::with('hospital')->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->where('is_verified',1)
            ->where('id',$id)->get();
        return response()->json($doctor_hospitals);
    }

    public function get_hospitals_json($id){
        $doctor_hospitals = User::with('hospital')->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->where('is_verified',1)
            ->where('id',$id)->get();
        return response()->json($doctor_hospitals);
    }

    public function get_user_details_by_id($user_id){
        return User::where('id',$user_id)
            ->get();
    }

    public function my_appointments(Request $request){
        $appointments = Appointment::with('doctors')
            ->where('user_id',Auth::user()->id)
            ->get();
        foreach ($appointments as $appointment => $value) {
            $doctor = $this->get_user_details_by_id($appointments[$appointment]['doctor_id']);
            $appointments[$appointment]['doctor_name'] = $doctor[0]['first_name'] .' '. $doctor[0]['last_name'];
            $appointments[$appointment]['doctor_tag'] = Str::lower($doctor[0]['first_name'] .' '. $doctor[0]['last_name']);
            $appointments[$appointment]['profile_image'] = 'uploads/images/'.$doctor[0]['profile_picture'];
            $appointments[$appointment]['h_date'] = Carbon::create($appointments[$appointment]['date'])->diffForHumans();
            $appointments[$appointment]['h_time'] = Carbon::create($appointments[$appointment]['time'])->diffForHumans();
            $appointments[$appointment]['payment_status'] = $appointments[$appointment]['has_paid'] == 0 ? 'NOT PAID' : 'PAID';
            $appointments[$appointment]['pay'] = $appointments[$appointment]['has_paid']
                ?
                '
                    <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed">
                        <span class="fal fa-money-check mr-1"></span>
                        PAY
                    </button>
                '
                :  '
                    <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed">
                        <span class="fal fa-pen mr-1"></span>
                        REVIEW
                    </button>
                ';
        }
        return view('website.my_appointments',['appointments'=>$appointments]);
    }

    public function process_contact(Request $request){
        $details = $request->all();
        $mail_sent = Mail::to('iankiragu63@gmail.com')->send(new ContactUs($details));
        return response()->json(['ok'=>true,'msg'=>'Your email has been sent successfully']);
    }
    public function healthadvisor(Request $request){
        return view('website.healthadvisor');
    }
    public function your_blood_pressure(Request $request){
        return view('website.your_blood_pressure');
    }
    public function bmi_calculator(Request $request){
        return view('website.bmi_calculator');
    }
    public function weight_loss_guide(Request $request){
        return view('website.weight_loss_guide');
    }
    public function eatwell_plate(Request $request){
        return view('website.eatwell_plate');
    }
    public function depression_self_assessment(Request $request){
        return view('website.depression_self_assessment');
    }
    public function live_well(Request $request){
        return view('website.live_well');
    }
}
