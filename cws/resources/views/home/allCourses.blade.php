@extends('home.layout')

@section('title')
    All Courses | 
@endsection

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
                                <a href="/explore-course/${course.category.slug}/${course.course_slug}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                            <img class="absolute inset-0 h-full w-full object-cover" src="/image/${course.featured_image}" alt="">
                                                <span class="inline-block px-2 py-1 leading-none bg-green-500 text-white rounded-full font-semibold uppercase tracking-wide text-xs absolute bottom-0 -right-0">New</span>
                                            </div>
                                            <div class="py-2 px-4">
                                            <h2 class="my-1  text-left capitalize font-bold">${course.name}</h2>
                                            <div class=" flex items-center gap-1">
                                                <span class="font-bold text-xl">₹${course.discount_fees}</span> 
                                                <span class='font-semibold text-md text-slate-600'> <del>₹${course.fees}</del></span>
                                            </div>
                                            </div>
                                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                            <span class="flex items-center mb-1">
                                                <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> ${course.duration} Weeks
                                            </span>
                                            <span class="flex items-center">
                                                <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> ${course.category ? course.category.cat_title : 'N/A'}
                                            </span>        
                                            </div>
                                        <div class="p-4 flex items-center text-sm text-gray-600"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-gray-400"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><span class="ml-2"></span></div>
                                    </a>
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
