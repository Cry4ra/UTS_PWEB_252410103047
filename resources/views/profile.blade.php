
@extends('layouts.app')

@section('title', 'Profile')

@section('navbar')
    <x-navbar :username="$username" :totalUc="$totalUc" />
@endsection

@section('content')
    <div class="profile-header">
               <div class="profile-avatar">
                <img src="{{ asset('images/profile.jpg') }}"
                alt="Ini Profilnya">
            </div>
    <div class="profile-container">
        <div class="profile-card">

                <h2>Profil Saya</h2>
                <p>Informasi akun RV Store</p>
            </div>

            <div class="profile-username">
                <span>Username</span>
                <h4>{{ $username }}</h4>
            </div>

            <div class="profile-total">
                <span>Total UC yang Dimiliki</span>
                <h2>{{ number_format($totalUc, 0, ',', '.') }} UC</h2>
            </div>

            <div class="profile-info">
                <h5>Informasi Akun</h5>

                @foreach ($info as $label => $nilai)
                    <div class="profile-info-item">
                        <span>{{ $label }}</span>
                        <strong>{{ $nilai }}</strong>
                    </div>
                @endforeach
            </div>

            <div class="profile-footer">
                <a href="{{ route('dashboard', ['username' => $username]) }}"
                   class="btn btn-gold">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
@endsection
