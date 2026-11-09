@extends('layouts.app')

@section('title', 'Profile')

@section('navbar')
    <x-navbar :username="$username" :totalUc="$totalUc" />
@endsection

@section('content')
<div class="card">
    <h1>👤 {{ $username }}</h1>
    <br>
    <p><strong>Total UC:</strong> {{ number_format($totalUc, 0, ',', '.') }} UC</p>
    @foreach ($info as $label => $value)
        <p><strong>{{ $label }}:</strong> {{ $value }}</p>
    @endforeach
    <br>
    <a href="{{ route('dashboard', ['username' => $username]) }}" class="btn">← Kembali ke Dashboard</a>
</div>
@endsection