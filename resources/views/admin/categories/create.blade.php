@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
