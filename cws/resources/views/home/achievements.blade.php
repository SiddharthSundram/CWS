@extends('home.layout')

@section('content')
<div class="bg-gray-200 p-3">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Achievements</h1>

        <div id="callingHallframe" class="flex flex-wrap justify-center">
            <!-- Achievement Card -->
            {{-- <div class="w-1/2 px-2 mb-4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Student 1" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">John Doe</h2>
                        <p class="text-sm text-gray-600">Software Engineer at XYZ Tech</p>
                        <p class="text-sm text-gray-600">Graduated in 2022</p>
                        <p class="text-sm text-gray-600 mt-2">John is a highly skilled software engineer with expertise in
                            various programming languages and frameworks. He has contributed significantly to several
                            projects at XYZ Tech.</p>
                    </div>
                </div>
            </div> --}}
            <!-- End of Achievement Card -->

            <!-- Add more achievement cards as needed -->

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

                            <div class="bg-white rounded-lg shadow-md overflow-hidden w-72 m-4">
                                <img src="/image/${hallFrame.featured_image}" alt="Student 1" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold">${hallFrame.name}</h2>
                                    <p class="text text-gray-600">Position: ${hallFrame.position}</p>
                                    <p class="text text-gray-600">Industry: ${hallFrame.industry}</p>
                                    <p class="text text-gray-600 mt-2">${hallFrame.description}</p>
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