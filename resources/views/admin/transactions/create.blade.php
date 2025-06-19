@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Tambah Transaksi</h2>

    <form action="{{ route('admin.transactions.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label>User (Customer)</label>
            <select name="user_id" class="w-full border p-2" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Tanaman</label>
            <select name="plant_id" class="w-full border p-2" required>
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Jumlah</label>
            <input type="number" name="quantity" class="w-full border p-2" min="1" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.transactions.index') }}" class="text-gray-600 ml-4">Kembali</a>
    </form>
</div>
@endsection
