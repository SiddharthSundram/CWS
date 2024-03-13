@extends('home.layout')


@section('content')
    <div>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-medium  mt-4">Our Courses</h1>


            <div class="container mx-auto my- p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3" id="courses-list">
                    <!-- Courses will be dynamically loaded here -->
                </div>
            </div>


            {{-- when we dont have any courses --}}
            <div class="container mx-auto px-4 py-8 flex flex-wrap flex-col items-center gap-5 justify-center border border-gray-800 "
                id="not-courses-list">
                <div class="text-center">
                    <h2 class="text-3xl text-red-600 font-bold">No Courses Available.</h2>
                    <p class="mt-2 text-gray-600">We don't have any courses available at the moment.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('index') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300">Explore
                        Other Options</a>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            let callingcourse = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('course.index') }}",
                    success: function(response) {
                        let table = $("#courses-list");
                        let notCoursesList = $("#not-courses-list");
                        table.empty();

                        if (response.data.length === 0) {
                            table.hide();
                            notCoursesList.show();
                        } else {
                            notCoursesList.hide();
                            table.show();

                            response.data.forEach((course) => {
                                table.append(`
                                    <div class="bg-white rounded-lg overflow-hidden  shadow-md transition duration-300 transform hover:scale-105 hover:bg-gray-50 hover:shadow-lg">
                                        <div class="relative">
                                            <img src="/image/${course.featured_image}" alt="Course" class="w-full h-56 object-cover">
                                            <span class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-semibold">New</span>
                                        </div>
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-2">
                                                <div>
                                                    <h3 class="text-xl text-gray-700 font-semibold mb-2">Course : <span class="text-orange-600">${course.name}</span></h3>
                                                </div>
                                                <div>
                                                    <span class="inline-flex rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-950 ring-1 ring-inset ring-green-600/20">${course.category ? course.category.cat_title : 'N/A'}</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <p>Instructor: ${course.instructor}</p>
                                            </div>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <p>Duration: ${course.duration}</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <p class="text-xl font-semibold text-gray-900">₹${course.fees} <span class="text-sm text-gray-600 line-through ml-2">₹${course.discount_fees}</span></p>
                                                    <p class="text-green-500 font-semibold">20% off</p>
                                                </div>
                                                <div>
                                                    <a href="/explore-course/${course.id}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            });
                        }
                    },
                });
            }
            callingcourse();


        });
    </script>
@endsection
