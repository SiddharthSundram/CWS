@extends('admin.base')

@section('content')
    <div class="flex flex-1 px-10 gap-5 mt-16">
        <div class="w-2/3 shadow border p-2">
            <h1 class="text-xl mb-3 font-semibold text-slate-600">Manage Categories</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="callproject">
                </tbody>
            </table>

        </div>
        <div class="w-1/3">
            <div class="shadow border p-2">
                <div class="text-xl text-slate-600 mb-3 font-semibold">Insert Project</div>
                <div class="p-2">
                    <form id="insertProject">
                        <div class="mb-4">
                            <label for="projectName" class="block text-sm font-medium text-gray-700">Name Of Project</label>
                            <input type="text" id="projectName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="name" placeholder="Enter name">
                        </div>
                        <div class="mb-4">
                            <label for="projectDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="projectDescription" name="description" cols="30" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Insert Project</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Edit Project Modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProjectForm">
                        <input type="hidden" id="editProjectId" name="id">
                        <div class="mb-3">
                            <label for="editProjectName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editProjectName" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="editProjectDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProjectDescription" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // Function to fetch recent projects
        function fetchProjects() {
            $.ajax({
                type: "GET",
                url: "/api/recent_project",
                dataType: "json",
                success: function(response) {
                    $("#callproject").empty();
                    $.each(response.data, function(index, project) {
                        $("#callproject").append(`<tr>
                        <td  scope="col" class="px-6 py-3">${project.id}</td>
                        <td  scope="col" class="px-6 py-3">${project.name}</td>
                        <td  scope="col" class="px-6 py-3">${project.description}</td>
                        <td  scope="col" class="px-6 py-3 flex gap-2">
                            <button type='button' class='bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded delete-btn' data-id='${project.id}'>X</button>
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-id='${project.id}'>Edit</button>
                        </td>
                    </tr>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching projects:", error);
                }
            });
        }

        // Call fetchProjects initially
        $(document).ready(function() {
            fetchProjects();

            // Handle form submission for inserting a new project
            $("#insertProject").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/api/recent_project",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        $("#insertProject").trigger("reset");
                        fetchProjects(); // Fetch projects again after successful insertion
                    },
                    error: function(xhr, status, error) {
                        console.error("Error inserting project:", error);
                    }
                });
            });

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                var projectId = $(this).data('id');
                $.ajax({
                    type: 'DELETE',
                    url: `/api/recent_project/${projectId}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        fetchProjects(); // Fetch projects again after successful deletion
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting project:", error);
                    }
                });
            });

            // Handle edit button click
            $(document).on('click', '.edit-btn', function() {
                var projectId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `/api/recent_project/${projectId}`,
                    dataType: 'json',
                    success: function(response) {
                        $('#editProjectId').val(response.data.id);
                        $('#editProjectName').val(response.data.name);
                        $('#editProjectDescription').val(response.data.description);
                        $('#editProjectModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching project details for editing:', error);
                    }
                });
            });

            // Handle form submission for updating project details
            $('#editProjectForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'PUT', // Assuming you use PUT method for updating
                    url: '/api/recent_project/' + $('#editProjectId').val(),
                    data: formData,
                    success: function(response) {
                        swal("Success", response.msg, "success");
                        $('#editProjectModal').modal('hide');
                        fetchProjects(); // Refresh the project list
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating project:', error);
                    }
                });
            });
        });
    </script>
@endsection
