@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-3 courses-center">
            <h2>Manage hallFrame (<span id="counting">0</span>)</h2>
            <a href="{{ route('hallFrame') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New
                Students</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Industry</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
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
                                    <td>${hallFrame.id}</td> 
                                    <td>${hallFrame.name}</td>
                                    <td>${hallFrame.position}</td>  
                                    <td>${hallFrame.industry}</td>  
                                    <td>${hallFrame.description}</td> 
                                    <td> <img src="/image/${hallFrame.featured_image}" width="80px" height="50px" alt=""></td> 
                                    <td>
                                        <button type="button" class="btn btn-danger" id="btn${hallFrame.id}">X</button>
                                        <button type="button" class="btn btn-info edit-btn" data-id="${hallFrame.id}">edit</button>
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
