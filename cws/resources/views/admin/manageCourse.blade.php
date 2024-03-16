@extends('admin.base')

@section('content')
    <div class="container mt-20">
        <div class="flex justify-between items-center mt-3">
            <h2 class="text-xl">Manage Courses (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCourse') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
                <i class="fas fa-plus mr-1"></i> Add New Course
            </a>

        </div>
        <div class="overflow-x-auto mt-4">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="hover:bg-gray-100 text-gray-700">
                        <th class="border border-gray-300">Id</th>
                        <th class="border border-gray-300">Name</th>
                        <th class="border border-gray-300">Duration</th>
                        <th class="border border-gray-300">Instructor</th>
                        <th class="border border-gray-300">Fees</th>
                        <th class="border border-gray-300">Discount Fees</th>
                        <th class="border border-gray-300">Language</th>
                        <th class="border border-gray-300">Category</th>
                        <th class="border border-gray-300">Description</th>
                        <th class="border border-gray-300">Image</th>                        
                        <th class="border border-gray-300">Status</th>                        
                        <th class="border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody id="callingcourse">
                    <!-- Add your table row content here -->
                </tbody>
            </table>
        </div>

    </div>

    <!-- Edit Course Modal -->
    <div class="fixed inset-0 z-50 overflow-y-auto hidden" id="editCourseModal">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editCourseModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editCourseModalLabel">Edit Course</h5>
                    <form id="editCourseForm">
                        @method('PUT')
                        <input type="hidden" id="editCourseId" name="id">
                        <div class="mb-4">
                            <label for="editCourseName" class="block text-sm font-medium text-gray-700">Course Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseName" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseDuration" class="block text-sm font-medium text-gray-700">Duration</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseDuration" name="duration" required>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseInstructor"
                                class="block text-sm font-medium text-gray-700">Instructor</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseInstructor" name="instructor" required>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseFees" class="block text-sm font-medium text-gray-700">Fees</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseFees" name="fees" required>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseDiscountFees" class="block text-sm font-medium text-gray-700">Discounted
                                Fees</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseDiscountFees" name="discount_fees" required>
                        </div>
                        <div class="flex mb-4">
                            <div class="flex-1 mr-2">
                                <label for="editCourseImageUpload" class="block text-sm font-medium text-gray-700">Featured
                                    Image</label>
                                <input type="file"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    id="editCourseImageUpload" name="featured_image">
                            </div>
                            {{-- <div class="flex-1 ml-2">
                                <img src="" id="editCourseImagePreview" alt=""
                                    class="mt-1 block w-full h-auto rounded-md">
                            </div> --}}
                        </div>
                        <div class="mb-4">
                            <label for="editCourseDescription"
                                class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseLang" class="block text-sm font-medium text-gray-700">Language</label>
                            <select
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editCourseLang" name="lang" required>
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="editCourseCategory"
                                class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="editCourseCategory" name="category_id"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                                <!-- Options will be dynamically added using JavaScript -->
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                changes</button>
                            <button type="button" id="cancelEditCourse"
                                class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to fetch and display courses
        function fetchCourses() {
            $.ajax({
                type: "GET",
                url: "{{ route('course.index') }}",
                dataType: "json",
                success: function(response) {
                    $("#callingcourse").empty();
                    let len = response.data.length;
                    $("#counting").html(len);
                    $.each(response.data, function(index, course) {
                        $("#callingcourse").append(`<tr class="hover:bg-gray-100">
                        <td class="border p-2">${course.id}</td>
                        <td class="border p-2">${course.name}</td>
                        <td class="border p-2">${course.duration}</td>
                        <td class="border p-2">${course.instructor}</td>
                        <td class="border p-2">${course.fees}</td>
                        <td class="border p-2">${course.discount_fees}</td>
                        <td class="border p-2">${course.lang}</td>
                        <td class="border p-2">${course.category.cat_title}</td>
                        <td class="border p-2">${course.description}</td>
                        <td class="border p-2"><img src="/image/${course.featured_image}" width="80px" height="50px" alt=""></td>
                        <td class="border p-2">
                            <button class="status-toggle-btn ${course.status === 1 ? 'bg-green-500 hover:bg-green-700' : 'bg-red-500 hover:bg-red-700'} text-white font-semibold py-1 px-2 rounded" data-id="${course.id}" data-status="${course.status}">
                            ${course.status === 1 ? 'Active' : 'Inactive'}
                        </button>    
                        </td>
=                                        
                        <td class="py-2 px-4 border">
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm delete-btn" data-id="${course.id}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded-sm edit-btn" data-id="${course.id}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                          
                           
                        </td>
                    </tr>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching courses:", error);
                }
            });
        }


          

        // Populate category dropdown in edit form
        function populateCategories() {
            $.ajax({
                type: "GET",
                url: "/api/category",
                success: function(response) {
                    let select = $("#editCourseCategory");
                    select.empty();
                    $.each(response.data, function(index, category) {
                        select.append(`<option value="${category.id}">${category.cat_title}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching categories:", error);
                }
            });
        }

        $(document).ready(function() {
            fetchCourses();
            populateCategories();

            // Delete course button click handler
            $(document).on('click', '.delete-btn', function() {
                var courseId = $(this).data('id');
                $.ajax({
                    type: 'DELETE',
                    url: `/api/course/${courseId}`,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        fetchCourses();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting course:", error);
                    }
                });
            });

            // Edit course button click handler
            $(document).on('click', '.edit-btn', function() {
                var courseId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `/api/course/${courseId}`,
                    dataType: 'json',
                    success: function(response) {
                        $('#editCourseId').val(response.data.id);
                        $('#editCourseName').val(response.data.name);
                        $('#editCourseDuration').val(response.data.duration);
                        $('#editCourseInstructor').val(response.data.instructor);
                        $('#editCourseFees').val(response.data.fees);
                        $('#editCourseDiscountFees').val(response.data.discount_fees);
                        $('#editCourseImagePreview').attr('src', '/image/' + response.data
                            .featured_image);
                        $('#editCourseDescription').val(response.data.description);
                        $('#editCourseLang').val(response.data.lang);
                        $('#editCourseCategory').val(response.data.category_id);
                        $('#editCourseModal').removeClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching course details for editing:', error);
                    }
                });
            });

            // Cancel edit course button click handler
            $('#cancelEditCourse').click(function() {
                $('#editCourseModal').addClass('hidden');
            });

            // Submit edit course form
            $('#editCourseForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/api/course/' + $('#editCourseId').val(),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#editCourseModal').addClass('hidden');
                        fetchCourses();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating course:', error);
                    }
                });
            });

            $(document).on('click', '.status-toggle-btn', function() {
                var courseId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 0 ? 1 : 0;
                
                $.ajax({
                    type: 'PUT',
                    url: `/api/course/${courseId}/toggle-status`,
                    data: { status: newStatus },
                    dataType: 'json',
                    success: function(response) {
                        fetchCourses();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error toggling course status:', error);
                    }
                });
            });
        });
    </script>
@endsection
