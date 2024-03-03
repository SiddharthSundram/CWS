@extends('admin.base')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mt-3 courses-center">
        {{-- <h2>Manage Courses (<span id="counting">{{ $courses->total() }}</span>)</h2> --}}
        <a href="{{ route('insertCourse') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New Course</a>
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
                <!-- Table rows will be dynamically added here -->
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td> 
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->duration }}</td>  
                        <td>{{ $course->instructor }}</td> 
                        <td>{{ $course->fees }}</td> 
                        <td>{{ $course->discount_fees }}</td> 
                        <td>{{ $course->lang }}</td> 
                        <td>{{ $course->category ? $course->category->cat_title : 'N/A' }}</td> 
                        <td>{{ $course->description }}</td> 
                        <td> <img src="/image/{{ $course->featured_image }}" width="80px" height="50px" alt=""></td> 

                        <td>
                            <button type="button" class="btn btn-danger" id="btnDelete{{ $course->id }}">Delete</button>
                            <button type="button" class="btn btn-info edit-btn" data-id="{{ $course->id }}">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $courses->links() }}
        </div>
    </div>
    
    <!-- Pagination links -->
   
</div>


<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCourseForm">
                    <input type="hidden" id="editCourseId" name="id">
                    <div class="mb-3">
                        <label for="editCourseName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editCourseName" name="name">
                    </div>
                    <!-- Add other form fields for editing course details -->
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let callingcourse = () => {
            $.ajax({
                type: "get",
                url: "{{ route('course.index') }}",
                success: function(response) {
                    let table = $("#callingcourse");
                    table.empty();
                    let data = response.data;

                    // Counting courses
                    let len = data.length;
                    $("#counting").html(len);

                    data.forEach((course) => {
                        table.append(`
                            <tr>
                                <td>${course.id}</td> 
                                <td>${course.name}</td>
                                <td>${course.duration}</td>  
                                <td>${course.instructor}</td> 
                                <td>${course.fees}</td> 
                                <td>${course.discount_fees}</td> 
                                <td>${course.lang}</td> 
                                <td>${course.category ? course.category.cat_title : 'N/A'}</td> 
                                <td>${course.description}</td> 
                                <td> <img src="/image/${course.featured_image}" width="80px" height="50px" alt=""></td> 

                                <td>
                                    <button type="button" class="btn btn-danger" id="btnDelete${course.id}">Delete</button>
                                    <button type="button" class="btn btn-info edit-btn" data-id="${course.id}">Edit</button>
                                </td>
                            </tr>
                        `);

                        // Delete Operation 
                        $("#btnDelete" + course.id).click(function() {
                            $.ajax({
                                type: "DELETE",
                                url: `/api/course/${course.id}`,
                                success: function(response) {
                                    swal("Success", response.msg, "success");
                                    callingcourse();
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                }
                            });
                        });
                    });

                 
                }
            });
        }

        function fetchPaginatedData(page) {
            $.ajax({
                url: "/manageCourse?page=" + page,
                success: function(response) {
                    $('#callingcourse').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching paginated data:', error);
                }
            });
        }

        // Event handler for pagination link clicks
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchPaginatedData(page);
        });

        // Initially fetch and display the first page of data
        fetchPaginatedData(1);

        // Handle edit button click
        $(document).on('click', '.edit-btn', function() {
            var courseId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: `/api/course/${courseId}`,
                dataType: 'json',
                success: function(response) {
                    // Populate edit form with course details
                    $('#editCourseId').val(response.id);
                    $('#editCourseName').val(response.name);
                    // Populate other fields similarly
                    $('#editCourseModal').modal('show'); // Show edit modal
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching course details for editing:', error);
                }
            });
        });

        // Handle form submission for updating course details
        $('#editCourseForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'PUT',
                url: '/api/course/' + $('#editCourseId').val(),
                data: formData,
                success: function(response) {
                    swal("Success", response.msg, "success");
                    $('#editCourseModal').modal('hide');
                    callingcourse(); 
                },
                error: function(xhr, status, error) {
                    console.error('Error updating course:', error);
                }
            });
        });

        callingcourse();
    });
</script>
@endsection
please fix it