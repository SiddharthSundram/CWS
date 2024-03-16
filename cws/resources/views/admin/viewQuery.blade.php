@extends('admin.base')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">View Query</h1>
    <div class="overflow-x-auto">
        <div class="shadow-md rounded-lg overflow-hidden">
            <div class="table-responsive">
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
                            <td class="border-b border-gray-200 px-4 py-2 text-sm" id="querymobile_no"></td>
                            <td class="border-b border-gray-200 px-4 py-2 text-sm md:max-w-md overflow-auto" id="querymessage"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                        console.log(response.data);
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
