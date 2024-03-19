@extends('admin.base')

@section('content')
<div class="flex-1 flex mt-12 items-center justify-between">
    <h1 class="text-lg font-semibold py-2">View Student</h1>
    <div class="flex mt-4 justify-center gap-2">
        <div class="text-center">
            <button class='bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 rounded' type="button" data-drawer-backdrop="false"
                data-drawer-target="drawer-bottom-example" data-drawer-show="drawer-bottom-example"
                data-drawer-placement="bottom" aria-controls="drawer-bottom-example">
                Add Course
            </button>
          </div>
        <!-- drawer component -->
        <button type="button"
            class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded edit-student-btn'>Edit</button>
        <button type="button"
            class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-5 rounded delete-student-btn'>Delete</button>
    </div>

</div>

    <div class="container mx-auto py-2">
        <!-- Student Information -->
        <div class="bg-white p-4 shadow-md rounded-md mb-4">
            <h2 class="text-lg font-semibold">Student Information</h2>
            <!-- Display student information here -->
            <table class="min-w-full">
                <tbody id="studentDetails">
                    <!-- Student details will be dynamically added here -->
                </tbody>
            </table>
        </div>
    
        <!-- Enrolled Courses -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4" id="courseDetails">
        </div>
    </div>
    <div class="overflow-x-auto container mt-4" >
        <!-- Course cards will be dynamically added here -->
    </div>


    
    </div>

    <div id="drawer-bottom-example"
    class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-y-full"
    tabindex="-1" aria-labelledby="drawer-bottom-label">
    <h5 id="drawer-bottom-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
            class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Add Course Here</h5>
    <button type="button"  data-drawer-hide="drawer-bottom-example" aria-controls="drawer-bottom-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form id="approvalForm" class="space-y-4">
        <div>
            <label for="course" class="block font-medium">Select Course</label>
            <input type="hidden" value="{{ request()->segment(4) }}" name="user_id">
            <select id="callingCourses" name="course_id" class="border px-3 py-2 block w-full" required>

            </select>
        </div>
        <div>
            <label for="fees" class="block font-medium">Fees</label>
            <input type="number" id="fees" name="fees" class="border px-3 py-2  block w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add
            Course</button>

    </form>
</div>



