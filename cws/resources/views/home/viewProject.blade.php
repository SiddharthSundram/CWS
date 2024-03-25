@extends('home.layout')
@section('title')
    CWS | View-Project
@endsection

@section('content')
    <div class="container mx-auto py-12 h-screen">
        <h1 class="text-3xl font-medium mb-8">All Projects</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3 p-2" id="callingrecentProject">
            <!-- Project Card 1 -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function callingrecentProject() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('recent_project.index') }}",
                    success: function(response) {

                        let container = $("#callingrecentProject");
                        container.empty();

                        let data = response.data;

                        data.forEach((project) => {
                            container.append(`                     
                            <div class="project-card bg-white shadow-sm rounded-lg border border-b  overflow-hidden ">
                                <div class="p-6">
                                    <h2 class="text-xl text-gray-800 font-semibold mb-2">Project Name: <span class='text-blue-500'>${project.name}</span></h2>
                                    <p class="text-gray-700 leading-relaxed"> About Project :  ${project.description}</p>
                                </div>
                                <div class="flex itmes-end justify-end p-6  "> 
                                    <a href="${project.url}" target="_blank" class="bottom-0 right-0  view-button inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300">View Project</a>
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
            callingrecentProject();
        });
    </script>
@endsection
