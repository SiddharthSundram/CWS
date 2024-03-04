@extends('admin.base')

@section('content')
<div class="container mt-20">
    <div class="flex justify-between items-center mt-3 courses-center">
        <h2 class="text-2xl">Manage hallFrame (<span id="counting" class="text-green-500">0</span>)</h2>
        <a href="{{ route('hallFrame') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center"> 
            <i class="fas fa-plus mr-1"></i> Add New Students
        </a>
        
    </div>
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 border py-2">Id</th>
                    <th class="px-4 border py-2">Name</th>
                    <th class="px-4 border py-2">Position</th>
                    <th class="px-4 border py-2">Industry</th>
                    <th class="px-4 border py-2">Description</th>
                    <th class="px-4 border py-2">Image</th>
                    <th class="px-4 border py-2">Actions</th>
                </tr>
            </thead>
            <tbody id="callingHallframe">
                <!-- Add your table row content here -->
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
                            <tr>
                                <td class="border px-4 py-2">${hallFrame.id}</td>
                                <td class="border px-4 py-2">${hallFrame.name}</td>
                                <td class="border px-4 py-2">${hallFrame.position}</td>
                                <td class="border px-4 py-2">${hallFrame.industry}</td>
                                <td class="border px-4 py-2">${hallFrame.description}</td>
                                <td class="border px-4 py-2">
                                    <img src="/image/${hallFrame.featured_image}" class="w-20 h-12 object-cover" alt="">
                                </td>
                                <td class="border px-4 py-2">
                                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" id="btn${hallFrame.id}">X</button>
                                    <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded edit-btn" data-id="${hallFrame.id}">Edit</button>
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
                                        callingHallframe
                                    (); // Refresh table after deletion
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
