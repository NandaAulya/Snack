@extends('LayoutSnack')

@section('content')
    <div class="flex justify-center mt-10">
        <div class="w-[1000px]">
            <div class="flex justify-end mb-8">
                <a href="{{ route('nadmn.tambahSnack') }}" 
                   class="bg-secondary text-white px-4 py-2 rounded hover:bg-primary">
                   Add Snack
                </a>
            </div>

            <div class="space-y-4">
                @foreach ($snacks as $snack)
                    <div class="flex items-center bg-white text-background rounded-lg shadow-xl overflow-hidden hover:bg-gray-100 hover:rounded-lg">
                        <!-- Gambar -->
                        <img src="{{ asset($snack->image) }}" alt="Snack Image" class="w-40 h-40 object-cover">

                        <!-- Informasi -->
                        <div class="flex-1 p-4">
                            <h2 class="text-xl font-bold capitalize">{{ $snack->name }}</h2>
                            <p class="text-lg mt-2 font-semibold">Deskripsi:</p>
                            <span>{{ $snack->description }}</span>
                            <p class="text-lg mt-2">Harga: <span class="font-semibold">Rp {{ number_format($snack->price, 0, ',', '.') }}</span></p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-between items-end p-4">
                            <a href="{{ route('nadmn.updateSnack', $snack->id) }}" 
                               class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                Update
                            </a>
                            <a href="{{ route('nadmn.deleteSnack', $snack->id) }}" 
                               class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mt-2 ml-2"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                Delete
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
