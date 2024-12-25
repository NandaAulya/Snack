<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full bg-gray-200">
    <div class="flex h-full">
        <div class="w-64 h-full bg-white text-gray-700 flex-shrink-0 border-r border-gray-300 fixed top-0 left-0 z-10 overflow-y-auto">
            <div class="p-4 border-b border-gray-300">
                <h2 class="mt-4 text-center text-xl font-bold">Admin Dashboard</h2>
            </div>
            <x-adminnav></x-adminnav>
        </div>
        <div class="flex-1 p-6 ml-64">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
