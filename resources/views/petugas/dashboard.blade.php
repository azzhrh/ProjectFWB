@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Petugas</h1>

    <a href="{{ route('petugas.plants.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-blue font-bold py-2 px-4 rounded">
    ➕ Kelola Tanaman
</a>
    @if($plants->count())
    @foreach($plants as $plant)
        <!-- tampilkan data tanaman -->
        <p>{{ $plant->name }} - Stok: {{ $plant->stock }}</p>
    @endforeach
@else
    <p>Tidak ada tanaman yang tersedia.</p>
@endif

</div>
@endsection
