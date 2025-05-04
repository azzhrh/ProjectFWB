@extends('layouts.app')

@section('title', 'Daftar Tanaman')

@section('content')
    <h1>Daftar Tanaman Hias</h1>
    @foreach($plants as $plant)
        <p>{{ $plant->name }}</p>
    @endforeach
@endsection
