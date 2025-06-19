@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Kategori</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $cat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
