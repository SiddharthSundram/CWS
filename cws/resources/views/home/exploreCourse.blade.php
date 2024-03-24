@extends('home.layout')

@section('content')
    <div class="">
        <div class="container md:h-screen mx-auto p-8">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center">

                <div class="md:w-2/6 md:mr-4 md:mb-5 md:flex md:flex-col items-center">
                    <img src="" id="courseImage" alt="" class="rounded-lg w-full shadow-md mb-4 md:mb-0">
                </div>

                <div class="md:w-4/6 md:ml-4">
                    <h2 class="text-3xl font-semibold text-gray-600 mb-4">
                        <span class=" text-orange-600 " id="courseName"></span>
                    </h2>

                    <p class="text-gray-600 font-bold mb-4">
                        <span class="font-normal" id="courseDescription"></span>
                    </p>

                    <div class="flex items-center mb-4 ">
                        <span class="text-2xl font-bold text-gray-700 mr-2 "><span id="courseDiscountFees"></span>.00
                        </span>
                        <span class="text-gray-400 line-through " id="courseFees"></span>
                        <span class="bg-green-500 text-white px-2 rounded py-1 ml-4 " id="discountAmount"> 25% Discount</span>
                    </div>
                    <div class="flex space-x-4 justify-end">
                        <a href="" class="bg-gray-500 flex hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded" id="whatsappShareBtn">
                            <span>Share</span>&nbsp;<span class="hidden md:block">On WhatsApp</span>
                        </a>
                        <a href=""
                            class="bg-orange-500 hover:bg-orange-600  text-white font-semibold py-3 px-6 rounded transition duration-300"
                            id="enrollBtn">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white flex md:flex-row gap-10 md:justify-evenly flex-col rounded-lg shadow-lg p-6 mt-8">

                <div class=" flex flex-col items-center text-center">
                    <span class="ml-2 text-2xl text-orange-600" id="courseInstructor">Teacher</span>
                    <span class="text-gray-600 text-xl font-semibold">Instructor</span>
                </div>

                <div class="flex-col flex items-center text-center">
                    <span class="ml-2 text-2xl text-orange-600" id="courseCategory">Web Devlopment</span>
                    <span class="text-gray-600 text-xl font-semibold">Category</span>
                </div>


                <div class="flex-col flex items-center text-center ">
                    <span class="ml-2 text-2xl text-orange-600" id="courseLang">English</span>
                    <span class="text-gray-600 text-xl font-semibold">Language</span>
                </div>


                <div class="flex-col flex items-center text-center">
                    <span class="ml-2 text-2xl text-orange-600" id="courseDuration">10 Week</span>
                    <span class="text-gray-600 text-xl font-semibold">Duration</span>
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function() {
                let courseId = "{{ request()->segment(2) }}";

                let discountAmount = 0; 
                let fees ; 
                let discountFees ; 
                $.ajax({
                    type: "GET",
                    url: `/api/course/${courseId}`,
                    dataType: "json",
                    success: function(response) {
                        fees = response.data.fees;
                        discountFees = response.data.discount_fees;

                        discountAmount = ((fees - discountFees) / fees) * 100;          

                        $('#courseImage').attr('src', '/image/' + response.data.featured_image);
                        $('#courseName').text(response.data.name);
                        $('#courseDuration').text(response.data.duration);
                        $('#courseInstructor').text(response.data.instructor);
                        $('#courseFees').text('₹' + fees);
                        $('#courseDiscountFees').text('₹' +discountFees);
                        $('#discountAmount').text(`${discountAmount}% Off`);
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
                    } 
                    else {
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
