<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UpdateSalaryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllerByAdmin extends Controller {
    //render add user page
    public function index() {
        return view( 'doctor.addUsers' );
    }

    


    public function list() {
        $users = DB::table( 'users' )->get();
        return $users;
    }
    // view user details
    public function userDetails( $id ) {
        $user = DB::table( 'users' )->where( 'id', $id )->get();
        return $user;
    }

    public function add( AddUserRequest $req ) {
        DB::table( 'users' )->insert( [
            'name'       => '',
            'username'   => $req->username,
            'email'      => $req->email,
            'password'   => $req->password,
            'type'       => $req->type,
            'bloodGroup' => "",
            'phone'      => $req->phone,
            'address'    => "",
            'image'      => "",
            'active'     => '1',
            'salary'     => '',
            'workShift'  => '',
        ] );
        $users = DB::table( 'users' )->get();
        return $users;
    }

    public function edit( EditUserRequest $req, $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'username' => $req->username,
                'email'    => $req->email,
                'phone'    => $req->phone,
                'active'   => $req->active,
            ] );
        $users = DB::table( 'users' )->get();
        return $users;
    }

    public function delete( $id ) {
        $result = DB::table( 'users' )->where( 'id', $id )->delete();
        $users = DB::table( 'users' )->get();
        return $users;
    }

    
    // change password 

    public function password(Request $req,$id){
        $result = DB::table( 'users' )
        ->where( 'id', $id )
        ->update( [
            'password' => $req->newPassword,
        ] );

        
    }

    // manage salary
    public function salary() {
        $result = DB::table( 'users' )->get();
        $users = [];

        foreach ( $result as $user ) {
            if ( $user->type == 'doctor' || $user->type == 'receptionist' ) {
                array_push( $users, $user );
            }
        }
        return $users;
    }

    //per user salary
    public function perSalary( $id ) {
        $user = DB::table( 'users' )->where( 'id', $id )->get();
        return $user;
    }

    // block user
    public function block1( $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'active' => '0',
            ] );
        $users = DB::table( 'users' )->get();
        return $users;
    }

    public function editSalary( Request $req, $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'salary' => $req->updateSalary,
            ] );
        
            $result = DB::table( 'users' )->get();
            $users = [];
    
            foreach ( $result as $user ) {
                if ( $user->type == 'doctor' || $user->type == 'receptionist' ) {
                    array_push( $users, $user );
                }
            }
            return $users;

    }

    //add user
    public function addUser( AddUserRequest $req ) {

        if ( $req->type == 'patient' ) {
            DB::table( 'users' )->insert( [
                'name'       => '',
                'username'   => $req->username,
                'email'      => $req->email,
                'password'   => $req->password,
                'type'       => $req->type,
                'bloodGroup' => "",
                'phone'      => "",
                'address'    => "",
                'image'      => "",
                'active'     => '1',
                'salary'     => '',
                'workShift'  => '',
            ] );
        } else {

            DB::table( 'users' )->insert( [
                'name'       => '',
                'username'   => $req->username,
                'email'      => $req->email,
                'password'   => $req->password,
                'type'       => $req->type,
                'bloodGroup' => "",
                'phone'      => "",
                'address'    => "",
                'image'      => "",
                'active'     => '1',
                'salary'     => $req->salary,
                'workShift'  => '',
            ] );
        }

        $req->session()->flash( 'msg', 'User added successfully' );
        return \redirect()->route( 'viewUserList' );
        // echo $req->type;
    }

    public function viewUserList() {
        $users = DB::table( 'users' )->get();
        return view( 'doctor.viewUserList' )->with( 'userlist', $users );
        // return $user;
    }

    public function liveSearch( Request $request ) {
        //ajax method
        if ( $request->ajax() ) {

            // if serach input null than hide the table
            if ( $request->search == '' ) {
                $output = "";
            } else {

                $data = DB::table( 'users' )->where( 'username', 'LIKE', '%' . $request->search . '%' )
                    ->get();

                $output = '';

                if ( count( $data ) > 0 ) {

                    $output = "<table border=1 class='table' style='background:#fff;max-width:700px;margin-left:60px'>
                                <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Type</th>
                            </tr>";

                    foreach ( $data as $row ) {

                        $output .= "
                            <tr>
                                <td>{$row->name}</td>
                                <td>{$row->username}</td>
                                <td>{$row->email}</td>
                                <td>{$row->type}</td>
                            </tr>";
                    }

                    $output .= '</table>';
                } else {

                    $output .= '<li class="list-group-item">' . 'No results Found' . '</li>';
                }
            }
            return $output;
        }

    }



    public function editUserView( $id ) {
        $user = DB::table( 'users' )->find( $id );
        return view( 'doctor.editUser' )->with( 'user', $user );
    }

    public function editUser( EditUserRequest $req, $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'username' => $req->username,
                'email'    => $req->email,
                'phone'    => $req->phone,
                'active'   => $req->active,
            ] );

        $req->session()->flash( 'msg', 'User update successfully' );
        return redirect()->route( 'viewUserList' );
    }
    public function deleteUser( Request $req, $id ) {
        // if($req->ajax()){

        DB::table( 'users' )
            ->where( 'id', $id )
            ->delete();
        // }
        $req->session()->flash( 'msg', 'User deleted successfully' );
        return redirect()->route( 'viewUserList' );
    }
    public function blockUser( Request $req, $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'active' => '0',
            ] );
        $req->session()->flash( 'msg', 'User blocked successfully' );
        return redirect()->route( 'viewUserList' );
    }

    public function viewUserDetails( $id ) {
        $user = DB::table( 'users' )->find( $id );
        return view( 'doctor.viewUserDetails' )->with( 'user', $user );
    }



    //update salary show page
    public function updateSalaryIndex( $id ) {
        $user = DB::table( 'users' )->find( $id );
        return view( 'doctor.updateSalary' )->with( 'user', $user );
    }

    public function updateSalaryVerify( UpdateSalaryRequest $req, $id ) {
        DB::table( 'users' )
            ->where( 'id', $id )
            ->update( [
                'salary' => $req->updateSalary,
            ] );

        $req->session()->flash( 'msg', 'salary updated successfully' );
        return redirect()->route( 'user.manageSalaryIndex' );
    }


}
