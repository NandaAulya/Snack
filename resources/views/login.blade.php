<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/js/login.js')
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
        <div class="flex-1 bg-white h-full p-10 flex flex-col justify-center container">
            <h1 id="typing-text" class="text-6xl font-poppins font-bold text-gray-700"></h1>
            <div class="mt-48 flex justify-center">
                <img src="{{ asset('images/ppp.png') }}" alt="logo" class="w-[550px] h-[650px]">
            </div>
        </div>

        {{-- login form  --}}
        <div class="flex-1 p-10 flex flex-col justify-center items-center">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-poppins font-bold text-gray-700">Log in</h1>
            </div>

            @if ($errors->any())
                <div class="mb-4 w-full md:w-[400px] bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-poppins font-bold text-lg">Opppsss!!</strong>
                    <span class="block font-poppins font-bold mt-2 list-disc text-lg">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </span>
                </div>
            @endif

            {{-- login with go --}}
            <div class="flex flex-col gap-3 mb-6">
                <button type="submit"
                    class="flex items-center justify-center w-full md:w-[400px] h-12 bg-white border-2 border-gray-300 rounded-md text-gray-700 text-lg font-semibold shadow-sm hover:bg-gray-50">
                    <img src="https://static-00.iconduck.com/assets.00/google-icon-2048x2048-pks9lbdv.png"
                        alt="Google" class="w-5 h-5 mr-2 font-poppins font-semibold">
                    <a href="{{ route('auth.google') }}">Log in with Google</a>
                </button>
            </div>

            <div class="flex items-center justify-center mb-6">
                <span class="px-4 text-gray-700 text-lg font-poppins font-semibold">or email</span>
            </div>

            {{-- email input  --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                        placeholder="Enter your email address" required
                        class="font-poppins text-lg w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- pw input  --}}
                <div class="mb-4 relative">
                    <input id="password" name="password" type="password" placeholder="Enter your password" required
                        class="font-poppins text-lg w-full md:w-[400px] h-12 bg-gray-50 border-2 border-gray-300 rounded-md px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- show password --}}
                <div class="flex items-center mb-10">
                    <input type="checkbox" id="show-password" class="mr-2">
                    <label for="show-password" class="text-base text-gray-500 font-poppins">Show Password</label>
                </div>

                {{-- submit button --}}
                <div class="mb-4">
                    <button type="submit"
                        class="w-full md:w-[400px] h-12 bg-blue-600 text-white rounded-md font-semibold text-lg hover:bg-blue-700 font-poppins">Log
                        in</button>
                </div>

                <div class="text-center">
                    <p class="text-gray-500 text-lg font-poppins">
                        Don't have an account? <a href="{{ route('register') }}"
                            class="text-blue-500 font-medium hover:underline">Create an account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
