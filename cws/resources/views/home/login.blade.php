@extends('home.layout')

@section('title')
    Login |
@endsection

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-100">
                    <h1 class="text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="" method="POST" id="login">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="siddharth@gmail.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="•••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                required="">
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500">Remember me</label>
                                </div>
                            </div>
                            <a href="/forget-password" class="text-sm font-medium text-blue-600 hover:underline">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            in</button>
                        <p class="text-sm text-gray-700 font-medium">
                            Don’t have an account yet? <a href="/register"
                                class="font-medium text-blue-600 hover:underline">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>      
        var rememberMe = localStorage.getItem('rememberMe') === 'true';
        if (rememberMe) {
            var email = localStorage.getItem('email');
            var password = localStorage.getItem('password');
            $('#email').val(email);
            $('#password').val(password);
            $('#remember').prop('checked', true);
        }

        
        $('#login').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var rememberMe = $('#remember').prop('checked');
            if (rememberMe) {
                localStorage.setItem('email', $('#email').val());
                localStorage.setItem('password', $('#password').val());
                localStorage.setItem('rememberMe', true);
            } else {
                localStorage.removeItem('email');
                localStorage.removeItem('password');
                localStorage.removeItem('rememberMe');
            }
            $.ajax({
                url: 'api/login',
                type: 'POST',
                data: formData,
                success: function(response) {
                    localStorage.setItem('token', response.token);
                    if (response.isAdmin) {                        
                        swal("Redirecting to Admin Login", "", "success");
                        setTimeout(() => {
                            window.location.href = '{{ route('admin.dashboard') }}';
                        }, 1500);
                    } else {                        
                        swal("Login Successfully!", "", "success");                        
                        setTimeout(() => {
                            window.location.href = '{{ route('index') }}';
                        }, 1500);
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 401) {                        
                        swal("Login Failed!", "Email or password is incorrect.", "error");
                    } else {                        
                        $('#errorMsg').show();
                        console.log(xhr.responseText);
                    }
                }
            });
        });
    </script>
@endsection
