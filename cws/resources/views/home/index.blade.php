@extends('home.layout')

@section('content')
    <!-- Your existing content here -->
    <div class="bg-gradient-to-br from-cyan-400 via-purple-400 to-cyan-400 py-16 px-4 text-center text-white">
        <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="md:w-1/2 md:pr-8 mb-4 md:mb-0 ">
                <h1 class="text-4xl font-bold mb-4">Code with Sadiq</h1>
                <p class="text-lg mb-8">Where coding brilliance meets expert guidance. From novice to expert, our platform
                    offers personalized coaching and comprehensive courses to elevate your coding skills. Join a vibrant
                    community and unlock your coding potential today.</p>
                <a href="#"
                    class="bg-white text-gray-900 hover:bg-gray-800 hover:text-white px-6 py-3 rounded-full font-semibold transition duration-300">Join
                    now</a>
            </div>
            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 ">
                <img src="/images/banner.png" alt="Sadiq" class="w-96 md:mx-0 rounded-lg ">
            </div>
        </div>


        <div class="container mx-auto py-8">
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700 p-5">
                <div class="md:col-span-1 bg-white rounded-lg p-6 shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text">About Us</h2>
                    <p class="text-lg">Discover the pinnacle of coding education at Code with Sadiq. Our platform blends
                        expert guidance with cutting-edge curriculum to propel your programming journey. From novice to
                        virtuoso, our meticulously crafted courses cater to every skill level. Engage with a dynamic
                        community of learners and seasoned instructors, fostering an environment of collaboration and
                        growth. Whether unraveling the complexities of algorithms or mastering data structures, unlock your
                        full potential with personalized coaching and comprehensive resources. Join us and embark on a
                        transformative coding odyssey, where innovation meets mentorship, and aspirations become
                        achievements. Elevate your coding prowess with Code with Sadiq today.</p>
                </div>
                <div class="md:col-span-1 bg-white rounded-lg p-6 shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Recent Projects</h2>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($recent_projects as $item)
                            <div class="bg-gray-200 p-4 rounded-md shadow-md hover:bg-gray-300 transition duration-300">
                                <h3 class="text-xl font-semibold mb-2">{{ $item->name }}</h3>
                                <p>{{ $item->description }}</p>
                                <div class="flex justify-end mt-4">
                                    <a href="#"
                                        class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300">View</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </section>

            <div class="max-w-7xl mx-auto px-4 py-8">
                <h2 class="text-4xl  font-semibold mb-4">Student in Industries</h2>
                <div class="carousel relative overflow-hidden">

                    <div class="carousel-inner flex">

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="John Doe"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">Siddharth</h2>
                                <p class="text-gray-600">Industry: Tech</p>
                                <p class="text-gray-600">Position: Software Engineer</p>
                            </div>
                        </div>


                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="Jane Smith"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">Jane Smith</h2>
                                <p class="text-gray-600">Industry: Siddharth</p>
                                <p class="text-gray-600">Position: Financial Analyst</p>
                            </div>
                        </div>

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="John Doe"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">Siddharth</h2>
                                <p class="text-gray-600">Industry: Tech</p>
                                <p class="text-gray-600">Position: Software Engineer</p>
                            </div>
                        </div>

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="Jane Smith"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">RIshav</h2>
                                <p class="text-gray-600">Industry: Siddharth</p>
                                <p class="text-gray-600">Position: Financial Analyst</p>
                            </div>
                        </div>

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="Jane Smith"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">Saurav</h2>
                                <p class="text-gray-600">Industry: RIshav</p>
                                <p class="text-gray-600">Position: Financial Analyst</p>
                            </div>
                        </div>

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="Jane Smith"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">ROni</h2>
                                <p class="text-gray-600">Industry: saurav</p>
                                <p class="text-gray-600">Position: Financial Analyst</p>
                            </div>
                        </div>

                        <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/5 px-4">
                            <div
                                class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105">
                                <img src="https://via.placeholder.com/150" alt="Jane Smith"
                                    class="w-full h-32 object-cover mb-4">
                                <h2 class="text-xl text-gray-700 font-semibold mb-2">Siddharthth</h2>
                                <p class="text-gray-600">Industry: Finance</p>
                                <p class="text-gray-600">Position: Financial Analyst</p>
                            </div>
                        </div>


                        <!-- Add more students here -->
                    </div>
                    <button
                        class="absolute top-1/2 transform -translate-y-1/2 left-0 bg-gray-500 text-white px-4 py-2 rounded-l-md"
                        onclick="moveToPrev()"><i class="fas fa-chevron-left"></i></button>
                    <button
                        class="absolute top-1/2 transform -translate-y-1/2 right-0 bg-gray-500 text-white px-4 py-2 rounded-r-md"
                        onclick="moveToNext()"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>




            <div class="container mx-auto my-8 p-5">
                <h2 class="text-4xl font-bold mb-6">Our Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="callingcourse">


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


    <script>
        const carouselInner = document.querySelector('.carousel-inner');
        const carouselItems = document.querySelectorAll('.carousel-item');
        const totalItems = carouselItems.length;
        let currentIndex = 0;

        function moveToNext() {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        }

        function moveToPrev() {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateCarousel();
        }

        function updateCarousel() {
            const offset = -currentIndex * carouselItems[0].offsetWidth;
            carouselInner.style.transform = `translateX(${offset}px)`;
        }

        setInterval(moveToNext, 3000);
    </script>


    <script>
        $(document).ready(function() {
            let callingcourse = () => {
                $.ajax({
                    type: "get",
                    url: "{{ route('course.index') }}",
                    success: function(response) {
                        let table = $("#callingcourse");
                        table.empty();
                        let data = response.data;
                        //counting courses
                        let len = data.length;
                        $("#counting").html(len)

                        data.forEach((course) => {
                            table.append(`
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    <img src="/image/${course.featured_image}" alt="Course" class="w-full h-56 object-cover">
                                    <span class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-semibold">New</span>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <div>
                                            <h3 class="text-xl text-gray-700 font-semibold mb-2">Course Name : <span class="text-orange-600"> ${course.name}</span></h3>
                                        </div>
                                        <div>
                                            <span class="inline-flex rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">${course.category ? course.category.cat_title : 'N/A'}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center text-gray-600 mb-2">
                                        <p>Instructor: ${course.instructor}</p>
                                    </div>
                                    <div class="flex items-center text-gray-600 mb-2">
                                        <p>Duration: ${course.duration}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-xl font-semibold text-gray-900">₹${course.fees} <span class="text-sm text-gray-600 line-through ml-2">₹${course.discount_fees}</span></p>
                                            <p class="text-green-500 font-semibold">20% off</p>
                                        </div>
                                        <div>
                                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">Explore</a>
                                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded ml-2">Enroll</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        `);

                        });
                    }
                });
            }

            callingcourse();
        });
    </script>
@endsection
