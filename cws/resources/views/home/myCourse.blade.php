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

                                    let createdAt = new Date(item.created_at);
                                    let formattedDate = createdAt.toLocaleDateString('en-GB');

                                    table.append(`
                                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center mb-5 border border-b">
                                            <div class="md:w-1/6 md:mr-4 md:mb-5 md:flex md:flex-col justify-center items-center">
                                                <img src="/image/${item.featured_image}" id="courseImage" alt="" class="rounded-lg h-5/6 w-5/6 shadow-md mb-4 md:mb-0">
                                            </div>
                                            <div class="md:w-5/6 md:ml-4 flex flex-col md:flex-row gap-4">
                                                <div class="md:w-1/2">
                                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Course Details:</h3>
                                                    <div class="ml-3">
                                                        <h2 class="text-xl font-semibold text-gray-600 mb-2"> <span class="text-orange-600" id="courseName">${item.name}</span></h2>
                                                        <p class="text-gray-600 font-bold mb-2">Duration : <span class="font-normal" id="courseDescription">${item.duration}</span></p>
                                                        <p class="text-gray-600 font-bold mb-2">Instructor : <span class="font-normal" id="courseInstructor">${item.instructor}</span></p>
                                                        <p class="text-gray-600 font-bold mb-2">Enrolled Date : <span class="font-normal" id="courseLang"><time class='leading-none'>${formattedDate}</time></span></p>
                                                        <div class="flex items-center mb-4">
                                                            <span class="text-gray-600 font-bold mr-2">Discounted Fees : <span id="courseDiscountFees font-normal">  ₹${item.discount_fees}</span>.00 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2">
                                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Payment Details:</h3>
                                                    <div class="ml-3">
                                                        ${item.payments && item.payments.length > 0 ? 
                                                            `<ol class="relative border-s border-gray-200 ">
                                                                    ${item.payments.map(payment => `
                                                                    <li class="mb-2 ms-4">
                                                                        <div class="absolute w-3 h-3 ${payment.status === 1 ? 'bg-green-600' : 'bg-gray-200'} rounded-full mt-1.5 -start-1.5 border border-white "></div>
                                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">${payment.date_of_payment}</time>
                                                                        <div class="payment-info flex gap-2 items-center">
                                                                            <span class="text-sm font-bold text-gray-900">Amount:</span>
                                                                            <span class="text-sm text-gray-600">₹${payment.fees}</span>
                                                                            ${payment.status === 1 ? `<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                                                    </svg>` : ''}
                                                                        </div>
                                                                        ${payment.status === 0 ? `<span id="markPaid_${payment.id}" class="bg-orange-500 hover:bg-orange-600  text-white font-semibold py-1 px-2 rounded">Pending</span>` : ''}
                                                                    </li>
                                                                `).join('')}
                                                                </ol>`
                                                            : 
                                                            `<p class="text-sm text-gray-600 mb-2">No payment information available.</p>`
                                                        }
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
