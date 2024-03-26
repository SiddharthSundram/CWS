@extends('home.layout')


@section('content')
    <div>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-medium  mt-4">
                <a id="categoryName"></a>
            </h1>

           
            <div class="container mx-auto my- p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3" id="courses-list">
                    <!-- Courses will be dynamically loaded here -->
                </div>
            </div>
            

            {{-- when user dont have any course in category --}}
            <div class="container mx-auto px-4 py-8 flex flex-wrap flex-col items-center gap-5 justify-center border border-gray-800 "
                id="not-courses-list">
                <div class="text-center">
                    <h2 class="text-3xl text-red-600 font-bold">No Course Available For the Selected Category.</h2>
                    <p class="mt-2 text-gray-600">Expand your knowledge and skills by enrolling in our courses.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('allCourses') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300">Explore Other Courses</a>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            let categoryName;
            let callingCategory = () => {
                $.ajax({
                    type: "GET",
                    url: "/api/category/{{ request()->segment(2)}}",
                    success: function(response) {
                        let table = $(".category-dropdown");
                        table.empty();

                        categoryName = response.data.cat_title;
                        document.title = categoryName + " | Code With SadiQ | Learn Programming Language in Purnea Bihar";
                        $("#categoryName").text(categoryName);
                    }
                });
            }
            callingCategory();

            let callingCourse = () => {
                    $.ajax({
                        type: 'GET',
                        url:`/api/view-category/{{ request()->segment(2)}}`,
                        success: function(response) {
                            let table = $("#courses-list");
                            let notCoursesList = $("#not-courses-list");
                            table.empty();

                            if (response.data.length === 0) {
                                table.hide();
                                notCoursesList.show();
                            } else {
                                notCoursesList.hide();
                                table.show();

                                response.data.forEach((course) => {
                                    table.append(`
                                    <a href="/explore-course/${course.id}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
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
                                                <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> ${categoryName}
                                            </span>        
                                            </div>
                                        
                                    </a>
                            `);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
            };

            callingCourse();

            
        });
    </script>
@endsection
