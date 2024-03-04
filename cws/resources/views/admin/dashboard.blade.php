@extends('admin.base')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div class="flex flex-col md:flex-row h-24 rounded bg-yellow-400">
                <div class="flex flex-col justify-center px-5 md:w-96">
                    <h2 class="text-4xl font-bold text-black"><span id="countStudent">0</span>+</h2>
                    <p class="text-xl text-black">Students</p>
                </div>
                <div class="text-white flex justify-end  w-full ">
                    <a href="{{route('manageStudent')}}"
                        class="bg-orange-500 hover:bg-orange-600  text-white font-bold py-1 px-2 rounded  flex items-center">

                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>


            <div class="flex flex-col md:flex-row h-24 rounded bg-teal-400">
                <div class="flex flex-col justify-center px-5 md:w-96">
                    <h2 class="text-4xl font-bold text-blue-900"><span id="countProject">0</span>+</h2>
                    <p class="text-xl text-blue-900">Projects</p>
                </div>
                <div class="text-real-900 flex justify-end  w-full ">
                    <a href="{{route('recent_project')}}"
                        class="bg-blue-500 hover:bg-blue-600  text-white font-bold py-1 px-2 rounded  flex items-center">

                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>


            <div class="flex flex-col md:flex-row h-24 rounded bg-lime-400">
                <div class="flex flex-col justify-center px-5 md:w-96 ">
                    <h2 class="text-4xl font-bold text-blue-900"><span id="countFrame">0</span>+</h2>
                    <p class="text-xl text-blue-900">Hall of frame</p>
                </div>
                <div class="text-real-900 flex justify-end  w-full ">
                    <a href="{{route('manageHallframe')}}"
                        class="bg-lime-600 hover:bg-lime-700  text-white font-bold py-1 px-2 rounded  flex items-center">

                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>


            <div class="flex flex-col md:flex-row h-24 rounded bg-rose-400">
                <div class="flex flex-col justify-center px-5 md:w-96">
                    <h2 class="text-4xl font-bold text-red-950"><span id="countCourses">0</span>+</h2>
                    <p class="text-xl text-red-950">Courses</p>
                </div>
                <div class="text-white flex justify-end  w-full ">
                    <a href="{{route('manageCourse')}}"
                        class="bg-red-600 hover:bg-red-800  text-white font-bold py-1 px-2 rounded  flex items-center">

                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Explore
                    </a>
                </div>
            </div>


        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            // student count
            let countStudent = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('manage-student') }}",
                    success: function(response) {
                        let data = response.data;
                        //counting students
                        let len = data.length;
                        $("#countStudent").html(len);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            };
            countStudent();

            // projects count 
            let countProject = () => {
                $.ajax({
                    type: "GET",
                    url: "/api/recent_project",
                    dataType: "json",
                    success: function(response) {
                        let data = response.data;
                        //counting projects
                        let len = data.length;
                        $("#countProject").html(len);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching projects:", error);
                    }
                });
            }
            countProject();


            // count hall fo frame 
            let countFrame = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('hallFrame.index') }}",
                    success: function(response) {
                     // Count of hallFrame 
                        let data = response.data;
                        let len = data.length;
                        $("#countFrame").html(len); 

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            countFrame();


            // courses count
            let countCourses = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('course.index') }}",
                    dataType: "json",
                    success: function(response) {
                        let data = response.data;

                        // to count total number of course
                        let len = data.length;
                        $("#countCourses").html(len);

                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching courses:", error);
                    }
                });
            }
            countCourses();




        });
    </script>
@endsection
