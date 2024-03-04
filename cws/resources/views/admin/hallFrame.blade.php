@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto mt-16">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-500 text-white text-center py-4">
                <h3 class="text-xl font-semibold">Insert HallFrame</h3>
            </div>
            <div class="p-6">
                <form id="hallFrame">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" class="form-input mt-1 block w-full" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" class="form-input mt-1 block w-full" id="position" name="position" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Industry</label>
                        <input type="text" class="form-input mt-1 block w-full" id="industry" name="industry" required>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-8/12 mr-4">
                            <label class="block text-sm font-medium text-gray-700">Featured Image</label>
                            <input type="file" class="form-input mt-1 block w-full" id="image_upload" name="featured_image" required>
                        </div>
                        <div class="w-4/12">
                            <img src="" id="image-preview" alt="" class="w-full h-auto">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea class="form-textarea mt-1 block w-full" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 w-full rounded-md">Insert HallFrame</button>
                    </div>
                </form>
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
