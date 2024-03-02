@extends('admin.base')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header"><h3>Manage Project</h3></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="callproject">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Insert Project</div>
                <div class="card-body">
                    <form id="insertProject">
                        <div class="mb-3">
                            <label for="projectName">Name Of Project</label>
                            <input type="text" id="projectName" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="projectDescription">Description</label>
                            <textarea id="projectDescription" name="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Insert Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
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
                        <td>${project.id}</td>
                        <td>${project.name}</td>
                        <td>${project.description}</td>
                        <td>
                            <button type='button' class='btn btn-danger delete-btn' data-id='${project.id}'>X</button>
                            <button type='button' class='btn btn-info edit-btn' data-id='${project.id}'>Edit</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
