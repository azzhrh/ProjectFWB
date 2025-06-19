@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Tanaman</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('plants.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
    <label for="image" class="form-label">Ganti Gambar (opsional)</label>
    <input type="file" name="image" class="form-control">

    @if($plant->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" width="150">
        </div>
    @endif
</div>

        <div class="mb-4">
            <label class="block font-medium">Nama Tanaman</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $plant->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Kategori</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $plant->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
    <label class="block font-medium">Harga</label>
    <input type="number" name="price" class="w-full border p-2 rounded" value="{{ old('price', $plant->price) }}" required>
</div>

<div class="mb-4">
    <label class="block font-medium">Stok</label>
    <input type="number" name="stock" class="w-full border p-2 rounded"
        value="{{ old('stock', $plant->stock) }}" required min="0">
</div>

<div class="mb-4">
    <label class="block font-medium">Deskripsi</label>
    <textarea name="description" rows="4" class="w-full border p-2 rounded" required>{{ old('description', $plant->description) }}</textarea>
</div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('plants.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
