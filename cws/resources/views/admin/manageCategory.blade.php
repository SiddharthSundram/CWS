@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3 mt-3 items-center">
            <h2>Manage Category (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCategory') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Category
            </a>
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
                    <!-- Dynamic data will be inserted here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
           //calling work
           let callingData = () => {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('category.index') }}",
                    success: function(response) {
                        // callingData();
                        let table = $('#categorytable')
                        table.empty();

                        let tableList = response.data;

                        tableList.forEach((item) => {
                            table.append(`
                                <tr> 

                                    <td>${item.id}</td>
                                    <td>${item.cat_name}</td>
                                    <td>${item.cat_description}</td>
                                    <td>
                                        <button class="btn btn-danger"  id=${`deleteBtn`+item.id} type="submit">X</button>
                                        <button class="btn btn-info" type="submit">Edit</button>
                                    </td>
                                
                                </tr>`
                            )

                            // delete category
                            $(`#deleteBtn` + item.id).click(function(){
                                $.ajax({
                                    type:'delete',
                                    url:`api/category/${item.id}`,   
                                    success:function(response){
                                        alert(response.msg);
                                        // for refresh
                                        callingData();
                                    }
                                });
                            });
                        });


                        
                    }
                })
            }
            //calling category
            callingData();

        });
    </script>
@endsection
