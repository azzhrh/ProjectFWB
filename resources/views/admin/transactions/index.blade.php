@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Transaksi</h1>

    <table class="w-full bg-white border shadow rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 border-b text-left">No</th>
                <th class="py-3 px-4 border-b text-left">Customer</th>
                <th class="py-3 px-4 border-b text-left">Tanaman</th>
                <th class="py-3 px-4 border-b text-left">Jumlah</th>
                <th class="py-3 px-4 border-b text-left">Total Harga</th>
                <th class="py-3 px-4 border-b text-left">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->user->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->plant->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->quantity }}</td>
                    <td class="py-2 px-4 border-b">Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-4 text-center text-gray-500">Belum ada transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
