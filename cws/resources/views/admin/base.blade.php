<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    {{-- ajax cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/adminDesign.css">
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark  sidebar inMobileMode">
        <div class="position-sticky">
            <h3 class="text-center">Administrator</h3>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-user-graduate"></i> My Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-user-graduate"></i> Insert Students
                    </a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-book"></i>  Manage Teacher
                        </a>
                    </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hallFrame') }}">
                        <i class="fas fa-user-graduate"></i>
                         Hall Of Frame
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manageCourse') }}">
                        <i class="fas fa-book"></i> Manage Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('insertCourse') }}">
                        <i class="fas fa-book"></i> Insert Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manageCategory') }}">
                        <i class="fas fa-book"></i> Manage Category
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('insertCategory') }}">
                        <i class="fas fa-book"></i> Insert Category
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i> Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adminLogout') }}">
                        Logout
                    </a>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 ">
        {{-- navbar --}}

        <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white sticky-top mb-3 ">
            <div class="container">
                <a class="navbar-brand" href="">Admin Panel | {{ env('APP_NAME') }}</a>

                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarScrolls" aria-controls="navbarScrolls" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarScrolls"
                    aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> Admin Menu Bar
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body ">
                        <ul class="navbar-nav onDeskMode ">
                            <li class="nav-item">
                                <a class="nav-link text-dark " aria-current="page" href="">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark " href="">Insert Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark " href="">Manage Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark " href="">Insert Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark " href="">Manage Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">
                                    <i class="fas fa-cogs"></i> Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('adminLogout') }}">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>



        <!-- Content goes here -->
        @section('content')

        @show

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
