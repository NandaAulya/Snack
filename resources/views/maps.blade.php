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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8  mx-auto mt-12 px-4 mb-10">
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
                    <a href="https://www.google.com/maps/place/Jl.+Klampis+Ngasem+Jl.+Klampis+Ngasem+Gg.+Masjid+No.9A,+Klampis+Ngasem,+Kec.+Sukolilo,+Surabaya,+Jawa+Timur+60117/@-7.285916,112.7729818,864m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2dd7fa47f007511b:0x9e7c29bd35413501!8m2!3d-7.285916!4d112.7755567!16s%2Fg%2F11c15hqll7?entry=ttu&g_ep=EgoyMDI1MDExNS4wIKXMDSoASAFQAw%3D%3Dy" target="_blank">See on Google Maps</a>
                </p>
                <p class="text-gray-700 mt-2">Open Hours: 08:00 - 23:00</p>
                <p class="text-gray-700">Phone: +62 812 3456 7890</p>
                <p class="text-gray-700">Email: ahnasution@forecoffee.com</p>
            </div>
        </div>
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
                    <a href="https://www.google.com/maps/place/Jl.+Pakis+Gn.+1C+No.77,+RT.014%2FRW.04,+Pakis,+Kec.+Sawahan,+Surabaya,+Jawa+Timur+60256/@-7.2864531,112.7229144,864m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2dd7fbf2eb726f69:0xb09373c5a8e89ba9!8m2!3d-7.2864531!4d112.7254893!16s%2Fg%2F11vc16rqdm?entry=ttu&g_ep=EgoyMDI1MDExNS4wIKXMDSoASAFQAw%3D%3D" target="_blank">See on Google Maps</a>
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