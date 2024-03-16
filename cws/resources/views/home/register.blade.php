@extends('home.layout')

@section('content')
    <section >
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-gray-200 rounded-lg shadow sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="register">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: Siddharth" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: siddharth@gmail.com" required="">
                        </div>
                        <div>
                            <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900">Mobile
                                Number</label>
                            <input type="tel" name="mobile_no" id="mobile_no"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: 6202067088" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <input type="password_confirmation" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                required="">
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                            an account</button>
                        <p class="text-sm font-medium text-gray-700">
                            Already have an account? <a href="{{ route('login') }}"
                                class="font-medium text-blue-600 hover:underline">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Registration
        $(document).ready(function() {

            $('#register').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('addStudent') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display success message with SweetAlert
                        swal("Registration Successful!", "", "success");
                        // Reset the form
                        $('#register')[0].reset();
                        // Redirect to login page
                        setTimeout(() => {
                            window.location.href = '/login';
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        alert(JSON.parse(xhr.responseText).message);
                    }
                });
            });
        });
    </script>
@endsection
