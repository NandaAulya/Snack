@extends('LayoutDrinks')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[800px] h-[600px] bg-white shadow-md rounded p-6">
        <h2 class="text-4xl font-bold mb-10 text-center mt-10">Tambah Drink</h2>
        <form action="{{ route('nadmn.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 font-medium">Nama</label>
                <input type="text" name="name" placeholder="Nama Drink" 
                       class="border p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi Drink" 
                          class="border p-2 w-full rounded" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">Harga</label>
                <input type="number" step="0.01" name="price" placeholder="Harga" 
                       class="border p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">Image</label>
                <input type="file" name="image_path" accept=".jpg, .jpeg, .png, .gif, .svg" 
                       class="border p-2 w-full rounded" required>
            </div>
            <div class="flex justify-center mt-10">
                <button type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-1/2 ">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
