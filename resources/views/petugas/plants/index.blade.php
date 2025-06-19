@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Tanaman</h2>
    <a href="{{ route('petugas.plants.create') }}">Tambah Tanaman</a>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Gambar</th> {{-- Tambahan --}}
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plants as $plant)
            <tr>
                <td>
                    @if ($plant->image)
                        <img src="{{ asset('storage/' . $plant->image) }}" alt="gambar"
                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                    @else
                        <span style="color: gray;">Tidak ada</span>
                    @endif
                </td>
                <td>{{ $plant->name }}</td>
                <td>{{ $plant->category->name }}</td>
                <td>{{ $plant->stock }}</td>
                <td>Rp {{ number_format($plant->price, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('petugas.plants.edit', $plant->id) }}">Edit</a>
                    <form action="{{ route('petugas.plants.destroy', $plant->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus tanaman ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
