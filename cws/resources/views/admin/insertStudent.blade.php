@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container">
        <div class="col-lg-9 col-md-8 col-sm-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Student</h3>
                </div>
                <div class="card-body">

                    <form id="addStudent">
                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact No.</label>
                            <input type="tel" class="form-control" id="mobile_no" name="mobile_no" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Registration
        $(document).ready(function() {

            $('#addStudent').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/api/admin/insert-student',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display success message with SweetAlert
                        swal("Registration Successful!", "", "success");
                        // Reset the form
                        $('#addStudent')[0].reset();
                        // Redirect to login page
                        setTimeout(() => {
                            window.location.href = '{{route('manageStudent')}}';
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        alert(JSON.parse(xhr.responseText).message);
                    }
                });
            });
        });
    </script>
@endsection
