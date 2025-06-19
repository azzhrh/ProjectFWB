@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="fw-bold">Dashboard Admin</h2>
           

            <div class="row mt-4">
                <div class="col-md-3">
                    <a href="{{ route('admin.transactions') }}" class="btn btn-primary w-100 mb-3">
                        💳 Transaksi
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('categories.index') }}" class="btn btn-success w-100 mb-3">
                        🗂️ Kategori
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('plants.index') }}" class="btn btn-warning w-100 mb-3">
                        🌿 Tanaman
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100 mb-3">
    👥 Pengguna
</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
