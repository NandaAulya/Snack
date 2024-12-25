<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HALAMAN HOME</title>
    @vite('resources/css/app.css')
    @vite('resources/js/deskripsi.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .card-image {
            height: 12rem;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 0.5rem; 
        }
        .card-image img {
            height: 100%;
            width: auto;
            object-fit: contain;
        }
    </style>
</head>

<body class="h-full bg-white">
    <x-navbar></x-navbar>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 p-6 mt-20 z-[1]">
        <!-- Snack Cards -->
        @foreach ($snacks as $snack)
            <div class="relative flex flex-col rounded-lg bg-white text-gray-700 shadow-md w-full max-w-xs mx-auto">
                <div class="card-image mt-10">
                    <img src="{{ asset($snack->image) }}" alt="{{ $snack->name }}">
                </div>
                <div class="p-4">
                    <p class="font-medium text-blue-gray-900 text-sm mb-2">{{ $snack->name }}</p>
                    <p class="text-xs text-gray-700 opacity-75 truncate-description mb-2" title="{{ $snack->description }}">
                        {{ $snack->description }}
                    </p>
                    <p class="mb-2 text-right font-medium text-blue-gray-900 text-sm">Rp. {{ number_format($snack->price, 0, ',', '.') }}</p>
                </div>
                <div class="p-4 pt-0">
                    <button
                        class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-xs font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                        type="button">
                        See Detail
                    </button>
                </div>
            </div>
        @endforeach

        <!-- Drink Cards -->
        @foreach ($drinks as $drink)
            <div class="relative flex flex-col rounded-lg bg-white text-gray-700 shadow-md w-full max-w-xs mx-auto z-[1]">
                <div class="card-image mt-10">
                    <img src="{{ asset($drink->image_path) }}" alt="{{ $drink->name }}">
                </div>
                <div class="p-4">
                    <p class="font-medium text-blue-gray-900 text-sm mb-2">{{ $drink->name }}</p>
                    <p class="text-xs text-gray-700 opacity-75 truncate-description" title="{{ $drink->description }}">
                        {{ $drink->description }}
                    </p>
                    <p class="mt-2 text-right font-medium text-blue-gray-900 text-sm">Rp. {{ number_format($drink->price, 0, ',', '.') }}</p>
                </div>
                <div class="p-4 pt-0">
                    <button
                        class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-xs font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                        type="button">
                        See Detail
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>