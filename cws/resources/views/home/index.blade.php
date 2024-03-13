@extends('home.layout')

@section('content')
    <!-- Your existing content here -->
    <div class=" px-4 text-center text-gray-800">
        <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="md:w-1/2 md:pr-8 text-left mb-4 md:mb-0 ">
                <div class="flex flex-col md:flex-row text-center md:text-left ">
                    <h1 class="text-3xl font-bold">Upskilling Made </h1>
                    <span id="autoText" class="text-3xl font-bold text-orange-500 ml-3">Upskilling Made </span>
                </div>
                <p class="text-lg mb-8">Where coding brilliance meets expert guidance. From novice to expert, our platform
                    offers personalized coaching and comprehensive courses to elevate your coding skills. Join a vibrant
                    community and unlock your coding potential today.</p>

                <a href="{{ route('allCourses') }}"
                    class="inline-block w-full md:w-44 text-center text-black border border-black px-4 py-2 rounded hover:bg-gray-300 hover:text-balck 
                        transition duration-300 ease-in-out">Explore
                    Courses</a>
            </div>

            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 " id="imageContainer">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

                <dotlottie-player src="https://lottie.host/b1cdc270-cb11-43d1-98bb-70908a25bee3/8yR9uwNh8b.json"
                    background="transparent" speed="1" class="w-full h-100" loop autoplay></dotlottie-player>
            </div>
        </div>


        <div class="container mx-auto mt-5 md:mt-0">
            <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-8 p-0 md:p-5 text-gray-700 ">
                <div class="md:col-span-1 bg-white rounded-lg  ">
                    <h2 class="text-2xl font-bold mb-1 md:mb-4 text">About Us</h2>
                    <p class="text-lg text-left">Discover the pinnacle of coding education at Code with Sadiq. Our platform
                        blends
                        expert guidance with cutting-edge curriculum to propel your programming journey. From novice to
                        virtuoso, our meticulously crafted courses cater to every skill level. Engage with a dynamic
                        community of learners and seasoned instructors, fostering an environment of collaboration and
                        growth. Whether unraveling the complexities of algorithms or mastering data structures, unlock your
                        full potential with personalized coaching and comprehensive resources. Join us and embark on a
                        transformative coding odyssey, where innovation meets mentorship, and aspirations become
                        achievements. Elevate your coding prowess with Code with Sadiq today.</p>
                </div>
                <div class="md:col-span-1 bg-white rounded-lg ">
                    <h2 class="text-2xl font-bold mb-4">Recent Projects</h2>


                    <div class="grid grid-cols-1  gap-4" id="recentProjects">
                        <!-- Recent projects will be dynamically loaded here -->

                    </div>

                    <div class="mt-4 flex items-center justify-center">
                        <div id="pagination" class="">
                            <!-- Pagination links will be inserted here -->
                        </div>
                    </div>
                    <div class="mt-5 flex justify-end ">
                        <a href="{{ route('view_project') }}"
                            class="p-2 text-black flex items-center gap-2 hover:bg-gray-300 border  rounded border-black transition duration-300">View
                            all projects
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900">
                                <path fill="currentColor"
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                        </a>
                    </div>

                </div>
            </section>


            <div class="container mx-auto py-8">
                <h2 class="text-4xl font-medium mb-4">Our Student in Industries</h2>
                <div class="carousel relative overflow-hidden">
                    <div class="carousel-inner flex p-3" id="callingHallframe">
                        {{-- Students will be dynamically loaded here --}}

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
                <h2 class="text-4xl font-medium mb-6">Our Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3" id="callingcourse">
                    <!-- Courses will be dynamically loaded here -->
                </div>
            </div>

        </div>
    </div>
    <script>
        var words = ["EASY", "AFFORDABLE", "PRACTICAL"];
        var output = document.getElementById("autoText");
        var currentIndex = 0;

        function writeWord(word) {
            var i = 0;
            var interval = setInterval(function() {
                output.textContent = "<" + word.slice(0, i) + ">";
                i++;
                if (i > word.length) {
                    clearInterval(interval);
                    setTimeout(function() {
                        deleteWord(word);
                    }, 2000);
                }
            }, 200);
        }

        function deleteWord(word) {
            var i = word.length;
            var interval = setInterval(function() {
                output.textContent = "<" + word.slice(0, i) + ">";
                i--;
                if (i < 0) {
                    clearInterval(interval);
                    setTimeout(clearOutput, 100);
                }
            }, 100);
        }

        function clearOutput() {
            output.textContent = "<>";
            currentIndex = (currentIndex + 1) % words
                .length;
            setTimeout(function() {
                writeWord(words[currentIndex]);
            }, 50);
        }

        writeWord(words[currentIndex]);


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
                        <div class="bg-white rounded-lg overflow-hidden  shadow-md transition duration-300 transform hover:scale-105 hover:bg-gray-50 hover:shadow-lg">
                            <div class="relative">
                                <img src="/image/${course.featured_image}" alt="Course" class="w-full h-56 object-cover">
                                <span class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-full text-xs font-semibold">New</span>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h3 class="text-xl text-gray-700 font-semibold mb-2">Course : <span class="text-orange-600">${course.name}</span></h3>
                                    </div>
                                    <div>
                                        <span class="inline-flex rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-950 ring-1 ring-inset ring-green-600/20">${course.category ? course.category.cat_title : 'N/A'}</span>
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
                                        <a href="/explore-course/${course.id}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded transition duration-300">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                        });
                    }
                });
            }

            // Call the function to initially populate the course table
            callingcourse();

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
                            <div class="carousel-item flex-none w-full p-1 md:w-1/5 lg:w-1/5 "> 
                                <div class="bg-white rounded-lg hover:shadow-md  transition duration-300 transform hover:scale-105 border border-b"> 
                                    <img src="/image/${hallFrame.featured_image}" alt="" class="w-full h-48 object-cover mb-2"> 
                                    <h2 class="text-xl text-gray-700 font-semibold mb-2">${hallFrame.name}</h2>
                                    <p class="text-gray-600">Industry: ${hallFrame.industry}</p>
                                    <p class="text-gray-600 mb-2">Position: ${hallFrame.position}</p>                                    
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

            // Call the function to initially populate the hallFrame table
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


            // Function to display recent projects
            function displayProjects(data) {
                let table = $("#recentProjects");
                table.empty();
                data.forEach((project) => {
                    table.append(`
                        <div class="project-item p-2 rounded border hover:border-b hover:shadow hover:bg-gray-50 transition duration-300">
                            <h3 class="text-xl text-start font-semibold mb-2">${project.name}</h3>
                            <p class='truncate text-start'>${project.description}</p>
                            
                            <div class="flex justify-between items-center mt-4">
                                <p class='text-start'>Developed by -${project.description}</p>
                                <a href="${project.url}" target="_blank" class="view-button inline-block px-2 py-1  text-black rounded-md border border-black hover:bg-gray-300 transition duration-300">View</a>
                            </div>
                        </div>
        `);
                });
            }

            // Functionality for fetching projects, pagination, and search
            $(document).ready(function() {
                // Function to fetch projects
                let fetchProjects = (query = '', page = 1) => {
                    $.ajax({
                        url: "{{ route('manage_Recent_project') }}",
                        type: "GET",
                        data: {
                            'query': query,
                            'page': page
                        },
                        success: function(response) {
                            let data = response.data;
                            displayProjects(data);

                            // Update pagination links
                            let paginationLinks = '';
                            if (response.prev_page_url) {
                                paginationLinks +=
                                    '<a href="#" class="pagination-link px-3 py-1 bg-gray-200 text-gray-800 mx-1 rounded" data-page="' +
                                    (response.current_page - 1) + '">' + (response
                                        .current_page - 1) + '</a>';
                            }
                            paginationLinks +=
                                '<span class="px-3 py-1 bg-gray-500 text-white mx-1 rounded">' +
                                response.current_page + '</span>';
                            if (response.next_page_url) {
                                paginationLinks +=
                                    '<a href="#" class="pagination-link px-3 py-1 bg-gray-200 text-gray-800 mx-1 rounded" data-page="' +
                                    (response.current_page + 1) + '">' + (response
                                        .current_page + 1) + '</a>';
                            }
                            $('#pagination').html(paginationLinks);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                };

                // Initial load of projects
                fetchProjects();

                // Search input event handler
                $("#searchInput").on("input", function(e) {
                    e.preventDefault();
                    var query = $(this).val();
                    fetchProjects(query);
                });

                // Pagination link click event handler
                $(document).on('click', '.pagination-link', function(e) {
                    e.preventDefault();
                    let page = $(this).data('page');
                    fetchProjects('', page);
                });
            });

        });
    </script>
@endsection
