<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAPS</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/mapKey.js')
</head>

<body>
    <x-navbar></x-navbar>
    <div id="map" class="flex justify-center items-center w-full h-[500px] mx-auto z-[1]"></div>

    <!-- Hero Section -->
    <div class="text-center mt-12">
        <h1 class="text-4xl font-bold text-green-700">Our Store</h1>
        <p class="text-gray-500 mt-2">Explore our locations and get in touch</p>
    </div>

    <!-- Store Section -->
    <div class="grid grid-cols-1 gap-8 max-w-5xl mx-auto mt-12 px-4 mb-10">
        <!-- Store Card 1 -->
        <div class="flex flex-col md:flex-row items-center border rounded-lg shadow-lg p-6">
            <!-- Image -->
            <img src="{{ asset('images/ppp.png') }}" alt="A.H Nasution" class="rounded-lg w-full md:w-1/3 mb-4 md:mb-0 md:mr-6">
            <!-- Content -->
            <div class="flex flex-col">
                <h2 class="text-xl font-bold">A.H Nasution</h2>
                <p class="text-gray-600 text-sm">
                    Fore Coffee A.H Nasution - Jl. AH. Nasution komp. griya milala ruko a4-a6, 
                    Pangkalan Masyhur, Kec. Medan Johor, Kota Medan, Sumatera Utara 20146
                </p>
                <p class="text-green-600 mt-2">
                    <a href="https://www.google.com/maps" target="_blank">See on Google Maps</a>
                </p>
                <p class="text-gray-700 mt-2">Open Hours: 08:00 - 23:00</p>
                <p class="text-gray-700">Phone: +62 812 3456 7890</p>
                <p class="text-gray-700">Email: ahnasution@forecoffee.com</p>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>