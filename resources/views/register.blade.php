<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-center text-4xl mb-4">Register</h1>
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
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full mb-4" required>
            <button type="submit" class="bg-blue-500 text-white p-2 w-full">Register</button>
        </form>
    </div>
</body>
</html>