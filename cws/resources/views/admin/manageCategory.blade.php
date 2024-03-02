@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3 mt-3 items-center">
            <h2>Manage Category (<span id="counting">0</span>) </h2>
            <a href="{{ route('insertCategory') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New
                Category</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Title</th>
                        <th>Category Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="categoryCalling">
                    <!-- Sample Data - Replace with dynamic data from your system -->

                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //calling category recoard
            let callingCategory = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.index') }}",
                    success: function(response) {
                        let table = $("#categoryCalling");
                        table.empty();

                        let data = response.data;

                        // to count total number of teachers
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((item) => {
                            table.append(`
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.cat_title}</td>
                                <td>${item.cat_description}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm" id="${"btn"+item.id}"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                            `)

                            //delete category recoard
                            $("#btn" + item.id).click(function() {
                                $.ajax({
                                    type: "delete",
                                    url: `/api/category/${item.id}`,
                                    success: function(response) {
                                        swal("Success", response.msg, "success");
                                        //refresh
                                        callingCategory();
                                    }
                                });
                            });


                        });


                    }
                });
            }
            callingCategory();
        })
    </script>
@endsection
