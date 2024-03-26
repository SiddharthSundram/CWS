@extends('admin.base')
@section('title')
    @yield('title') Admin | Manage Projects
@endsection

@section('content')
<div class="flex flex-col md:flex-row px-5 md:px-10 gap-5 mt-16">
    <div class="w-full md:w-2/3 shadow border p-2">
        <h1 class="text-xl mb-3 font-semibold text-slate-600">Manage Projects</h1>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">User</th>
                        <th scope="col" class="px-6 py-3">URL</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="callproject">
                    <!-- Project data will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full md:w-1/3 mt-5 md:mt-0">
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
                        <label for="editProjectUser" class="block text-sm font-medium text-gray-700">Project User</label>
                        <select name="user_id" class="editProjectUser mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <!-- Options for project users will be dynamically inserted here -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="projectUrl" class="block text-sm font-medium text-gray-700">Name Of URL</label>
                        <input type="text" id="projectUrl" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="url" placeholder="https://-">
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
    <div id="default-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="editProjectModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editProjectModalLabel">Edit Project</h5>
                    <form id="editProjectForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editProjectId" name="id">
                        <div class="mb-4">
                            <label for="editProjectName" class="block text-sm font-medium text-gray-700">Project Name</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="editProjectName" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editProjectDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="editProjectDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="editProjectUser"
                                class="block text-sm font-medium text-gray-700">Project User</label>
                                <select name="user_id"
                                class="editProjectUser mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></select>
                        </div>
                        <div class="mb-4">
                            <label for="editProjectName" class="block text-sm font-medium text-gray-700">Project Url</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="editProjectUrl" name="url" required>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save changes</button>
                            <button type="button" id="cancelEditProject" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    $("#callproject").append(`<tr class="text-gray-800 hover:bg-gray-100">
                        <td class="border p-2">${project.id}</td>
                        <td class="border p-2">${project.name}</td>                                        
                        <td class="border p-2">${project.description}</td>                                            
                        <td class="border p-2">${project.user.name}</td>    
                        <td class="border p-2">${project.url}</td>                                            
                        <td class="py-2 px-4 border">
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-sm delete-btn" data-id="${project.id}">
                                <i class="fas fa-trash"></i> X
                            </button>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded-sm edit-btn" data-id="${project.id}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>`);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching projects:", error);
            }
        });
    }

    // Function to populate users in the edit form
    function populateUsers() {
        $.ajax({
            type: "GET",
            url: "/api/admin/callingStudents",
            success: function(response) {
                let select = $(".editProjectUser");
                select.empty();
                let users = response.students;

                // Loop through each user and add them to the select element
                // Loop through each user and add them to the select element
            $.each(users, function(index, user) {
                select.append($('<option>', {
                    value: user.id,
                    text: user.name
                }));
            });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching users:", error);
            }
        });
    }

    // Call fetchProjects initially
    $(document).ready(function() {
        fetchProjects();
        populateUsers();

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
            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token
            $.ajax({
                type: 'DELETE',
                url: `/api/recent_project/${projectId}`,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
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
                    populateUsers(); // Call populateUsers to populate the select element
                    $('#editProjectId').val(response.data.id);
                    $('#editProjectName').val(response.data.name);
                    $('#editProjectDescription').val(response.data.description);
                    $('#editProjectUser').val(response.data.user_id);
                    $('#editProjectUrl').val(response.data.url);
                    $('#default-modal').removeClass('hidden');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching project details for editing:', error);
                }
            });
        });

        // Handle cancel button click for the edit modal
        $('#cancelEditProject').click(function() {
            $('#default-modal').addClass('hidden'); // Add the 'hidden' class to hide the modal
        });

        // Handle form submission for editing project
        $('#editProjectForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var projectId = $('#editProjectId').val();
            $.ajax({
                type: 'PUT',
                url: `/api/recent_project/${projectId}`,
                data: formData,
                dataType: 'json',
                success: function(response) {
                    swal("Success", response.msg, "success");
                    $('#default-modal').addClass('hidden'); // Add the 'hidden' class to hide the modal
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
