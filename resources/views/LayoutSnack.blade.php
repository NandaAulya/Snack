<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen">
    <x-nav-dashboard></x-nav-dashboard>
    <div class="flex min-h-screen bg-white">
        <!-- Sidebar -->
        <div class="min-h-screen w-64 text-gray-700 bg-white border-r border-gray-300">
            <x-adminnav></x-adminnav>
        </div>
        <div class="flex-1 p-6 ">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
