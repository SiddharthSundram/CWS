@extends('admin.base')

@section('content')
<div class="flex justify-between items-center mt-14">
    <h2 class="text-2xl font-bold">Manage Students (<span id="counting">0</span>)</h2>
    <a href="{{ route('insertStudent') }}" class="bg-teal-600 text-white px-3 py-2 rounded "> <i class="fas fa-plus"></i> Add New Student</a>
</div>
<div class="overflow-x-auto mt-6">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border-b border-gray-200 px-4 py-2">Id</th>
                <th class="border-b border-gray-200 px-4 py-2">Name</th>
                <th class="border-b border-gray-200 px-4 py-2">Email</th>
                <th class="border-b border-gray-200 px-4 py-2">Contact No.</th>
                <th class="border-b border-gray-200 px-4 py-2">Admission Date</th>
                <th class="border-b border-gray-200 px-4 py-2"></th>
                <th class="border-b border-gray-200 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody id="callingStudent">
            <!-- Table rows will be dynamically added here -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        let callingStudent = () => {
            $.ajax({
                type: "get",
                url: "{{route('manage-student.index')}}",
                success: function(response) {
                    let table = $("#callingStudent");
                    table.empty();
                    let data = response.data;
                    //counting students
                    let len = data.length;
                    $("#counting").html(len);

                    data.forEach((student) => {
                        table.append(`
                            <tr>
                                <td class="border-b border-gray-200 px-4 py-2">${student.id}</td> 
                                <td class="border-b border-gray-200 px-4 py-2">${student.name}</td>
                                <td class="border-b border-gray-200 px-4 py-2">${student.email}</td> 
                                <td class="border-b border-gray-200 px-4 py-2">${student.mobile_no}</td>     
                                <td class="border-b border-gray-200 px-4 py-2">${student.created_at}</td>     
                                <td class="border-b border-gray-200 px-4 py-2"></td>     
                                <td class="border-b border-gray-200 px-4 py-2">
                                    <button type="button" class="btn btn-info edit-btn" data-id="${student.id}">Edit</button>
                                </td>
                            </tr>
                        `);

                    });
                

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        };
        callingStudent();
    });
</script>
@endsection
