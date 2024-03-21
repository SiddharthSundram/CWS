@extends('home.layout')

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

                            // console.log(response.courses);

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
                                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-md shadow-md transition-colors duration-300 ml-4 download-invoice-btn">Download Invoice</button>
                                            </div>
                                        </div> 
                                    `);

                                    table.append(courseSection);

                                    courseSection.find('.download-invoice-btn').click(
                                        function() {

                                            var currentDate = new Date()
                                                .toLocaleDateString('en-IN', {
                                                    year: 'numeric',
                                                    month: 'long',
                                                    day: 'numeric'
                                                });

                                            var courseName = item.name;
                                            var courseDuration = item.duration;
                                            var instructor = item.instructor;
                                            var fees = item
                                                .discount_fees; 

                                            var content = `
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
                                                        
                                                        <h1 class="text-3xl font-bold mt-5"> Course Name: ${courseName}</h1>
                                                        <table class="w-80 mx-auto border-collapse border border-black mt-5">
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
                                                            <tr>
                                                                <td class="px-4 py-2 border border-black"><strong>Payment Details:</strong></td>
                                                                <td class="px-4 py-2 border border-black">
                                                `;


                                                if (item.payments && item.payments.length >
                                                0) {
                                                content += `
                                                        <table class="w-full border-collapse border border-black mt-2">
                                                            <tr>
                                                                <th class="px-4 py-2 border border-black">Date of Payment</th>
                                                                <th class="px-4 py-2 border border-black">Amount</th>
                                                                <th class="px-4 py-2 border border-black">Status</th>
                                                            </tr>
                                                    `;
                                                item.payments.forEach(function(
                                                    payment) {
                                                    var paymentStatus = payment
                                                        .status === 1 ? 'Paid' :
                                                        'Pending';
                                                    content += `
                                                            <tr>
                                                                <td class="px-4 py-2 border border-black">${payment.date_of_payment}</td>
                                                                <td class="px-4 py-2 border border-black">₹${payment.fees}</td>
                                                                <td class="px-4 py-2 border border-black">${paymentStatus}</td>
                                                            </tr>
                                                        `;
                                                });
                                                content += `</table>`;
                                            } else {
                                                content +=
                                                    "<p class='mt-2'>No payment information available.</p>";
                                            }

                                            content += `
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            `;

                                            html2pdf().from(content).save('invoice.pdf');
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
        });
    </script>
@endsection
