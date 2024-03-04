@extends('admin.base')

@section('content')
<div class="container mx-auto py-8 mt-10">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <div class="text-center mb-6 ">
            <h2 class="text-2xl font-semibold">Insert Category</h2>
        </div>
        <div class="card-body">
            <form id="insertCategory">
                <div class="mb-4">
                    <label for="cat_title" class="block text-sm font-medium text-gray-700">Category Title</label>
                    <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="cat_title" placeholder="Enter title" required>
                </div>
                <div class="mb-4">
                    <label for="cat_description" class="block text-sm font-medium text-gray-700">Category Description</label>
                    <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="cat_description" placeholder="Enter category description" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 w-full rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            //insert teacher
            $("#insertCategory").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('category.store') }}",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        $("#insertProduct").trigger("reset");

                        window.open("/admin", "_self");
                    }
                })
            })
        })
    </script>
@endsection
