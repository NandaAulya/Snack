<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFILE</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: "Poppins", serif;
        }
    </style>
</head>
<body class="h-screen">
    <div class="flex flex-row w-full h-full bg-gray-100">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white p-6 shadow-md">
            <div class="flex flex-col items-center text-center mb-6">
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full mb-2">
                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ Auth::user()->full_name }}</h2>
            </div>
            <nav>
                <ul class="space-y-4 text-xl font-medium">
                    <li><a href="{{ route('profile') }}" class="text-gray-600 hover:text-blue-500">Profil</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-500">History</a></li>
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-500">Home</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-500">Logout</button>
                    </form>          
                </ul>
            </nav>
        </div>
    
        <!-- Main Content -->
        <div class="w-3/4 bg-white p-8 shadow-md">
            <h2 class="text-4xl font-bold mb-6 capitalize">my profile</h2>
            <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-xl font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-xl font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->full_name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-xl font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>