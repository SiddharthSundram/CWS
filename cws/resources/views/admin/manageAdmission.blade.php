@extends('admin.base')

@section('content')
    <div class="flex-1 flex mt-12 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Admission (<span id="counting">0</span>)</h1>

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
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Father</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Gender</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Address</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Email</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Contact No.</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Admission Date</th>
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

    {{-- Edit Student Work --}}

    <div class="fixed inset-0 z-50 overflow-y-auto hidden" id="editStudentModal">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editStudentModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editStudentModalLabel">Edit Student</h5>
                    <form id="editStudentForm" method="post">
                        {{-- <input type="text" id="editStudentId" name="id"> --}}
                        <div class="mb-4">
                            <label for="editStudentName" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentName" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentfName" class="block text-sm font-medium text-gray-700">Father's Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentfName" name="editStudentfName" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentAddress" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentAddress" name="editStudentAddress" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentGender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="editStudentGender" id="editStudentGender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Choose Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Others</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentMobile" class="block text-sm font-medium text-gray-700">Mobile No</label>
                            <input type="tel"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentMobile" name="mobile_no" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentEmail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentEmail" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentStatus" class="block text-sm font-medium text-gray-700">Status</label>
                            <select
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentStatus" name="status" required>
                                <option value="1">Approve Now</option>
                                <option value="0">Not Now</option>
                            </select>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update Now</button>
                            <button type="button" id="cancelEditStudent"
                                class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            let callingStudent = (data) => {
                let table = $("#callingStudent");
                table.empty();
                let len = data.length;

                $("#counting").html(len);

                data.forEach((student) => {
                    table.append(`
                    <tr>
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.id}</td> 
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.name}</td>
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.f_name}</td>
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.gender}</td>
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.address}</td>
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.email}</td> 
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${student.mobile_no}</td>     
                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${new Date(student.created_at).toLocaleDateString()}</td>     
                    <td class="border-b border-gray-200 px-3 py-2 text-sm">
                        <button type='button' class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded edit-btn' data-id='${student.id}'>X</button>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded-sm edit-btn" data-id="${student.id}">
                                <i class="fas fa-edit"></i> Edit</button>
                    </td>
                    </tr>
            `);
                });
            }

            function fetchStudents(query = '', page = 1) {
                $.ajax({
                    url: "{{ route('manage-admission') }}",
                    type: "GET",
                    data: {
                        'query': query,
                        'page': page
                    },
                    success: function(response) {
                        let data = response.data;
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

            $(document).ready(function() {
                // Initial load
                fetchStudents();

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

             // view student button click handler

             $(document).on('click', '.edit-btn', function() {
                var userId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `/api/admin/student/view/${userId}`,
                    dataType: 'json',
                    success: function(response) {
                        $('#editStudentId').val(response.id);
                        $('#editStudentName').val(response.name);
                        $('#editStudentfName').val(response.f_name);
                        $('#editStudentAddress').val(response.address);
                        $('#editStudentGender').val(response.gender);
                        $('#editStudentStatus').val(response.status);
                        $('#editStudentEmail').val(response.email);
                        $('#editStudentMobile').val(response.mobile_no);
                        $('#editStudentModal').removeClass('hidden');

                // Submit edit course form

            $('#editStudentForm').submit(function(e) {
                e.preventDefault();
                let data = {
                        name: $('#editStudentName').val(),
                        status : $('#editStudentStatus').val(),
                        f_name : $('#editStudentfName').val(),
                        address : $('#editStudentAddress').val(),
                        gender : $('#editStudentGender').val(),
                        email : $('#editStudentEmail').val(),
                        mobile_no : $('#editStudentMobile').val(),
                }
                console.log(data);
                $.ajax({
                    type: 'PUT',
                    url: `/api/admin/student/edit/${userId}`,
                    data: JSON.stringify(data),
                    contentType: 'application/json', //                    
                    success: function(response) {
                        $('#editStudentModal').addClass('hidden');
                        fetchStudents();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating course:', error);
                    }
                });
            });

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching course details for editing:', error);
                    }
                });
            });

            // Cancel edit course button click handler
            $('#cancelEditStudent').click(function() {
                $('#editStudentModal').addClass('hidden');
            });

           
        });
    </script>
@endsection
