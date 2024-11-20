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

<body class="bg-cover bg-center h-screen flex justify-center items-center" style="background-image: url('/img/makanan-image.png');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black opacity-80"></div>

    <!-- Container -->
    <div class="relative z-10 flex flex-col md:flex-row bg-gray-800 rounded-lg shadow-lg w-11/12 md:w-4/5 max-w-4xl overflow-hidden">

        <div class="hidden md:flex md:w-1/2 bg-gray p-4">
            <img src="{{ asset('img/makanan.png') }}" alt="Pocky Products" class="object-cover w-[200px] h-[300px] m-auto">
        </div>

        <!-- Form Side -->
        <div class="w-full md:w-1/2 bg-gray-900 text-white p-6 md:p-12 flex flex-col justify-center">
            <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4 rounded">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email" class="w-full p-3 border border-gray-300 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <input type="password" name="password" id="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="flex items-center mb-8">
                    <input type="checkbox" id="show-password" class="mr-2">
                    <label for="show-password" class="text-base text-white">Show Password</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded">Sign In</button>
            </form>

            <!-- Register Link -->
            <p class="text-center mt-6">
                Don't have an account? <a href="{{ route('register') }}" class="text-orange-500 hover:underline">Register</a>
            </p>
        </div>
    </div>
</body>

</html>
