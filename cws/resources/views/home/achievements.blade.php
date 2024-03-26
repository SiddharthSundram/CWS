@extends('home.layout')
@section('title')
    CWS Achievements | 
@endsection

@section('content')
    <div class="container mx-auto py-8 mt-3">
        <h2 class="text-3xl font-medium mb-3 ">Our Achievements</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b border-gray-200  py-4 px-6" id="callingHallframe">

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function callingHallframe() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('hallFrame.index') }}",
                    success: function(response) {
                        let container = $("#callingHallframe");
                        container.empty();

                        let data = response.data;

                        data.forEach((hallFrame) => {
                            container.append(`
                                <div class="flex items-center justify-center md:justify-start w-full border border-gray-200 flex-col md:flex-row ">
                                    <img alt="team" class="md:w-32 md:h-32 object-center object-cover mb-4 md:mb-0 w-full" src="/image/${hallFrame.featured_image}">
                                    <div class="md:pl-8">
                                        <h2 class="font-medium text-lg text-gray-900 ">${hallFrame.name}</h2>
                                        <h3 class="text-gray-500 mb-1">${hallFrame.position}</h3>
                                        <p class="font-semibold text-sm mb-2">Placed at <span class="text-blue-800">${hallFrame.industry}</span></p>
                                        <p class="text-xs">${hallFrame.description}</p>
                                    </div>
                                </div>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            callingHallframe();
        });
    </script>
@endsection
