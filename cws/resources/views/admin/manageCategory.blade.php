@extends('admin.base')

@section('content')
    <div class="container mt-16">
        <div class="flex justify-between mb-3 mt-3 items-center">
            <h2 class="text-2xl font-bold">Manage Category (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertCategory') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-plus mr-1"></i> Add New Category
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Category Title</th>
                        <th class="py-2 px-4 border">Category Description</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody id="categoryCalling">
                    <!-- Dynamic data will be inserted here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
    
</div>

    <script>
        $(document).ready(function() {
            //calling category record
            let callingCategory = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.index') }}",
                    success: function(response) {
                        let table = $("#categoryCalling");
                        table.empty();

                        let data = response.data;

                        // to count total number of categories
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((item) => {
                            table.append(`
                            <tr class=" hover:bg-gray-100">
                                <td class="py-2 px-4 border">${item.id}</td>
                                <td class="py-2 px-4 border">${item.cat_title}</td>
                                <td class="py-2 px-4 border">${item.cat_description}</td>
                                <td class="py-2 px-4 border">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm" id="${"btn"+item.id}"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                            `)

                            //delete category record
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
