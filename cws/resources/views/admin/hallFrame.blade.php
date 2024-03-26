@extends('admin.base')
@section('title')
    @yield('title') Admin | Insert HallFame
@endsection

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto px-4 py-8 mt-10">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
                <h3 class="text-2xl font-semibold text-white">Insert HallFame</h3>
            </div>
            <div class="p-6 bg-gray-50">
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
                            <input type="file" class="form-input mt-1 block w-full" id="image_upload"
                                name="featured_image" required>
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
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 w-full rounded-md">Insert
                            HallFame</button>
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
                        window.open("{{route('manageHallframe')}}", "_self")
                    }
                })
            })
        });
    </script>
@endsection
