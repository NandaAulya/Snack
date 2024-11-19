@extends('admin')

@section('title', 'Edit Snack')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Snack</h1>
    <form action="{{ route('snack.update', $snack) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block">Nama</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="w-full border rounded px-3 py-2" 
                value="{{ old('name', $snack->name) }}" 
                required>
        </div>
        <div class="mb-4">
            <label for="price" class="block">Harga</label>
            <input 
                type="number" 
                id="price" 
                name="price" 
                class="w-full border rounded px-3 py-2" 
                value="{{ old('price', $snack->price) }}" 
                required>
        </div>
        <div class="mb-4">
            <label for="category" class="block">Kategori</label>
            <select 
                id="category" 
                name="category" 
                class="w-full border rounded px-3 py-2" 
                required>
                <option value="snack" {{ old('category', $snack->category) == 'snack' ? 'selected' : '' }}>Snack</option>
                <option value="drink" {{ old('category', $snack->category) == 'drink' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block">Deskripsi</label>
            <textarea 
                id="description" 
                name="description" 
                class="w-full border rounded px-3 py-2">{{ old('description', $snack->description) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>
@endsection