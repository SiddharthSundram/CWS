@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container">
        <div class="col-lg-9 col-md-8 col-sm-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Insert HallFrame</h3>
                </div>
                <div class="card-body">

                    <form id="hallFrame">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Industry</label>
                            <input type="text" class="form-control" id="industry" name="industry" required>
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
                            <button type="submit" class="btn btn-success w-100">Insert hallFrame</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>        
    <script>
        $(document).ready(function() {

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


            // Insert hallframe Students
            $("#hallFrame").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/api/hallFrame",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        $("#hallFrame").trigger("reset")
                        // window.open("dashboard", "_self")
                    }
                })
            })
        });
    </script>
@endsection
