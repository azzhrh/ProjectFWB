@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Tanaman</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $plants }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categories }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pengguna</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $users }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Transaksi</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $transactions }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
