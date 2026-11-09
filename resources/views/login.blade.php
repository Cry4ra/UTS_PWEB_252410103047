@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
        <div class="card warnaCard text-light garisTepi p-4" style="width: 100%; max-width: 380px;">
            <h3 class="text text-center mb-3">RV Store</h3>
            <h3 class="text text-center mb-3">LOGIN</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/dashboard" method="POST">
                @csrf

                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control mb-3" placeholder="Masukkan username" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Masukkan password" required>

               <button type="submit" class="btn btnLogin w-100">Masuk</button>
            </form>

           <p class="text-center text-secondary mt-3 mb-0">Top up UC cepat & murah</p>
        </div>
    </div>
@endsection