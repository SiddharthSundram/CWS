@extends('admin.base')

@section('content')
    <div class="container mx-auto mt-16">
        <div class="w-full lg:w-2/3 md:w-8/12 sm:w-11/12 mx-auto">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-gray-200 px-4 py-2 rounded-t-lg">
                    <h3 class="text-xl font-semibold">Add New Student</h3>
                </div>
                <div class="p-4">
                    <form id="addStudent">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Student Name</label>
                            <input type="text" id="name" name="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_no" class="block text-sm font-medium text-gray-700">Contact No.</label>
                            <input type="tel" id="mobile_no" name="mobile_no" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Student</button>
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
