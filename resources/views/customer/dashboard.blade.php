<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="card p-4 shadow">
        <h2 class="font-bold">Selamat datang, customer!</h2>
        

        <div class="mt-4 d-flex justify-content-center gap-3">
            <a href="{{ route('customer.catalog') }}" class="btn btn-primary">Lihat Katalog</a>
            <a href="{{ route('customer.catalog.categories') }}" class="btn btn-success">Lihat Kategori</a>
            <a href="{{ route('customer.transactions') }}" class="btn btn-secondary">Riwayat Transaksi</a>
            

            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection

    

</body>
</html>
