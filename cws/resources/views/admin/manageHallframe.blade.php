@extends('admin.base')

@section('content')
    <div class="container mt-16">
        <div class="flex justify-between mb-3 mt-3 items-center">
            <h2 class="text-2xl font-bold">Manage hallFrame (<span id="counting">0</span>)</h2>
            <div class="pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="query" id="searchInput"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search student by name">
                </div>
            </div>
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

                <tfoot>
                    <tr>
                        <th colspan="10" class="p-3 flex items-center justify-center">
                            <div id="pagination" class="">
                                <!-- Pagination links will be inserted here -->
                            </div>
                        </th>
                    </tr>
                </tfoot>
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
                    <form id="editHallFrameForm" class="space-y-4">
                        @method('PUT')
                        <input type="hidden" id="editHallFrameId" name="id">
                        
                        <div class="mb-4">
                            <label for="hallFrameName" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="hallFrameName" name="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="hallFramePosition" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" id="hallFramePosition" name="position" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    
                        <div class="mb-4">
                            <label for="hallFrameIndustry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <input type="text" id="hallFrameIndustry" name="industry" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label for="editCourseImageUpload" class="block text-sm font-medium text-gray-700">Featured Image</label>
                                <input type="file" id="editCourseImageUpload" name="featured_image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            {{-- <div class="flex-1 ml-2">
                                <img src="" id="editCourseImagePreview" alt="" class="mt-1 block w-full h-auto rounded-md">
                            </div> --}}
                        </div>
                    
                        <div class="mb-4">
                            <label for="hallFrameDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="hallFrameDescription" name="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                        </div>
                    
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    Update HallFrame
                                </button>
                                <button type="button" id="cancelEditHallFrame" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    <script>
       $(document).ready(function() {
    let callingHallframe = (data) => {
        let table = $("#callingHallframe");
        table.empty();
        let len = data.length;

        $("#counting").html(len);

        data.forEach((hallFrame) => {
            table.append(`
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">${hallFrame.id}</td> 
                    <td class="py-2 px-4 border">${hallFrame.name}</td>
                    <td class="py-2 px-4 border">${hallFrame.position}</td>  
                    <td class="py-2 px-4 border">${hallFrame.industry}</td>  
                    <td class="py-2 px-4 border">${hallFrame.description}</td> 
                    <td class="py-2 px-4 border"><img src="/image/${hallFrame.featured_image}" class="w-32 h-12" alt=""></td> 
                    <td class="py-2 px-4 border">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm delete-hallframe-btn" data-id="${hallFrame.id}"><i class="fas fa-trash"></i> Delete</button>
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded-sm edit-hallframe-btn" data-id="${hallFrame.id}"><i class="fas fa-edit"></i> Edit</button>
                    </td>
                </tr>
            `);
        });
    };

    function fetchFrame(query = '', page = 1) {
        $.ajax({
            url: "{{ route('manage_HallFrame') }}",
            type: "GET",
            data: {
                'query': query,
                'page': page
            },
            success: function(response) {
                let data = response.data;
                callingHallframe(data);

                // Update pagination links
                let paginationLinks = '';
                if (response.prev_page_url) {
                    paginationLinks +=
                        `<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="${response.current_page - 1}">${response.current_page - 1}</a>`;
                }
                paginationLinks +=
                    `<span class="px-3 py-1 bg-blue-500 text-white mx-1 rounded">${response.current_page}</span>`;
                if (response.next_page_url) {
                    paginationLinks +=
                        `<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="${response.current_page + 1}">${response.current_page + 1}</a>`;
                }
                $('#pagination').html(paginationLinks);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Initial load
    fetchFrame();

    // Search input event handler
    $("#searchInput").on("input", function(e) {
        e.preventDefault();
        var query = $(this).val();
        fetchFrame(query);
    });

    // Pagination link click handler
    $(document).on('click', '.pagination-link', function(e) {
        e.preventDefault();
        let page = $(this).text();
        fetchFrame('', page);
    });

    // Delete hallFrame button click handler
    $(document).on('click', '.delete-hallframe-btn', function(e) {
        e.preventDefault();
        var hallFrameId = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: `/api/hallFrame/${hallFrameId}`,
            success: function(response) {
                alert(response.msg);
                fetchFrame(); // Refresh table after deletion
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    // Edit hallFrame button click handler
    $(document).on('click', '.edit-hallframe-btn', function(e) {
        e.preventDefault();
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
                $('#hallFrameImagePreview').attr('src', '/image/' + response.data.featured_image);
                $('#hallFrameDescription').val(response.data.description);
                $('#editHallFrameModal').removeClass('hidden');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching hallFrame details for editing:', error);
            }
        });
    });

    // Cancel edit hallFrame button click handler
    $('#cancelEditHallFrame').click(function(e) {
        e.preventDefault();
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
                fetchFrame(); // Refresh table after editing
            },
            error: function(xhr, status, error) {
                console.error('Error updating hallFrame:', error);
            }
        });
    });
});

    </script>
@endsection
