@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
