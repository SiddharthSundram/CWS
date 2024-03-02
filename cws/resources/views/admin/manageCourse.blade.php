@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-3 courses-center">
            <h2>Manage Courses (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCourse') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New
                Course</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
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
                        //counting courses
                        let len = data.length;
                        $("#counting").html(len)
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
                                    <td>${course.category.cat_title}</td> 
                                    <td>${course.description}</td> 
                                    <td> <img src="/image/${course.featured_image}" width="80px" height="50px" alt=""></td> 
    
                                    <td>
                                        <button type="button" class="btn btn-danger" id=${"btn"+course.id}>X</button>
                                        <button type="button" class="btn btn-info" data-id="${course.id}">edit</button>
                                    </td>
                                </tr>
                            `);
                            //delete Operation 
                            $("#btn" + course.id).click(function() {
                                $.ajax({
                                    type: "DELETE",
                                    url: `/api/course/${course.id}`, // Update the URL
                                    success: function(response) {
                                        alert(response.msg);
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

            callingcourse();
        });
    </script>
@endsection
