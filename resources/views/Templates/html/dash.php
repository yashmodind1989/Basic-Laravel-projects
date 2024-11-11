<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .fa{
            padding:15px 18px !important;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="#" title="Dashboard" class="link"><i class="fas fa-dashboard pr-15"></i>&nbsp;&nbsp; Dashboard</a>
        <a href="#" title="Users" class="link"><i class="fas fa-users pr-15"></i>&nbsp;&nbsp;Users</a>
        <a href="#" title="Settings" class="link"><i class="fas fa-cog pr-15"></i>&nbsp;&nbsp;Settings</a>
        <a href="#" class="link" title="Reports"><i class="fas fa-chart-bar pr-15"></i>&nbsp;&nbsp;Reports</a>
        <a href="#" title="Logout" class="text-danger link"><i class="fas fa-sign-out-alt pr-15"></i>&nbsp;&nbsp; Logout</a>
    </div>
    
    <div class="content">
        <div class="header">
            <div class="d-flex align-items-center">
                <div class="profile-icon">
                    <img src="img/dash.png" alt="Profile" class="img-fluid rounded-circle">
                    <div class="online-status"></div>
                </div>
                <div class="ms-2">
                    <strong>Admin Name</strong>
                    <p class="mb-0">admin@example.com</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="notification">
                    <i class="fas fa-bell" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications"></i>
                    <span class="badge">3</span>
                </div>
                <div class="dropdown ms-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i> Settings
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item link" href="#"><i class="fas fa-user"></i> &nbsp;&nbsp;Profile</a></li>
                        <li><a class="dropdown-item link" href="#"><i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <iframe class="content-frame" name="content-frame" src="https://www.google.com"></iframe> -->

        <div class="mt-3 target" name="content" id="content">
            <h2>Welcome to the Admin Dashboard</h2>
            <p>Your content goes here.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">150</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-success">
                        <div class="card-body">
                            <h5 class="card-title">New Signups</h5>
                            <p class="card-text">30</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Pending Requests</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                </div>
          </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
        
    });
    $(document).ready(function () {
    // When a link with class 'link' is clicked
    $(".link").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior
        let url = $(this).attr("href");

        // Load the content of the link's href into the #content div
        $("#content").load(url);
    });
});

</script>
</body>
</html>
