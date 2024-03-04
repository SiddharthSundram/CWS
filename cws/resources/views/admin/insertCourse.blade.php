@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto">
        <div class="md:col-span-9 lg:col-span-9 md:col-start-2 lg:col-start-3 mx-auto">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-200 px-4 py-2">
                    <h3 class="text-lg font-semibold">Insert Course</h3>
                </div>
                <div class="p-4">
                    <form id="insertCourse">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Course Name</label>
                            <input type="text" class="form-input w-full" id="name" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="duration">Duration</label>
                            <input type="text" class="form-input w-full" id="duration" name="duration" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="instructor">Instructor</label>
                            <input type="text" class="form-input w-full" id="instructor" name="instructor" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fees">Fees</label>
                            <input type="text" class="form-input w-full" id="fees" name="fees" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="discount_fees">Discounted Fees</label>
                            <input type="text" class="form-input w-full" id="discount_fees" name="discount_fees" required>
                        </div>
                        <div class="flex flex-row mb-4">
                            <div class="w-8/12">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image_upload">Featured Image</label>
                                <input type="file" class="form-input w-full" id="image_upload" name="featured_image" required>
                            </div>
                            <div class="w-4/12 ml-4 mt-3">
                                <img src="" id="image-preview" alt="" class="w-full rounded">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                            <textarea class="form-textarea w-full" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="lang">Language</label>
                            <select class="form-select w-full" id="lang" name="lang" required>
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category</label>
                            <select type="text" id="callingCatForSelect" name="category_id" class="form-select w-full">
                            </select>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 w-full rounded">Insert Course</button>
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
                        swal("Course Inserted Successfully!", response.msg, "success");
                        $("#insertcourse").trigger("reset")
                        setTimeout(() => {
                            window.open("{{route('manageCourse')}}", "_self")
                        }, 1000);
                    }
                })
            })
        });
    </script>
@endsection
