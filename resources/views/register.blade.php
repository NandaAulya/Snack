<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    @vite('resources/js/register.js')
    @vite('resources/js/text.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        * {
            font-family: "Poppins", serif;
        }
        #typing-text {
            position: absolute;
            top: 10%;
            left: 15%;
            transform: translateY(-50%);
        }
        .container {
            position: relative;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen font-poppins">
    <div class="flex w-full h-full bg-text">
        <!-- Left Side (Illustration) -->
        <div class="flex-1 bg-white h-full p-10 flex flex-col justify-center container">
            <h1 id="typing-text" class="text-6xl font-bold font-poppins text-gray-700"></h1>
            <div class="mt-48 flex justify-center">
                <img src="{{ asset('images/ppp.png') }}" alt="logo" class="w-[550px] h-[650px]">
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="flex-1 p-10 flex flex-col justify-center items-center">
            <div class="text-center mb-10">
                <h1 class="text-6xl font-poppins font-bold text-gray-700">Register</h1>
            </div>

            <!-- Register Form -->
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Username Input -->
                <div class="mb-4">
                    <input id="username" name="username" type="text" placeholder="Username" required
                        class="w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <input id="email" name="email" type="email" placeholder="Enter your email address" required
                        class="w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Full Name Input -->
                <div class="mb-4">
                    <input id="full_name" name="full_name" type="text" placeholder="Full Name" required
                        class="w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <input id="password" name="password" type="password" placeholder="Enter your password" required
                        class="w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <input id="confirm-password" name="password_confirmation" type="password" placeholder="Confirm Password" required
                        class="w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Show Password -->
                <div class="flex items-center mb-10">
                    <input type="checkbox" id="show-password" class="mr-2">
                    <label for="show-password" class="text-base text-gray-500">Show Password</label>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full md:w-[400px] h-12 bg-blue-600 text-white rounded-md font-semibold text-lg hover:bg-blue-700">Register</button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-gray-500 text-sm">
                        Already have an account? <a href="{{ route('login') }}" class="text-blue-500 font-medium hover:underline">Log in</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
