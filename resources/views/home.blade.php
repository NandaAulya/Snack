<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/deskripsi.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="fontawesome/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>

        * {
            font-family: "Poppins", serif;
        }
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
                        <p class="font-poppins text-blue-gray-900 text-xl mb-2 capitalize font-bold">{{ $snack->name }}
                        </p>
                        <p class="font-poppins text-lg  text-gray-700 opacity-75 truncate-description mb-2"
                            title="{{ $snack->description }}">
                            {{ $snack->description }}
                        </p>
                        <p class="font-poppins mb-2 text-right text-blue-gray-900 text-lg font-bold">Rp.
                            {{ number_format($snack->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-base font-poppins font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                            type="button"
                            @click="selectedItem = {    
                            name: `{{ $snack->name }}`, 
                            description: `{{ $snack->description }}`,
                            quantity: 0,
                            stock: `{{ $snack->stock }}`,
                            category: `{{ $snack->category }}`, 
                            price: `{{$snack->price}}`,
                            formattedPrice: `{{ number_format($snack->price, 0, ',', '.') }}`,
                            image: `{{ asset($snack->image) }}`
                        }; showDetail = true">
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
                        <p class="font-poppins font-bold text-blue-gray-900 text-xl mb-2 capitalize">{{ $drink->name }}
                        </p>
                        <p class="font-poppins text-lg text-gray-700 opacity-75 truncate-description text-semibold"
                            title="{{ $drink->description }}">
                            {{ $drink->description }}
                        </p>
                        <p class="mt-2 text-right font-poppins font-bold text-blue-gray-900 text-lg">Rp.
                            {{ number_format($drink->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="block w-full rounded-lg bg-blue-gray-900/10 py-2 px-4 text-center text-base font-poppins font-bold uppercase text-blue-gray-900 transition-all hover:scale-105"
                            type="button"
                            @click="selectedItem = { 
                            name:  `{{ $drink->name }}`, 
                            description: `{{ $drink->description }}`,
                            quantity: 0,
                            stock: `{{ $drink->stock }}`, 
                            category: `{{ $drink->category }}`,
                            price: `{{ $drink->price }}`,
                            formattedPrice: `{{ number_format($drink->price, 0, ',', '.') }}`,
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

    <div class="bg-white p-6 w-full h-full relative grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Tombol close -->
        <button @click="showDetail = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-4xl">
            &times;
        </button>

        <div class="flex items-center justify-center">
            <div class="rounded-lg overflow-hidden w-full">
                <img :src="selectedItem.image" alt=""
                    class="w-full h-[600px] max-h-screen object-contain">
            </div>
        </div>

        <div class="flex flex-col justify-center w-[500px]">
            <template x-if="selectedItem">
                <div class="capitalize">
                    <h2 class="text-6xl font-poppins font-bold text-gray-800" x-text="selectedItem.name"></h2>
                    <div class="font-poppins text-2xl text-gray-600 mt-8">
                        <p x-text="selectedItem.description"></p>
                    </div>
                        <p class="mt-6 font-poppins font-semibold text-xl text-gray-700" x-text="'Rp. ' + selectedItem.priceFormat"></p>
                    <div class="flex justify-center gap-6 mt-8 font-poppins text-xl">
                        <p>Total : <span>Rp. <span x-text="selectedItem.price * selectedItem.quantity"></span></span></p>
                        <div class="border border-gray-300 rounded">
                            <button
                                class="font-poppins bg-white text-black text-xl font-bold px-4 py-2 border-r border-gray-300"
                                @click="if (selectedItem.quantity > 0) { selectedItem.quantity--; selectedItem.stock++; }">
                                -
                            </button>
                            <span class="text-base font-semibold px-4" x-text="selectedItem.quantity"></span>
                            <button
                                class="font-poppins bg-white text-black text-xl font-bold px-4 py-2 border-l border-gray-300"
                                @click="if (selectedItem.quantity < selectedItem.stock) { selectedItem.quantity++;}">
                                +
                            </button>
                        </div>
                        <p>tersisa <span x-text="selectedItem.stock"></span> buah</p>
                    </div>

                    <!-- Tombol aksi -->
                    <div class="flex justify-center gap-4 mt-12">
                        <button
                                class="bg-blue-500 text-white text-xl font-poppins uppercase px-6 py-2 rounded hover:bg-blue-600"
                                @click="window.location.href='{{ route('stripe') }}?name=' + selectedItem.name + '&price=' + selectedItem.price + '&quantity=' + selectedItem.quantity + '&total=' + (selectedItem.price * selectedItem.quantity) + '&image=' + selectedItem.image + '&description=' + selectedItem.description">
                                Pesan Sekarang
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</body>

</html>
