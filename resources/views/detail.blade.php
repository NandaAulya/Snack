<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg overflow-hidden relative">
        <!-- Carousel navigation -->
        <div class="absolute inset-y-0 left-0 flex items-center">
            <button id="prev" class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center">
            <button id="next" class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div id="carousel-items" class="p-6">
            @foreach (array_merge($snacks->toArray(), $drinks->toArray()) as $item)
                <div class="carousel-item text-center {{ $loop->first ? '' : 'hidden' }}">
                    <img src="{{ asset($item['image'] ?? $item['image_path']) }}" alt="{{ $item['name'] }}" class="mx-auto w-32 h-32 object-cover rounded-lg">
                    <h2 class="text-2xl font-bold mt-4 text-gray-800">{{ $item['name'] }}</h2>
                    <p class="text-gray-600 mt-2">{{ $item['description'] }}</p>
                    <div class="mt-6">
                        <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 3v18m6-18v18" />
                            </svg>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        document.getElementById('prev').addEventListener('click', () => {
            items[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            items[currentIndex].classList.remove('hidden');
        });

        document.getElementById('next').addEventListener('click', () => {
            items[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.remove('hidden');
        });
    </script>
</body>
</html>