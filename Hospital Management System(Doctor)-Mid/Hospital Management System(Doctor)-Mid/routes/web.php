<?php

use Illuminate\Support\Facades\Route;


//login

Route::get( '/login', "LoginController@index" )->name( 'login' );
Route::post( '/login', "LoginController@verify" );
Route::get( '/logout', 'LogoutController@logout' )->name( 'logout' );
Route::get( '/home', 'homeController@index' )->name( 'home' );

Route::group( ['middleware' => ['sess']], function () {

//doctor route
    Route::get( '/doctorDashboard/{id}', ['uses' => 'DoctorController@doctorDashboard'] )->name( 'dashBoard' );
//updateProfile
    Route::get( '/doctor/doctorProfile/{id}', 'DoctorController@doctorProfile' )->name( 'doctorProfile' );
    Route::post('/doctor/doctorProfile/{id}', 'DoctorController@updateProfile' )->name( 'doctorprofile' );

    Route::post( '/doctor/patientDetails/{id}','DoctorController@patientDetails' )->name( 'patientDetails' );
    Route::post( '/doctor/patientDetails/{id}','DoctorController@patientDetails' )->name( 'patientDetails' );

    Route::get( '/doctor/patientDateApprove/{id}', ['uses' => 'DoctorController@patientDetaildate'] )->name( 'patientDetails' );
    Route::post( '/doctor/UpdatePatientDate/{id}', ['uses' => 'DoctorController@UpdatePatientDate'] )->name( 'patientDetails' );
//update
    Route::get( '/doctor/approveAppointment/{id}', ['uses' => 'DoctorController@approveAppointment'] )->name( 'approveAppointment' );
    Route::post( '/doctor/approveAppointment/{id}', ['uses' => 'DoctorController@update'] );

//insert
    Route::get( '/doctor/newApiroment/{id}', ['uses' => 'DoctorController@newApiroment'] )->name( 'newApiroment' );
    Route::post( '/doctor/newApiroment/{id}', ['uses' => 'DoctorController@insertAppointment'] )->name( 'newApiroment' );

    Route::get('/doctor/newApiroment/{id}',['uses'=>'DoctorController@newApiroment'])->name('newApiroment');
    Route::get( '/doctor/apointmentHistory/{id}', ['uses' => 'DoctorController@apointmentHistory'] )->name( 'apointmentHistory' );
    Route::get( '/doctor/OperationTheatres/{id}', ['uses' => 'DoctorController@operationTheatres'] )->name( 'operationTheatres' );
    Route::get( '/doctor/hospitalAuthority/{id}', ['uses' => 'DoctorController@hospitalAuthority'] )->name( 'hospitalAuthority' );
    Route::get( '/doctor/feedbackReview/{id}', ['uses' => 'DoctorController@feedbackReview'] )->name( 'feedbackReview' );
    Route::get( '/doctor/help/{id}', ['uses' => 'DoctorController@help'] )->name( 'help' );
    Route::get( '/doctor/icuRoom/{id}', ['uses' => 'DoctorController@icuRoom'] )->name( 'icuRoom' );
    Route::get( '/doctor/emergencyRoom/{id}', ['uses' => 'DoctorController@emergencyRoom'] )->name( 'emergencyRoom' );
//change pass
    Route::get( '/doctor/doctorChangePass/{id}', ['uses' => 'DoctorController@doctorChangePass'] )->name( 'doctorChangePass' );
    Route::post( '/doctor/doctorChangePass/{id}', 'DoctorController@updatePassword' );
//update Information
    Route::get( '/doctor/doctorUpdateInformation/{id}', ['uses' => 'DoctorController@doctorUpdateInformation'] )->name( 'doctorUpdateInformation' );

    Route::post( '/doctor/doctorUpdateInformation/{id}', 'DoctorController@updateProfile' );

    Route::get( '/doctor/doctorCheckSalary/{id}', ['uses' => 'DoctorController@doctorCheckSalary'] )->name( 'doctorCheckSalary' );

//insert
    Route::get( '/doctor/immediateTreatment/{id}', ['uses' => 'DoctorController@immediateTreatment'] )->name( 'immediateTreatment' );
    Route::post( '/doctor/immediateTreatment/{id}', ['uses' => 'DoctorController@immediateTreatmentInsert'] )->name( 'immediateTreatment' );

    Route::get( '/doctor/checkReport/{id}', ['uses' => 'DoctorController@checkReport'] )->name( 'checkReport' );

    Route::get( '/doctor/searchPatient/{id}', ['uses' => 'DoctorController@searchPatient'] )->name( 'searchPatient' );
    Route::post( '/doctor/searchPatient/{id}', ['uses' => 'DoctorController@searchPatient'] )->name( 'searchPatient' );

    Route::get( '/SearchCourse/{keyword}', ['uses' => 'DoctorController@searchCourse'] )->name( 'searchPatient' );

    Route::post( '/doctor/addUser', 'UserControllerByAdmin@addUser' )->name( 'addUser' );

    Route::get( '/doctor/dashboard', 'adminController@dashboard' )->name( 'doctor.dashboard' );

    Route::get( '/doctor/addUser', 'UserControllerByAdmin@index' )->name( 'index' );

    Route::get( '/doctor/viewUserList', 'UserControllerByAdmin@viewUserList' )->name( 'viewUserList' );

    Route::get( '/doctor/editUser/{id}', 'UserControllerByAdmin@editUserView' )->name( 'editUserView' );
    Route::post( '/doctor/editUser/{id}', 'UserControllerByAdmin@editUser' )->name( 'editUser' );

    Route::get( '/doctor/viewDetails/{id}', "UserControllerByAdmin@viewUserDetails" )->name( 'viewUserDetails' );
    Route::get( '/doctor/delete/{id}', "UserControllerByAdmin@deleteUser" )->name( 'deleteUser' );
    Route::get( '/doctor/block/{id}', "UserControllerByAdmin@blockUser" )->name( 'blockUser' );

    Route::get('/doctor/feedbackReview', "LogoutController@feedbackReview")->name('feedbackReview');

    
    

} );