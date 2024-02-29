@extends('home.layout')

@section('content')

<div class="container mx-auto mt-5">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-200 py-4 px-6">
                    <h3 class="text-lg font-semibold text-center">Login</h3>
                </div>
                <div class="p-6">
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label for="email" class="block mb-2">Email</label>
                            <input type="email" name="email" placeholder="Enter email" class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block mb-2">Password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-input w-full">
                        </div>
                        <div class="mb-4">
                            <input type="submit" value="Login" class="btn btn-success w-full">
                        </div>
                    </form>
                    <p class="text-center"><a href="#">Don't have an account?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection