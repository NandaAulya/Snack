<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[500px] h-[550px] bg-white text-black  rounded-2xl p-10 shadow-lg">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-center text-5xl mb-20 mt-10 font-bold text-[#9398e0]">Register</h1>
            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="text" name="username" placeholder="Username" class="border p-2 w-full mb-4" required>
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-4" required>
            <input type="text" name="full_name" placeholder="Full Name" class="border p-2 w-full mb-4" required>
            <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-4" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full mb-10" required>
            <div class="flex justify-center">
                <button type="submit"  class="w-[170px] h-12 text-white rounded-sm shadow-md font-semibold text-xl"
                style="background-color: #9398e0">Register</button>
            </div>
        </form>
    </div>
</body>
</html>