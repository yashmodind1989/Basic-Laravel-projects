@extends('Templates.layouts.app')
@section('title','Forget Password Page')
@section('content')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
</head>
<body>  -->
<!-- Login 4 - Bootstrap Brain Component -->
 <style>
    a.nav-link{
        color:#333;
    }
    nav.navbar.navbar-expand-lg.navbar-dark.fixed-top.py-4.d-block {
    background-image: none;
    transition: none;
    background-color: rgba(238, 77, 71, 0.635) !important;
    backdrop-filter: blur(4px) !important;
}
 </style>
 
<!-- Password Reset 10 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="mb-5">
          <div class="text-center mb-4">
            <a href="#!">

              <video src="{{ asset('img/del.webm')}}" alt="BootstrapBrain Logo" width="175" height="157" autoplay></video>
            </a>
          </div>
          <h4 class="text-center mb-4">Password Reset</h4>
        </div>
        <div class="card border border-light-subtle rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <form action="#!">
              <p class="text-center mb-4">Provide the email address associated with your account to recover your password.</p>
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
          <a href="#!" class="link-secondary text-decoration-none">Login</a>
          <a href="#!" class="link-secondary text-decoration-none">Register</a>
        </div>
      </div>
    </div>
  </div>
</section>

 @endsection