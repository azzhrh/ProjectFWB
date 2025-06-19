@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-green-800 mb-4">Kategori Tanaman</h1>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <a href="{{ route('customer.categories.show', $category->id) }}"
               class="p-4 bg-white shadow hover:bg-green-50 rounded border text-center">
                <p class="text-green-800 font-semibold">{{ $category->name }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
