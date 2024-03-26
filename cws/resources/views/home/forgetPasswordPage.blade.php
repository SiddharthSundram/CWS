@extends('home.layout')

@section('title')
     CWS | Forget Password 
@endsection

@section('content')


    <section>
        <div class="flex flex-col items-center justify-center  px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-100">
                    <div class="container mt-20">
                        <h1 class="text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Forget Password
                        </h1>
                        <form id="forgetForm" method="POST" class="space-y-4 md:space-y-6 mt-5 mb-2">
                            <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  " name="email" placeholder="Enter your email ">
                        </div>
                        <div>

                            <input type="submit" value="Forget Password" class="w-full text-white mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <p class="text-sm text-gray-700 font-medium ">
                                Want to goto login? <a href="/login"
                                    class="font-medium text-blue-600 hover:underline ">Login</a>
                            </p>
                        </div>
                        </form>
                
                
                        <div class="result mb-20 mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        $(document).ready(function() {
            $("#forgetForm").submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "/api/forget-password",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            $(".result").text(data.message)
                        } else {
                            $(".result").text(data.message)
                        }
                    }
                });
            })
        })
    </script>
@endsection
