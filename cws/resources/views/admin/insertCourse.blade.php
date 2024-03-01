@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container">
        <div class="col-lg-9 col-md-8 col-sm-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Insert Course</h3>
                </div>
                <div class="card-body">

                    <form id="insertCourse">
                        <div class="mb-3">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instructor</label>
                            <input type="text" class="form-control" id="instructor" name="instructor" required>
                        </div>

                        <div class="mb-3">
                            <label for="fees" class="form-label">Fees</label>
                            <input type="text" class="form-control" id="fees" name="fees" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discounted Fees</label>
                            <input type="text" class="form-control" id="discount_fees" name="discount_fees" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control" id="image_upload" name="featured_image" required>
                            </div>
                            <div class="col-md-4 col-sm-12 mt-3 mt-md-0">
                                <img src="" id="image-preview" alt="" class="w-100 card-image-top-10px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="lang" class="form-label">Language</label>
                            <select class="form-select" id="lang" name="lang" required>
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="categoryId" class="form-label">Category</label>
                            <select type="text" id="callingCatForSelect" name="category_id" class="form-control">
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">Insert Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        //for calling category 
        $(document).ready(function() {
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


            // Insert course
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image_upload").change(function() {
                readURL(this);
            });

            $("#insertCourse").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/api/course",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        alert(response.msg);
                        $("#insertcourse").trigger("reset")
                        window.open("dashboard", "_self")
                    }
                })
            })
        });
    </script>
@endsection
