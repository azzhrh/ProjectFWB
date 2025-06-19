@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Edit Transaksi</h2>

    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>User (Customer)</label>
            <select name="user_id" class="w-full border p-2" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $transaction->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Tanaman</label>
            <select name="plant_id" class="w-full border p-2" required>
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}" {{ $plant->id == $transaction->plant_id ? 'selected' : '' }}>
                        {{ $plant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Jumlah</label>
            <input type="number" name="quantity" value="{{ $transaction->quantity }}" class="w-full border p-2" min="1" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.transactions.index') }}" class="text-gray-600 ml-4">Batal</a>
    </form>
</div>
@endsection
