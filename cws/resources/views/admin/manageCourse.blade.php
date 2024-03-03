@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-3 courses-center">
            <h2>Manage Courses (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCourse') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New
                Course</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Instructor</th>
                        <th>Fees</th>
                        <th>Discount Fees</th>
                        <th>Language</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="callingcourse">
                    <!-- Add your table row content here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Course Modal -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCourseForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editCourseId" name="id">
                        <div class="mb-3">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="editCourseName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="text" class="form-control" id="editCourseDuration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Instructor</label>
                            <input type="text" class="form-control" id="editCourseInstructor" name="instructor" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseFees" class="form-label">Fees</label>
                            <input type="text" class="form-control" id="editCourseFees" name="fees" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discounted Fees</label>
                            <input type="text" class="form-control" id="editCourseDiscountFees" name="discount_fees"
                                required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control" id="editCourseImageUpload" name="featured_image">
                            </div>
                            <div class="col-md-4 col-sm-12 mt-3 mt-md-0">
                                <img src="" id="editCourseImagePreview" alt=""
                                    class="w-100 card-image-top-10px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editCourseDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseLang" class="form-label">Language</label>
                            <select class="form-select" id="editCourseLang" name="lang" required>
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="categoryId" class="form-label">Category</label>
                            <select type="text" id="callingCatForSelect" name="category_id" class="form-control">
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save changes</button>
                    </form>
                </div>
            </div>
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
                            <td>${course.id}</td>
                            <td>${course.name}</td>
                            <td>${course.duration}</td>
                            <td>${course.instructor}</td>
                            <td>${course.fees}</td>
                            <td>${course.discount_fees}</td>
                            <td>${course.lang}</td>
                            <td>${course.category.cat_title}</td>
                            <td>${course.description}</td>
                            <td><img src="/image/${course.featured_image}" width="80px" height="50px" alt=""></td>
                            <td>
                                <button type='button' class='btn btn-danger delete-btn' data-id='${course.id}'>X</button>
                                <button type='button' class='btn btn-info edit-btn' data-id='${course.id}'>Edit</button>
                            </td>
                        </tr>`);
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