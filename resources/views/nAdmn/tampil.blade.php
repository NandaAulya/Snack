@extends('LayoutDrinks')

@section('content')
    <div class="flex justify-center mt-20">
        <div class="w-[1000px]">
            <div class="mb-10 flex justify-center">
                <h1 class="text-3xl font-bold">Daftar Drink</h1>
            </div>
            <div class="flex justify-end mb-4">
                <a href="{{ route('nadmn.tambah') }}" 
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                   Tambah Drink
                </a>
            </div>

            <table class="table-auto w-full h-[300px] border-collapse border border-gray-300 mt-8">
                <thead>
                    <tr class="bg-gray-200 text-left h-[50px]">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2">Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Gambar</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drinks as $no => $data)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $no + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $data->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $data->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($data->price, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="{{ asset('storage/' . $data->image_path) }}" alt="Drink Image" class="w-16 h-16">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('nadmn.update', $data->id) }}" 
                                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-6">
                                    Edit
                                </a>
                                <a href="{{ route('nadmn.delete', $data->id) }}" 
                                   class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection