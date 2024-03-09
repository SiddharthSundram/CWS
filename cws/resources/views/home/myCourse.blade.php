@extends('home.layout')


@section('content')
    <div class="bg-gray-200 h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">My Courses</h1>

            <div class="container mx-auto px-4 py-8" id="courses-list">
                {{-- <div class="max-w-lg bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Course Image"
                        class="w-full h-48 object-cover object-center">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Course Name</h2>
                        <p class="text-sm text-gray-600 mb-2" id="ids"> Id: </p>
                        <p class="text-sm text-gray-600 mb-2" id="courseId">Course Id: </p>
                        <p class="text-sm text-gray-600 mb-2" id="userId">User Id: </p>
                        <a href="#"
                            class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center py-2 px-4 rounded">Start
                            Learning</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
       
        $(document).ready(function() {
            let callingCourses = () => {
                var token = localStorage.getItem('token');

                
                $.ajax({
                    type: 'GET',
                    url: "{{route("my-profile")}}",
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response){
                       console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            };

            callingCourses();
        });
    </script>
@endsection
