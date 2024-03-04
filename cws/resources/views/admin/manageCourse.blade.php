@extends('admin.base')

@section('content')
<div class="container mt-20">
    <div class="flex justify-between items-center mt-3">
        <h2 class="text-xl">Manage Courses (<span id="counting">0</span>)</h2>
        <a href="{{ route('insertCourse') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-1"></i> Add New Course
        </a>
        
    </div>
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 border py-2">Id</th>
                    <th class="px-4 border py-2">Name</th>
                    <th class="px-4 border py-2">Duration</th>
                    <th class="px-4 border py-2">Instructor</th>
                    <th class="px-4 border py-2">Fees</th>
                    <th class="px-4 border py-2">Discount Fees</th>
                    <th class="px-4 border py-2">Language</th>
                    <th class="px-4 border py-2">Category</th>
                    <th class="px-4 border py-2">Description</th>
                    <th class="px-4 border py-2">Image</th>
                    <th class="px-4 border py-2">Actions</th>
                </tr>
            </thead>
            <tbody id="callingcourse">
                <!-- Add your table row content here -->
            </tbody>
        </table>
    </div>
</div>

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
                                    <td class="border px-4 py-2">
                                        <img src="/image/${course.featured_image}" class="w-20 h-auto" alt="">
                                    </td>
                                    <td>
                                        <button type="button" class="bg-red-500 text-white px-3 py-2 rounded" id="btn${course.id}">X</button>
                                        <button type="button" class="bg-sky-600 text-white px-3 py-2 rounded edit-btn" data-id="${course.id}">edit</button>
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
        // AJAX request to fetch course details
        $.ajax({
            type: 'GET',
            url: `/api/course/${courseId}`, // Assuming this is the endpoint to fetch course details
            dataType: 'json',
            success: function(response) {
                // Populate the form fields with the fetched data
                $('#editCourseId').val(response.data.id);
                $('#editCourseName').val(response.data.name);
                $('#editCourseDuration').val(response.data.duration);
                $('#editCourseInstructor').val(response.data.instructor);
                $('#editCourseFees').val(response.data.fees);
                $('#editCourseDiscountFees').val(response.data.discount_fees);
                $('#editCourseImagePreview').attr('src', '/image/' + response.data.featured_image);
                $('#editCourseDescription').val(response.data.description);
                $('#editCourseLang').val(response.data.lang);
                $('#editCourseCategoryId').val(response.data.category_id); // Assuming you have a category select field
                // Show the edit modal
                $('#editCourseModal').modal('show');
            },
                error: function(xhr, status, error) {
                    console.error('Error fetching course details for editing:', error);
                    // Handle error if needed
        }
    });
});


            // Handle form submission for updating course details
           
        });
    </script>
@endsection