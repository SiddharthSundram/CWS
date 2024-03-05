@extends('admin.base')

@section('content')
    <div class="container mt-16">
        <div class="flex justify-between mb-3 mt-3 items-center">
            <h2 class="text-2xl font-bold">Manage hallFrame (<span id="counting">0</span>)</h2>
            <a href="{{ route('hallFrame') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
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

    <!-- Edit HallFrame Modal -->
    <div class="fixed inset-0 z-50 overflow-y-auto hidden" id="editHallFrameModal">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editHallFrameModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editHallFrameModalLabel">Edit HallFrame</h5>
                    <form id="editHallFrameForm">
                        @method('PUT')
                        <input type="hidden" id="editHallFrameId" name="id">
                        <div class="mb-3">
                            <label for="hallFrameName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="hallFrameName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="hallFramePosition" class="form-label">Position</label>
                            <input type="text" class="form-control" id="hallFramePosition" name="position" required>
                        </div>

                        <div class="mb-3">
                            <label for="hallFrameIndustry" class="form-label">Industry</label>
                            <input type="text" class="form-control" id="hallFrameIndustry" name="industry" required>
                        </div>

                        <div class="flex mb-4">
                            <div class="flex-1 mr-2">
                                <label for="editCourseImageUpload" class="block text-sm font-medium text-gray-700">Featured
                                    Image</label>
                                <input type="file"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    id="editCourseImageUpload" name="featured_image">
                            </div>
                            {{-- <div class="flex-1 ml-2">
                                <img src="" id="editCourseImagePreview" alt=""
                                    class="mt-1 block w-full h-auto rounded-md">
                            </div> --}}
                        </div>

                        <div class="mb-3">
                            <label for="hallFrameDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="hallFrameDescription" name="description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">Update HallFrame</button>
                        </div>
                    </form>
                </div>
            </div>
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
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded-sm edit-hallframe-btn" data-id="${hallFrame.id}"><i class="fas fa-edit"></i> Edit</button>
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

            // Edit hallFrame button click handler
            $(document).on('click', '.edit-hallframe-btn', function() {
                var hallFrameId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `/api/hallFrame/${hallFrameId}`,
                    dataType: 'json',
                    success: function(response) {
                        $('#editHallFrameId').val(response.data.id);
                        $('#hallFrameName').val(response.data.name);
                        $('#hallFramePosition').val(response.data.position);
                        $('#hallFrameIndustry').val(response.data.industry);
                        $('#hallFrameImagePreview').attr('src', '/image/' + response.data
                            .featured_image);
                        $('#hallFrameDescription').val(response.data.description);
                        $('#editHallFrameModal').removeClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching hallFrame details for editing:', error);
                    }
                });
            });

            // Cancel edit hallFrame button click handler
            $('#cancelEditHallFrame').click(function() {
                $('#editHallFrameModal').addClass('hidden');
            });

            // Submit edit hallFrame form
            $('#editHallFrameForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/api/hallFrame/' + $('#editHallFrameId').val(),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#editHallFrameModal').addClass('hidden');
                        callingHallframe(); // Refresh table after editing
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating hallFrame:', error);
                    }
                });
            });
        });
    </script>
@endsection
