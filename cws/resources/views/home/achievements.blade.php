@extends('home.layout')

@section('content')

<div class="container mx-auto py-8 mt-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="w-full" id="callingHallframe">
            {{-- <div id="callingHallframe" class="flex flex-col items-center justify-center text-center dark:border-slate-800 border shadow rounded-sm">
                <!-- Content will be dynamically loaded here -->
            </div> --}}
        </div>
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
                            <div class="flex md:flex-row items-center justify-center md:justify-start w-full md:w-auto border-b border-gray-200 dark:border-slate-600 py-4 px-6">
                                <img alt="team" class="md:w-32 md:h-32 object-center object-cover mb-4 md:mb-0 w-full" src="/image/${hallFrame.featured_image}">
                                <div class="md:pl-8">
                                    <h2 class="font-medium text-lg text-gray-900 dark:text-white">${hallFrame.name}</h2>
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
