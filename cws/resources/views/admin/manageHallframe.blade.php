@extends('admin.base')

@section('content')
    <div class="container mt-16">
        <div class="flex justify-between mb-3 mt-3 items-center">
            <h2 class="text-2xl font-bold">Manage hallFrame (<span id="counting">0</span>)</h2>
            <a href="{{ route('hallFrame') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-plus mr-1"></i> Add New Students
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">Id</th>
                        <th class="py-2 px-4 border">Name</th>
                        <th class="py-2 px-4 border">Position</th>
                        <th class="py-2 px-4 border">Industry</th>
                        <th class="py-2 px-4 border">Description</th>
                        <th class="py-2 px-4 border">Image</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody id="callingHallframe">
                    <!-- Dynamic data will be inserted here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Function to fetch and render hallFrame data
            function callingHallframe() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('hallFrame.index') }}",
                    success: function(response) {
                        let table = $("#callingHallframe");
                        table.empty(); // Clear existing table data

                        let data = response.data;
                        let len = data.length;
                        $("#counting").html(len); // Update count of hallFrame students

                        data.forEach((hallFrame) => {
                            // Append each hallFrame data to the table
                            table.append(`
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border">${hallFrame.id}</td> 
                                    <td class="py-2 px-4 border">${hallFrame.name}</td>
                                    <td class="py-2 px-4 border">${hallFrame.position}</td>  
                                    <td class="py-2 px-4 border">${hallFrame.industry}</td>  
                                    <td class="py-2 px-4 border">${hallFrame.description}</td> 
                                    <td class="py-2 px-4 border"><img src="/image/${hallFrame.featured_image}" class="w-32 h-12" alt=""></td> 
                                    <td class="py-2 px-4 border">
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm" id="btn${hallFrame.id}"><i class="fas fa-trash"></i> Delete</button>
                                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded-sm edit-btn" data-id="${hallFrame.id}"><i class="fas fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                            `);

                            // Add event listener for delete operation
                            $(`#btn${hallFrame.id}`).click(function() {
                                $.ajax({
                                    type: "DELETE",
                                    url: `/api/hallFrame/${hallFrame.id}`,
                                    success: function(response) {
                                        alert(response.msg);
                                        callingHallframe(); // Refresh table after deletion
                                    },
                                    error: function(error) {
                                        console.error('Error:', error);
                                    }
                                });
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Call the function to initially populate the table
            callingHallframe();
        });
    </script>
@endsection
