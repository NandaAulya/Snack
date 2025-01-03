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
    <link rel="stylesheet" href="fontawesome/css/all.css" />
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

<body class="h-full bg-white" x-data="{ selectedItem: null, showDetail: false, cart: [] }">
    <x-navbar></x-navbar>

    <!-- Wrapper untuk efek blur -->
    <div :class="showDetail ? 'backdrop-blur-xl' : ''" class="transition-all duration-300">
        <!-- Grid untuk Snack dan Drink Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 p-6 mt-20 z-[1]">
            <!-- Snack Cards -->
            @foreach ($snacks as $snack)
                <div class="relative flex flex-col rounded-lg bg-white text-gray-700 shadow-md w-full max-w-xs mx-auto">
                    <div class="card-image mt-10">
                        <img src="{{ asset($snack->image) }}" alt="{{ $snack->name }}">
                    </div>
                    <div class="p-4">
                        <p class="font-medium text-blue-gray-900 text-md mb-2 capitalize text-bold">{{ $snack->name }}
                        </p>
                        <p class="text-base text-gray-700 opacity-75 truncate-description mb-2"
                            title="{{ $snack->description }}">
                            {{ $snack->description }}
                        </p>
                        <p class="mb-2 text-right font-medium text-blue-gray-900 text-base text-bold">Rp.
                            {{ number_format($snack->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-sm font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                            type="button"
                            @click="selectedItem = {    
                            name: `{{ $snack->name }}`, 
                            description: `{{ $snack->description }}`, 
                            price: `{{ number_format($snack->price, 0, ',', '.') }}`,
                            image: `{{ asset($snack->image) }}`
                        }; showDetail = true">
                            See Detail
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Drink Cards -->
            @foreach ($drinks as $drink)
                <div
                    class="relative flex flex-col rounded-lg bg-white text-gray-700 shadow-md w-full max-w-xs mx-auto z-[1]">
                    <div class="card-image mt-10">
                        <img src="{{ asset($drink->image_path) }}" alt="{{ $drink->name }}">
                    </div>
                    <div class="p-4">
                        <p class="font-medium text-blue-gray-900 text-md mb-2 capitalize text-bold">{{ $drink->name }}
                        </p>
                        <p class="text-base text-gray-700 opacity-75 truncate-description text-semibold"
                            title="{{ $drink->description }}">
                            {{ $drink->description }}
                        </p>
                        <p class="mt-2 text-right font-medium text-blue-gray-900 text-sm">Rp.
                            {{ number_format($drink->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-sm font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                            type="button"
                            @click="selectedItem = { 
                            name:  `{{ $drink->name }}`, 
                            description: `{{ $drink->description }}`,
                            quantity: 0, 
                            price: `{{ number_format($drink->price, 0, ',', '.') }}`,
                            image: `{{ asset($drink->image_path) }}`
                        }; showDetail = true">
                            See Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-footer></x-footer>

    <!-- Modal untuk Detail Item -->
    <div x-show="showDetail" class="fixed inset-0 bg-black/50 flex justify-center items-center z-50"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        @click.away="showDetail = false">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[500px] h-auto relative">
            <button @click="showDetail = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <template x-if="selectedItem">
                <div class="capitalize">
                    <img :src="selectedItem.image" alt=""
                        class="w-auto h-auto max-w-full max-h-40 mx-auto rounded">
                    <h2 class="text-xl font-bold mt-4" x-text="selectedItem.name"></h2>
                    <div class="overflow-y-auto max-h-32 text-gray-600 mt-2">
                        <p x-text="selectedItem.description"></p>
                    </div>
                    <p class="mt-4 font-bold text-gray-700" x-text="'Rp. ' + selectedItem.price"></p>
                    <div class="flex justify-center text-center gap-4 mt-6">
                        <button
                            class="bg-blue-500 text-white text-base font-semibold uppercase px-6 py-2 rounded hover:bg-blue-600">
                            Buy
                        </button>
                        <div class="flex items-center gap-4">
                            <!-- Tombol untuk mengurangi jumlah -->
                            <button class="bg-red-500 text-white text-base font-bold px-4 py-2 rounded hover:bg-red-400"
                                @click="if (selectedItem.quantity > 1) selectedItem.quantity--">
                                -
                            </button>
                            <!-- Menampilkan jumlah -->
                            <span class="text-xl font-bold" x-text="selectedItem.quantity"></span>
                            <!-- Tombol untuk menambah jumlah -->
                            <button
                                class="bg-green-500 text-white text-base font-bold px-4 py-2 rounded hover:bg-green-400"
                                @click="selectedItem.quantity++">
                                +
                            </button>
                        </div>
                        <button class="bg-green-500 text-white text-base font-bold px-4 py-2 rounded hover:bg-green-400"
                            @click="cart.push({...selectedItem, quantity: selectedItem.quantity}); showDetail = false">
                            Add to Cart
                        </button>
                    </div>

                </div>
            </template>
        </div>
    </div>

</body>

</html>
