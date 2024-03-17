@extends('admin.base')

@section('content')
    <div class="flex-1 flex mt-12 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Students (<span id="counting">0</span>)</h1>
        <a href="{{ route('insertStudent') }}" class="bg-indigo-500 text-white px-3 py-2 rounded"> 
            <i class="fas fa-plus"></i> Add New Student</a>

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
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Father's Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Address</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Gender</th>
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

    {{-- edit modal --}}
    <div id="default-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="editStudentModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editStudent">Edit Student</h5>
                    <form id="editStudentForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editStudentId" name="id">
                        <div class="mb-4">
                            <label for="editStudentName" class="block text-sm font-medium text-gray-700">Student Name</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " id="editStudentName" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentfName" class="block text-sm font-medium text-gray-700">Father's Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentfName" name="f_name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentAddress" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentAddress" name="address" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentGender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="editStudentGender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Choose Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Others</option>
                            </select>

                        <div class="mb-4">
                            <label for="editStudentEmail" class="block text-sm font-medium text-gray-700">Student Email</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="editStudentEmail" name="email" required>
                        </div>                        
                        
                        <div class="mb-4">
                            <label for="editStudentMobile_no" class="block text-sm font-medium text-gray-700">Student Contact</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " id="editStudentMobile_no" name="Mobile_no" required>
                        </div>                        
                        <div class="flex justify-between">
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save changes</button>
                            <button type="button" id="cancelEditStudent" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
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
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.id}</td> 
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.name}</td>
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.f_name}</td>
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.address}</td>
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.gender}</td>
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.email}</td> 
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${student.mobile_no}</td>     
                    <td class="border-b text-center border-gray-200 px-3 py-2 text-sm">${new Date(student.created_at).toLocaleDateString()}</td>     
                    <td class="border-b border-gray-200 px-3 py-2 text-sm">
                        <button type='button' class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded delete-btn' data-id='${student.id}'>X</button>
                        <button type='button' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded editBtn' data-id='${student.id}'>Edit</button>
                        <a href='/admin/student/view/${student.id}' class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded edit-btn'>View</a>
                    </td>
                    </tr>
                     `);
                });
            }

            function fetchStudents(query = '', page = 1) {
                $.ajax({
                    url: "{{ route('manage-student') }}",
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

            $(document).on('click', '.delete-btn', function() {
                var studentId = $(this).data('id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token
                $.ajax({
                    type: 'DELETE',
                    url: `/api/admin/student/delete/${studentId}`, // Corrected URL construction
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                    },
                    success: function(response) {
                        // console.log("delete data successfully")
                        swal("msg", response.msg, "msg");
                        fetchStudents(); // Fetch students again after successful deletion
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting student:", error);
                    }
                });
            });


            $(document).on('click', '.editBtn', function() {
                var studentId = $(this).data('id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: `/api/admin/student/view/${studentId}`,
                    success: function(response) {
                        $('#editStudentId').val(response.id);
                        $('#editStudentName').val(response.name);
                        $('#editStudentEmail').val(response.email);
                        $('#editStudentMobile_no').val(response.mobile_no);
                        $('#editStudentfName').val(response.f_name);
                        $('#editStudentAddress').val(response.address);
                        $('#editStudentGender').val(response.gender);
                        $('#default-modal').removeClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching student details for editing:', error);
                    }
                });
            });

            $('#editStudentForm').submit(function(e) {
                e.preventDefault();
                var userId = $('#editStudentId').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var formData = {
                    name: $('#editStudentName').val(),
                    email: $('#editStudentEmail').val(),
                    mobile_no: $('#editStudentMobile_no').val(),
                    f_name: $('#editStudentfName').val(),
                    address: $('#editStudentAddress').val(),
                    gender: $('#editStudentGender').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `/api/admin/manage-student/edit/${userId}`,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    success: function(response) {
                        swal("Success", response.msg, "msg");
                        $('#default-modal').addClass('hidden');
                        swal("Sucess", response.msg, "msg");
                        fetchStudents(); // Assuming you have a function to fetch students
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating student:', error);
                    }
                });
            });

            // Cancel edit student button click handler
            $('#cancelEditStudent').click(function() {
                $('#default-modal').addClass('hidden');
            });
        });
    </script>
@endsection
