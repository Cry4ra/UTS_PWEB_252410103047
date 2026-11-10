
@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('navbar')
    <x-navbar :username="$username" :totalUc="$totalUc" />
@endsection

@section('content')
    <h1>Riwayat Pesanan Saya</h1>

    <div class="card table-wrap">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Player ID</th>
                        <th>UC</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pesanan as $i => $o)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $o['kode'] }}</td>
                            <td>{{ $o['player_id'] }}</td>
                            <td>{{ $o['uc'] }}</td>
                            <td>Rp {{ number_format($o['total'], 0, ',', '.') }}</td>
                            <td>
                                @if ($o['status'] == 'Berhasil')
                                    <span class="badge bg-success">Berhasil</span>
                                @elseif ($o['status'] == 'Pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @else
                                    <span class="badge bg-danger">Gagal</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
