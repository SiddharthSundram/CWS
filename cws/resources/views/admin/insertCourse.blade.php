@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto px-4 py-8 mt-10 ">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
                <h3 class="text-2xl font-semibold text-white">Insert Course</h3>
            </div>
            <div class="p-6 bg-gray-50">
                <form id="insertCourse">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Course Name</label>
                        <input type="text" class="form-input mt-1 block w-full" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Duration</label>
                        <input type="text" class="form-input mt-1 block w-full" id="duration" name="duration" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Instructor</label>
                        <input type="text" class="form-input mt-1 block w-full" id="instructor" name="instructor" required>
                    </div>
                    <div class="mb-4">
                        <label for="fees" class="block text-sm font-medium text-gray-700">Fees</label>
                        <input type="text" class="form-input mt-1 block w-full" id="fees" name="fees" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Discounted Fees</label>
                        <input type="text" class="form-input mt-1 block w-full" id="discount_fees" name="discount_fees" required>
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
                        <label for="lang" class="block text-sm font-medium text-gray-700">Language</label>
                        <select class="form-select mt-1 block w-full" id="lang" name="lang" required>
                            <option value="en">English</option>
                            <option value="hi">Hindi</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="categoryId" class="block text-sm font-medium text-gray-700">Category</label>
                        <select type="text" id="callingCatForSelect" name="category_id" class="form-select mt-1 block w-full">
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 w-full rounded-md">Insert Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        //for calling category 
        document.addEventListener('DOMContentLoaded', function() {
            fetch("/api/category")
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById("callingCatForSelect");
                    select.innerHTML = '';
                    data.forEach(cat => {
                        let option = document.createElement('option');
                        option.value = cat.id;
                        option.text = cat.cat_title;
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));

            // Insert course
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.getElementById('image-preview').setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.getElementById('image_upload').addEventListener('change', function() {
                readURL(this);
            });

            document.getElementById('insertCourse').addEventListener('submit', function(e) {
                e.preventDefault();
                fetch("/api/course", {
                        method: 'POST',
                        body: new FormData(this),
                    })
                    .then(response => response.json())
                    .then(data => {
                        swal("Course Inserted Successfully!", data.msg, "success");
                        document.getElementById("insertCourse").reset();
                        setTimeout(() => {
                            window.open("{{route('manageCourse')}}", "_self");
                        }, 1000);
                    })
                    .catch(error => console.error('Error inserting course:', error));
            });
        });
    </script>
@endsection
