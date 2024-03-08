@extends('admin.base')

@section('content')
    <div class="p-4 mt-8">
            <div class="flex-1 flex mt-4">
                <h1 class="text-md font-normal">Admin Dashboard</h1>
            </div>
        <div class="flex-1 flex mb-5 mt-4">
            <h1 class="text-2xl font-semibold text-slate-500">Hello Admin, </h1>
        </div>  
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-sm font-normal leading-none text-gray-900 dark:text-white">Latest Admissions</h5>
                    <a href="" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" id="callingStudentList" class="divide-y divide-gray-200 dark:divide-gray-700">
                        {{-- student list ajax  --}}
                    </ul>
                </div>
            </div>
            <div
                class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-sm font-normal leading-none text-gray-900 dark:text-white">Batchs</h5>
                    <a href="" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        {{-- student list ajax  --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex-1 flex mt-4 mb-2">
            <h1 class="text-md font-normal">Static</h1>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex flex-col p-4 justify-center rounded bg-blue-600 dark:bg-blue-800">
                <p class="text-sm text-left font-semibold text-slate-100 dark:text-blue-300">Total Students</p>
                <p class="text-2xl text-white dark:text-blue-300">{{ $totalStudents }}</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-green-600 dark:bg-green-800">
                <p class="text-sm font-semibold text-white dark:text-green-300">Total Hall of Fame</p>
                <p class="text-2xl text-white dark:text-green-300">{{ $totalHallOfFrame }}</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-yellow-600 dark:bg-yellow-800">
                <p class="text-sm font-semibold text-white dark:text-yellow-300">Total Payments</p>
                <p class="text-2xl text-white dark:text-yellow-300">{{ $totalPayments }}</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-purple-600 dark:bg-purple-800">
                <p class="text-sm font-semibold text-white dark:text-purple-300">Total Courses</p>
                <p class="text-2xl text-white dark:text-purple-300">{{ $totalCourses }}</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let callingStudent = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('manage-student') }}",
                    success: function(response) {
                        let list = $("#callingStudentList");
                        list.empty();
                        let data = response.data;
                        //counting students
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((student) => {
                            list.append(`
                       <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="https://th.bing.com/th/id/OIP.wNF8zVaEtJlIMCOswo76AQHaHa?w=50&h=50&rs=1&pid=ImgDetMain" alt="${student.name}">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    ${student.name}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    ${student.mobile_no}
                                </p>
                            </div> 
                        </div>
                    </li>
                       `);

                        });


                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            };
            callingStudent();
        });
    </script>
@endsection
