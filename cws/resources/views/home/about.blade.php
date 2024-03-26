@extends('home.layout')

@section('title')
    About CWS | 
@endsection

@section('content')
        <div class="container mx-auto py-8 mt-5 md:mt-10">
            <h1 class="text-3xl font-bold text-center mb-8">Purnea's Premier Programming Institute!</h1>

            <div class="max-w-3xl mx-auto bg-white p-2">
                <p class="text-lg mb-6">At Code with Sadiq, we take pride in being the most popular programming language
                    class in Purnea, Bihar. Our institute is dedicated to providing high-quality education and training in
                    various programming languages to aspiring individuals who want to embark on a successful journey in the
                    world of coding.</p>

                <h2 class="text-xl font-bold mb-4">Our Mission:</h2>
                <p class="mb-6">At Code with Sadiq, our mission is to empower students with comprehensive programming
                    knowledge and skills that are essential for success in today's digital age. We strive to create a
                    stimulating and inclusive learning environment where students can explore their passion for coding and
                    acquire the expertise needed to thrive in the ever-evolving tech industry.</p>

                <h2 class="text-xl font-bold mb-4">Why Choose Us?</h2>
                <ul class="list-disc pl-8 mb-6">
                    <li class="mb-2">Experienced and Dedicated Instructors</li>
                    <li class="mb-2">Comprehensive Curriculum</li>
                    <li class="mb-2">Hands-on Projects and Practical Assignments</li>
                    <li class="mb-2">Small Class Sizes</li>
                    <li class="mb-2">Industry-Relevant Skills</li>
                    <li class="mb-2">Placement Assistance</li>
                    <li class="mb-2">Supportive Learning Environment</li>
                </ul>


                {{-- link the courses page when created --}}
                <p class="text-center mb-5">
                    <a href="{{route('register')}}" class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Join Us
                        Today</a>
                </p>

                <p class="text-center text-gray-600">We're excited to embark on this journey with you!</p>
                <p class="text-center mt-8 text-gray-600">Whether you are a student aiming to kickstart your coding journey
                    or a professional seeking to upskill, Code with Sadiq is here to support your aspirations. Join us today
                    and unlock the door to endless possibilities in the exciting world of programming. Enroll now and let
                    Code with Sadiq be your trusted partner on your path to programming excellence.</p>
            </div>

        </div>
@endsection
