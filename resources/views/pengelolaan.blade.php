@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('navbar')
    <x-navbar :username="$username" :totalUc="$totalUc" />
@endsection

<h1>Riwayat Pesanan Saya</h1>
<div class="card table-wrap">
    <table class="table table-dark table-hover">
        <tr><th>No</th><th>Kode</th><th>Player ID</th><th>UC</th><th>Total</th><th>Status</th></tr>
        @foreach ($pesanan as $i => $o)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $o['kode'] }}</td>
                <td>{{ $o['player_id'] }}</td>
                <td>{{ $o['uc'] }}</td>
                <td>Rp {{ number_format($o['total'], 0, ',', '.') }}</td>
                <td>{{ $o['status'] }}</td>
            </tr>
        @endforeach
    </table>
</div>