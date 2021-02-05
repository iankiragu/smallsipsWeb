<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Facility;
use App\Hospital;
use App\Imports\HospitalsImport;
use App\Paymentdetail;
use App\Service;
use App\Town;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class BackendController extends Controller
{
    public function dashboard(Request $request){
        ini_set('memory_limit', '2048M');
        $users = count(User::all()->where('role_id',4));
        $doctors = count(User::cursor()->filter(function ($user){
            return $user->role_id !== 1 && $user->role_id !== 4;
        }));
        $hospitals = count(Hospital::all());
        $appointments = count(Appointment::all());
        $revenue = Paymentdetail::sum('amount_paid');
        return view('backend.dashboard',['users'=>$users,
            'doctors'=>$doctors, 'hospitals'=>$hospitals,
            'appointments'=>$appointments,'revenue'=>$revenue]);
    }

    public function manage_doctors(Request $request){
        return view('backend.doctors');
    }

    public function verify_doctor(Request $request){
        $id = $request->id;
        User::where('id',$id)->update(['is_verified'=>1]);
        return response()->json(['ok'=>true,'msg'=>$request->name.' has been verified']);
    }

    public function get_doctors_json(){
        $doctors = User::where('role_id','!=',4)
            ->where('role_id','!=',1)->get();
        $number = 1;
        foreach ($doctors as $key => $value) {
            $doctors[$key]['number'] = $number++;
            $doctors[$key]['full_name'] = $doctors[$key]['first_name']. ' ' . $doctors[$key]['last_name'];
            $doctors[$key]['hospital_name'] = ucwords(strtolower(User::find($doctors[$key]['id'])->hospital->name));
            $doctors[$key]['license_doc'] = '<button id="verify-doc" type="button" class="btn btn-xs btn-primary waves-effect waves-themed" data-toggle="modal"
                       data-target="#license_modal">View</button>';
            $doctors[$key]['actions'] =
                ($doctors[$key]['is_verified'] ?
                    "<span class='fw-300'></span> <sup class='badge badge-success fw-500 mt-2'>VERIFIED</sup>" :
                    '<button id="verify-user" type="button" class="btn btn-xs btn-danger waves-effect waves-themed">Verify</button>');
        }
        return response()->json($doctors);
    }

    public function add_facilities(Request $request){
        $validator = Validator::make($request->all(), array(
            'name'=>'required|unique:facilities'
        ));
        if ($validator->fails()){
            $message = $validator->errors()->toArray()['name'][0];
            return response()->json(['ok'=>'false','msg'=>$message]);
        }
        Facility::create(['name'=>$request->name]);
        return response()->json(['ok'=>'true','msg'=>$request->name.' inserted successfully']);
    }

    public function get_facilities(){
        $facilities = Facility::withTrashed()->get()->toArray();
        $number = 1;
        foreach ($facilities as $key => $value){
            $facilities[$key]['number'] = $number++;
        }
        return response()->json($facilities);
    }

    public function add_services(Request $request){
        $validator = Validator::make($request->all(), array(
            'name'=>'required|unique:services'
        ));
        if ($validator->fails()){
            $message = $validator->errors()->toArray()['name'][0];
            return response()->json(['ok'=>'false','msg'=>$message]);
        }
        Service::create(['name'=>$request->name]);
        return response()->json(['ok'=>'true','msg'=>$request->name.' inserted successfully']);
    }

    public function get_services(){
        $services = Service::withTrashed()->get()->toArray();
        $number = 1;
        foreach ($services as $key => $value){
            $services[$key]['number'] = $number++;
        }
        return response()->json($services);
    }

    public function manage_hospitals(Request $request){
        return view('backend.hospitals');
    }

    public function migrate_hospitals()
    {
        set_time_limit(10000000);
        Excel::import(new HospitalsImport, public_path('website/data/data.csv'));

        return response()->json(['ok'=>'true','msg'=>'Hospitals Imported Successfully']);
    }

    public function migrate_towns(){
        set_time_limit(10000000);
        $towns = [];
        $hospitals = Hospital::all()->toArray();
        foreach ($hospitals as $key => $value){
            array_push($towns,$hospitals[$key]['district']);
        }
        $towns = array_filter(array_map('trim',array_unique($towns)));
        foreach ($towns as $key => $value) {
            Town::create(['name'=>$towns[$key]]);
        }
        return response()->json(['ok'=>'true','msg'=>'Towns Imported Successfully']);
    }

    public function map_towns(){
        set_time_limit(10000000);
        $hospitals = Hospital::all();
        $towns = Town::all();
        for($i=0;$i<sizeof($hospitals);$i++){
            for($j=0;$j<sizeof($towns);$j++){
                if($hospitals[$i]->district === $towns[$j]->name){
                    Hospital::where('id',$hospitals[$i]->id)->update(['town_id'=>$towns[$j]->id]);
                }
            }
        }
        return response()->json(['ok'=>'true','msg'=>'Towns Imported Successfully']);
    }

    public function appointments(Request $request){
        return view('backend.appointments');
    }

    public function get_appointments(Request $request){
        $appointments = Appointment::with('doctors')
            ->where('doctor_id',Auth::user()->id)
            ->get();
        $number = 1;
        foreach ($appointments as $app=>$value){
            $appointments[$app]['number'] = $number;

            if($appointments[$app]['has_paid']){
                $appointments[$app]['has_paid'] = 'YES';
            }else{
                $appointments[$app]['has_paid'] = 'NO';
            }
            $appointments[$app]['patient_name'] =
                User::where('id',$appointments[$app]['user_id'])->first()->first_name . ' ' .
                User::where('id',$appointments[$app]['user_id'])->first()->last_name;
            $appointments[$app]['app_time'] =
                Carbon::createFromDate($appointments[$app]['date'])->diffForHumans();
            $appointments[$app]['actions'] =
                '
                    <button id="call" type="button" class="btn btn-sm btn-default waves-effect waves-themed">
                        <span class="fal fa-phone-volume mr-1"></span>
                        Voice Call
                    </button> <br><br><br>
                    <button id="video" type="button" class="btn btn-sm btn-default waves-effect waves-themed">
                        <span class="fal fa-video mr-1"></span>
                        Video Call
                    </button> <br><br><br>
                    <button id="delete" type="button" class="btn btn-sm btn-default waves-effect waves-themed">
                        <span class="fal fa-window-close mr-1"></span>
                        Finish Appointment
                    </button> <br><br><br>
                ';
        }
        return response()->json($appointments);
    }

    public function make_call(Request $request){
        return view('backend.make_call');
    }
    public function answer_call(Request $request){

        return view('backend.answer_call');
    }
    public function sendsms(Request $request){
        $hospital_phone = $request->query('hospital_phone');
        $lat = $request->query('lat');
        $lon = $request->query('lon');
        return view('backend.sendsms');
    }

}
