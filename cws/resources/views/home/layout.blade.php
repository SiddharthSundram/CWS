<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Code With SadiQ | Learn Programming Language in Purnea Bihar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('css')
</head>

<body class="font-sans bg-gradient-to-r from-grey-100 to-slate-50">

    <nav class="fixed top-0 z-50 w-full md:px-[5%] bg-transparent shadow-sm md:py-0 p-0 bg-white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center  justify-between me-3">
                <div class="flex items-center ">
                    {{-- website logo --}}
                    <a href="{{ route('index') }}" title="Code With Sadiq " class="flex ms-2 md:me-24">
                        <div class="flex border border-black ">
                            <div class="bg-black text-white px-2 py-1 md:px-4 md:py-2 flex items-center">
                                <span class="font-bold text-sm md:text-lg text-nowrap">Code with</span>
                            </div>
                            <div class="bg-white text-black px-2 py-1 md:px-4 md:py-2">
                                <span class="font-bold text-sm md:text-lg">SadiQ</span>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="shrink w-full hidden md:block item-center">

                    {{-- search bar  --}}

                    <div class="max-w-lg mx-auto">
                        <div class="flex">
                            {{-- <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your Email</label> --}}
                            <button id="dropdown-button" data-dropdown-toggle="dropdownHover"
                                data-dropdown-trigger="hover"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900  bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 "
                                type="button">

                                All categories

                                <svg class="w-2.5 h-2.5 ms-2.5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>

                            </button>
                            <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100  shadow w-44 ">
                                <ul aria-labelledby="dropdownHoverButton"
                                    class="py-2 text-sm text-gray-700  category-dropdown"
                                    aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Dummy 1</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Dummy 2</button>
                                    </li>

                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search"
                                    class="searchInput1 block p-2.5 sm:w-80 md:w-full lg:w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Search Courses, Projects..." required />
                                <button
                                    class="searchButton1 absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-gray-800   rounded-e-lg border hover:bg-gray-300  hover:text-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">

                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="flex items-center shrink-0  gap-2">

                    {{-- login & sign up buttons  --}}
                    <div class="flex items-center shrink-0 gap-2">
                        <a href="{{ route('login') }}"
                            class=" border hidden md:block  lg:block  border-black text-black px-2 py-1 md:px-4 md:py-2  hover:bg-gray-300 hover:text-black transition duration-300 ease-in-out register-link">Login</a>
                        <a href="{{ route('register') }}"
                            class=" border hidden md:block border-black text-white bg-black px-2 py-1 md:px-4 md:py-2  hover:bg-gray-800 hover:text-white transition duration-300 ease-in-out login-link">Sign
                            Up</a>
                    </div>

                    {{-- <!--Profile Dropdown menu --> --}}
                    <div class="flex shrink-0 items-center  profile-link">
                        <div class="hidden md:block">

                            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownHovers"
                                title="My Profile" data-dropdown-trigger="hover"
                                class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-orange-600  md:me-0 focus:ring-4 focus:ring-gray-100 "
                                type="button">

                                <img class="w-8 h-8 me-2 rounded-full shrink-0" src="https://picsum.photos/200/300"
                                    alt="user photo">
                                <p class="text-sm text-gray-900 hidden md:block calling_username">
                                    Hi , Guest
                                </p>
                                <svg class="w-2.5 h-2.5 ms-3 hidden md:block" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <div id="dropdownHovers"
                                class="z-10 hidden bg-white divide-y divide-gray-100  shadow w-44 ">

                                <ul class="py-1 text-sm text-gray-700 "
                                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                    <li>
                                        <a href="{{ route('index') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300  "
                                            role="menuitem">
                                            <span>Home</span></a>
                                    </li>

                                    <li class="profile-link">
                                        <a href="{{ route('profile') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300  "
                                            role="menuitem">
                                            <span>My Profile</span></a>
                                    </li>

                                    <li class="course-link">
                                        <a href="{{ route('myCourse') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300  "
                                            role="menuitem">
                                            <span>My Courses</span></a>
                                    </li>

                                </ul>
                                <div class="logout-link">
                                    <a href=""
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300  "
                                        role="menuitem">
                                        <span class="logout">Sign out</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- button to enable sidebar --}}
                    <div class="flex items-center">
                        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                            title="Menu" aria-controls="drawer-navigation" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-800  rounded-lg bg-gray-100  hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </nav>



    <div id="drawer-navigation"
        class="fixed top-0 mt-16 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white  "
        tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase ">
            <p class="text-sm text-gray-800  rounded-lg  calling_username">
                Hi , Guest
            </p>
        </h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-800  bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center  ">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <div class="shrink w-full block md:hidden item-center">
                        {{-- search bar for mobile --}}
                        <div class="max-w-lg mx-auto">
                            <div class="flex">
                                <div class="relative w-full">
                                    <input type="search"
                                        class="searchInput1 block p-2.5 w-80 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                        placeholder="Search Courses, Projects..." required />
                                    <button
                                        class="searchButton1 absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-gray-800   rounded-e-lg border hover:bg-gray-300  hover:text-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">

                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('index') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">


                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z" />
                        </svg>

                        <span class="ms-3">Home</span>
                    </a>
                </li>


                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300  "
                        aria-controls="category-dropdown" data-collapse-toggle="category-dropdown">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75 group-hover:text-gray-900  "
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Course Category</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="category-dropdown" class="hidden py-2 space-y-2 category-dropdown">

                        {{-- courese category will dynamicaly will call here --}}

                    </ul>
                </li>

                <li>
                    <a href="{{ route('myCourse') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group course-link">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">My Courses</span>

                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group profile-link">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">My Profile</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('achievements') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5zM288 384.7V79.1l52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L391 303c-5.5 5.5-8.1 13.3-6.8 21l20.2 119.6L299.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Achievements</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('view_project') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 ">
                            <path fill="currentColor"
                                d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">Projects</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group login-link">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group register-link">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group logout-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M9.4 233.4c-12.5-12.5-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L109.3 224 320 224c17.7 0 32 14.3 32 32s-14.3 32-32 32L109.3 288l73.4 73.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0l-128-128zM352 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96L480 128c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap logout">Sign Out</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tandc') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 384 512">
                            <path fill="currentColor"
                                d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>



                        <span class="flex-1 ms-3 whitespace-nowrap ">Terms & Contiton</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('privacy') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 640 512">
                            <path fill="currentColor"
                                d="M36.8 192H449.6c20.2-19.8 47.9-32 78.4-32c30.5 0 58.1 12.2 78.3 31.9c18.9-1.6 33.7-17.4 33.7-36.7c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM384 224H320V384H128V224H64V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 352 224zm144 16c17.7 0 32 14.3 32 32v48H496V272c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32V272c0-44.2-35.8-80-80-80s-80 35.8-80 80z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap ">Privacy Policy </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('help') }}"
                        class="flex items-center p-2 text-gray-800 hover:text-gray-900 rounded-lg  hover:bg-gray-300  group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-800 transition duration-75  group-hover:text-gray-900 "
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap ">Help</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>




    <main class="flex-grow ">
        <div class="mt-10 mb-5">{{-- for space from top --}}</div>
        <!-- "Go Back" button -->
        {{-- <a href="" class="goBackButton p-2 bg-blue-700 text-center text-white rounded">Go Back</a> --}}

        {{-- <div class="container mx-auto p-0 md:px-10 lg:px-12 sm:px-8  outputContainer"> --}}
            @section('content')
                <!-- Content goes here -->

            @show
        {{-- </div> --}}
    </main>


    <footer class="bg-gray-800 text-gray-100 py-4 shadow sm:py-6">
        <div class="container mx-auto text-center flex justify-center">
            <a href="{{ route('tandc') }}" class="text-gray-100 hover:text-gray-200 hover:underline mr-4 ">
                Terms & Conditions
            </a>

            <a href="{{ route('privacy') }}" class="text-gray-100 hover:text-gray-200 hover:underline ">
                Privacy Policy
            </a>
        </div>
        <div class="container mx-auto text-center mt-4">
            <p class="cursor-pointer">&copy; 2024 Code With Sadiq Website. All rights reserved.</p>
        </div>
    </footer>





    <!-- script tags -->
    <script>
        $(document).ready(function() {

            var token = localStorage.getItem('token');

            if (token) {
                $.ajax({
                    url: '/api/user-profile',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        if (response.hasOwnProperty('name')) {
                            $(".calling_username").text('Hi, ' + response.name);
                            $('.login-link').hide();
                            $('.register-link').hide();
                            $('.profile-link').show();
                            $('.course-link').show();
                            $('.logout-link').show();
                        } else {
                            $(".calling_username").text('Hi, Guest');
                            $('.login-link').show();
                            $('.register-link').show();
                            $('.profile-link').hide();
                            $('.course-link').hide();
                            $('.logout-link').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 401) {
                            // Token expired, remove from local storage
                            localStorage.removeItem('token');
                        }
                        $(".calling_username").text('Hi, Guest');
                        $('.login-link').show();
                        $('.register-link').show();
                        $('.profile-link').hide();
                        $('.course-link').hide();
                        $('.logout-link').hide();
                        console.log(xhr.responseText);
                    }
                });
            } else {
                // Token does not exist, handle the case accordingly
                $(".calling_username").text('Hi, Guest');
                $('.login-link').show();
                $('.register-link').show();
                $('.profile-link').hide();
                $('.course-link').hide();
                $('.logout-link').hide();
            }


            $('.logout').click(function(e) {
                e.preventDefault();

                // Display a confirmation dialog
                swal({
                    title: "Are you sure you want to logout?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willLogout) => {
                    if (willLogout) {
                        // Proceed with logout
                        $.ajax({
                            url: '/api/logout',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            },
                            success: function(response) {
                                // Remove the token from localStorage
                                localStorage.removeItem('token');
                                // Redirect to the login page after successful logout
                                swal("Logout Successfully!", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.href =
                                        '{{ route('login') }}';
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        // Cancelled logout
                        swal("Logout Cancelled", "You are still login.", "info");
                    }
                });
            });
            let callingCategory = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.index') }}",
                    success: function(response) {
                        let table = $(".category-dropdown");
                        table.empty();

                        let data = response.data;
                        data.forEach((item) => {
                            // console.log(item)
                            table.append(`
                            <li>
                                <a href="/view-category/${item.slug}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 pl-6 ">${item.cat_title}</a>
                            </li>
                        `);
                        });
                    }
                });
            }
            callingCategory();


            // function for courses search
            function displayCourseSearchResults(data) {
                let table = $(".outputContainer").addClass("h-full my-20");
                table.empty();

                if (data.length == 0) {
                    table.append(`
                        <div class="container flex justify-end mt-10">
                            <a href="" class="goBackButton p-2 bg-blue-700 text-center  text-white rounded">Go Back</a>
                        </div>
                        <div class="no-results-message text-center py-4">
                            No results found for courses.
                        </div>
                    `);
                    // Show Go Back button
                    $(".goBackButton").show();
                } else {
                    table.append(`
                        <div class="container flex justify-end mt-10">
                            <a href="" class="goBackButton p-2 bg-blue-700 text-center  text-white rounded">Go Back</a>
                        </div>
                    `);
                    data.forEach((course) => {
                        // console.log(course.name);
                        table.append(`
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 md:p-0 gap-3 mt-4" >
                    
                                <a href="/explore-course/${course.id}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
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
                                </a>
                            </div>
                        `);
                    });

                   

                    table.show();

                    $(".goBackButton").show();
                }
            }

            // Functionality for course search
            $(document).ready(function() {

                $(".goBackButton").hide();

                let fetchCourseSearch = (query = '') => {
                    $.ajax({
                        url: "{{ route('search-course') }}",
                        type: "GET",
                        data: {
                            'query': query
                        },
                        success: function(response) {
                            let data =
                                response;
                            // console.log(data);
                            displayCourseSearchResults(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                };

                $(".searchButton1").on("click", function() {
                    var query = $(".searchInput1").val();
                    fetchCourseSearch(query);
                });

                $(".searchInput1").keypress(function(event) {
                    if (event.which === 13) {
                        var query = $(this).val();
                        fetchCourseSearch(query);
                    }
                });
            });


            // Function to display recent projects 
            function displayProjectOfSearch(data) {
                let table = $(".outputContainer").addClass("h-full my-20");
                // table.empty();

                if (data.length === 0) {
                    table.append(`
                        <div class="no-results-message text-center py-4">
                            No results found for projects.
                        </div>
                    `);

                    $(".goBackButton").show();
                } else {
                    data.forEach((project) => {
                        table.append(`
                            <div class="project-item p-2 rounded border hover:border-b hover:shadow mt-5 hover:bg-gray-50 transition duration-300">
                                <h3 class="text-xl text-start font-semibold mb-2">${project.name}</h3>
                                <p class='truncate text-start'>${project.description}</p>
                                
                                <div class="flex justify-between items-center mt-4">
                                    <p class='text-start'>Developed by -${project.description}</p>
                                    <a href="${project.url}" target="_blank" class="view-button inline-block px-2 py-1  text-black rounded-md border border-black hover:bg-gray-300 transition duration-300">View</a>
                                </div>
                            </div>
                        `);
                    });

                    table.show();


                    $(".goBackButton").show();
                }
            }

            // Functionality for search
            $(document).ready(function() {

                $(".goBackButton").hide();

                let fetchSearch = (query = '') => {
                    $.ajax({
                        url: "{{ route('manage_Recent_project') }}",
                        type: "GET",
                        data: {
                            'query': query
                        },
                        success: function(response) {
                            let data = response.data;
                            displayProjectOfSearch(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                };


                $(".searchButton1").on("click", function() {
                    var query = $(".searchInput1").val();
                    fetchSearch(query);
                });

                callingCategory();


                $(".searchInput1").keypress(function(event) {

                    if (event.which === 13) {
                        var query = $(this).val();
                        fetchSearch(query);
                    }
                });
            });




        });
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
