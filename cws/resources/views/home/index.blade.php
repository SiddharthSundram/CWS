@extends('home.layout')

@section('content')
    <!-- main content here -->
    <div class=" px-4 text-center text-gray-800">
        <div class=" mx-auto flex flex-col-reverse md:flex-row items-start md:items-center justify-between md:px-[10%]">
            <div class="md:w-1/2 md:pr-8 text-left mb-4 md:mb-0 ">
                <div class="flex flex-row text-left ">
                    <h1 class="md:text-3xl text-xl font-bold">Upskilling Made </h1>
                    <span id="autoText" class="md:text-3xl text-xl font-bold ml-3 mb-2 text-orange-600"></span>
                </div>
                <p class="text-sm md:text-lg mb-8 text-slate-800">Where coding brilliance meets expert guidance. From novice to expert, our
                    platform
                    offers personalized coaching and comprehensive courses to elevate your coding skills. Join a vibrant
                    community and unlock your coding potential today.</p>

                <a href="{{route('login')}}"
                    class="inline-block  font-semibold  px-4 py-2 rounded border border-black hover:bg-gray-300 text-gray-800 transition duration-300 ease-in-out login-link text-2xl">Join
                    Now</a>
                <a href="{{route('allCourses')}}"
                    class="inline-block  font-semibold  px-4 py-2 rounded border border-black hover:bg-gray-300 text-gray-800  transition duration-300 ease-in-out logout-link text-2xl">Explore
                    Courses</a>
            </div>

            <div class="md:w-1/2 md:flex md:justify-center  md:order-1 " id="imageContainer">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

                <dotlottie-player src="https://lottie.host/b1cdc270-cb11-43d1-98bb-70908a25bee3/8yR9uwNh8b.json"
                    background="transparent" speed="1" class="w-full h-100" loop autoplay></dotlottie-player>
            </div>
        </div>


        <div class="container mx-auto mt-2 md:mt-0">
            <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-8 p-0 text-gray-700 ">
                <div class="md:col-span-1 bg-white rounded-lg">
                    <h2 class="text-xl font-semibold mb-1 md:mb-2 pb-2 text-left border-b pl-2 border-l-orange-500 border-l-4">About Us</h2>
                    <p class="text-md leading-7 text-justify">Discover the pinnacle of coding education at Code with Sadiq, where coding excellence meets innovation. Established in 2014, our platform blends expert guidance with cutting-edge curriculum to propel your programming journey. From novice to virtuoso, our meticulously crafted courses cater to every skill level.
                    </p>
                    <p class="text-md leading-7 text-justify mt-2">
                        Engage with a dynamic community of learners and seasoned instructors, fostering an environment of collaboration and growth. Whether unraveling the complexities of algorithms or mastering data structures, unlock your full potential with personalized coaching and comprehensive resources.</p>
                        <p class="text-md leading-7 text-justify mt-2">
                        Join us and embark on a transformative coding odyssey, where innovation meets mentorship, and aspirations become achievements. Elevate your coding prowess with Code with Sadiq today.</p>
                </div>
                <div class="md:col-span-1 bg-white rounded-lg ">
                    <div class="text-left border-b  mb-1 md:mb-2 pb-2 pl-2 border-l-orange-500 border-l-4">
                        <h2 class="text-lg font-semibold text-gray-800">Our Achievements</h2>
                        <p class="mt-0 text-sm text-gray-600">We take pride in our accomplishments</p>
                    </div>

                    <div class="p-5 rounded bg-slate-100">                          
                        <div class=" grid grid-cols-1 gap-8 md:grid-cols-4">
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <h3 class="text-xl font-semibold text-gray-800">Total Students</h3>
                                <p class="mt-2 text-3xl font-bold text-orange-600">9600+</p>
                            </div>
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <h3 class="text-xl font-semibold text-gray-800">Total Placements</h3>
                                <p class="mt-2 text-3xl font-bold text-orange-600">460+</p>
                            </div>
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <h3 class="text-xl font-semibold text-gray-800">Total Technologies</h3>
                                <p class="mt-2 text-3xl font-bold text-orange-600">23+</p>
                            </div>
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <h3 class="text-xl font-semibold text-gray-800">Total Projects</h3>
                                <p class="mt-2 text-3xl font-bold text-orange-600">750+</p>
                            </div>
                        </div>
                    </div>
                  </div>
            </section>


            <div class="container mx-auto py-8">
                <h2 class="text-lg  font-semibold border-b pb-2 text-left pl-2 border-l-orange-500 border-l-4 "><a href="{{route('achievements')}}">Our Student</a></h2>
                <div class="grid md:grid-cols-4 grid-cols-1 gap-3 pt-2" id="callingHallframe">
                   {{-- student calling --}}
                   
                </div>
            </div>


            <div class="container mx-auto my-8 p-2">
                <h2 class="text-lg text-left pb-2 border-b font-medium mb-6 pl-2 border-l-orange-500 border-l-4"><a href="{{route('allCourses')}}">Our Courses</a></h2>
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
                                    <a href="/explore-course/${course.category.slug}/${course.course_slug}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                            <img class="absolute inset-0 h-full w-full object-cover" src="/image/${course.featured_image}" alt="">
                                                <span class="inline-block px-2 py-1 leading-none bg-green-500 text-white rounded-full font-semibold uppercase tracking-wide text-xs absolute bottom-0 -right-0">New</span>
                                            </div>
                                            <div class="py-2 px-4">
                                            <h2 class="my-1  text-left capitalize font-bold">${course.name}</h2>
                                            <div class=" flex items-center gap-1">
                                                <span class="font-bold text-xl">₹${course.discount_fees}</span> 
                                                <span class='font-semibold text-md text-slate-600'> <del>₹${course.fees}</del></span>
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
                                            </a>
                                `);
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
                                                    <div class=" flex w-full border flex-col rounded-xl bg-slate-100 text-gray-700 shadow-none p-2">
                        <div class="relative flex items-center gap-4 pt-0 mx-0 overflow-hidden text-gray-700 shadow-none rounded-xl">
                            <img
                            src="/image/${hallFrame.featured_image}"  
                            alt="${hallFrame.name}"
                            class="relative inline-block h-[58px] w-[58px] !rounded-full  object-cover object-center" />
                            <div class="flex w-full flex-col gap-0.5">
                            <div class="flex items-start text-left justify-between text-left flex-col self-start">
                                <h5
                                class="block font-sans text-md antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                ${hallFrame.name}
                                </h5>
                                <p class="block font-sans text-xs antialiased font-light leading-relaxed text-blue-gray-900">
                                ${hallFrame.position}
                            </p>
                            <p class="block font-sans text-xs truncate antialiased font-light leading-relaxed text-blue-gray-900">
                                @${hallFrame.industry}
                            </p>
                            </div>
                            
                            </div>
                        </div> `);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Call the function to initially populate the hallFrame table
            callingHallframe();

        


        });
    </script>
@endsection
