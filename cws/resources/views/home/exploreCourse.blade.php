@extends('home.layout')

@section('content')
    <div class="md:mb-40">
        <div class="container mx-auto p-8">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center">

                <div class="md:w-1/2 md:mr-4 md:mb-5 md:flex md:flex-col items-center">
                    <img src="" id="courseImage" alt="" class="rounded-lg shadow-md mb-4 md:mb-0">
                </div>

                <div class="md:w-1/2 md:ml-4">
                    <h2 class="text-3xl font-semibold text-gray-600 mb-4">
                        Course Name: <span class=" text-orange-600 " id="courseName"></span>
                    </h2>

                    <p class="text-gray-600 font-bold mb-4">
                        Description : <span class="font-normal" id="courseDescription"></span>
                    </p>

                    <div class="flex items-center mb-4">
                        <span class="text-2xl font-bold text-gray-700 mr-2 "><span id="courseDiscountFees"></span>.00
                        </span>
                        <span class="text-gray-400 line-through" id="courseFees"></span>
                        <span class="bg-green-500 text-white px-2 py-1 ml-4"> 25% Discount</span>
                    </div>
                    <div class="flex space-x-4 justify-end">
                        <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded ">
                            Share
                        </a>
                        <a href="#"
                            class="bg-rose-500 hover:bg-rose-600 text-white font-semibold py-3 px-6 rounded transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white flex md:flex-row gap-10 md:justify-between flex-col rounded-lg shadow-lg p-6 mt-8">

                <div class=" flex flex-col items-center ">
                    <span class="ml-2 text-2xl text-orange-600" id="courseInstructor">Teacher</span>
                    <span class="text-gray-600 text-xl font-semibold">Instructor</span>
                </div>

                <div class="flex-col flex items-center ">
                    <span class="ml-2 text-2xl text-orange-600" id="courseCategory">Web Devlopment</span>
                    <span class="text-gray-600 text-xl font-semibold">Category</span>
                </div>


                <div class="flex-col flex items-center ">
                    <span class="ml-2 text-2xl text-orange-600" id="courseLang">English</span>
                    <span class="text-gray-600 text-xl font-semibold">Language</span>
                </div>


                <div class="flex-col flex items-center ">
                    <span class="ml-2 text-2xl text-orange-600" id="courseDuration">25 Hours</span>
                    <span class="text-gray-600 text-xl font-semibold">Duration</span>
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function() {
                let courseId = "{{ request()->segment(2) }}";
                $.ajax({
                    type: "GET",
                    url: `/api/course/${courseId}`,
                    dataType: "json",
                    success: function(response) {
                        $('#courseImage').attr('src', '/image/' + response.data.featured_image);
                        $('#courseName').text(response.data.name);
                        $('#courseDuration').text(response.data.duration);
                        $('#courseInstructor').text(response.data.instructor);
                        $('#courseFees').text('₹' + response.data.fees);
                        $('#courseDiscountFees').text('₹' + response.data.discount_fees);
                        $('#courseDescription').text(response.data.description);
                        $('#courseLang').text(response.data.lang);
                        $('#courseCategory').text(response.data.category.cat_title);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching courses:", error);
                    }
                });
            });
        </script>
    @endsection
