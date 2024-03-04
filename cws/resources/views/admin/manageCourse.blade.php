@extends('admin.base')

@section('content')
<div class="container mx-auto mt-20">
    <div class="flex justify-between items-center mt-3">
        <h2 class="text-2xl font-bold">Manage Courses (<span id="counting">0</span>)</h2>
        <a href="{{ route('insertCourse') }}" class="bg-blue-500 hover:bg-blue-600  text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-1 "></i> Add New Course
        </a>
        
    </div>
    <div class="table-responsive  mt-5 ">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border-b border-gray-200">Id</th>
                    <th class="px-4 py-2 border-b border-gray-200">Name</th>
                    <th class="px-4 py-2 border-b border-gray-200">Duration</th>
                    <th class="px-4 py-2 border-b border-gray-200">Instructor</th>
                    <th class="px-4 py-2 border-b border-gray-200">Fees</th>
                    <th class="px-4 py-2 border-b border-gray-200">Discounted Fees</th>
                    <th class="px-4 py-2 border-b border-gray-200">Language</th>
                    <th class="px-4 py-2 border-b border-gray-200">Category</th>
                    <th class="px-4 py-2 border-b border-gray-200">Description</th>
                    <th class="px-4 py-2 border-b border-gray-200">Image</th>
                    <th class="px-4 py-2 border-b border-gray-200">Action</th>
                    <!-- Add more table headers with Tailwind CSS classes -->
                </tr>
            </thead>
            <tbody id="callingcourse">
                <!-- Add your table row content here -->
            </tbody>
        </table>
    </div>
</div>



    <!-- Edit Course Modal -->
    {{-- <div class="fixed z-10 inset-0 overflow-y-auto" id="editCourseModal" x-show="editModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="editModal">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
    
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="editCourseModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="editCourseModalLabel">Edit Course</h3>
                            <div class="mt-2">
                                <form id="editCourseForm" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="editCourseId" name="id">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Course Name</label>
                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editCourseName" name="name" required>
                                    </div>
                                    <!-- Add similar Tailwind CSS classes for other form elements -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Save Changes</button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="editModal = false">Cancel</button>
                </div>
            </div>
        </div>
    </div> --}}
    


    <script>
        $.ajax({
            type: "GET",
            url: "/api/category",
            success: function(response) {
                let select = $("#callingCatForSelect"); // Corrected the selector
                select.empty();
                response.data.forEach((cat) => {
                    select.append(`<option value="${cat.id}">${cat.cat_title}</option>`);
                });
            }
        });
        // Function to fetch courses
        function fetchCourses() {
            $.ajax({
                type: "GET",
                url: "{{ route('course.index') }}",
                dataType: "json",
                success: function(response) {
                    $("#callingcourse").empty();
                    $.each(response.data, function(index, course) {
                        $("#callingcourse").append(`<tr>
                            <td class="border px-4 py-2">${course.id}</td>
                            <td class="border px-4 py-2">${course.name}</td>
                            <td class="border px-4 py-2">${course.duration}</td>
                            <td class="border px-4 py-2">${course.instructor}</td>
                            <td class="border px-4 py-2">${course.fees}</td>
                            <td class="border px-4 py-2">${course.discount_fees}</td>
                            <td class="border px-4 py-2">${course.lang}</td>
                            <td class="border px-4 py-2">${course.category.cat_title}</td>
                            <td class="border px-4 py-2">${course.description}</td>
                            <td class="border px-4 py-2"><img src="/image/${course.featured_image}" class="w-20 h-12" alt=""></td>
                            <td class="border">
                                <button type="button" class="bg-red-500 hover:bg-red-600 text-white  py-1 px-2 rounded delete-btn" data-id="${course.id}">
                                    X
                                </button>
                                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white  py-1 px-2 rounded edit-btn" data-id="${course.id}">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        `);
                    });

                    
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching courses:", error);
                }
            });
        }

        // Call fetchCourses initially
        $(document).ready(function() {
            fetchCourses();

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                var courseId = $(this).data('id');
                $.ajax({
                    type: 'DELETE',
                    url: `/api/course/${courseId}`,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        fetchCourses(); // Fetch courses again after successful deletion
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting course:", error);
                    }
                });
            });

            // Handle edit button click
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
                        $('#editCourseCategoryId').val(response.data.category_id);
                        $('#editCourseModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching course details for editing:', error);
                    }
                });

                $('#editCourseForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'PUT',
                    url: '/api/course/' + $('#editCourseId').val(),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        $('#editCourseModal').modal('hide');
                        fetchCourses(); // Refresh the course list
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating course:', error);
                    }
                });
            });
            });

            // Handle form submission for updating course details
           
        });
    </script>
@endsection