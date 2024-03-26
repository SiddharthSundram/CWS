<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    @if ($errors->any())

        <ul>
            @foreach ($errors->all as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-100">
                    <div class="container mt-20">
                        <h1 class="text-xl underline font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                            Reset Password
                        </h1>
                        <form method="POST" class="space-y-4 md:space-y-6 mt-5 mb-2">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <div>
                                    <input type="email" name="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                        placeholder="Enter your email">
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New
                                    Password</label>
                                <div>
                                    <input type="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                        name="password" placeholder="New Password">
                                </div>
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900">Confirm New Password</label>
                                <div>
                                    <input type="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                        name="password_confirmation" placeholder="Confirm New Password">
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Reset Password"
                                    class="w-full text-white mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                <p class="text-sm text-gray-700 font-medium">
                                    Want to go back to login? <a href="/login"
                                        class="font-medium text-blue-600 hover:underline">Login</a>
                                </p>
                            </div>
                        </form>
                        <div class="result mb-20 mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
