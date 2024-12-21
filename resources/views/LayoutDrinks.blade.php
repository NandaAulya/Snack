<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    @vite('resources/css/app.css')
</head>

<body class=h-screen">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 h-screen text-white bg-primary">
            <div class="p-4 border-b border-gray-300">
                <img class="h-10 w-10 rounded-full mx-auto border-2 border-gray-500"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2o1bk_gkv4AThueOSDDfXY5hkFQNh7vxTvqS_LJvYhTWVA26yhorL5mWb9KfZKe5Eo3g&usqp=CAU"
                    alt="Admin Avatar">
                <h2 class="mt-4 text-center text-xl font-bold">Admin Dashboard</h2>
            </div>
            <x-adminnav></x-adminnav>
        </div>
            <div class="container mx-auto mb-10">
                @yield('content')
            </div>
    </div>
</body>

</html>
