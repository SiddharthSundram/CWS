@extends('home.layout')

@section('content')
    <!-- Your existing content here -->
    <div class="bg-gradient-to-br from-cyan-400 to-purple-400 py-16 px-4 text-center text-white">
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
                    <div class="grid grid-cols-1 gap-4" id="recentProjects">
                        <!-- Recent projects will be dynamically loaded here -->
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

            <div class="container mx-auto py-8">
                <h2 class="text-4xl font-semibold mb-4">Our Student in Industries</h2>
                <div class="carousel relative overflow-hidden">
                    <div class="carousel-inner flex" id="callingHallframe">
                        {{-- Stuudents will be dynamically loaded here --}}
                    </div>
                    <button
                        class="absolute top-1/2 transform -translate-y-1/2 left-0 bg-gray-500 text-white px-4 py-2 rounded-l-md carousel-prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button
                        class="absolute top-1/2 transform -translate-y-1/2 right-0 bg-gray-500 text-white px-4 py-2 rounded-r-md carousel-next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="container mx-auto my-8 p-5">
                <h2 class="text-4xl font-bold mb-6">Our Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="callingcourse">
                    <!-- Courses will be dynamically loaded here -->
                </div>
            </div>

        </div>
    </div>
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
                            <div class="bg-white rounded-lg overflow-hidden shadow-md transition duration-300 transform hover:scale-105 hover:bg-gray-50 hover:shadow-lg">
                                <div class="relative">
                                    <img src="/image/${course.featured_image}" alt="Course" class="w-full h-56 object-cover">
                                    <span class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-semibold">New</span>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <div>
                                            <h3 class="text-xl text-gray-700 font-semibold mb-2">Course : <span class="text-orange-600"> ${course.name}</span></h3>
                                        </div>
                                        <div>
                                            <span class="inline-flex  rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-950 ring-1 ring-inset ring-green-600/20">${course.category ? course.category.cat_title : 'N/A'}</span>
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
                                            <a href="/explore-course/${course.id}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Explore</a>
                                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded ml-2 transition duration-300">Enroll</a>
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

            $(document).ready(function() {
                // Function to fetch and render hallFrame data
                function callingHallframe() {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('hallFrame.index') }}",
                        success: function(response) {
                            let table = $("#callingHallframe");
                            table.empty(); // Clear existing table data

                            let data = response.data;

                            data.forEach((hallFrame) => {
                                // Append each hallFrame data to the table
                                table.append(`
                                <div class="carousel-item flex-none w-full md:w-1/2 lg:w-1/4 px-4"> <!-- Adjusted lg:w-1/4 -->
                                    <div class="bg-white rounded-lg shadow-md p-6 transition duration-300 transform hover:scale-105"> <!-- Increased padding -->
                                        <img src="/image/${hallFrame.featured_image}" alt="John Doe" class="w-full h-48 object-cover mb-4"> <!-- Increased height -->
                                        <h2 class="text-xl text-gray-700 font-semibold mb-2">${hallFrame.name}</h2>
                                        <p class="text-gray-600">Industry: ${hallFrame.industry}</p>
                                        <p class="text-gray-600">Position: ${hallFrame.position}</p>                                    
                                    </div>
                                </div>

                            `);
                            });

                            // Initialize the carousel after loading student data
                            initCarousel();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }

                // Call the function to initially populate the table
                callingHallframe();

                // Function to initialize carousel
                function initCarousel() {
                    const carouselInner = document.querySelector('.carousel-inner');
                    const carouselItems = document.querySelectorAll('.carousel-item');
                    const totalItems = carouselItems.length;
                    let currentIndex = 0;
                    let intervalId;

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

                    function startCarousel() {
                        intervalId = setInterval(moveToNext, 3000);
                    }

                    function pauseCarousel() {
                        clearInterval(intervalId);
                    }

                    // Start automatic sliding
                    startCarousel();

                    // Pause on hover
                    carouselInner.addEventListener('mouseenter', pauseCarousel);
                    carouselInner.addEventListener('mouseleave', startCarousel);

                    // Bind click events to toggle buttons
                    const prevButton = document.querySelector('.carousel-prev');
                    const nextButton = document.querySelector('.carousel-next');

                    prevButton.addEventListener('click', moveToPrev);
                    nextButton.addEventListener('click', moveToNext);
                }
            });

        });
    </script>
@endsection
