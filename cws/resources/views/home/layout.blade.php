<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sadiq's Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('css')
</head>

<body class="font-sans bg-gray-100">
    <!-- Header -->
    <div class="bg-gray-800 text-white">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo and site title -->
            <a href="#" class="flex items-center gap-2">
                {{-- <img src="images/logo.png" class="w-96 h-8" alt="Logo"> --}}
                <span class="font-semibold text-lg">Code With Sadiq</span>
            </a>

            <!-- Navigation links -->
            <nav class="hidden md:flex items-center gap-4">
                <a href="" class="hover:text-gray-300">Home</a>
                <a href="" class="hover:text-gray-300">About</a>
                <a id="login-link" class="hover:text-gray-300" href="{{ route('login') }}">Login</a>
                <a id="register-link"class="hover:text-gray-300" href="{{ route('register') }}">Register</a>
                <a id="logout-link"class="hover:text-gray-300" href="#"><div id="logout">Logout</div></a>

            </nav>

            <!-- Mobile menu button -->
            <button id="drawerToggleButton" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Drawer component (conditionally rendered) -->
    <div id="drawerNavigation"
        class="fixed top-0 left-0 z-50 h-screen w-60 bg-gray-800 text-white transform transition-transform duration-300 -translate-x-full md:hidden"
        >
        <h5 class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400" id="calling_username">Hi, Guest
        </h5>
        <div class="p-4">
            <div class="flex justify-between items-center mb-4">
                <!-- Logo and site title -->
                <a href="#" class="flex items-center gap-2">
                    {{-- <img src="images/logo.png" class="w-8 h-8" alt="Logo"> --}}
                    <span class="font-semibold text-lg">Code With Sadiq</span>
                </a>

                <!-- Close button -->
                <button id="drawerCloseButton" class="text-white focus:outline-none">
                    <svg xmlns="/images/logo.png" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Navigation links -->
            <nav class="flex flex-col gap-4">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">Services</a>
                <a href="#" class="hover:text-gray-300">About</a>
                <a href="" class="hover:text-gray-300">Logout</a>
            </nav>
        </div>
    </div>




    <main>


        @section('content')

        @show


    </main>

    <footer class="bg-gray-900 text-white py-4 border-2 border-blue-700 hover:border-blue-900 ">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Code With Sadiq Website. All rights reserved.</p>
        </div>
    </footer>



    <!-- Your script tags -->
    <script>
        const drawerNavigation = document.getElementById('drawerNavigation');
        const drawerToggleButton = document.getElementById('drawerToggleButton');
        const drawerCloseButton = document.getElementById('drawerCloseButton');

        // Toggle drawer visibility on mobile
        drawerToggleButton.addEventListener('click', function() {
            drawerNavigation.classList.toggle('-translate-x-full');
        });

        // Close drawer when close button is clicked
        drawerCloseButton.addEventListener('click', function() {
            drawerNavigation.classList.add('-translate-x-full');
        });
    
    $(document).ready(function() {
    
            var token = localStorage.getItem('token');
    
            if (token) {
                $.ajax({
                    url: '/api/user-profile',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        if (response.hasOwnProperty('name')) {
                            $("#calling_username").text('Hi, ' + response.name);
                            $('#login-link').hide();
                            $('#register-link').hide();
                            $('#logout-link').show();
                        } else {
                            $("#calling_username").text('Hi, Guest');
                            $('#login-link').show();
                            $('#register-link').show();
                            $('#logout-link').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 401) {
                            // Token expired, remove from local storage
                            localStorage.removeItem('token');
                        }
                        $("#calling_username").text('Hi, Guest');
                        $('#login-link').show();
                        $('#register-link').show();
                        $('#logout-link').hide();
                        console.log(xhr.responseText);
                    }
                });
            } else {
                // Token does not exist, handle the case accordingly
                $("#calling_username").text('Hi, Guest');
                $('#login-link').show();
                $('#register-link').show();
                $('#logout-link').hide();
            }
    
    
            $('#logout').click(function(e) {
                e.preventDefault();
    
                $.ajax({
                    url: '/api/logout',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        // Remove the token from localStorage
                        localStorage.removeItem('token');
                        // Redirect to the login page
                        window.location.href = '{{ route('login') }}';
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
