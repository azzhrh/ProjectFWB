@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Tanaman</h1>

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.plants.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nama Tanaman</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="category_id" class="block font-medium">Kategori</label>
            <select name="category_id" id="category_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price" class="block font-medium">Harga (Rp)</label>
            <input type="number" name="price" id="price" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="description" class="block font-medium">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div>
            <label for="image" class="block font-medium">Gambar Tanaman</label>
            <input type="file" name="image" id="image" class="w-full border p-2 rounded" accept="image/*" required>
        </div>

        <div>
            <label for="stock" class="block font-medium">Stok</label>
            <input type="number" name="stock" id="stock" min="0" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-green-600 text-blue px-4 py-2 rounded hover:bg-green-700">Simpan</button>
    </form>
</div>
@endsection
