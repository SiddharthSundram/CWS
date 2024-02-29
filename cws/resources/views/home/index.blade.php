@extends('home.layout')

@section('content')
    <!-- Your existing content here -->
    <div class="bg-gradient-to-br from-pink-600 to-purple-400 py-16 px-4 text-center text-white">
        <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="md:w-1/2 md:pr-8 mb-4 md:mb-0 ">
                <h1 class="text-4xl font-bold mb-4">Code with Sadiq</h1>
                <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis magna nec
                    turpis tincidunt suscipit.
                    Phasellus a magna dapibus, feugiat urna vitae, consectetur mi.</p>
                <a href="#"
                    class="bg-white text-blue-900 hover:bg-blue-800 hover:text-white px-6 py-3 rounded-full font-semibold transition duration-300">Learn
                    More</a>
            </div>
            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 ">
                <img src="/images/banner.png" alt="Sadiq" class="w-96 md:mx-0 rounded-lg ">
            </div>
        </div>


        <div class="container mx-auto py-8">
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 p-5">
                <div class="md:col-span-1 bg-white rounded-lg p-6 shadow-md">
                    <h2 class="text-2xl font-bold mb-4">About Us</h2>
                    <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis magna nec
                        turpis tincidunt suscipit.
                        Phasellus a magna dapibus, feugiat urna vitae, consectetur mi.</p>
                </div>
                <div class="md:col-span-1 bg-white rounded-lg p-6 shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Recent Projects</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-gray-200 p-4 rounded-md shadow-md hover:bg-gray-300 transition duration-300">
                            <h3 class="text-xl font-semibold mb-2">Project 1</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md shadow-md hover:bg-gray-300 transition duration-300">
                            <h3 class="text-xl font-semibold mb-2">Project 2</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md shadow-md hover:bg-gray-300 transition duration-300">
                            <h3 class="text-xl font-semibold mb-2">Project 3</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container mx-auto my-8 p-5">
                <h2 class="text-3xl font-bold mb-6">Our Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    <!-- Course Card Start -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <div class="relative">
                            <img src="https://via.placeholder.com/400" alt="Course" class="w-full h-56 object-cover">
                            <span
                                class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-semibold">New</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Course Name</h3>
                            <div class="flex items-center text-gray-600 mb-2">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="/images/logo.png">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <p>Instructor: John Doe</p>
                            </div>
                            <div class="flex items-center text-gray-600 mb-2">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <p>Duration: 6 weeks</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xl font-semibold text-gray-900">$200 <span
                                            class="text-sm text-gray-600 line-through ml-2">$300</span></p>
                                    <p class="text-green-500 font-semibold">20% off</p>
                                </div>
                                <div>
                                    <a href="#"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">Explore</a>
                                    <a href="#"
                                        class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded ml-2">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Course Card End -->


                    <!-- Add more course cards as needed -->
                </div>
            </div>
        </div>
    </div>
@endsection
