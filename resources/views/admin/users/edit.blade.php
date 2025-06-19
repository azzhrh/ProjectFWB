@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Edit Pengguna</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" id="name" required
                   class="w-full border p-2 rounded" value="{{ old('name', $user->name) }}">
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full
