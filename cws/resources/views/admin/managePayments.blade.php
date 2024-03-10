@extends('admin.base')

@section('content')
    <div class="flex-1 flex mt-12 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Payments (<span id="counting">0</span>)</h1>
        <div>
            <button id="filterPaid"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded">Paid</button>
            <button id="filterDue" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Due</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Id</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Student Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Course Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Fees</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Date of Payment</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Created at</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody id="callingStudent">
                    <!-- Table rows will be dynamically added here -->

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="10" class="p-3 flex items-center justify-center">
                            <div id="pagination" class="">
                                <!-- Pagination links will be inserted here -->
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#filterPaid').on('click', function(e) {
                e.preventDefault();
                fetchStudents('', 1, 1); // Passing status = 1 for paid payments
            });

            $('#filterDue').on('click', function(e) {
                e.preventDefault();
                fetchStudents('', 1, 0); // Passing status = 0 for due payments
            });

            let callingStudent = (data) => {
                let table = $("#callingStudent");
                table.empty();
                let len = data.length;

                $("#counting").html(len);

                data.forEach((payment) => {
                    table.append(`
                <tr>
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${payment.id}</td> 
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${payment.user.name}</td>
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${payment.course.name}</td> 
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${payment.fees}</td>     
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${payment.date_of_payment ? new Date(payment.date_of_payment).toLocaleDateString() : "NULL"}</td>     
                <td class="border-b border-gray-200 px-3 py-2 text-sm">${new Date(payment.created_at).toLocaleDateString()}</td>     
                <td class="border-b border-gray-200 px-3 py-2 text-sm">
                    ${payment.status === 1 ? '<span class="bg-green-500 px-2 py-1 text-white">Paid</span>' : '<span class=" px-2 py-1 text-white bg-red-500">Due</span>'}
                </td>
                </tr>
        `);
                });
            }

            function fetchStudents(query = '', page = 1, status = null) {
                $.ajax({
                    url: "{{ route('manage-payments') }}",
                    type: "GET",
                    data: {
                        'query': query,
                        'page': page,
                        'status': status
                    },
                    success: function(response) {
                        let data = response.data.filter(payment => payment.status == status);
                        callingStudent(data);

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
            }

            // Initial load with paid payments
            fetchStudents('', 1, 1);

            $("#searchInput").on("input", function(e) {
                e.preventDefault();
                var query = $(this).val();
                fetchStudents(query);
            });

            $(document).on('click', '.pagination-link', function(e) {
                e.preventDefault();
                let page = $(this).text();
                fetchStudents('', page);
            });
        });
    </script>
@endsection
