<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
    public function index() {
      
        return view( 'login' );
    }

    public function verify( LoginRequest $req ) {
      
        $result = DB::table( 'users' )
            ->where( 'email', $req->email )
            ->where( 'password', $req->password )
            ->get();


        foreach ( $result as $res ) {
            $user=$res;
            $username = $res->username;
            $type = $res->type;
            $id = $res->id;
            $active = $res->active;
            $image = $res->image;
        }

        if ( count( $result ) > 0 ) {
            if ( $active == 1 ) {
                if ( $type == "doctor" ) {
                    
                    return response()->json([
                        'status' => 'notFound',
                        'message' => 'User not Found',
                    ]);
                   // return view( 'doctor.dashboard',['user'=>$user] );
                } else if ( $type == "receptionist" ) {
                    

                    return redirect( '/reception/dashboard' );

                    //admin
                } else {
                    echo "type error";
                }
            } else {
                $req->session()->flash( 'msg', 'Your account is blocked' );
                return redirect( '/login' );
            }

        } else {
            $req->session()->flash( 'msg', 'Invalid username or password' );
            return redirect( '/login' );
        }
    }
}
