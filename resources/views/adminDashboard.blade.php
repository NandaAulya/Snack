<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    @vite('resources/css/app.css')
    @vite('resources/js/text2.js')
    <style>
        #typing-text {
            position: absolute;
            top: 18%;
            left: 45%;
            transform: translateY(-50%);
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
    </style>
</head>

<body class="h-screen">
    <x-nav-dashboard></x-nav-dashboard>
    <div id="typing-text" class="text-6xl font-bold text-gray-500 z-10 "></div>
    <div class="flex h-screen bg-white">
        <!-- Sidebar -->
        <div class="w-64 h-screen text-gray-700 bg-white border-r border-gray-300">
            <x-adminnav></x-adminnav>
        </div>
        <div class="flex flex-col items-start w-full bg-white mt-28">
            <!-- Cards Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-20 w-full px-28">
                <div class="relative rounded-lg bg-white border border-gray-300 shadow-md p-4">
                    @php
                        $totalDrinks = $drinks
                            ->filter(function ($drink) {
                                return $drink;
                            })
                            ->count();
                    @endphp
                    <p class="font-medium text-gray-700 text-2xl mb-2">Total Drinks</p>
                    <p class="text-2xl text-gray-700 font-bold">{{ $totalDrinks }}</p>
                </div>
                <div class="relative rounded-lg bg-white border border-gray-300 shadow-md p-4">
                    @php
                        $totalSnacks = $snacks
                            ->filter(function ($snack) {
                                return $snack;
                            })
                            ->count();
                    @endphp
                    <p class="font-medium text-2xl text-gray-700 mb-2">Total Snacks</p>
                    <p class="text-2xl text-gray-700 font-bold">{{ $totalSnacks }}</p>
                </div>
                <div class="relative rounded-lg bg-white border border-gray-300 shadow-md p-4">
                    @php
                        $totalUser = $users
                            ->filter(function ($user) {
                                return $user;
                            })
                            ->count();
                    @endphp
                    <p class="font-medium text-2xl text-gray-700 mb-2">Total User</p>
                    <p class="text-2xl text-gray-700 font-bold">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
