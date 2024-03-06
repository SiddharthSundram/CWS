@extends('home.layout')

@section('content')
    <div class="h-screen mb-44">
        <div class="container mx-auto p-8">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center">

                <div class="md:w-1/2 md:mr-4 md:mb-5 md:flex md:flex-col items-center">
                    <img src="" id="courseImage" alt="" class="rounded-lg shadow-md mb-4 md:mb-0">
                </div>

                <div class="md:w-1/2 md:ml-4">
                    <h2 class="text-3xl text-orange-600 font-semibold mb-4" id="courseName"></h2>
                    <p class="text-gray-600 mb-4">
                        Duration : <span id="courseDuration"></span>
                    </p>

                    <p class="text-gray-600 mb-4">
                        Instructor : <span id="courseInstructor"></span>
                    </p>

                    <p class="text-gray-600 mb-4">
                        Language : <span id="courseLang"></span>
                    </p>

                    <p class="text-gray-600 mb-4">
                        Category : <span id="courseCategory"></span>
                    </p>
                    <p class="text-gray-600 mb-4">
                        Description : <span id="courseDescription"></span>
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
