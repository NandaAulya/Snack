<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/login.js') 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        </style>
</head>

<body class="bg-center h-screen flex justify-center items-center" style="background-color: #eee0e9" >
    <!-- Overlay -->
    {{-- <div class="absolute inset-0 bg-black opacity-50"></div> --}}

    <!-- Container -->
    <div class="relative z-10 flex flex-col md:flex-row rounded-lg shadow-lg w-10/12 md:w-1/2 max-w-5xl overflow-hidden h-[400px]" style="background-color: #FFC0D9">


        <div class="hidden md:flex md:w-1/2 bg-gray p-4">
            <img src="{{ asset('img/pink.jpg') }}" alt="Pocky Products" class="object-cover w-[270px] h-[350px] m-auto rounded-lg">
        </div>

        <!-- Form Side -->
        <div class="w-full md:w-1/2 text-white p-6 md:p-12 flex flex-col justify-center" style="background-color: #FF90BC">
            <h2 class="text-3xl font-bold mb-10 text-center" style="color: #F9F9E0">Login</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4 rounded">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email" class="w-full p-3 border border-gray-400 rounded bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <input type="password" name="password" id="password" placeholder="Password" class="w-full p-3 border border-gray-400 rounded bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-400" required>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center mb-8">
                    <input type="checkbox" id="show-password" class="mr-2">
                    <label for="show-password" class="text-base" style="color: #F9F9E0">Show Password</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded" style="background-color: #fd17a5">Sign In</button>
            </form>

            <!-- Register Link -->
            <p class="text-center mt-8 font-semibold text-white">
                Don't have an account? <a href="{{ route('register') }}" class=" hover:underline" style="color: #fd17a5">Register</a>
            </p>
        </div>
    </div>
</body>

</html>
