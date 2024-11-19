@extends('admin')

@section('title', 'Tambah Snack')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Snack</h1>
    <form action="{{ route('snack.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Nama</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block">Harga</label>
            <input type="number" id="price" name="price" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="category" class="block">Kategori</label>
            <select id="category" name="category" class="w-full border rounded px-3 py-2" required>
                <option value="snack">Snack</option>
                <option value="drink">Minuman</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block">Deskripsi</label>
            <textarea id="description" name="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection