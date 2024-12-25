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
            top: 5%;
            left: 45%;
            transform: translateY(-50%);
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body class="h-screen">
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 h-screen text-gray-700 bg-white">
            <div class="p-4 border-b border-gray-300">
                <h2 class="mt-4 text-center text-xl font-bold">Admin Dashboard</h2>
            </div>
            <x-adminnav></x-adminnav>
        </div>
    </div>
    <div id="typing-text" class="text-5xl font-bold text-gray-700"></div>

</body>
</html>
