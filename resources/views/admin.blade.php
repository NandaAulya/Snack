<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    @vite('resources/css/app.css') <!-- Tambahkan jika menggunakan Laravel Mix/Vite -->
</head>
<body class="bg-gray-200">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 border-b border-gray-700">
                <img class="h-10 w-10 rounded-full mx-auto border-2 border-gray-500" src="https://example.com/avatar.jpg" alt="Admin Avatar">
                <h2 class="mt-4 text-center text-xl font-bold">Admin Dashboard</h2>
            </div>
            <nav class="mt-6 space-y-1">
                <a href="{{ route('admin.manageFilm') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Film</a>
                <a href="{{ route('admin.manageBioskop') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Bioskop</a>
                <a href="{{ route('admin.manageUser') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Pengguna</a>
                <a href="{{ route('admin.managePenayangan') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Penayangan</a>
                <a href="{{ route('home') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Home</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</body>
</html>