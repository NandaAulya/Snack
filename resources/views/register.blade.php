<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,400;0,600;0,700;0,800;0,900&display=swap');
    </style>
</head>

<body class="bg-center h-screen flex justify-center items-center" style="background-color: #eee0e9">
    <!-- Overlay -->
    {{-- <div class="absolute inset-0 bg-black opacity-50"></div> --}}

    <!-- Container -->
    <div class="relative z-10 flex flex-col md:flex-row rounded-lg shadow-lg w-10/12 md:w-1/2 max-w-5xl overflow-hidden h-[450px]" style="background-color: #FFC0D9">
        <!-- Image Side -->
        <div class="hidden md:flex md:w-1/2 bg-gray p-4">
            <img src="{{ asset('img/pink.jpg') }}" alt="Pocky Products" class="object-cover w-[270px] h-[350px] m-auto rounded-lg">
        </div>

        <!-- Form Side -->
        <div class="w-full md:w-1/2 text-white p-6 md:p-12 flex flex-col justify-center" style="background-color: #FF90BC">
            <h2 class="text-3xl font-bold mb-10 text-center" style="color: #F9F9E0">Register</h2>

            @if ($errors->any())
                <div class="bg-red-400 text-white p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Username Input -->
                <input type="text" name="username" placeholder="Username" class="border p-2 w-full mb-4 bg-white text-white rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <!-- Email Input -->
                <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-4 bg-white text-white rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <!-- Full Name Input -->
                <input type="text" name="full_name" placeholder="Full Name" class="border p-2 w-full mb-4 bg-white text-white rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <!-- Password Input -->
                <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-4 bg-white text-white rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <!-- Confirm Password Input -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full mb-10 bg-white text-white rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="w-[170px] h-12 text-white rounded shadow-md font-semibold text-xl hover:bg-pink-600" style="background-color: #fd17a5">
                        Register
                    </button>
                </div>
            </form>

            <p class="text-center mt-6 font-semibold text-white">
                Already have an account? <a href="{{ route('login') }}" class=" hover:underline" style="color: #fd17a5">Login</a>
            </p>

        </div>
    </div>
</body>

</html>
