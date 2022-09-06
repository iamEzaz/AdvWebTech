<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class DoctorController extends Controller
{
    public function doctorDashboard(){
        
        return view('doctor.dashboard');
        
    }
    public function doctorProfile(Request $req){
        
        $result = Users::where( 'id', $req->id )->first();
        if($result){

            return response()->json($result,200);

        }
           
          
       // return view('doctor.DoctorProfile',['user'=>$user]);

    }


    // public function doctorProfile(Request $req){
        
    //     $result = DB::table( 'users' )
    //         ->where( 'id', $Req->id )
    //         ->get();
    //         foreach ( $result as $res ) {
    //             $user=$res;
    //             $username = $res->username;
    //             $type = $res->type;
    //             $id = $res->id;
    //             $active = $res->active;
    //             $image = $res->image;
    //         }
      
    //     return view('doctor.DoctorProfile',['user'=>$user]);

    // }

    public function patientDetails($id){

        return DB::select("select * from users");
            
        return view('doctor.PatientDetails');

    }

    public function approveAppointment(){
        return view('doctor.approveAppointment');

    }

    public function apointmentHistory(){

        $result = DB::table( 'appointments' )
        ->where( 'id', $id )
        ->get();
        foreach ( $result as $res ) {
            $user=$res;
            $username = $res->username;
            $type = $res->type;
            $id = $res->id;
            $active = $res->active;
            $image = $res->image;
        }

        return view('doctor.ApointmentHistory');

    }

    public function  operationTheatres(){
        return view('doctor.OperationTheatres');

    }

    public function hospitalAuthority(){
        return view('doctor.HospitalAuthority');

    }

    public function feedbackReview(){
        return view('doctor.login');

    }

    public function help(){
        return view('doctor.help');

    }

    public function icuRoom(){
        return view('doctor.IcuRoom');

    }

    public function emergencyRoom(){
        return view('doctor.EmergencyRoom');

    }

    public function doctorChangePass(){
        return view('doctor.DoctorChangePass');

    }

    public function doctorUpdateInformation(){
        return view('doctor.DoctorUpdateInformation');

    }

    public function doctorCheckSalary(){
        return view('doctor.DoctorCheckSalary');

    }

    public function immediateTreatment(){
        return view('doctor.ImmediateTreatment');

    }
}
