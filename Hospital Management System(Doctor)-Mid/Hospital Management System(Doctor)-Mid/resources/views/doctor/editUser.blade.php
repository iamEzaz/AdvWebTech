@extends('doctor.main')
{{-- title --}}
@section('title')
    Edit User
@endsection

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styling -->
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->

    <!-- Admin Styling -->
    <link rel="stylesheet" href="/css/doctor-nav.css" />
    <link rel="stylesheet" href="/css/doctor-table.css" />
    <link rel="stylesheet" href="/css/doctor.css" />

    <title>Dashboard</title>
    <link rel="icon" href="../images/hms.svg">
  </head>

  <body>
    <header class="header-area">
      <div class="title">
        <a><h1>Hospital Management System</h1></a>
      </div>
      <div class="navigation">
        <nav class="menu" align="right">
          <a>Welcome</a>
           
        </nav>
      </div>
    </header>


   
    <div class="admin-wrapper">
      <!-- Left Sidebar -->
      <div class="left-sidebar">
        <ul>
          <li><a href="{{route('doctorProfile', ['id' => $user->id])}}">Profile</a></li>
          <li><a href="{{route('addUser', ['id' => $user->id])}}">Add Patient</a></li>
          <li><a href="{{route('viewUserList', ['id' => $user->id])}}">User List</a></li>
          <li><a href="{{route('approveAppointment', ['id' => $user->id])}}">Approve Apointment</a></li>
          <li><a href="{{route('apointmentHistory', ['id' => $user->id])}}">Apointment History</a></li>
          <li><a href="{{route('operationTheatres', ['id' => $user->id])}}">Operation Theatres</a></li>
          <li><a href="{{route('hospitalAuthority', ['id' => $user->id])}}">Hospital Authority</a></li>
          <li><a href="{{route('help', ['id' => $user->id])}}">Doctor Information</a></li>
          <li><a href="{{route('feedbackReview', ['id' => $user->id])}}">Feedback & Review</a></li>
         
        </ul>
      </div>
      <!-- // Left Sidebar -->

      <!-- Admin Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Edit The User By Filling Up The Box</h2>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>


{{-- main content --}}
@section('main-content')
    <div class="content">
        <div class="validation">
            @foreach ($errors->all() as $error)
                <div class="msg">{{ $error }}<br></div>
            @endforeach
        </div>
        <div class="container"
            style="background-color: white;margin-bottom: 200px; margin-left: 200px; max-width: 600px; padding: 20px; margin-top: -550px;">
            <h2>Edit User</h2>
            <form action="" method="post">

                <!-- csrf token -->
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="label">Userame</label>
                    <input type="text" name="username" placeholder="username.." class="form-control input" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input type="email" name="email" class="form-control input" placeholder="email.." value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label class="label">Phone</label>
                    <input type="text" name="phone" class="form-control input" placeholder="null" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                    <label class="label">Active</label>
                    <input type="text" name="active" class="form-control input"  value="{{$user->active}}">
                </div>
                <input type="submit" class="btn btn-info" style="padding:8px 40px;margin-top:20px;margin-left:200px;"
                    name="submit" value="Save">
            </form>
        </div>
    </div>
@endsection
