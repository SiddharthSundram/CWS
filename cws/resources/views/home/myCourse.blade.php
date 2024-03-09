@extends('home.layout')


@section('content')
    <div class="bg-gray-200 h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">My Courses</h1>

            <div class="container mx-auto  px-4 py-8  flex gap-5" id="courses-list">
               {{-- my courses will call here --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let callingCourses = () => {
                var token = localStorage.getItem('token');
                $.ajax({
                    type: 'GET',
                    url: "{{ route('my-profile') }}",
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        // console.log(response);
                        let table = $("#courses-list");
                        table.empty();


                        console.log(response);
                        let courses = response.courses;

                        courses.forEach((item) => {

                            table.append(`
                                <div class="max-w-lg bg-white rounded-lg shadow-md overflow-hidden">
                                    <img src="/image/${item.featured_image}" id="courseImage" alt="Course Image"
                                        class="w-full h-48 object-cover object-center">
                                    <div class="p-6">
                                        <h2 class="text-2xl font-semibold text-gray-800 mb-2" >Course : <span class='text-orange-600'>${item.name}</span></h2>
                                        <p class="text-sm text-gray-600 mb-2" id="courseDuration">Duration :${item.duration} </p>
                                        <p class="text-sm text-gray-600 mb-2" id="courseInstructor">Instructor: ${item.instructor} </p>
                                        <p class="text-sm font-bold text-green-600 mb-2 flex gap-3" id="courseDiscountFees"> Fees: ₹${item.discount_fees} <del class='text-red-600 font-normal'>₹${item.fees} </del></p>
                                        <p class="text-sm text-gray-600 mb-2" id="courseLang"> Language: ${item.lang} </p>
                                        <a href="#"
                                            class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center py-2 px-4 rounded">Start
                                            Learning</a>
                                    </div>
                                </div>
                               
                            `);


                        })

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
