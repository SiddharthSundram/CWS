@extends('admin.base')

@section('content')
<div class="container  mt-20">
    <div class="flex justify-between items-center mt-3">
        <h2 class="text-2xl font-bold">Manage Project</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 border py-2">#</th>
                            <th class="px-4 border py-2">Name</th>
                            <th class="px-4 border py-2">Description</th>
                            <th class="px-4 border py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="callproject">
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <form id="insertProject">
                    <div class="mb-4">
                        <label for="projectName" class="block font-semibold">Name Of Project</label>
                        <input type="text" id="projectName" class="form-input w-full" name="name" placeholder="Enter name">
                    </div>
                    <div class="mb-4">
                        <label for="projectDescription" class="block font-semibold">Description</label>
                        <textarea id="projectDescription" name="description" rows="3" class="form-textarea w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Insert Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Project Modal -->
{{-- <div class="fixed z-10 inset-0 overflow-y-auto" id="editProjectModal" style="display: none;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true" onclick="$('#editProjectModal').hide()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Edit Project</h3>
                        <form id="editProjectForm" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="editProjectId" name="id">
                            <div class="mb-4">
                                <label for="editProjectName" class="block text-gray-700 text-sm font-bold mb-2">Project Name</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editProjectName" name="name" required>
                            </div>
                            <div class="mb-4">
                                <label for="editProjectDescription" class="block text-gray-700 text-sm font-bold mb-2">Project Description</label>
                                <textarea id="editProjectDescription" name="description" rows="3" class="form-textarea w-full"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="saveChanges()">Save Changes</button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="$('#editProjectModal').hide()">Cancel</button>
            </div>
        </div>
    </div>
</div> --}}

<script>
    $(document).ready(function() {
        // Function to fetch projects
        function fetchProjects() {
            $.ajax({
                type: "GET",
                url: "/api/recent_project",
                dataType: "json",
                success: function(response) {
                    // Clear previous data
                    
                    $("#callproject").empty();
                    // Populate table with fetched projects
                    
                    $.each(response.data, function(index, project) {
                        $("#callproject").append(`<tr>
                            <td class="border px-4 py-2">${project.id}</td>
                            <td class="border px-4 py-2">${project.name}</td>
                            <td class="border px-4 py-2">${project.description}</td>
                            <td class="border px-4 py-2">
                                <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded delete-project" data-id="${project.id}">
                                    Delete
                                </button>
                                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded edit-project" data-id="${project.id}">
                                    Edit
                                </button>
                            </td>
                        </tr>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        // Call fetchProjects function on page load
        fetchProjects();

        // Function to handle delete project
        $(document).on("click", ".delete-project", function() {
            var projectId = $(this).data("id");
            if (confirm("Are you sure you want to delete this project?")) {
                $.ajax({
                    type: "DELETE",
                    url: `/api/recent_project/${projectId}`,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        // Refresh project list after deletion
                        fetchProjects();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        });
        $(document).on("click", ".edit-project", function() {
    var projectId = $(this).data("id");
    
    // Show the edit project modal
            $("#editProjectModal").modal("show");

            // AJAX call to fetch project details
                $.ajax({
                    type: "GET",
                    url: `/api/recent_project/${projectId}`, // Endpoint to fetch project details
                    dataType: "json",
                    success: function(response) {
                        // Update modal fields with project details
                        swal("Success", response.msg, "success");
                        $("#editProjectId").val(response.data.id);
                        $("#editProjectName").val(response.data.name);
                        $("#editProjectDescription").val(response.data.description);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
            $("#insertProject").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('recent_project.store') }}",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    swal("Success", response.msg, "success");
                    $("#insertProject").trigger("reset");
                    fetchProjects(); 
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
    });
</script>
@endsection
