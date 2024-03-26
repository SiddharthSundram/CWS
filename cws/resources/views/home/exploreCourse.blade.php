@extends('home.layout')

@section('title')
    {{$course->name}} | 
@endsection

@section('content')
    <div class="bg-slate-800 md:h-48 h-24 gap-0 flex flex-col justify-around flex-1 w-full px-5 md:px-[10%]">


        <nav class="md:flex md:flex-1 mt-3 hidden" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('index')}}" class="inline-flex items-center text-sm font-medium text-gray-50 hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-50 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{route('viewCategory', request()->segment(2))}}"
                            class="ms-1 text-sm font-medium text-gray-50 hover:text-white md:ms-2 courseCategory"></a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-50 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-50 md:ms-2 courseName">...</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex-1 flex flex-col ">
            <span class="text-white font-semibold courseName text-xl md:text-3xl mt-10 md:mt-0">Loading...</span>
        </div>
    </div>

    <div class="w-full">
        <div
            class="text-sm md:px-[10%] font-medium text-center sticky md:top-[70px] bg-white border text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex overflow-x-scroll md:overflow-hidden flex-nowrap  md:flex-wrap -mb-px">
                <li class="me-2">
                    <a href="#feature"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Features</a>
                </li>
                <li class="me-2">
                    <a href="#about"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Descriptions</a>
                </li>
                <li class="me-2">
                    <a href="#Eligibility"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Eligibility</a>
                </li>
                <li class="me-2">
                    <a href="#fees"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Fees</a>
                </li>
                <li>
                    <a href="#"
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-nowrap">Course
                        Content</a>
                </li>
            </ul>
        </div>
        <div class=" mt-4 md:px-[10%] px-5">
            <div class="w-full">
                <div class="flex-1 top-32 right-16 z-40 md:fixed md:mr-4 mb-5 md:flex md:flex-col items-center">
                    <img src="" id="courseImage" alt="" class="rounded-lg w-full shadow-md mb-4 md:mb-0">
                    <div class="flex flex-1 w-full items-center p-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-1 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                          </svg>
                           <span class="courseCategory text-xs font-semibold"></span> 
                    </div>
                    <div class="flex justify-between items-center  flex-1  w-full mb-4">
                        <span class="flex-1 flex items-center">
                            <span class="text-2xl font-bold text-gray-700 mr-2 "><span class="courseDiscountFees"></span>.00
                            </span>
                            <span class="text-gray-400 line-through courseFees"></span>
                        </span>
                        <span class="bg-green-300 text-green-800 px-2 text-xs rounded py-1 " id="discountAmount"> 25%
                            Discount</span>
                    </div>
                    <a href=""
                        class="bg-orange-500 w-full text-center hover:bg-orange-600  text-white font-semibold py-2 px-6 rounded transition duration-300"
                        id="enrollBtn">
                        Enroll Now
                    </a>
                </div>

                <div class=" mb-4 md:w-8/12 p-2" id="feature">
                    <h2 class="pl-2 border-l-orange-500 border-l-4 text-xl border-b text-slate-900 font-semibold">Features</h2>
                    <div class=" p-3">
                        <ul class="grid grid-cols-2 gap-3" id="courseFeatures"></ul>
                    </div>
                   
                    <h2 class="pl-2 border-l-orange-500 border-l-4 text-xl border-b mt-5 font-semibold" id="about">About Course</h2>
                    <p class="text-gray-600 font-normal leading-8 text-justify mt-3" id="courseDescription"></p>

                   
                    <h2  id="Eligibility" class="pl-2 border-l-orange-500 border-l-4 text-xl border-b mt-5 text-slate-900 font-semibold">Eligibility</h2>
                    <p class="text-gray-600 font-normal leading-8 text-justify mt-3" id="courseEligibility">BCA/MCA or any other Computer Science background </p>

                    <h2 id="fees" class="pl-2 border-l-orange-500 border-l-4 text-xl border-b mt-5 text-slate-900 font-semibold mb-3">Course Fees</h2>
                    <div class="p-4 rounded-md bg-gradient-to-l to-green-100 from-green-50 mb-3">
                        <h3 class="text-lg font-semibold">Full Payment with Cashback</h3>
                        <p class="text-gray-600">Pay the full fees upfront and get a cashback of ₹200.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-semibold">Total Fees: <span class="courseDiscountFees"></span></span>
                            <span class="text-green-500"><span id="cashbackAmount"></span> Cashback</span>
                            <span class="text-lg font-semibold">Final Amount: <span id="finalAmountFullPayment"></span></span>
                        </div>
                    </div>
                    <div class="p-4 rounded-md bg-gradient-to-l to-orange-100 from-orange-50 mb-3">
                        <h3 class="text-lg font-semibold">Installments</h3>
                        <p class="text-gray-600">Pay the fees in 3 installments: 40% + 30% + 30%.</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex flex-col">
                                <span class="text-md font-semibold">1st Installment (40%):</span>
                                <span id="firstInstallment"></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-md font-semibold">2nd Installment (30%):</span>
                                <span id="secondInstallment"></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-md font-semibold">3rd Installment (30%): </span>
                                <span id="thirdInstallment"></span>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>


    <div class="">
        <div class="container md:h-screen mx-auto p-8">
            <div class="bg-white rounded-lg p-6 flex flex-col ">

                <div class="flex">

                </div>
            </div>



        </div>

        <script>
            $(document).ready(function() {
                let catId = "{{ request()->segment(2) }}";
                let courseId = "{{ request()->segment(3) }}";

                let discountAmount = 0;
                let fees;
                let discountFees;
                $.ajax({
                    type: "GET",
                    url: `/api/course/${catId}/${courseId}`,
                    dataType: "json",
                    success: function(response) {
                        fees = response.data.fees;
                        discountFees = response.data.discount_fees;

                        let cashbackAmount = 200;
                        let finalAmountFullPayment = discountFees - cashbackAmount;

                        // Calculate the installments
                        let firstInstallment = Math.round(discountFees * 0.4);
                        let secondInstallment = Math.round(discountFees * 0.3);
                        let thirdInstallment = Math.round(discountFees * 0.3);
                        
                        discountAmount = ((fees - discountFees) / fees) * 100;

                        $('#courseImage').attr('src', '/image/' + response.data.featured_image);
                        $('.courseName').text(response.data.name);
                        $('#courseDuration').text(response.data.duration + " Weeks");
                        $('#courseInstructor').text(response.data.instructor);
                        $('.courseFees').text('₹' + fees);
                        $('.courseDiscountFees').text('₹' + discountFees);
                        $('#discountAmount').text(`${discountAmount.toFixed(2)}% Off`);
                        $('#courseDescription').text(response.data.description);
                        $('#courseLang').text(response.data.lang);
                        $('.courseCategory').text(response.data.category.cat_title);
                        $('#cashbackAmount').text('-₹' + cashbackAmount);
                        $('#finalAmountFullPayment').text('₹' + finalAmountFullPayment);
                        $('#firstInstallment').text('₹' + firstInstallment);
                        $('#secondInstallment').text('₹' + secondInstallment);
                        $('#thirdInstallment').text('₹' + thirdInstallment);
                        let featuresArray = JSON.parse(response.data.features);
                        // Clear any existing features
                        $('#courseFeatures').empty();
                        // Loop through the features array and add each feature as a list item
                        featuresArray.forEach(feature => {
                            $('#courseFeatures').append(`<li class='flex items-center space-x-2'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6 fill-green-500 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg><span class='text-lg'>${feature}</span></li>`);
                        });

                        // Adding functionality to share button
                        $('#whatsappShareBtn').click(function(e) {
                            e.preventDefault();

                            var message = 'Check out this amazing course:\n' +
                                'Name: ' + response.data.name + '\n' +
                                'Duration: ' + response.data.duration + '\n' +
                                'Instructor: ' + response.data.instructor + '\n' +
                                'Fees: ₹' + response.data.fees + '\n' +
                                'Discounted Fees: ₹' + response.data.discount_fees + '\n' +
                                'Description: ' + response.data.description + '\n' +
                                'Language: ' + response.data.lang + '\n' +
                                'Category: ' + response.data.category.cat_title + '\n' +
                                'Visit: codewithsadiq.com';

                            var encodedMessage = encodeURIComponent(message);

                            // For sharing image,
                            var image = '/image/' + response.data.featured_image;
                            var encodedImage = encodeURIComponent(image);

                            var whatsappURL = 'whatsapp://send?text=' + encodedMessage + '&image=' +
                                encodedImage;

                            window.location.href = whatsappURL;
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching courses:", error);
                    }
                });
            });

            //for course enroll
            $(document).ready(function() {
                $('#enrollBtn').click(function(event) {
                    event.preventDefault();

                    var courseId = "{{ request()->segment(2) }}";
                    var token = localStorage.getItem('token');

                    if (token) {
                        $.ajax({
                            type: "GET",
                            url: "/api/user-profile",
                            headers: {
                                'Authorization': 'Bearer ' + token
                            },
                            success: function(response) {
                                var userId = response.id;
                                enrollUser(courseId, userId);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error fetching user profile:", error);
                            }
                        });
                    } else {
                        swal({
                            title: "Login Required",
                            text: "Please log in to enroll in the course.",
                            icon: "warning",
                            buttons: {
                                cancel: "Cancel",
                                confirm: "Log In"
                            },
                        }).then((value) => {
                            if (value) {
                                window.open('/login', '_self');
                            }
                        });
                    }
                });

                function enrollUser(courseId, userId) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('student_course.store') }}",
                        data: {
                            course_id: courseId,
                            user_id: userId
                        },
                        dataType: "json",
                        success: function(response) {
                            swal({
                                title: "Success!",
                                text: "Course enrolled successfully!",
                                icon: "success"
                            });
                            setTimeout(() => {
                                window.open('/my-course', '_self');
                            }, 2000);

                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.responseJSON.msg || "Error enrolling user.";
                            swal({
                                title: "Error!",
                                text: errorMessage,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        </script>
    @endsection
