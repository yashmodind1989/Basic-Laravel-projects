@extends('Templates.layouts.app')
@section('title', 'Dashboard Page')
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
        a.nav-link {
            color: #333;
        }

        nav.navbar.navbar-expand-lg.navbar-dark.fixed-top.py-4.d-block {
            background-image: none;
            transition: none;
            background-color: rgba(238, 77, 71, 0.635) !important;
            backdrop-filter: blur(4px) !important;
        }

        .card-body span {
            color: #333 !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

    <style>
        body {
            background-color: #1e1e2f;
            color: white;
        }

        .header {
            background-color: #282c34;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            background-color: #21252b;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar a {
            color: #61dafb;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #61dafb;
            color: #282c34;
        }

        .content {
            padding: 20px;
            background-color: #2c2f38;
            flex-grow: 1;
        }

        .tooltip-inner {
            background-color: #21252b;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #61dafb;
            display: inline-block;
            position: relative;
        }

        .online-status {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #28a745;
            border: 2px solid white;
        }

        .notification {
            position: relative;
            margin-left: 20px;
        }

        .notification .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            border-radius: 50%;
            padding: 5px 7px;
            font-size: 0.7rem;
        }

        .fa {
            padding: 15px 18px !important;
        }

        .card-body {
            padding: 12px 15px !important;
            line-height: 15px !important;
        }

        .d-flex.mt-145 {
            margin-top: 100px !important;
        }

        h2,
        h4 {
            color: #f5f5f5 !important;
        }

        .header {
            background-color: dimgray !important;
        }
    </style>
    <div class="d-flex mt-145">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="sidebar">
            <h4>{{ $user['role'] }} Panel</h4>
            <a href="#" title="Dashboard" class="link"><i class="fas fa-dashboard pr-15"></i>&nbsp;&nbsp;
                Dashboard</a>
            @if ($user['role'] == 'admin')
                <a href="{{ route('manage_users') }}" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Manage Users</a>
                <a href="{{ route('assign_agent') }}" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Assign Agent</a>
                <a href="{{ route('manage_orders') }}" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Manage Orders</a>
                {{--  <a href="#" title="Settings" class="link"><i class="fas fa-cog pr-15"></i>&nbsp;&nbsp;Settings</a>
                <a href="#" class="link" title="Reports"><i
                        class="fas fa-chart-bar pr-15"></i>&nbsp;&nbsp;Reports</a>  --}}
            @endif
            @if ($user['role'] == 'deliveryAgent')
                {{--  <a href="#" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Change Order Status</a>  --}}
                <a href="{{ route('viewOrders') }}" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;View Orders</a>
                {{--  <a href="#" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Manage Shipping</a>  --}}
                {{--  <a href="#" title="Settings" class="link"><i class="fas fa-cog pr-15"></i>&nbsp;&nbsp;Settings</a>
                <a href="#" class="link" title="Reports"><i
                        class="fas fa-chart-bar pr-15"></i>&nbsp;&nbsp;Reports</a>  --}}
            @endif
            @if ($user['role'] == 'customer')
                <a href="{{ route('createParcel') }}" title="Users" class="link"><i
                        class="fas fa-users pr-15"></i>&nbsp;&nbsp;Create Order</a>
                <a href="{{ route('orders.index') }}" title="Settings" class="link"><i
                        class="fas fa-cog pr-15"></i>&nbsp;&nbsp;View Orders</a>
                <a href="{{ route('trackOrder') }}" class="link" title="Reports"><i
                        class="fas fa-chart-bar pr-15"></i>&nbsp;&nbsp;Track Order</a>
                <a href="{{ route('viewTrashed') }}" class="link" title="Reports"><i class="fas fa-chart-bar pr-15"></i>&nbsp;&nbsp;Cancelled
                    Orders</a>
            @endif
            <a href="{{ route('logout') }}" title="Logout" class="text-danger"><i
                    class="fas fa-sign-out-alt pr-15"></i>&nbsp;&nbsp; Logout</a>

        </div>

        <div class="content">
            <div class="header">
                <div class="d-flex align-items-center">
                    <div class="profile-icon">
                        <img src="{{ asset('img/dash.png') }}" alt="Profile" class="img-fluid rounded-circle">
                        <div class="online-status"></div>
                    </div>
                    <div class="ms-2">
                        <strong>{{ $user['name'] }}</strong>
                        <p class="mb-0">{{ $user['email'] }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="notification">
                        <i class="fas fa-bell" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Notifications"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="dropdown ms-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i> Settings
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item link" href="#"><i class="fas fa-user"></i>
                                    &nbsp;&nbsp;Profile</a></li>
                            <li><a class="dropdown-item link" href="#"><i class="fas fa-sign-out-alt"></i>
                                    &nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <iframe class="content-frame" name="content-frame" src="https://www.google.com"></iframe> -->

            <div class="mt-3 target" name="content" id="content">
                <h2>Welcome to the {{ $user['role'] }} Dashboard</h2>
                <p>Your content goes here.</p>
                @if ($user['role'] == 'admin')
                   @php

                   @endphp
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Agents</h5>
                                    <p class="card-text">{{  count(\App\Models\User::where('role','deliveryAgent')->get()) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Total Customers</h5>
                                    <p class="card-text">{{  count(\App\Models\User::where('role','customer')->get()) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <p class="card-text">{{ count(\App\Models\Order::all()) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $('[data-bs-toggle="tooltip"]').tooltip();

            });
            $(document).ready(function() {
                // When a link with class 'link' is clicked
                $(".link").click(function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    let url = $(this).attr("href");

                    // Load the content of the link's href into the #content div
                    $("#content").load(url);
                });
            });
        </script>
    @endsection
