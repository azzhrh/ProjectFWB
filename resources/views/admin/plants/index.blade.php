@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-blue-800">Daftar Tanaman</h1>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('admin.plants.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-blue px-4 py-2 rounded inline-block mb-4">
       🌿 Tambah Tanaman
    </a>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-blue-300 bg-white shadow-sm rounded-md text-sm">
            <thead class="bg-blue-100 text-blue-900">
                <tr>
                    <th class="border border-blue-300 px-3 py-2 text-left">#</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Nama</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Kategori</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Harga</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Deskripsi</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Gambar</th>
                    <th class="border border-blue-300 px-3 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($plants as $index => $plant)
                    <tr class="hover:bg-blue-50">
                        <td class="border border-blue-300 px-3 py-2">{{ $index + 1 }}</td>
                        <td class="border border-blue-300 px-3 py-2">{{ $plant->name }}</td>
                        <td class="border border-blue-300 px-3 py-2">{{ $plant->category->name ?? '-' }}</td>
                        <td class="border border-blue-300 px-3 py-2">Rp {{ number_format($plant->price, 0, ',', '.') }}</td>
                        <td class="border border-blue-300 px-3 py-2">{{ \Illuminate\Support\Str::limit($plant->description, 50) }}</td>
                      <td class="border border-blue-300 px-2 py-2 text-center" style="width:120px;">
                        @if ($plant->image)
                            <img src="{{ asset('storage/' . $plant->image) }}"
                                alt="{{ $plant->name }}"
                                style="width:70px; height:70px; object-fit:cover; border-radius:4px;">
                        @else
                            <span class="text-muted">–</span>
                        @endif
                    </td>
                        <td class="border border-blue-300 px-3 py-2">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.plants.edit', $plant->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-blue px-2 py-1 rounded text-xs whitespace-nowrap">
                                   ✏️ Edit
                                </a>
                                <form action="{{ route('admin.plants.destroy', $plant->id) }}"
                                      method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-blue px-2 py-1 rounded text-xs whitespace-nowrap">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada data tanaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
