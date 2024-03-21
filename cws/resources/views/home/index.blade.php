@extends('home.layout')

@section('content')
    <!-- main content here -->
    <div class=" px-4 text-center text-gray-800">
        <div class=" mx-auto flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="md:w-1/2 md:pr-8 text-left mb-4 md:mb-0 ">
                <div class="flex flex-col md:flex-row text-center md:text-left ">
                    <h1 class="text-3xl font-bold">Upskilling Made </h1>
                    <span id="autoText" class="text-3xl font-bold ml-3 mb-2 text-white">Upskilling Made </span>
                </div>
                <p class="text-lg mb-8 text-white">Where coding brilliance meets expert guidance. From novice to expert, our platform
                    offers personalized coaching and comprehensive courses to elevate your coding skills. Join a vibrant
                    community and unlock your coding potential today.</p>

                <a href=""
                    class="inline-block text-black  px-4 py-2 rounded-full bg-white transition duration-300 ease-in-out login-link text-2xl">Join
                    Now</a>
            </div>

            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 " id="imageContainer">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

                <dotlottie-player src="https://lottie.host/b1cdc270-cb11-43d1-98bb-70908a25bee3/8yR9uwNh8b.json"
                    background="transparent" speed="1" class="w-full h-100" loop autoplay></dotlottie-player>
            </div>
        </div>


        <div class="container mx-auto mt-2 md:mt-0">
            <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-8 p-0 md:p-5 text-gray-700 ">
                <div class="md:col-span-1 bg-white rounded-lg  p-3">
                    <h2 class="text-xl font-semibold mb-1 md:mb-2 pb-2 text-left border-b">About Us</h2>
                    <p class="text-md leading-7 text-justify">Discover the pinnacle of coding education at Code with Sadiq. Our platform
                        blends
                        expert guidance with cutting-edge curriculum to propel your programming journey. From novice to
                        virtuoso, our meticulously crafted courses cater to every skill level. Engage with a dynamic
                        community of learners and seasoned instructors, fostering an environment of collaboration and
                        growth. Whether unraveling the complexities of algorithms or mastering data structures, unlock your
                        full potential with personalized coaching and comprehensive resources. Join us and embark on a
                        transformative coding odyssey, where innovation meets mentorship, and aspirations become
                        achievements. Elevate your coding prowess with Code with Sadiq today.</p>
                </div>
                <div class="md:col-span-1 bg-white rounded-lg p-3">
                    <h2 class="text-lg border-b  pb-2 font-semibold mb-4 text-left">Recent Projects</h2>


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
                <h2 class="text-lg  font-semibold border-b border-teal-800 text-white pb-2 text-left ">Our Student</h2>
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
                <h2 class="text-lg text-left pb-2 border-b border-teal-800 text-white font-medium mb-6">Our Courses</h2>
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
                            if (course.status === 1) {

                            table.append(`
                            <a href="" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" src="/image/${course.featured_image}" alt="">
                                <span class="inline-block px-2 py-1 leading-none bg-green-500 text-white rounded-full font-semibold uppercase tracking-wide text-xs absolute bottom-0 -right-2">New</span>
                            </div>
                            <div class="py-2 px-4">
                            <h2 class="my-1  text-left capitalize font-bold">${course.name}</h2>
                            <div class=" flex items-center gap-1">
                                <span class="font-bold text-xl">₹${course.discount_fees}</span> 
                                <span class='font-semibold text-md text-slate-600'> ₹${course.fees}</span>
                            </div>
                            </div>
                            <div class="p-4 border-t border-b text-xs text-gray-700">
                            <span class="flex items-center mb-1">
                                <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> ${course.duration} Weeks
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> ${course.category ? course.category.cat_title : 'N/A'}
                             </span>        
                            </div>
                        <div class="p-4 flex items-center text-sm text-gray-600"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-gray-400"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg><span class="ml-2"></span></div>
                    </a>`);
                            }
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
                            <div class="carousel-item flex-none w-full p-3 md:w-1/2 lg:w-1/3 text-left px-1">
                            <div class="rounded-lg shadow-xl bg-gray-900 text-white" >
                                <div class="border-b border-gray-800 px-8 py-3">
                                    <div class="inline-block w-3 h-3 mr-2 rounded-full bg-red-500"></div><div class="inline-block w-3 h-3 mr-2 rounded-full bg-yellow-300"></div><div class="inline-block w-3 h-3 mr-2 rounded-full bg-green-400"></div>
                                </div>
                                <div class="px-8 py-6">
                                    <p><em class="text-blue-400">const</em> <span class="text-green-400">aboutMe</span> <span class="text-pink-500">=</span> <em class="text-blue-400">function</em>() {</p>
                                    <p>&nbsp;&nbsp;<span class="text-pink-500">return</span> {</p>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;name: <span class="text-yellow-300">'${hallFrame.name}'</span>,</p>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;position: <span class="text-yellow-300">'${hallFrame.position}'</span>,</p>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;Company: <span class="text-yellow-300">'${hallFrame.industry}'</span>,</p>
                                    <p>&nbsp;&nbsp;}</p>
                                    <p>}</p>
                                </div>
                            </div>
                            </div>`);
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
