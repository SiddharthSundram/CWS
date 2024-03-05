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
            class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-5 mx-3 rounded'>Delete</button>
    </div>
    </div>



    <script>
        $(document).ready(function() {
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
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">${course.fees}</span>
                        </div>
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
    </script>
@endsection
