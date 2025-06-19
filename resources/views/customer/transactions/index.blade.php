@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Riwayat Transaksi</h1>

    @if ($transactions->isEmpty())
        <p class="text-gray-600">Belum ada transaksi.</p>
    @else
        <table class="table-auto w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Tanaman</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Total Harga</th>
                    <th class="border px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="border px-4 py-2">{{ $transaction->plant->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $transaction->quantity }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
