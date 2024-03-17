@extends('home.layout')

@section('content')
    {{--
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="register">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: Siddharth" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: siddharth@gmail.com" required="">
                        </div>
                        <div>
                            <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900">Mobile
                                Number</label>
                            <input type="tel" name="mobile_no" id="mobile_no"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                placeholder="Ex: 6202067088" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <input type="password_confirmation" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                required="">
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                            an account</button>
                        <p class="text-sm font-medium text-gray-700">
                            Already have an account? <a href="{{ route('login') }}"
                                class="font-medium text-blue-600 hover:underline">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
     --}}

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center min-h-screen px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full max-w-md bg-white rounded-lg shadow-md p-6 dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-4 md:space-y-6" id="register">
                    <div id="step1" class="step block p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="mb-4 text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Create an account</h1>
                        <p class="mb-2">Step 1 of 3</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-blue-600 rounded-full text-xs leading-none py-1 text-center text-white"
                                    style="width: 20%;">20%</div>
                            </div>
                        </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ex: Siddharth" required="">
                            </div>
                            <div>
                                <label for="father" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Father's Name</label>
                                <input type="text" name="f_name" id="f_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ex: Siddharth" required="">
                            </div>
                            <div>
                                <label for="gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Choose Your Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Others</option>
                                </select>

                            </div>
                            <button type="button" onclick="nextStep()"
                                class="w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-white ">Next</button>
                    </div>

                    <div id="step2" class="step hidden p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="mb-4 text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Contact Info</h1>
                        <p class="mb-2">Step 2 of 3</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-blue-600 rounded-full text-xs leading-none py-1 text-center text-white"
                                    style="width: 40%;">40%</div>
                            </div>
                        </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ex: r@gmail.com" required="">
                            </div>
                            <div>
                                <label for="mobile_no"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Mobile No.</label>
                                <input type="text" name="mobile_no" id="mobile_no"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ex: 789456125" required="">
                            </div>
                            <div>
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="address" id="address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Khushkibagh Purnea" required="">
                            </div>
                            <div class="flex gap-1">
                                <button type="button" onclick="prevStep()"
                                    class="w-1/2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-white">Back</button>
                                <button type="button" onclick="nextStep()"
                                    class="w-1/2 float-end bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-white">Next</button>
                            </div>
                    </div>
                    <div id="step3" class="step hidden p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="mb-4 text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Create Your Password</h1>
                        <p class="mb-2">Step 3 of 3</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="bg-blue-600 rounded-full text-xs leading-none py-1 text-center text-white"
                                    style="width: 80%;">80%</div>
                            </div>
                        </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="••••••••" required="">
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="••••••••" required="">
                            </div>
                            <div class="flex gap-1">
                                <button type="button" onclick="prevStep()"
                                    class="w-1/2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-white">Back</button>
                                <button type="submit"
                                    class="w-1/2 float-end bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-white">Submit</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


    <script>

        // Registration Button functions

        let currentStep = 1;
        const totalSteps = 3;

        function nextStep() {
            if (currentStep < totalSteps) {
                document.getElementById(`step${currentStep}`).classList.remove('block');
                document.getElementById(`step${currentStep}`).classList.add('hidden');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.remove('hidden');
                document.getElementById(`step${currentStep}`).classList.add('block');
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.remove('block');
                document.getElementById(`step${currentStep}`).classList.add('hidden');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.remove('hidden');
                document.getElementById(`step${currentStep}`).classList.add('block');
            }
        }
    
        // Registration Work
        
        $(document).ready(function() {

            $('#register').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('addStudent') }}',
                    url: '{{ route('addStudent') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display success message with SweetAlert
                        swal("Registration Successful!", "", "success");
                        // Reset the form
                        $('#register')[0].reset();
                        // Redirect to login page
                        setTimeout(() => {
                            window.location.href = '/login';
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        alert(JSON.parse(xhr.responseText).message);
                    }
                });
            });
        });
    </script>
@endsection
