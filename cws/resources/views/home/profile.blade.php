@extends('home.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-gray-200 p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 text-left mb-6">My Profile</h1>
            <div class="flex items-center justify-center mb-6">
                <div class="relative">
                    <img id="profile-image" class="h-32 w-32 rounded-full object-cover" src="https://via.placeholder.com/150"
                        alt="Profile Picture">
                </div>
            </div>
            <div class="flex justify-center space-x-4">
                <a href="#"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 inline-block text-center">Change
                    Image</a>
                <a href="" id="logouting"
                    class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:bg-red-600 inline-block text-center">Logout</a>
            </div>

            <div class="flex flex-col space-y-4" id="callingUserProfile">
                <div class="flex gap-2">
                    <label for="name" class="text-gray-700 font-semibold">Name: </label>
                    <p class="text-gray-800" id="calling_name"></p>
                </div>
                <div class="flex gap-2">
                    <label for="email" class="text-gray-700 font-semibold">Email:</label>
                    <p class="text-gray-800" id="calling_user_email"></p>
                </div>
                <div class="flex gap-2">
                    <label for="phone" class="text-gray-700 font-semibold">Phone:</label>
                    <p class="text-gray-800" id="calling_user_phone"></p>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var token = localStorage.getItem('token');
            if (token) {
                let callingProfile = () => {
                    $.ajax({
                        type: "GET",
                        url: "/api/user-profile",
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function(response) {
                            if (response.hasOwnProperty('name')) {
                                $("#calling_name").text(response.name);
                                if (response.hasOwnProperty('email')) {
                                    $("#calling_user_email").text(response.email);
                                    if (response.hasOwnProperty('mobile_no')) {
                                        $("#calling_user_phone").text(response.mobile_no);
                                    }
                                }
                            }
                        }
                    });
                }
                callingProfile();
            } else {
                window.open('/', '_self');
            }

            $('#logouting').click(function(e) {
                e.preventDefault();

                // Display a confirmation dialog
                swal({
                    title: "Are you sure you want to logout?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willLogout) => {
                    if (willLogout) {
                        // Proceed with logout
                        $.ajax({
                            url: '/api/logout',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            },
                            success: function(response) {
                                // Remove the token from localStorage
                                localStorage.removeItem('token');
                                // Redirect to the login page after successful logout
                                swal("Logout Successfully!", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.href =
                                        '{{ route('login') }}';
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        // Cancelled logout
                        swal("Logout Cancelled", "You are still login", "info");
                    }
                });
            });
        });
    </script>
@endsection
