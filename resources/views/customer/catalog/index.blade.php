@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-green-800 mb-4">Katalog Tanaman</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Grid daftar tanaman --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @forelse ($plants as $plant)
            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center text-center">
                {{-- Gambar tanaman kecil dan proporsional --}}
                @if ($plant->image)
                    <img src="{{ asset('storage/' . $plant->image) }}"
     alt="{{ $plant->name }}"
     class="rounded mb-2"
     style="width: 250px; height: 250px; object-fit: cover; display: block; margin: 0 auto;">


                @else
                    <div class="w-24 h-24 bg-gray-100 text-gray-500 flex items-center justify-center mb-2 rounded text-xs">
                        Tidak ada gambar
                    </div>
                @endif

                {{-- Info tanaman --}}
                <h2 class="text-sm font-semibold text-gray-800 truncate w-full">{{ $plant->name }}</h2>
                <p class="text-xs text-gray-500">Kategori: {{ $plant->category->name ?? '-' }}</p>
                <p class="text-green-700 text-sm font-bold">Rp {{ number_format($plant->price, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-600 mt-1">{{ Str::limit($plant->description, 40) }}</p>

                {{-- Tombol beli --}}
                <form action="{{ route('customer.catalog.buy', $plant->id) }}" method="POST" class="mt-2 w-full">
                    @csrf
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-blue text-xs px-2 py-1 rounded">
                        Beli 🌱
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">Belum ada tanaman tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
