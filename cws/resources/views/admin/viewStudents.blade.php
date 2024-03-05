@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-12">
        <h2 class="text-2xl font-bold">View Student</h2>
    </div>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <tbody class="bg-gray-100" id="studentDetails">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
        <div class="flex mt-4 justify-center">
            <button type="button" id="approveButton"
                class='bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 mx-3 rounded'>Approve Now</button>
            <button type="button"
                class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 mx-3 rounded'>Edit</button>
            <button type="button"
                class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-5 mx-3 rounded'>Delete</button>
        </div>
    </div>

    {{-- Javascript  Form  for approving student --}}
    <div class="flex justify-center mt-2">
        <div id="formContainer" class="hidden bg-white p-12 rounded-lg shadow-md">
            <form id="approvalForm" class="space-y-4">
                <div>
                    <label for="course" class="block font-medium">Select Course</label>
                    <select id="callingCourses" name="course" class="form-select block w-full" required>

                    </select>
                </div>
                <div>
                    <label for="fees" class="block font-medium">Fees</label>
                    <input type="number" id="fees" name="fees" class="form-input  block w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
            </form>
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
                    $("#studentDetails").html(details);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        document.getElementById("approveButton").addEventListener("click", function() {
            document.getElementById("formContainer").classList.toggle("hidden");
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
                select.append(`
                    <option value="${course.id}" data-fees="${course.discount_fees}" >${course.name}</option>
                `);
                });
            }
        });

        $("#callingCourses").change(function() {
            const selectedOption = $(this).find("option:selected");
            const fees = selectedOption.data("fees");
            $("#fees").val(fees);
        });


        // Student Course Approval Work

        $('#approvalForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/admin/student-course',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Display success message with SweetAlert
                swal("Student Successfully Approved!", "", "success");
                // Reset the form
                $("#approvalForm").trigger("reset")
                        window.open("/admin/student/manage", "_self")
            },
            error: function(xhr, status, error) {
                alert(JSON.parse(xhr.responseText).message);
            }
            });
        });
    </script>
@endsection
