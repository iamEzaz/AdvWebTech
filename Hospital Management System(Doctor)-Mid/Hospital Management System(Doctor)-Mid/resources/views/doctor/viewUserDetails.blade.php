@extends('doctor.main')

{{-- title --}}
@section('title')
    User Details
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
          <h2 class="page-title">See The List</h2>
        </div>
      </div>
      <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
  </body>
</html>


{{-- main content --}}
@section('main-content')
    <div class="content" style="background-color:">
        <div class="container" style="margin-left: -120px; max-width: 1100px; margin-top:30px">
            <h2 style="margin-left:350px;margin-bottom:-20px">User Details</h2>
            <table class="tables">
                <tr>
                    <td>Name</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{$user->type}}</td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>{{$user->active}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$user->phone}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$user->address}}</td>
                </tr>
                {{-- <tr>
                    <td>DOB</td>
                    <td>{{$user->dob}}</td>
                </tr> --}}
                <tr>
                    <td>Blod Group</td>
                    <td>{{$user->bloodGroup}}</td>
                </tr>
            </table>

        </div>
    </div>
@endsection
