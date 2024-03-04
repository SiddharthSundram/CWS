@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto mt-20">
        <div class="lg:col-span-9 md:col-span-8 sm:col-span-11 mx-auto">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-5 bg-gray-100 border-b">
                    <h3 class="text-xl font-semibold">Insert HallFrame</h3>
                </div>
                <div class="p-5">
                    <form id="hallFrame">
                        <div class="mb-4">
                            <label for="name" class="block mb-1">Name</label>
                            <input type="text" id="name" name="name" class="form-input w-full" placeholder="Enter name" required>
                        </div>
                        <div class="mb-4">
                            <label for="position" class="block mb-1">Position</label>
                            <input type="text" id="position" name="position" class="form-input w-full" placeholder="Enter position" required>
                        </div>
                        <div class="mb-4">
                            <label for="industry" class="block mb-1">Industry</label>
                            <input type="text" id="industry" name="industry" class="form-input w-full" placeholder="Enter industry" required>
                        </div>
                        <div class="flex flex-col md:flex-row mb-4">
                            <div class="md:w-8/12">
                                <label for="image_upload" class="block mb-1">Featured Image</label>
                                <input type="file" id="image_upload" name="featured_image" class="form-input w-full" required>
                            </div>
                            <div class="md:w-4/12 mt-3 md:mt-0">
                                <img src="" id="image-preview" alt="" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block mb-1">Description</label>
                            <textarea id="description" name="description" class="form-textarea w-full" rows="3" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 w-full rounded">Insert HallFrame</button>
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
