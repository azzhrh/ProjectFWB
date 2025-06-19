@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Tambah Pengguna</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" id="name" required
                   class="w-full border p-2 rounded" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full border p-2 rounded" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="role_id" class="block font-medium">Role</label>
            <select name="role_id" id="role_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan
        </button>
    </form>
</div>
@endsection
