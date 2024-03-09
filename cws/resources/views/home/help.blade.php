@extends('home.layout')

@section('content')
    <div class="md:mt-20 mt-16 md:mb-32 ">
        <div class="container mx-auto my-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Need Assistance?</h2>

                <!-- Support Information -->
                <div class="flex flex-col md:flex-row gap-10">
                    <!-- Contact Information -->
                    <div class="w-full md:w-1/3">
                        <div class="bg-blue-100 border border-blue-200 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-800 mb-2">Contact Us</h3>
                            <p class="text-blue-700">We're here to help! Reach out to our support team:</p>
                            <ul class="mt-2">
                                <li><span class="font-semibold">Email:</span> codewithsadiq.com</li>
                                <li><span class="font-semibold">Phone:</span> +91 9546805580</li>
                            </ul>
                        </div>
                        <!-- Contact Form -->
                        <div class="mt-6 bg-white border border-gray-200 p-4 rounded-lg">
                            <form action="#" method="POST">
                                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">

                                <label for="email" class="block mt-2 text-sm font-medium text-gray-700">Your
                                    Email</label>
                                <input type="email" id="email" name="email"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">

                                <label for="message" class="block mt-2 text-sm font-medium text-gray-700">Message</label>
                                <textarea id="message" name="message" rows="4"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"></textarea>

                                <button type="submit"
                                    class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:border-blue-700 focus:ring-blue active:bg-blue-700 transition ease-in-out duration-150">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- FAQs -->
                    <div class="w-full md:w-2/3">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Frequently Asked Questions</h3>
                        <!-- FAQ List -->
                        <div class="space-y-4">
                            <!-- FAQ Item 1 -->
                            <div>
                                <h4 class="font-semibold text-gray-800">Q: How do I enroll in a course?</h4>
                                <p class="text-gray-700">Ans: To enroll in a course, follow these steps:</p>
                                <ol class="list-decimal pl-6 mt-2">
                                    <li>Browse our course catalog.</li>
                                    <li>Click on the course you're interested in.</li>
                                    <li>Click the "Enroll" button.</li>
                                    <li>Follow the instructions to complete the enrollment process.</li>
                                </ol>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div>
                                <h4 class="font-semibold text-gray-800">Q: How can I access my purchased courses?</h4>
                                <p class="text-gray-700">Ans: To access your purchased courses, follow these steps:</p>
                                <ol class="list-decimal pl-6 mt-2">
                                    <li>Log in to your account.</li>
                                    <li>Go to the "My Courses" section.</li>
                                    <li>Find the course you want to access and click on it.</li>
                                    <li>You will be redirected to the course page where you can start learning.</li>
                                </ol>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div>
                                <h4 class="font-semibold text-gray-800">Q: What should I do if I encounter technical issues?
                                </h4>
                                <p class="text-gray-700">Ans: If you encounter technical issues while using our platform,
                                    try the following troubleshooting steps:</p>
                                <ol class="list-decimal pl-6 mt-2">
                                    <li>Refresh the page and try again.</li>
                                    <li>Clear your browser's cache and cookies.</li>
                                    <li>Check your internet connection.</li>
                                    <li>If the issue persists, contact our support team for assistance.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
