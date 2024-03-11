@extends('home.layout')


@section('content')
    <div>
        <div class="container md:h-screen mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">My Categories</h1>

            <div class="container mx-auto px-4 py-8 flex flex-wrap gap-5 justify-center" id="courses-list">
                {{-- my courses will call here --}}

            </div>
            

            {{-- when user dont have any course in category --}}
            <div class="container mx-auto px-4 py-8 flex flex-wrap flex-col items-center gap-5 justify-center border border-gray-800 "
                id="not-courses-list">
                <div class="text-center">
                    <h2 class="text-3xl text-red-600 font-bold">No Course Available For the Selected Category.</h2>
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
            let callingCourse = () => {
                    $.ajax({
                        type: 'GET',
                        url:`/api/view-category/{{ request()->segment()}}`,
                        success: function(response) {
                            let table = $("#courses-list");
                            let notCoursesList = $("#not-courses-list");
                            table.empty();

                            if (response.courses.length === 0) {
                                table.hide();
                                notCoursesList.show();
                            } else {
                                notCoursesList.hide();
                                table.show();

                                response.courses.forEach((item) => {
                                    table.append(`
                                <div class="max-w-sm md:max-w-lg lg:max-w-xl xl:max-w-2xl bg-white rounded-lg shadow-md overflow-hidden">
                                    <img src="/image/${item.featured_image}" id="courseImage" alt="Course Image" class="w-full h-48 object-cover object-center">
                                    <div class="p-6">
                                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Course: <span class='text-orange-600'>${item.name}</span></h2>
                                        <p class="text-sm text-gray-600 mb-2" id="courseDuration">Duration: ${item.duration}</p>
                                        <p class="text-sm text-gray-600 mb-2" id="courseInstructor">Instructor: ${item.instructor}</p>
                                        <p class="text-sm font-bold text-green-600 mb-2 flex gap-3" id="courseDiscountFees">Fees: ₹${item.discount_fees} <del class='text-red-600 font-normal'>₹${item.fees}</del></p>
                                        <p class="text-sm text-gray-600 mb-2" id="courseLang">Language: ${item.lang}</p>
                                        <a href="https://www.youtube.com/@CodewithsadiQ" target="_blank" class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center py-2 px-4 rounded">Start Learning</a>
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
            };

            callingCourse();
        });
    </script>
@endsection
