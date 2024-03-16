@extends('admin.base')

@section('content')
    <div class="flex-1 flex mt-12 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Query (<span id="counting">0</span>)</h1>
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
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Email</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Contact No.</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Query Date</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody id="callingMessage">
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
    
                        let len = data.length;
                        $("#counting").html(len);
    
                        data.forEach((message) => {
                            table.append(`
                                <tr>
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">${message.id}</td> 
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">${message.name}</td>
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">${message.email}</td> 
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">${message.mobile_no}</td>     
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">${new Date(message.created_at).toLocaleDateString()}</td>     
                                    <td class="border-b border-gray-200 px-3 py-2 text-sm">
                                        <a href='/admin/query-message/view/${message.id}' class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded edit-btn'>View</a>
                                        <button class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded delete-btn' data-id='${message.id}'>Delete</button>
                                    </td>
                                </tr>
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
    
            // Delete button click event handler
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                let messageId = $(this).data('id');
                if (confirm("Are you sure you want to delete this message?")) {
                    $.ajax({
                        url: `/api/contact/${messageId}`, // Assuming your delete route is defined like this
                        type: "DELETE",
                        success: function(response) {
                            // Refresh messages after deletion
                            fetchMessages();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    @endsection
    