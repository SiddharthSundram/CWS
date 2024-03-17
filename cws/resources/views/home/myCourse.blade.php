@extends('home.layout')


@section('content')
    <div>
        <div class="container h-full mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">My Courses</h1>

            <div id="courses-list">
                {{-- my courses will call here --}}

            </div>


            {{-- when user dont have any course --}}
            <div class="container mx-auto px-4 py-8 flex flex-wrap flex-col items-center gap-5 justify-center border border-gray-800 "
                id="not-courses-list">
                <div class="text-center">
                    <h2 class="text-3xl text-red-600 font-bold">You haven't enrolled in any courses yet.</h2>
                    <p class="mt-2 text-gray-600">Expand your knowledge and skills by enrolling in our courses.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('index') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300">Enroll
                        Now</a>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            let callingCourses = () => {
                var token = localStorage.getItem('token');
                if (token) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('my-profile') }}",
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function(response) {
                            let table = $("#courses-list");
                            let notCoursesList = $("#not-courses-list");
                            table.empty();

                            console.log(response.courses);

                            if (response.courses.length === 0) {
                                table.hide();
                                notCoursesList.show();
                            } else {
                                notCoursesList.hide();
                                table.show();

                                response.courses.forEach((item) => {
                                    table.append(`
                                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center mb-5 border border-b">
                                            <div class="md:w-1/6 md:mr-4 md:mb-5 md:flex md:flex-col justify-center items-center">
                                                <img src="/image/${item.featured_image}" id="courseImage" alt="" class="rounded-lg h-5/6 w-5/6 shadow-md mb-4 md:mb-0">
                                            </div>
                                            <div class="md:w-5/6 md:ml-4 flex gap-20">
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Course Details:</h3>
                                                    <div class="ml-3">
                                                        <h2 class="text-xl font-semibold text-gray-600 mb-2"> <span class="text-orange-600" id="courseName">${item.name}</span></h2>
                                                        <p class="text-gray-600 font-bold mb-2">Duration : <span class="font-normal" id="courseDescription">${item.duration}</span></p>
                                                        <p class="text-gray-600 font-bold mb-2">Instructor : <span class="font-normal" id="courseInstructor">${item.instructor}</span></p>
                                                        <p class="text-gray-600 font-bold mb-2">Language : <span class="font-normal" id="courseLang">${item.lang}</span></p>
                                                        <div class="flex items-center mb-4">
                                                            <span class="text-gray-600 font-bold mr-2">Discounted Fees : <span id="courseDiscountFees font-normal">  ₹${item.discount_fees}</span>.00 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Payment Details:</h3>
                                                    <div class="ml-3">
                                                        ${item.payments && item.payments.length > 0 ? `
                                                                    <p class="text-sm text-gray-600 mb-2">Amount: ₹${item.payments[0].fees}</p>
                                                                    <p class="text-sm text-gray-600 mb-2">Date of Payment: ${item.payments[0].date_of_payment}</p>
                                                                ` : `
                                                                    <p class="text-sm text-gray-600 mb-2">No payment information available</p>
                                                                `}
                                                            <p class="text-sm py-10 text-gray-600  mb-2"> <span class="">${item.payments && item.payments.length > 0 && item.payments[0].status === 1 ? '<span class="p-2 px-10 bg-green-600 text-white font-medium rounded mr-5">Paid</span>' : '<span class="p-2 px-10 bg-orange-600 text-white font-medium rounded mr-5">Pending</span>'}</span></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> 
                                    `);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    window.open('/', '_self');
                }
            };


            callingCourses();
        });
    </script>
@endsection
