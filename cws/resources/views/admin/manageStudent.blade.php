@extends('admin.base')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-3 courses-center">
            <h2>Manage Students (<span id="counting">0</span>)</h2>
            <a href="{{ route('insertStudent') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add New Student</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Admission Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="callingStudent">
                    <!-- Table rows will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            let callingStudent = () => {
                $.ajax({
                    type: "get",
                    url: "{{route('manage-student.index')}}",
                    success: function(response) {
                        let table = $("#callingStudent");
                        table.empty();
                        let data = response.data;
                        //counting students
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((student) => {
                            table.append(`
                                <tr>
                                    <td>${student.id}</td> 
                                    <td>${student.name}</td>
                                    <td>${student.email}</td> 
                                    <td>${student.mobile_no}</td>     
                                    <td>${student.created_at}</td>     
                                    <td></td>     
                                    <td>
                                        <button type="button" class="btn btn-info edit-btn" data-id="${student.id}">Edit</button>
                                    </td>
                                </tr>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            };
            callingStudent();
        });
    </script>
@endsection
