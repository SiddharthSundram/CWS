@extends('home.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-gray-200 p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 text-left mb-6">My Profile</h1>
            <div class="flex items-center justify-center mb-6">
                <div class="relative">
                    <img id="profile-image" class="h-32 w-32 rounded-full object-cover" src="https://via.placeholder.com/150"
                        alt="Profile Picture">
                </div>
            </div>
            <div class="flex justify-center space-x-4">
                <button
                    class="edit-btn px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 inline-block text-center"id="edit_student">Edit
                    Profile</button>
                <a href="" id="logouting"
                    class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:bg-red-600 inline-block text-center">Logout</a>
            </div>

            <div class="flex flex-col space-y-4" id="callingUserProfile">
                <div class="flex gap-2">
                    <label for="name" class="text-gray-700 font-semibold">Name: </label>
                    <p class="text-gray-800" id="calling_name"></p>
                </div>
                <div class="flex gap-2">
                    <label for="gender" class="text-gray-700 font-semibold">Gender: </label>
                    <p class="text-gray-800" id="calling_user_gender"></p>
                </div>
                <div class="flex gap-2">
                    <label for="f_name" class="text-gray-700 font-semibold">Father's Name: </label>
                    <p class="text-gray-800" id="calling_user_fname"></p>
                </div>
                <div class="flex gap-2">
                    <label for="email" class="text-gray-700 font-semibold">Email:</label>
                    <p class="text-gray-800" id="calling_user_email"></p>
                </div>
                <div class="flex gap-2">
                    <label for="phone" class="text-gray-700 font-semibold">Phone:</label>
                    <p class="text-gray-800" id="calling_user_phone"></p>
                </div>
                <div class="flex gap-2">
                    <label for="address" class="text-gray-700 font-semibold">Address:</label>
                    <p class="text-gray-800" id="calling_user_address"></p>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}

    <div id="default-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editStudentModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="text-lg font-semibold mb-4" id="editStudent">Edit Student</h5>
                    <form id="editStudentForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editStudentId" name="id">
                        <div class="mb-4">
                            <label for="editStudentName" class="block text-sm font-medium text-gray-700">Student
                                Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm "
                                id="editStudentName" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentfName" class="block text-sm font-medium text-gray-700">Father's
                                Name</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentfName" name="f_name" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentAddress" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="editStudentAddress" name="address" required>
                        </div>
                        <div class="mb-4">
                            <label for="editStudentGender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="editStudentGender"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Choose Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Others</option>
                            </select>

                            <div class="mb-4">
                                <label for="editStudentEmail" class="block text-sm font-medium text-gray-700">Student
                                    Email</label>
                                <input type="text"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    id="editStudentEmail" name="email" required>
                            </div>

                            <div class="mb-4">
                                <label for="editStudentMobile_no" class="block text-sm font-medium text-gray-700">Student
                                    Contact</label>
                                <input type="text"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm "
                                    id="editStudentMobile_no" name="Mobile_no" required>
                            </div>
                            <div class="flex justify-between">
                                <button type="submit"
                                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                    changes</button>
                                <button type="button" id="cancelEditStudent"
                                    class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var token = localStorage.getItem('token');
            if (token) {
                let callingProfile = () => {
                    $.ajax({
                        type: "GET",
                        url: "/api/user-profile",
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function(response) {
                            if (response.hasOwnProperty('name')) {
                                $("#calling_name").text(response.name);
                                if (response.hasOwnProperty('f_name')) {
                                    $("#calling_user_fname").text(response.f_name);
                                    if (response.hasOwnProperty('email')) {
                                        $("#calling_user_email").text(response.email);
                                        if (response.hasOwnProperty('mobile_no')) {
                                            $("#calling_user_phone").text(response.mobile_no);
                                            if (response.hasOwnProperty('mobile_no')) {
                                                $("#calling_user_gender").text(response.gender);
                                                if (response.hasOwnProperty('mobile_no')) {
                                                    $("#calling_user_address").text(response.address);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
                callingProfile();
            } else {
                window.open('/', '_self');
            }

            $('#logouting').click(function(e) {
                e.preventDefault();

                // Display a confirmation dialog
                swal({
                    title: "Are you sure you want to logout?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willLogout) => {
                    if (willLogout) {
                        // Proceed with logout
                        $.ajax({
                            url: '/api/logout',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            },
                            success: function(response) {
                                // Remove the token from localStorage
                                localStorage.removeItem('token');
                                // Redirect to the login page after successful logout
                                swal("Logout Successfully!", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.href =
                                        '{{ route('login') }}';
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        // Cancelled logout
                        swal("Logout Cancelled", "You are still login", "info");
                    }
                });
            });

            // edit profile work

            
        let editStudent = () => {
            $('#edit_student').click(function() {
                $.ajax({
                    type: "GET",
                    url: `/api/user-profile`,
                    headers: {
                        'Authorization': 'Bearer'+ token
                    },
                    success: function(response) {
                        $('#editStudentId').val(response.id);
                        $('#editStudentName').val(response.name);
                        $('#editStudentEmail').val(response.email);
                        $('#editStudentMobile_no').val(response.mobile_no);
                        $('#editStudentfName').val(response.f_name);
                        $('#editStudentAddress').val(response.address);
                        $('#editStudentGender').val(response.gender);
                        $('#default-modal').removeClass('hidden');

                        // console.log("Edit student form opened");
                    },
                    error: function(xhr, status, error) {
                    console.error('Error fetching student details for editing:', error);
                    }
                });
            });

            $('#editStudentForm').submit(function(e) {
                e.preventDefault();
                var formData = {
                    name: $('#editStudentName').val(),
                    email: $('#editStudentEmail').val(),
                    mobile_no: $('#editStudentMobile_no').val(),
                    f_name: $('#editStudentfName').val(),
                    address: $('#editStudentAddress').val(),
                    gender: $('#editStudentGender').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `/api/user-profile/edit`,
                    headers: {
                        'Authorization': 'Bearer ' + token                    },
                    data: formData,
                    success: function(response) {
                        swal("Success", response.msg, "msg");
                        $('#default-modal').addClass('hidden');
                        fetchStudents(); // Assuming you have a function to fetch students
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating student:', error);
                    }
                });
            });
        };

        editStudent();



            //

            // $(document).on('click', '.edit-btn', function() {
            //     var studentId = $(this).data('id');
            //     var csrfToken = $('meta[name="csrf-token"]').attr('content');
            //     $.ajax({
            //         type: 'GET',
            //         url: `/api/user-profile/edit/${studentId}`,
            //         success: function(response) {
            //             $('#editStudentId').val(response.id);
            //             $('#editStudentName').val(response.name);
            //             $('#editStudentEmail').val(response.email);
            //             $('#editStudentMobile_no').val(response.mobile_no);
            //             $('#editStudentfName').val(response.f_name);
            //             $('#editStudentAddress').val(response.address);
            //             $('#editStudentGender').val(response.gender);
            //             $('#default-modal').removeClass('hidden');
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('Error fetching student details for editing:', error);
            //         }
            //     });
            // });

            // $('#editStudentForm').submit(function(e) {
            //     e.preventDefault();
            //     var userId = $('#editStudentId').val();
            //     var csrfToken = $('meta[name="csrf-token"]').attr('content');
            //     var formData = {
            //         name: $('#editStudentName').val(),
            //         email: $('#editStudentEmail').val(),
            //         mobile_no: $('#editStudentMobile_no').val(),
            //         f_name: $('#editStudentfName').val(),
            //         address: $('#editStudentAddress').val(),
            //         gender: $('#editStudentGender').val(),
            //     };
            //     $.ajax({
            //         type: 'PUT',
            //         url: `/api/user-profile/edit/${userId}`,
            //         headers: {
            //             'X-CSRF-TOKEN': csrfToken
            //         },
            //         data: formData,
            //         success: function(response) {
            //             swal("Success", response.msg, "msg");
            //             $('#default-modal').addClass('hidden');
            //             fetchStudents(); // Assuming you have a function to fetch students
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('Error updating student:', error);
            //         }
            //     });
            // });

            // Cancel edit student button click handler
            $('#cancelEditStudent').click(function() {
                $('#default-modal').addClass('hidden');
            });


        });
    </script>
@endsection
