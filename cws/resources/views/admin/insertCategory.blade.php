@extends('admin.base')

@section('content')
    <div class="form-container  col-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h2>Insert Course </h2>
            </div>
            <div class="card-body">

                <form id="insertCategory">
                    <div class="mb-3">
                        <label for="" class="form-label">Category Title</label>
                        <input type="text" class="form-control" name="cat_title" placeholder="Enter title" required>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Category Desctipiton</label>
                        <input type="text" class="form-control" name="cat_description"
                            placeholder="Enter category desctiption" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
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
                        alert(response.msg);
                        $("#insertProduct").trigger("reset");

                        window.open("dashboard", "_self");
                    }
                })
            })
        })
    </script>
@endsection
