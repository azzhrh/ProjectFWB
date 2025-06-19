@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-green-800 mb-4">Kategori: {{ $category->name }}</h1>

    @if ($plants->isEmpty())
        <p class="text-gray-500">Belum ada tanaman di kategori ini.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach ($plants as $plant)
                <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center text-center">
                    @if ($plant->image)
                        <img src="{{ asset('storage/' . $plant->image) }}"
                             alt="{{ $plant->name }}"
                             class="w-24 h-24 object-cover rounded mb-2">
                    @endif
                    <h2 class="text-sm font-semibold text-gray-800 truncate w-full">{{ $plant->name }}</h2>
                    <p class="text-green-700 text-sm font-bold">Rp {{ number_format($plant->price, 0, ',', '.') }}</p>
                    <form action="{{ route('customer.catalog.buy', $plant->id) }}" method="POST" class="mt-2 w-full">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs px-2 py-1 rounded">
                            Beli 🌱
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
