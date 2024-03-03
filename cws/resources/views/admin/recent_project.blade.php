@extends('admin.base')

@section('content')
<div class="container mt-5">
    <div class="flex justify-between items-center mt-3">
        <h2>Manage Project</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div class="card">
            <div class="card-body">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="callproject">
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="insertProject">
                    <div class="mb-3">
                        <label for="projectName" class="block">Name Of Project</label>
                        <input type="text" id="projectName" class="form-input w-full" name="name" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="projectDescription" class="block">Description</label>
                        <textarea id="projectDescription" name="description" rows="3" class="form-textarea w-full"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Insert Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Project Modal -->
<div class="modal" id="editProjectModal">
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
                        <label for="editProjectName" class="block">Name</label>
                        <input type="text" class="form-input w-full" id="editProjectName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editProjectDescription" class="block">Description</label>
                        <textarea class="form-textarea w-full" id="editProjectDescription" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // Your JavaScript code here
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
