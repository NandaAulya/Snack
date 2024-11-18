<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="text-center text-4xl mb-4">Login</h1>
            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 mb-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full mb-4" required>
            <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-4" required>
            <button type="submit" class="bg-blue-500 text-white p-2 w-full">Login</button>
        </form>
    </div>
</body>

</html>