{{-- edit modal --}}
<div id="default-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="editStudentModalLabel">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h5 class="text-lg font-semibold mb-4" id="editStudent">Edit Student</h5>
                <form id="editStudentForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="editStudentId" name="id">
                    <div class="mb-4">
                        <label for="editStudentName" class="block text-sm font-medium text-gray-700">Student Name</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " id="editStudentName" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="editStudentfName" class="block text-sm font-medium text-gray-700">Father's Name</label>
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
                        <select name="gender" id="editStudentGender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Choose Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Others</option>
                        </select>

                    <div class="mb-4">
                        <label for="editStudentEmail" class="block text-sm font-medium text-gray-700">Student Email</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="editStudentEmail" name="email" required>
                    </div>                        
                    
                    <div class="mb-4">
                        <label for="editStudentMobile_no" class="block text-sm font-medium text-gray-700">Student Contact</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " id="editStudentMobile_no" name="Mobile_no" required>
                    </div>                        
                    <div class="flex justify-between">
                        <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save changes</button>
                        <button type="button" id="cancelEditStudent" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript to control the popup -->
    <script>
        $(document).ready(function() {    
function getStudent() {

    $.ajax({
        type: "get",
        url: `/api/admin/student/view/{{ request()->segment(4) }}`,
        success: function(student) {
            let details = `
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Id</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.id}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Name</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.name}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Fathers Name</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.f_name}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Address</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.address}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Gender</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.gender}</td>
            </tr>         
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Contact No.</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.mobile_no}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Email</th>
                <td class="border-b border-gray-200 px-4 py-2">${student.email}</td>
            </tr>
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Admission Date</th>
                <td class="border-b border-gray-200 px-4 py-2">${new Date(student.created_at).toLocaleDateString()}</td>

            </tr>                  
    </tr>`;

            let courses = student.courses.map(course => {
                let paymentSection = '';
                if (course.payments.length < 1) {
                    paymentSection = `
<div class="px-6 pt-2 pb-2">
    <div class="flex items-center justify-between">

        <div class="flex flex-col gap-3">
            <p class="text-sm text-slate-600">Please select Payment type</p>
            <input type="hidden" id="course_id_${course.id}" value="${course.id}" class="mr-2">
            <input type="hidden" id="course_amount_${course.id}" value="${course.discount_fees}">
            <div class='flex items-center gap-2'>
                <input type="radio" id="fullPayment_${course.id}" name="paymentType_${course.id}" value="full">
                <label for="fullPayment_${course.id}" class="text-md font-semibold">Full Payment</label>
            </div>
            <div class='flex items-center gap-2'>
                <input type="radio" id="partialPayment_${course.id}" name="paymentType_${course.id}" value="partial">
                <label for="partialPayment_${course.id}" class="text-md font-semibold">Partial Payment</label>
            </div>
        </div>
    </div>
</div>
<div class="px-6 pt-1 pb-2">
    <button id="submitPayment_${course.id}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-full text-sm">
        Add Payments
    </button>
</div>`;
                } else {
        
        paymentSection = `
            <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
            ${course.payments.map((payment, i) => `
                <li class="mb-2 ms-4">
                    <div class="absolute w-3 h-3 ${payment.status === 1? 'bg-green-600' : 'bg-gray-200'} rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">${payment.date_of_payment}</time>
                    <h3 class="text-lg flex gap-2 items-center font-semibold text-gray-900 dark:text-white">
                        <span>₹${payment.fees}</span>
                        ${payment.status === 1 ? `<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>`: ''}
                        </h3>
                    ${payment.status === 0 ? `<button id="markPaid_${payment.id}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-1 px-2 rounded">Mark as Paid</button>` : ``}
                </li>`).join('')}
            </ol>`;
                }

                return `
<div class="bg-white shadow-lg rounded-lg overflow-hidden ">
<div class="border bg-slate-50 px-4 py-2">
    <div class="font-bold text-xl capitalize mb-1">${course.name} Course </div>
    <div class="font-normal text-xs capitalize mb-1">Duration: ${course.duration} Weeks </div>
    <div class="font-semibold text-teal-900 text-sm capitalize mb-2">Course Fees: ₹${course.discount_fees}/- <del class='text-slate-400'>₹${course.fees}/-</del></div>
</div>
<div class='px-4 py-2'>
    ${paymentSection}
</div>
</div>`;
            }).join('');


            $("#studentDetails").html(details);
            $("#courseDetails").html(courses);

            student.courses.forEach(course => {
                const courseId = course.id;
                const courseIdElement = $('#course_id_' + courseId);
                const courseAmountElement = $('#course_amount_' + courseId);
                const submitPaymentBtn = $('#submitPayment_' + courseId);
                const fullPaymentRadio = $('#fullPayment_' + courseId);
                const partialPaymentRadio = $('#partialPayment_' + courseId);

                submitPaymentBtn.on('click', () => {
                    let paymentType = '';
                    let paymentAmount = 0;

                    if (fullPaymentRadio.is(':checked')) {
                        paymentType = 'full';
                        paymentAmount = courseAmountElement.val();
                    } else if (partialPaymentRadio.is(':checked')) {
                        paymentType = 'partial';
                        paymentAmount = courseAmountElement.val();
                    } else {
                        swal("Alert",'Please select a payment option',"warning");
                        return;
                    }

                    $.ajax({
                        url: '/api/admin/student/payment',
                        type: 'POST',
                        data: {
                            'course_id': courseIdElement.val(),
                            'user_id': "{{ request()->segment(4) }}",
                            'fees': paymentAmount,
                            'payment_type': paymentType
                        },
                        success: function(response) {
                            swal("Success",'Payment processed successfully',"success");
                            getStudent();
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status == 400) {
                                swal("error",
                                    "Already Pay Payment Exists"
                                    );
                            }
                        }
                    });
                });
            });
        },
        error: function(xhr, status, error) {
            console.error("error: " + xhr.responseText);
        }
    });
}
getStudent();


$('body').on('click', '[id^=markPaid_]', function() {
    const paymentId = $(this).attr('id').split('_')[1];

    $.ajax({
        url: `/api/admin/student/payment/${paymentId}/mark-as-paid`,
        type: 'PATCH',

        success: function(response) {
            swal("Done",'Payment marked as paid successfully',"success");
            getStudent();
            // Optionally, update the UI to reflect the payment status change
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            swal("Oops",'Failed to mark payment as paid',"error");
        }
    });
});

// Ajax for calling available courses

$.ajax({
    type: "GET",
    url: "/api/course",
    success: function(response) {
        let select = $("#callingCourses");
        select.empty();
        select.append(
        `<option value="">Select a course</option>`); // Add this line outside the loop
        response.data.forEach((course) => {
            select.append(
                `<option value = "${course.id}" data-fees="${course.discount_fees}">${course.name} </option>`
            );
        });
    }
});

$("#callingCourses").change(function() {
    const selectedOption = $(this).find("option:selected");
    const fees = selectedOption.data("fees");
    $("#fees").val(fees);
});
$("#approvalForm").submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting
    // Fetch form data
    const formData = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "{{ route('student_course.store') }}",
        data: formData,
        dataType: "json",
        success: function(response) {
            swal("Success", response.msg, "success");
            $("#drawer-bottom-example").hide();
            getStudent();
        },
        error: function(xhr, status, error) {
            if (xhr.status === 400) {
                // Course already exists
                swal("Error", "Student Course already exists", "error");
            } else {
                swal("Error", "An error occurred", "error");
            }
        }
    });
})


            $(document).ready(function() {
                
                $('.delete-student-btn').click(function() {
                    
                    if (confirm('Are you sure you want to delete this student?')) {                        
                        var studentId = "{{ request()->segment(4) }}";
                        var csrfToken = $('meta[name="csrf-token"]').attr('content'); 
                        $.ajax({
                            type: 'DELETE',
                            url: `/api/admin/student/delete/${studentId}`, 
                            headers: {
                                'X-CSRF-TOKEN': csrfToken 
                            },
                            success: function(response) {
                                
                                swal("Success", response.msg, "success");
                                location.reload();
                                
                            },
                            error: function(xhr, status, error) {
                                
                                console.error("Error deleting student:", error);
                            }
                        });
                    }
                });
            });

            getStudent();

            //Edit Student
            $(document).ready(function() {
                function getStudent() {
                    $.ajax({
                        type: "GET",
                        url: `/api/admin/student/view/{{ request()->segment(4) }}`,
                        success: function(student) {
                            // Update student details
                            $('#editStudentId').val(student.id);
                            $('#editStudentName').val(student.name);
                            $('#editStudentfName').val(student.f_name);
                            $('#editStudentAddress').val(student.address);
                            $('#editStudentGender').val(student.gender);
                            $('#editStudentEmail').val(student.email);
                            $('#editStudentMobile_no').val(student.mobile_no);

                            // Update enrolled courses
                            let courses = student.courses.map(course => {
                                // Code for courses rendering (unchanged)
                            }).join('');
                            $('#courseDetails').html(courses);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                // Edit Student
                $('.edit-student-btn').on('click', function() {
                    getStudent();
                    $('#default-modal').removeClass('hidden');
                });

                // Cancel Edit
                $('#cancelEditStudent').on('click', function() {
                    $('#default-modal').addClass('hidden');
                });

                // Update student
                $('#editStudentForm').submit(function(e) {
                    e.preventDefault();
                    var id = $('#editStudentId').val();
                    var name = $('#editStudentName').val();
                    var f_name = $('#editStudentfName').val();
                    var address = $('#editStudentAddress').val();
                    var gender = $('#editStudentGender').val();
                    var email = $('#editStudentEmail').val();
                    var mobile_no = $('#editStudentMobile_no').val();
                    $.ajax({
                        type: 'PUT',
                        url: `/api/admin/manage-student/edit/${id}`,
                        data: {
                            'name': name,
                            'f_name': f_name,
                            'address': address,
                            'gender': gender,
                            'email': email,
                            'mobile_no': mobile_no,
                        },
                        success: function(data) {
                            alert("update student successfully");
                            // Hide the modal
                            $('#default-modal').addClass('hidden');
                            // Refresh student data
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                
            });
        });
    </script>
@endsection
