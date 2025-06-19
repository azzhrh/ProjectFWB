@extends('layouts.app') {{-- atau layout lain yang kamu pakai --}}

@section('content')
<div class="container">
    <h2>Katalog Tanaman Hias</h2>
    <div class="row">
        @foreach ($plants as $plant)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if ($plant->image)
                        <img src="{{ asset('images/' . $plant->image) }}" class="card-img-top" alt="{{ $plant->name }}">
                    @else
                        <div class="p-4 text-center text-muted">Gambar tidak tersedia</div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant->name }}</h5>
                        <p class="card-text">Harga: Rp{{ number_format($plant->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
