@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-14">
        <h2 class="text-2xl font-bold">View Student</h2>
    </div>
    <div class="overflow-x-auto mt-6">
        <table id="studentDetails" class="min-w-full bg-white border border-gray-200">
            <tbody class="bg-gray-100">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                    type: "get",
                    url: `/api/admin/student/view/{{request()->segment(4)}}`,
                    success: function (student) {
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
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

            
        });
    </script>

@endsection
