@extends('home.layout')

@section('content')
    <!-- Your existing content here -->
    <div class=" py-16 px-4 text-center text-gray-800">
        <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="md:w-1/2 md:pr-8 text-left mb-4 md:mb-0 ">
                <h1 class="text-3xl font-bold mb-4">Upskilling Made <span id="autoText" class="text-orange-500"></span> </h1>
                <p class="text-lg mb-8">Where coding brilliance meets expert guidance. From novice to expert, our platform
                    offers personalized coaching and comprehensive courses to elevate your coding skills. Join a vibrant
                    community and unlock your coding potential today.</p>

                <a href=""
                    class="inline-block border border-black text-white bg-black px-4 py-2 rounded-full  hover:bg-gray-800 hover:text-white transition duration-300 ease-in-out login-link">Join
                    Now</a>
            </div>


            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 " id="imageContainer">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

                <dotlottie-player src="https://lottie.host/b1cdc270-cb11-43d1-98bb-70908a25bee3/8yR9uwNh8b.json"
                    background="transparent" speed="1" class="w-full h-100" loop autoplay></dotlottie-player>
                {{-- <img src="/hero section.json" alt="Sadiq" class="w-96 md:mx-0 rounded-lg "> --}}
            </div>
        </div>


        <div class="container mx-auto py-">
            <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-8  text-gray-700 p-5">
                <div class="md:col-span-1 bg-white rounded-lg p-6 hover:shadow-md hover:bg-gray-50 ">
                    <h2 class="text-2xl font-bold mb-4 text">About Us</h2>
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
                <div class="md:col-span-1 bg-white rounded-lg p-6 hover:shadow-md hover:bg-gray-50">
                    <h2 class="text-2xl font-bold mb-4">Recent Projects</h2>

                    {{-- <div class="pb-4">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" name="query" id="searchInput"
                                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Project by name">
                        </div>
                    </div> --}}
                    <div class="grid grid-cols-1 gap-4" id="recentProjects">
                        <!-- Recent projects will be dynamically loaded here -->

                    </div>

                    <div class="mt-4 flex items-center justify-center">
                        <div id="pagination" class="">
                            <!-- Pagination links will be inserted here -->
                        </div>
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
                            <a href="" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
        <div class="relative pb-48 overflow-hidden">
          <img class="absolute inset-0 h-full w-full object-cover" src="/image/${course.featured_image}" alt="">
        </div>
        <div class="p-4">
          <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">Highlight</span>
          <h2 class="mt-2 mb-2  font-bold">${course.name}</h2>
          <div class="mt-3 flex items-center gap-1">
            <span class="font-bold text-xl">₹${course.discount_fees}</span> 
            <span class='font-semibold text-md text-slate-600'> ₹${course.fees}</span>
          </div>
        </div>
        <div class="p-4 border-t border-b text-xs text-gray-700">
          <span class="flex items-center mb-1">
            <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> ${course.duration}
          </span>
          <span class="flex items-center">
            <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> ${course.category ? course.category.cat_title : 'N/A'}
          </span>        
        </div>
        <div class="p-4 flex items-center text-sm text-gray-600"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-gray-400"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><span class="ml-2"></span></div>
      </a>
                        
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
                        <div class="carousel-item flex-none w-full p-3 md:w-1/2 lg:w-1/4 px-4">
                            <div class="flex flex-col h-full">
                <div class="flex-grow p-5">
                   
                    <div class="mt-2">
                        <a class=" inline-flex items-start mr-5" href="#0">
                                   <img class="rounded-full object-cover" src="/image/${hallFrame.featured_image}" width="64" height="64" alt="User 01">
                                </a>
                        <div class="text-sm">  
                            <h2 class="text-xl text-gray-700 font-semibold mb-2">${hallFrame.name}</h2>
                            <p class="text-gray-600">Industry: ${hallFrame.industry}</p>
                            <p class="text-gray-600">Position: ${hallFrame.position}</p>                                    
                            </div>
                    </div>
                </div>
               
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
                    
            <div class="project-item bg-gray-200 p-4 rounded-md shadow-md hover:bg-gray-300 transition duration-300">
                <h3 class="text-xl font-semibold mb-2">${project.name}</h3>
                <p>${project.description}</p>
                <div class="flex justify-end mt-4">
                    <a href="${project.url}" target="_blank" class="view-button inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300">View</a>
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
                                    '<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="' +
                                    (response.current_page - 1) + '">' + (response
                                        .current_page - 1) + '</a>';
                            }
                            paginationLinks +=
                                '<span class="px-3 py-1 bg-blue-500 text-white mx-1 rounded">' +
                                response.current_page + '</span>';
                            if (response.next_page_url) {
                                paginationLinks +=
                                    '<a href="#" class="pagination-link px-3 py-1 bg-blue-200 text-blue-800 mx-1 rounded" data-page="' +
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
