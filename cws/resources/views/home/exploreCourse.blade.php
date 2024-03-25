@extends('home.layout')

@section('content')
    <div class="bg-slate-800 h-48 gap-0 flex flex-col justify-around flex-1 w-full px-[10%]">


        <nav class="flex flex-1 mt-3" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-50 hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-50 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-50 hover:text-white md:ms-2">Projects</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-50 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-50 md:ms-2">Flowbite</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex-1 flex flex-col ">
            <span class="text-white font-semibold courseName text-3xl">Loading...</span>
        </div>
    </div>

    <div class="w-full">
        <div
            class="text-sm px-[10%] font-medium text-center sticky top-[70px] bg-white z-40 border text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Features</a>
                </li>
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Descriptions</a>
                </li>
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Batch</a>
                </li>
                <li class="me-2">
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Fees</a>
                </li>
                <li>
                    <a href=""
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Course
                        Content</a>
                </li>
            </ul>
        </div>
        <div class="px-[10%]">


            <div class="w-full">

                <div class="flex-1 top-32  right-16 z-50 md:fixed md:mr-4 md:mb-5 md:flex md:flex-col items-center">
                    <img src="" id="courseImage" alt="" class="rounded-lg w-full shadow-md mb-4 md:mb-0">

                    <div class="flex justify-between items-center  flex-1  w-full my-4">
                        <span class="flex-1 flex items-center">
                            <span class="text-2xl font-bold text-gray-700 mr-2 "><span id="courseDiscountFees"></span>.00
                            </span>
                            <span class="text-gray-400 line-through " id="courseFees"></span>
                        </span>
                        <span class="bg-green-300 text-green-800 px-2 text-xs rounded py-1 " id="discountAmount"> 25%
                            Discount</span>
                    </div>
                    <a href=""
                        class="bg-orange-500 w-full text-center hover:bg-orange-600  text-white font-semibold py-2 px-6 rounded transition duration-300"
                        id="enrollBtn">
                        Enroll Now
                    </a>
                </div>

                <p class="text-gray-600 font-bold mb-4 md:w-8/12 p-2">
                    <span class="font-normal leading-8 text-justify " id="courseDescription"></span>
                </p>
            </div>
        </div>
    </div>


    <div class="">
        <div class="container md:h-screen mx-auto p-8">
            <div class="bg-white rounded-lg p-6 flex flex-col ">

                <div class="flex">



                </div>
            </div>



        </div>

        <script>
            $(document).ready(function() {
                let courseId = "{{ request()->segment(2) }}";

                let discountAmount = 0;
                let fees;
                let discountFees;
                $.ajax({
                    type: "GET",
                    url: `/api/course/${courseId}`,
                    dataType: "json",
                    success: function(response) {
                        fees = response.data.fees;
                        discountFees = response.data.discount_fees;

                        discountAmount = ((fees - discountFees) / fees) * 100;

                        $('#courseImage').attr('src', '/image/' + response.data.featured_image);
                        $('.courseName').text(response.data.name);
                        $('#courseDuration').text(response.data.duration + " Weeks");
                        $('#courseInstructor').text(response.data.instructor);
                        $('#courseFees').text('₹' + fees);
                        $('#courseDiscountFees').text('₹' + discountFees);
                        $('#discountAmount').text(`${discountAmount.toFixed(2)}% Off`);
                        $('#courseDescription').text(response.data.description);
                        $('#courseLang').text(response.data.lang);
                        $('#courseCategory').text(response.data.category.cat_title);
                        // Adding functionality to share button
                        $('#whatsappShareBtn').click(function(e) {
                            e.preventDefault();

                            var message = 'Check out this amazing course:\n' +
                                'Name: ' + response.data.name + '\n' +
                                'Duration: ' + response.data.duration + '\n' +
                                'Instructor: ' + response.data.instructor + '\n' +
                                'Fees: ₹' + response.data.fees + '\n' +
                                'Discounted Fees: ₹' + response.data.discount_fees + '\n' +
                                'Description: ' + response.data.description + '\n' +
                                'Language: ' + response.data.lang + '\n' +
                                'Category: ' + response.data.category.cat_title + '\n' +
                                'Visit: codewithsadiq.com';

                            var encodedMessage = encodeURIComponent(message);

                            // For sharing image,
                            var image = '/image/' + response.data.featured_image;
                            var encodedImage = encodeURIComponent(image);

                            var whatsappURL = 'whatsapp://send?text=' + encodedMessage + '&image=' +
                                encodedImage;

                            window.location.href = whatsappURL;
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching courses:", error);
                    }
                });
            });

            //for course enroll
            $(document).ready(function() {
                $('#enrollBtn').click(function(event) {
                    event.preventDefault();

                    var courseId = "{{ request()->segment(2) }}";
                    var token = localStorage.getItem('token');

                    if (token) {
                        $.ajax({
                            type: "GET",
                            url: "/api/user-profile",
                            headers: {
                                'Authorization': 'Bearer ' + token
                            },
                            success: function(response) {
                                var userId = response.id;
                                enrollUser(courseId, userId);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error fetching user profile:", error);
                            }
                        });
                    } else {
                        swal({
                            title: "Login Required",
                            text: "Please log in to enroll in the course.",
                            icon: "warning",
                            buttons: {
                                cancel: "Cancel",
                                confirm: "Log In"
                            },
                        }).then((value) => {
                            if (value) {
                                window.open('/login', '_self');
                            }
                        });
                    }
                });

                function enrollUser(courseId, userId) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('student_course.store') }}",
                        data: {
                            course_id: courseId,
                            user_id: userId
                        },
                        dataType: "json",
                        success: function(response) {
                            swal({
                                title: "Success!",
                                text: "Course enrolled successfully!",
                                icon: "success"
                            });
                            setTimeout(() => {
                                window.open('/my-course', '_self');
                            }, 2000);

                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.responseJSON.msg || "Error enrolling user.";
                            swal({
                                title: "Error!",
                                text: errorMessage,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        </script>
    @endsection
