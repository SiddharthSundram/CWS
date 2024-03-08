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
            class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded'>Edit</button>
        <button type="button"
            class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-5 rounded delete-btn'>Delete</button>
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





    <!-- JavaScript to control the popup -->
    <script>
        $(document).ready(function() {




            $(".delete-btn").click(function() {
                let courseId = "{{ request()->segment(4) }}";
                if (confirm("Are you sure you want to delete this student?")) {
                    $.ajax({
                        type: "DELETE",
                        url: `/api/admin/student/${courseId} `,
                        success: function(response) {
                            window.location.href = "{{ route('manageStudent') }}";
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

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
                            <th class="border-b border-gray-200 px-4 py-2">Contact No.</th>
                            <td class="border-b border-gray-200 px-4 py-2">${student.mobile_no}</td>
                        </tr>
                        <tr>
                            <th class="border-b border-gray-200 px-4 py-2">Email</th>
                            <td class="border-b border-gray-200 px-4 py-2">${student.email}</td>
                        </tr>
                        <tr>
                            <th class="border-b border-gray-200 px-4 py-2">Admission Date</th>
                            <td class="border-b border-gray-200 px-4 py-2">${student.created_at}</td>
                        </tr>`;

                        let courses = student.courses.map(course => {
                            let paymentSection = '';
                            if (course.payments.length < 1) {
                                paymentSection = `
            <div class="px-6 pt-4 pb-2">
                <div class="flex items-center justify-between">
                    <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">${course.discount_fees}</span>
                    <div class="flex items-center">
                        <input type="hidden" id="course_id_${course.id}" value="${course.id}" class="mr-2">
                        <input type="hidden" id="course_amount_${course.id}" value="${course.discount_fees}">
                        <input type="radio" id="fullPayment_${course.id}" name="paymentType_${course.id}" value="full" class="mr-2">
                        <label for="fullPayment_${course.id}">Full Payment</label>
                        <input type="radio" id="partialPayment_${course.id}" name="paymentType_${course.id}" value="partial" class="ml-4 mr-2">
                        <label for="partialPayment_${course.id}">Partial Payment</label>
                    </div>
                </div>
            </div>
            <div class="px-6 pt-4 pb-2">
                <button id="submitPayment_${course.id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit Payment
                </button>
            </div>`;
                            } else {

                                paymentSection = `
            <div class="px-6 pt-4 pb-2">
                <h2 class="text-lg font-semibold mb-2">Payment Records:</h2>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Date of Payment</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${course.payments.map(payment => `
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">${payment.fees}</td>
                                        <td class="border border-gray-300 px-4 py-2">${payment.date_of_payment}</td>
                                        <td class="border border-gray-300 px-4 py-2">${payment.status === 1 ? 'Paid' :
                                    `<button id="markPaid_${payment.id}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mark as Paid</button>`}</td>
                                    </tr>
                                `).join('')}
                    </tbody>
                </table>
            </div>`;
                            }

                            return `
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">${course.name}</div>
                <p class="text-gray-700 text-base">${course.description}</p>
            </div>
            ${paymentSection}
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
        });

        // Js for opening payment selection
    </script>
@endsection
