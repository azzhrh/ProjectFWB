@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Manajemen Pengguna</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- <a href="{{ route('admin.users.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded inline-block mb-4">
       ➕ Tambah Pengguna
    </a> -->

    <div class="overflow-x-auto">
        <table class="w-full border border-blue-300 bg-white rounded-md text-sm shadow-sm">
            <thead class="bg-blue-100 text-blue-900">
                <tr>
                    <th class="border px-3 py-2 text-left">#</th>
                    <th class="border px-3 py-2 text-left">Nama</th>
                    <th class="border px-3 py-2 text-left">Email</th>
                    <th class="border px-3 py-2 text-left">Role</th>
                    <th class="border px-3 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($users as $index => $user)
                    <tr class="hover:bg-blue-50">
                        <td class="border px-3 py-2">{{ $index + 1 }}</td>
                        <td class="border px-3 py-2">{{ $user->name }}</td>
                        <td class="border px-3 py-2">{{ $user->email }}</td>
                        <td class="border px-3 py-2">{{ $user->role->name ?? '-' }}</td>
                        <td class="border px-3 py-2">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                   ✏️ Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">Tidak ada pengguna terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
