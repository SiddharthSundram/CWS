@extends('admin.base')

@section('content')
    <!-- Page content goes here -->
    <div class="container mx-auto mt-20">
        <div class="lg:col-span-9 md:col-span-8 sm:col-span-11 mx-auto">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="px-6 py-4">
                    <h3 class="text-xl font-bold">Add New Student</h3>
                </div>
                <div class="px-6 py-4">
                    <form id="addStudent">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Student Name</label>
                            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_no" class="block text-gray-700">Contact No.</label>
                            <input type="tel" id="mobile_no" name="mobile_no" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <script>
        //for calling category 
        $(document).ready(function() {

            $("#addStudent").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/api/",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Student Inserted Successfully!", response.msg, "success");
                        $("#addStudent").trigger("reset")
                        setTimeout(() => {
                            window.open("{{route('manageStudent')}}", "_self")
                        }, 1000);
                    }
                })
            })
        });
    </script> --}}

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

    </script>
@endsection
