<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    {{-- ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{--bootstrap  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- style css in public folder --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Admin Cws</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="dashboard" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">CWS</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
 
            <li>
                <a href="{{route("manageCategory")}}">
                    <i class='bx bxs-book-alt' ></i>
                    <span class="text">Manage Category</span>
                </a>
            </li>
            <li>
                <a href="{{route("manageCourse")}}">
                    <i class='bx bxs-book-alt' ></i>
                    <span class="text">Manage Course</span>
                </a>
            </li>
            <li>
                <a href="{{route("insertCategory")}}">
                    <i class='bx bxs-layer-plus' ></i>
                     <span class="text">Insert Category</span>
                </a>
            </li>
            <li>
                <a href="{{route("insertCourse")}}">
                    <i class='bx bxs-layer-plus' ></i>
                    <span class="text">Insert Course</span>
                </a>
            </li>
            <li>
                <a href="{{route("hallFrame")}}">
                    <i class='bx bx-user-plus'></i>
                    <span class="text">HallFrame</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Chat</span>
                </a>
            </li>
            <li>
                <a href="{{route("recent_project")}}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Recent Project</span>
                </a>
            </li>
        </ul>
        
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->


    {{-- for Next page dashbord  --}}
    @section('content')
    @show

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
