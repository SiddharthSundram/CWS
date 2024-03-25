@extends('home.layout')
@section('title')
<title>@yield('title') CWS | My-Course</title>
@endsection

@section('content')
    <div>
        <div class="container h-full mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">My Courses</h1>

            <div id="courses-list">
                {{-- my courses will call here --}}

            </div>

            {{-- when user dont have any course --}}
            <div class="container mx-auto px-4 py-8 flex flex-wrap flex-col items-center gap-5 justify-center border border-gray-800 "
                id="not-courses-list">
                <div class="text-center">
                    <h2 class="text-3xl text-red-600 font-bold">You haven't enrolled in any courses yet.</h2>
                    <p class="mt-2 text-gray-600">Expand your knowledge and skills by enrolling in our courses.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('index') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300">Enroll
                        Now</a>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script>
     $(document).ready(function() {
    let callingCourses = () => {
        var token = localStorage.getItem('token');
        if (token) {
            $.ajax({
                type: 'GET',
                url: "{{ route('my-profile') }}",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    let table = $("#courses-list");
                    let notCoursesList = $("#not-courses-list");
                    table.empty();

                    if (response.courses.length === 0) {
                        table.hide();
                        notCoursesList.show();
                    } else {
                        notCoursesList.hide();
                        table.show();

                        response.courses.forEach((item) => {
                            let createdAt = new Date(item.created_at);
                            let formattedDate = createdAt.toLocaleDateString(
                                'en-GB');

                            let courseSection = $(`
                                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-center justify-center mb-5 border border-b">
                                    <div class="md:w-1/6 md:mr-4 md:mb-5 md:flex md:flex-col justify-center items-center">
                                        <img src="/image/${item.featured_image}" id="courseImage" alt="" class="rounded-lg h-5/6 w-5/6 shadow-md mb-4 md:mb-0">
                                    </div>
                                    <div class="md:w-5/6 md:ml-4 flex flex-col md:flex-row gap-4">
                                        <div class="md:w-1/2">
                                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Course Details:</h3>
                                            <div class="ml-3">
                                                <h2 class="text-xl font-semibold text-gray-600 mb-2"> <span class="text-orange-600" id="courseName">${item.name}</span></h2>
                                                <p class="text-gray-600 font-bold mb-2">Duration : <span class="font-normal" id="courseDescription">${item.duration}</span></p>
                                                <p class="text-gray-600 font-bold mb-2">Instructor : <span class="font-normal" id="courseInstructor">${item.instructor}</span></p>
                                                <p class="text-gray-600 font-bold mb-2">Enrolled Date : <span class="font-normal" id="courseLang"><time class='leading-none'>${formattedDate}</time></span></p>
                                                <div class="flex items-center mb-4">
                                                    <span class="text-gray-600 font-bold mr-2">Discounted Fees : <span id="courseDiscountFees font-normal">  ₹${item.discount_fees}</span>.00 </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:w-1/2">
                                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Payment Details:</h3>
                                            <div class="ml-3">
                                                ${item.payments && item.payments.length > 0 ?
                                                    `<ol class="relative border-s border-gray-200 ">
                                                        ${item.payments.map(payment => `
                                                            <li class="mb-2 ms-4">
                                                                <div class="absolute w-3 h-3 ${payment.status === 1 ? 'bg-green-600' : 'bg-gray-200'} rounded-full mt-1.5 -start-1.5 border border-white "></div>
                                                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">${payment.date_of_payment}</time>
                                                                <div class="payment-info flex gap-2 items-center">
                                                                    <span class="text-sm font-bold text-gray-900">Amount:</span>
                                                                    <span class="text-sm text-gray-600">₹${payment.fees}</span>
                                                                    ${payment.status === 1 ? `<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                                        </svg>` : ''}
                                                                </div>
                                                                ${payment.status === 0 ? `<span id="markPaid_${payment.id}" class="bg-orange-500 hover:bg-orange-600  text-white font-semibold py-1 px-2 rounded">Pending</span>` : ''}
                                                            </li>
                                                        `).join('')}
                                                    </ol>`
                                                    :
                                                    `<p class="text-sm text-gray-600 mb-2">No payment information available.</p>`
                                                }
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center justify-center">
                                        <button class="flex gap-1 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300 ml-4 download-invoice-btn" style="${item.payments && item.payments.length > 0 ? '' : 'display: none;'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 20px; width: 30px; fill: white;">
                                                <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                            </svg>
                                            Invoice 
                                        </button>
                                    </div>
                                </div> 
                            `);

                            table.append(courseSection);

                            let downloadInvoiceBtn = courseSection.find('.download-invoice-btn');
                            downloadInvoiceBtn.click(function() {
                                var currentDate = new Date()
                                    .toLocaleDateString('en-IN', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric',
                                        hour: 'numeric',
                                        minute: 'numeric',
                                        second: 'numeric'
                                    });
                                var courseName = item.name;
                                var courseDuration = item.duration;
                                var instructor = item.instructor;
                                var fees = item.discount_fees;

                                // Fetching user details from response
                                var userName = response.name;
                                var userEmail = response.email;
                                var userContact = response.mobile_no;
                                var userAddress = response.address;

                                // Calculate grand total including GST
                                var gstRate = 0.18; // Assuming GST rate is 18%
                                var totalFees = fees * (1 + gstRate); // Adding GST

                                var header = `
                                    <div class="font-sans text-center mt-5">
                                        <!-- Logo with border -->
                                        <div class="border-b flex items-center justify-between border-black pb-5">
                                            <div class="flex border border-black ml-3">
                                                <div class="bg-black text-white px-4 py-2 flex items-center">
                                                    <span class="font-bold text-lg whitespace-nowrap">Code with</span>
                                                </div>
                                                <div class="bg-white text-black px-4 py-2 w-32">
                                                    <span class="font-bold text-lg">SadiQ</span>
                                                </div>
                                            </div>
                                            <div class="text-black pr-3 mr-3">Date: ${currentDate}</div>
                                        </div>
                                        <h1 class='text-3xl font-bold mt-5 text-left ml-3'>Invoice</h1>
                                    </div>
                                `;

                                var watermarkCSS = `
                                    .watermark {
                                        position: fixed;
                                        top: 30%;
                                        left: 31%;
                                        font-size: 200px;
                                        font-weight:bold;
                                        color: rgba(0, 0, 0, 0.1); /* Adjust the opacity of the watermark */
                                        transform: rotate(-45deg);
                                        z-index: -1000;
                                    }
                                `;

                                var watermarkHTML =
                                    `<div class="watermark">C W S</div>`;

                                var thankYouMessage = `
                                    <div class="font-sans text-center mt-5">
                                        <p class="mt-5">Thank you for choosing Code With SadiQ!</p>
                                    </div>
                                `;

                                var contentWithWatermark = `
                                    ${header}

                                    <style>${watermarkCSS}</style>
                                    ${watermarkHTML}

                                    <div class="font-sans  p-5 text-center mt-5">


                                            <table class="w-full border border-black mt-5">

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Course:</strong></td>
                                                    <td class="px-4 py-2 font-bold border border-black">${courseName}</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Name:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${userName}</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Email:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${userEmail}</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Contact:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${userContact}</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Address:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${userAddress}</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Duration:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${courseDuration}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Instructor:</strong></td>
                                                    <td class="px-4 py-2 border border-black">${instructor}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 border border-black"><strong>Fees:</strong></td>
                                                    <td class="px-4 py-2 border border-black">₹${fees}</td>
                                                </tr>


                                                <!-- Payment Details section -->
                                                ${generatePaymentDetails(item.payments)}



                                            </table>

                                            ${thankYouMessage}
                                        </div>
                                    `;

                                html2pdf().from(contentWithWatermark).save(
                                    `Payment-invoice-${courseName}.pdf`);
                            });
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            window.open('/', '_self');
        }
    };

    callingCourses();

    function generatePaymentDetails(payments) {
        if (payments && payments.length > 0) {
            var paymentTable = `
                    <tr>
                        <td class="px-4 py-2 border border-black"><strong>Payment Details:</strong></td>
                        <td class="px-4 py-2 border border-black">
                            <table class="w-full border-collapse border border-black mt-2">
                                <tr>
                                    <th class="px-4 py-2 border border-black">Date of Payment</th>
                                    <th class="px-4 py-2 border border-black">Amount</th>
                                    <th class="px-4 py-2 border border-black">Status</th>
                                </tr>
                    `;
            payments.forEach(function(payment) {
                var paymentStatus = payment
                    .status === 1 ? 'Paid' :
                    'Pending';
                paymentTable += `
                    <tr>
                        <td class="px-4 py-2 border border-black">${payment.date_of_payment}</td>
                        <td class="px-4 py-2 font-bold border border-black">₹${payment.fees}</td>
                        <td class="px-4 py-2 border border-black font-bold">${paymentStatus}</td>
                    </tr>
                `;
            });
            paymentTable += `</table>`;
            return paymentTable;
        } else {
            return "<tr><td colspan='3'><p class='mt-2'>No payment information available.</p></td></tr>";
        }
    }
});


    </script>
@endsection
