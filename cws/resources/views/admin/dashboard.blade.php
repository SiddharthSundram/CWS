@extends('admin.base')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center flex-col justify-center h-24 rounded bg-blue-200 dark:bg-blue-800">
                <p class="text-2xl text-blue-600 dark:text-blue-300">{{ $totalStudents }}</p>
                <p class="text-xl font-semibold text-blue-600 dark:text-blue-300">Total Students</p>
            </div>
            <div class="flex items-center flex-col justify-center h-24 rounded bg-green-200 dark:bg-green-800">
                <p class="text-2xl text-green-600 dark:text-green-300">{{ $totalHallOfFrame }}</p>
                <p class="text-xl font-semibold text-green-600 dark:text-green-300">Total Hall of Fame</p>
            </div>
            <div class="flex items-center flex-col justify-center h-24 rounded bg-yellow-200 dark:bg-yellow-800">
                <p class="text-2xl text-yellow-600 dark:text-yellow-300">{{ $totalPayments }}</p>
                <p class="text-xl font-semibold text-yellow-600 dark:text-yellow-300">Total Payments</p>
            </div>
        </div>
        <div class="flex items-center flex-col justify-center h-48 mb-4 rounded bg-purple-200 dark:bg-purple-800">
            <p class="text-2xl text-purple-600 dark:text-purple-300">{{ $totalCourses }}</p>
            <p class="text-xl font-semibold text-purple-600 dark:text-purple-300">Total Courses</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">


            <div
                class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Admissions</h5>
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
                   <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                     <a href='/admin/student/view/${student.id}' class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded edit-btn'>View</a>
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
