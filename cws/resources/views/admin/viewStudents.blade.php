@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-12">
        <h2 class="text-2xl font-bold">View Student</h2>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <tbody class="bg-gray-100" id="studentDetails">
                <!-- Student details will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center mt-12">
        <h2 class="text-2xl font-bold">Courses</h2>
    </div>
    <div class="overflow-x-auto mt-4" id="courseDetails">
        <!-- Course cards will be dynamically added here -->
    </div>
    <div class="flex mt-4 justify-center">


        <div class="text-center">
            <button class='bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 mx-3 rounded' type="button"
                data-drawer-target="drawer-bottom-example" data-drawer-show="drawer-bottom-example"
                data-drawer-placement="bottom" aria-controls="drawer-bottom-example">
                Add Course
            </button>
            {{-- <button class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 mb-4 mr-4 rounded float-right' id="payNow" type="button" >Pay Now</button> --}}
        </div>

        <!-- drawer component -->
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
            <button type="button" data-drawer-hide="drawer-bottom-example" aria-controls="drawer-bottom-example"
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
        <button type="button"
            class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 mx-3 rounded'>Edit</button>
        <button type="button"
            class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-5 mx-3 rounded delete-btn'>Delete</button>
    </div>
    </div>


    <div id="paymentOption"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-md z-50 hidden">
        <div class="flex justify-end">
            <button id="closeModal" class="text-gray-500 hover:text-gray-800 text-xl">&times;</button>
        </div>
        <h1 class="text-2xl font-bold mb-4">Payment Options</h1>
        <div class="mb-4">
            <input type="radio" id="fullPayment" name="paymentType" value="full" class="mr-2">
            <label for="fullPayment">Full Payment</label>
        </div>
        <div class="mb-4">
            <input type="radio" id="partialPayment" name="paymentType"onclick="toggleDropdown('dropdown1')" value="partial" class="mr-2">
            <label for="partialPayment">Partial Payment</label>

            <!-- Dropdown Menu -->
            <div>

                <select name="" id="dropdown1" class="hidden relative mt-3 ml-5 ">
                <option class=" text-black px-4 py-2 rounded shadow"
                    onclick="selectOption('option1')">Select Payment Option</option>
                <option class=" text-black px-4 py-2 rounded shadow"
                    onclick="selectOption('option2')">Select Option 2</option>
                <option class=" text-black px-4 py-2 rounded shadow"
                    onclick="selectOption('option3')">Select Option 3</option>
                <option class=" text-black px-4 py-2 rounded shadow"
                    onclick="selectOption('option4')">Select Option 4</option>
                </select>
            </div>

        </div>


        <button id="submitPayment" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Submit Payment Now
        </button>
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
                </tr>
            `;

                    let courses = student.courses.map(course => {
                        return `
                        
                    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-4 my-4">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">${course.name}</div>
                            <p class="text-gray-700 text-base">${course.description}</p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">${course.discount_fees}</span>
                        </div>
                        <button class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 mb-4 mr-4 rounded float-right' id="payNow" onclick='payNow()' type="button" >Pay Now</button>
                    </div>
                `;
                    }).join('');

                    $("#studentDetails").html(details);
                    $("#courseDetails").html(courses);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
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
                select.append(`<option value="">Select a course</option>`); // Add this line outside the loop
                response.data.forEach((course) => {
                    select.append(`<option value=''>Select a course </option> 
                        <option value = "${course.id}" data-fees="${course.discount_fees}"> 
                            ${course.name} </option>`);
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

        // Js for opening payment selection

        function payNow() {
            paymentModal.classList.remove('hidden');

        }

        const closeModalBtn = document.getElementById('closeModal');
        const paymentModal = document.getElementById('paymentOption');

        closeModalBtn.addEventListener('click', () => {
            paymentModal.classList.add('hidden');
        });

        const submitPaymentBtn = document.getElementById('submitPayment');
        const fullPaymentRadio = document.getElementById('fullPayment');
        const partialPaymentRadio = document.getElementById('partialPayment');

        submitPaymentBtn.addEventListener('click', () => {
            if (fullPaymentRadio.checked) {
                alert('Processing Full Payment');
            } else if (partialPaymentRadio.checked) {
                alert('Processing Partial Payment');
            } else {
                alert('Please select a payment option');
            }
        });

        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }

        function selectOption(option) {
            alert('Selected ' + option);
        }
    </script>
@endsection
