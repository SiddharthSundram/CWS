@extends('admin.base')
@section('title')
<title>@yield('title') Admin | View Query</title>
@endsection

@section('content')
    <div class="container mx-auto my-10 px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">View Query</h1>
            <a href="{{route('manageQuery')}}" class="text-blue-500 hover:text-blue-700 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i> Go back
            </a>
        </div>
        <div class="overflow-x-auto">
            <div class="shadow-md rounded-lg">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border-b border-gray-200 px-4 py-2 text-sm font-semibold">Id</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-sm font-semibold">Name</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-sm font-semibold">Email</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-sm font-semibold">Contact No.</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-sm font-semibold">Message</th>
                        </tr>
                    </thead>
                    <tbody id="callingMessage">
                        <tr>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm" id="queryId"></td>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm" id="queryname"></td>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm" id="queryemail"></td>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm overflow-x-auto" id="querymobile_no"></td>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm overflow-x-auto" id="querymessage"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script>
        $(document).ready(function() {
            // Function to fetch all messages
            let fetchMessages = () => {
                $.ajax({
                    url: `/api/contact/{{ request()->segment(4) }}`,
                    type: "GET",
                    success: function(response) {
                        $("#queryId").text(response.data.id);
                        $("#queryname").text(response.data.name);
                        $("#queryemail").text(response.data.email);
                        $("#querymobile_no").text(response.data.mobile_no);
                        $("#querymessage").text(response.data.message);

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            };

            // Initial load of messages
            fetchMessages();
        });
    </script>
@endsection
