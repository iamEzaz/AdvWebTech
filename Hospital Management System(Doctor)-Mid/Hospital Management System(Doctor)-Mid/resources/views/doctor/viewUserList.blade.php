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

@extends('doctor.main')
@section('main-content')
    <div class="content">
        <div class="container" style="margin-left: 70px; max-width: 1100px;">
            <table class="table" style="background-color: #ffffff;">
                <h3 class="h2" style="background-color: #ffffff;padding: 10px 30px;text-align: center">User List</h3>
                <thead  class="thead">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userlist as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->active }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('editUserView',$user->id)}}">Edit</a>
                                <a class="btn btn-warning" href="{{route('blockUser',$user->id)}}">Block</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')" href=" /doctor/delete/{{ $user->id}}">delete</a>
                                <a class="btn" href="{{route('viewUserDetails',$user->id)}}"
                                    style="background-color:#eb8d5e;color:#fff">View Details</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
   
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
