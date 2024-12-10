<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/register.js')
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[550px] bg-white text-primary rounded-xl p-10 shadow-lg">
        <!-- Error Message -->
        @if ($errors->any())
            <div class="text-red-500 mb-4 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Register Form -->
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-6xl font-bold text-primary1 text-center mt-6">Register</h1>

            <!-- Username Input -->
            <div class="relative mb-6 mt-10">
                <input id="username" name="username" type="text" placeholder="Username" required
                    class="w-full h-12 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-user"></i>
            </div>

            <!-- Email Input -->
            <div class="relative mb-6">
                <input id="email" name="email" type="email" placeholder="Email" required
                    class="w-full h-12 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-envelope"></i>
            </div>

            <!-- Full Name Input -->
            <div class="relative mb-6">
                <input id="full_name" name="full_name" type="text" placeholder="Full Name" required
                    class="w-full h-12 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-user"></i>
            </div>

            <!-- Password Input -->
            <div class="relative mb-6">
                <input id="password" name="password" type="password" placeholder="Password" required
                    class="w-full h-12 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-lock-alt"></i>
            </div>

            <!-- Confirm Password Input -->
            <div class="relative mb-6">
                <input id="confirm-password" name="password_confirmation" type="password" placeholder="Confirm Password" required
                    class="w-full h-12 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-lock-alt"></i>
            </div>

            <!-- Show Password -->
            <div class="flex items-center mb-8">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-base text-primary">Show Password</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-[170px] h-12 text-white rounded-md shadow-md font-semibold text-xl bg-primary hover:bg-primary1">
                    Register
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-8">
                <p class="text-lg text-accent">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-primary1 font-semibold hover:text-primary">Login</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
