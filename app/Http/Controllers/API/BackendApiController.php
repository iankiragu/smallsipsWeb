<?php

namespace App\Http\Controllers\Api;

use App\Appointment;
use App\Facility;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use App\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackendApiController extends Controller
{
    //getting facilities
    public function get_facilities()
    {
        $facilities = Facility::withTrashed()->get()->toArray();
        $number = 1;
        foreach ($facilities as $key => $value){
            $facilities[$key]['number'] = $number++;
        }
        return response()->json($facilities);
    }


    //getting services
    public function get_services()
    {
        $services = Service::withTrashed()->get()->toArray();
        $number = 1;
        foreach ($services as $key => $value){
            $services[$key]['number'] = $number++;
        }
        return response()->json($services);
    }


    //getting doctors
    public function get_doctors()
    {
        $doctors = User::select('id','first_name','last_name','phone_number','email','profile_picture','id_number','license_document','license_no','hospital_id','specialization_id')
            ->where('role_id','!=',4)
            ->where('role_id','!=',1)->get();
//       print ($doctors);

        foreach ($doctors as $key => $value) {
            $doctors[$key]['full_name'] = $doctors[$key]['first_name']. ' ' . $doctors[$key]['last_name'];
            $doctors[$key]['hospital_name'] = ucwords(strtolower(User::find($doctors[$key]['id'])->hospital->name));
            $doctors[$key]['latitude'] = ucwords(strtolower(User::find($doctors[$key]['id'])->hospital->latitude));
            $doctors[$key]['longitude'] = ucwords(strtolower(User::find($doctors[$key]['id'])->hospital->longitude));
            $doctors[$key]['specialization'] = ucwords(strtolower(User::find($doctors[$key]['id'])->specialization->name));
            $doctors[$key]['image'] = env('APP_URL').'/uploads/images/'.$doctors[$key]['profile_picture'];
            $doctors[$key]['licence'] =  env('APP_URL').'/uploads/files/'.$doctors[$key]['license_document'];
        }
        return response()->json($doctors);
    }

    public function get_hospitals(){
        $hospital = Hospital::withTrashed()->get()->toArray();
        $number = 1;
        foreach ($hospital as $key => $value){
            $hospital[$key]['number'] = $number++;
        }
        return response()->json($hospital);

    }

    public function get_appointments(Request $request){
        $appointments = Appointment::with('doctors')
            ->where('doctor_id',$request->id)
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

        }

        return response()->json($appointments);
    }

    public function process_appointments(Request $request){
        $insert_data = [
            'phone_number'=>$request->phone_number,
            'user_id'=>$request->user_id,
            'doctor_id'=>$request->doctor_id,
            'description'=>$request->description,
            'date'=>Carbon::createFromDate($request->date)->toDateTimeString(),
            'time'=>$request->time, 'is_accepted'=>false,'has_paid'=>false
        ];
        $is_created = Appointment::create($insert_data);
        return ($is_created ? response()->json(['ok' => true, 'msg' => "Appointment made successfully. Please proceed to pay"]):
            response()->json(['ok' => false, 'msg' => "Appointment was not successful. Please try again"]));
    }




}
