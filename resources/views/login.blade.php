<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/login.js')
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[450px] h-auto bg-white text-primary rounded-xl p-10 shadow-lg">
        <!-- Error Message -->
        @if ($errors->any())
            <div class="text-red-500 mb-4 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="text-6xl font-bold text-primary1 text-center mt-6">Login</h1>

            <!-- Email Input -->
            <div class="relative mb-8 mt-10">
                <input id="email" name="email" type="email" placeholder="Email" required
                    class="w-full h-14 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-user"></i>
            </div>

            <!-- Password Input -->
            <div class="relative mb-6">
                <input id="password" name="password" type="password" placeholder="Password" required
                    class="w-full h-14 bg-transparent border-2 border-black/20 rounded-md text-xl text-primary px-4 focus:outline-none placeholder-primary">
                <i class="absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300 bx bxs-lock-alt"></i>
            </div>


            <!-- Show Password -->
            <div class="flex items-center mb-10">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-base text-primary">Show Password</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-[170px] h-12 text-white rounded-md shadow-md font-semibold text-xl bg-primary hover:bg-primary1 hover:rounded-md">Login</button>
            </div>

            <!-- Google Login Button -->
            <div class="flex justify-start mt-10">
                <button type="submit" class="w-[100px] h-12 text-white rounded-md shadow-md font-semibold text-sm bg-red-500 hover:bg-red-600 hover:rounded-md"><a href="{{ route('auth.google') }}">Login with google</a></button>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-8">
                <p class="text-lg text-accent">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-primary1 font-semibold hover:text-primary">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
