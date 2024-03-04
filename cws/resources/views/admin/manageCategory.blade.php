@extends('admin.base')

@section('content')
<div class="container mt-20">
    <div class="flex justify-between mb-3 mt-3 items-center">
        <h2 class="text-2xl">Manage Category (<span id="counting">0</span>)</h2>
        <a href="{{ route('insertCategory') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-1"></i> Add New Category
        </a>
        
    </div>
    <div class="overflow-x-auto ">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Category Title</th>
                    <th class="px-4 py-2 border">Category Description</th>
                    <th class="px-4 py-2 border">Actions</th>
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
                                <td class="border px-4 py-2">${item.id}</td>
                                <td class="border px-4 py-2">${item.cat_title}</td>
                                <td class="border px-4 py-2">${item.cat_description}</td>
                                <td class="border px-4 py-2">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" id="${'btn' + item.id}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            `)


                            //delete category recoard
                            $("#btn" + item.id).click(function() {
                                $.ajax({
                                    type: "delete",
                                    url: `/api/category/${item.id}`,
                                    success: function(response) {
                                        alert(response.msg);
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
