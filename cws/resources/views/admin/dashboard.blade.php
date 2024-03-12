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
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-sm font-normal leading-none text-gray-900 dark:text-white">Latest Admissions</h5>
                    <a href="{{ route('manageAdmission') }}"
                        class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
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
                class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-sm font-normal leading-none text-gray-900 dark:text-white">Help Query</h5>
                    <a href="{{route('manageQuery')}}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="pb-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="query" id="searchInput"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search student by name">
                    </div>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700" id="callingMessage">
                        {{-- help  list ajax  --}}
                    </ul>
                </div>
                <div id="pagination" class="">
                    <!-- Pagination links will be inserted here -->
                </div>
            </div>
        </div>
        <div class="flex-1 flex mt-4 mb-2">
            <h1 class="text-md font-normal">Static</h1>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex flex-col p-4 justify-center rounded bg-pink-600 dark:bg-pink-800">
                <p class="text-sm font-semibold text-white dark:text-pink-300">Total Admission</p>
                <p class="text-2xl text-white dark:text-pink-300 countAdmission"></p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-blue-600 dark:bg-blue-800">
                <p class="text-sm text-left font-semibold text-slate-100 dark:text-blue-300">Total Students</p>
                <p class="text-2xl text-white dark:text-blue-300 countStudent">Loading</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-green-600 dark:bg-green-800">
                <p class="text-sm font-semibold text-white dark:text-green-300">Total Hall of Fame</p>
                <p class="text-2xl text-white dark:text-green-300 counthallFrame">Loading</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-yellow-600 dark:bg-yellow-800">
                <p class="text-sm font-semibold text-white dark:text-yellow-300">Total Payments</p>
                <p class="text-2xl text-white dark:text-yellow-300 countPayments">0</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-purple-600 dark:bg-purple-800">
                <p class="text-sm font-semibold text-white dark:text-purple-300">Total Courses</p>
                <p class="text-2xl text-white dark:text-purple-300 countCourse"></p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-amber-600 dark:bg-amber-800">
                <p class="text-sm font-semibold text-white dark:text-amber-300">Total Due</p>
                <p class="text-2xl text-white dark:text-amber-300">0</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-emerald-600 dark:bg-emerald-800">
                <p class="text-sm font-semibold text-white dark:text-emerald-300">Total Projects</p>
                <p class="text-2xl text-white dark:text-emerald-300 countProjects">0</p>
            </div>
            <div class="flex flex-col p-4 justify-center rounded bg-purple-600 dark:bg-purple-800">
                <p class="text-sm font-semibold text-white dark:text-purple-300">Total Categories</p>
                <p class="text-2xl text-white dark:text-purple-300 countCategory"></p>
            </div>


        </div>
    </div>
    <script>
        $(document).ready(function() {
            let callingStudent = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('manage-admission') }}",
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


            // Function to fetch messages
            let fetchMessages = (query = '', page = 1) => {
                $.ajax({
                    url: "{{ route('manage-message') }}",
                    type: "GET",
                    data: {
                        'query': query,
                        'page': page
                    },
                    success: function(response) {
                        let data = response.data;

                        let table = $("#callingMessage");
                        table.empty();

                        data.forEach((message) => {
                            table.append(`
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="https://th.bing.com/th/id/OIP.wNF8zVaEtJlIMCOswo76AQHaHa?w=50&h=50&rs=1&pid=ImgDetMain" alt="${message.name}">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        ${message.name}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        ${message.email}
                                    </p> 
                                </div> 
                            </div>
                        </li>
                    `);
                        });

                        // Update pagination links
                        let paginationLinks = '';
                        if (response.prev_page_url) {
                            paginationLinks +=
                                `<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="${response.current_page - 1}">${response.current_page - 1}</a>`;
                        }
                        paginationLinks +=
                            `<span class="px-3 py-1 bg-blue-500 text-white mx-1 rounded">${response.current_page}</span>`;
                        if (response.next_page_url) {
                            paginationLinks +=
                                `<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="${response.current_page + 1}">${response.current_page + 1}</a>`;
                        }
                        $('#pagination').html(paginationLinks);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            };

            // Initial load of messages
            fetchMessages();

            // Search input event handler
            $("#searchInput").on("input", function(e) {
                e.preventDefault();
                var query = $(this).val();
                fetchMessages(query);
            });

            // Pagination link click event handler
            $(document).on('click', '.pagination-link', function(e) {
                e.preventDefault();
                let page = $(this).data('page');
                fetchMessages('', page);
            });
        });
    </script>
@endsection
