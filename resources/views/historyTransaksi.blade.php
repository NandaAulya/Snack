<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <div class="flex flex-row w-full h-full bg-gray-100">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white p-6 shadow-md">
            <div class="flex flex-col items-center text-center mb-6">
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full mb-2">
                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ Auth::user()->full_name }}</h2>
            </div>
            <nav>
                <ul class="space-y-4 text-xl font-medium">
                    <li><a href="{{ route('profile') }}" class="text-gray-600 hover:text-blue-500">Profil</a></li>
                    <li><a href="{{ route('historyTransaksi') }}" class="text-gray-600 hover:text-blue-500">History</a>
                    </li>
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-500">Home</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-500">Logout</button>
                    </form>
                </ul>
            </nav>
        </div>

        <div class="container mx-auto p-10 w-3/4">
            <h2 class="text-2xl font-bold mb-6">History Transaksi</h2>

            @if ($transaksi->isEmpty())
                <div class="flex items-center justify-center h-[50vh] mt-52">
                    <p class="text-gray-600 text-xl text-center">Belum ada transaksi.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left text-lg">No</th>
                                <th class="py-2 px-4 text-left text-lg">Nama Produk</th>
                                <th class="py-2 px-4 text-left text-lg">Jumlah</th>
                                <th class="py-2 px-4 text-left text-lg">Harga</th>
                                <th class="py-2 px-4 text-left text-lg">Total</th>
                                <th class="py-2 px-4 text-left text-lg">Status</th>
                                <th class="py-2 px-4 text-left text-lg">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $key => $item)
                                <tr class="{{ $key % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                                    <td class="py-2 px-4 text-lg">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 capitalize text-lg">{{ $item->name }}</td>
                                    <td class="py-2 px-4 text-lg">{{ $item->quantity }}</td>
                                    <td class="py-2 px-4 text-lg">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="py-2 px-4 text-lg">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td class="py-2 px-4 text-lg">
                                        <span
                                            class="px-2 py-1 text-lg rounded-lg  {{ $item->status === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 text-lg">{{ $item->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
</body>

</html>
