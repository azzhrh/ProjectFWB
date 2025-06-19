@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tanaman</h2>

    <form action="{{ route('petugas.plants.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Tanaman</label>
        <input type="text" name="name" value="{{ old('name', $plant->name) }}" required>

        <label>Kategori</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $plant->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $plant->stock) }}" required min="0">

        <label>Harga</label>
        <input type="number" name="price" value="{{ old('price', $plant->price) }}" required min="0">

        <button type="submit">Update</button>
    </form>
</div>
@endsection
