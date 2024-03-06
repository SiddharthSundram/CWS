@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-14">
        <h2 class="text-2xl font-bold">Manage Students (<span id="counting">0</span>)</h2>

        <div class="p-4">
            <form id="searchForm" class="flex items-center">
                <input type="text" name="query"
                    class="border rounded-l py-2 px-4 w-64 focus:outline-none focus:ring focus:border-blue-300">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-r"
                    id="searchInput">Search</button>
            </form>

            <div id="userList" class="mt-4">
                <!-- Results will be displayed here -->
            </div>
        </div>



        <a href="{{ route('insertStudent') }}" class="bg-teal-600 text-white px-3 py-2 rounded "> <i
                class="fas fa-plus"></i> Add New Student</a>
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

            $("#searchForm").submit(function(e) {
                e.preventDefault();
                var query = $('#searchInput').val();
                let search_id = "{{ request()->segment(2) }}";
                $.ajax({
                    url: `/api/search/${search_id}`,
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(response) {
                        $('#userList').text(response.data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            });


            let callingStudent = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('manage-student') }}",
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
                                    <button type='button' class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded delete-btn' data-id='${student.id}'>X</button>
                                    <button type='button' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded edit-btn' data-id='${student.id}'>Edit</button>
                                    <a href='/admin/student/view/${student.id}' class='bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded edit-btn'>View</a>
                                    <a href='/admin/student/view/${student.id}' class='bg-orange-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded edit-btn'>Status</a>
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
