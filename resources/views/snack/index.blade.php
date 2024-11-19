@extends('admin')

@section('title', 'Daftar Snack & Minuman')

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('snack.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Snack</a>
    <div class="mt-4">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($snack)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $snack->name }}</td>
                    <td class="border px-4 py-2">{{ $snack->price }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($snack->category) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('snack.edit', $snack) }}" class="text-yellow-500">Edit</a> |
                        <form action="{{ route('snack.destroy', $snack) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Hapus snack ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection