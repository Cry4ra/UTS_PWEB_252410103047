@extends('layouts.app')

@section('title', 'Top Up UC')

@section('navbar')
    <x-navbar :username="$username" :totalUc="$totalUc" />
@endsection

@section('content')
 <div class="banner-pubg">
        <img src="{{ asset('images/banner.jpg') }}"
        alt="Banner PUBG Mobile">
</div>

<div class="hero mb-4">
    <h1 class="fw-bold">PUBG MOBILE <span class="badge bg-secondary fs-6 align-middle"></span></h1>
    <p class="mb-0">Halo, <strong>{{ $username }}</strong>! Pilih paket UC, isi Player ID, lalu checkout dehh</p>
</div>


<div class="row g-4">
    <div class="col-lg-8">
        <h4 class="mb-3">1. Pilih Nominal UC</h4>
        <div class="row g-3">
            @foreach ($paket as $p)
                <div class="col-6 col-md-4">
                    <div class="package"
                         data-uc="{{ $p['uc'] }}"
                         data-bonus="{{ $p['bonus'] }}"
                         data-harga="{{ $p['harga'] }}">
                        <div class="uc-big"> {{ $p['uc'] }}</div>
                        @if ($p['bonus'] > 0)
                            <div class="bonus">+{{ $p['bonus'] }} bonus</div>
                        @else
                            <div class="bonus text-secondary">tanpa bonus</div>
                        @endif
                        <p class="price">Rp {{ number_format($p['harga'], 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card warnaCard garisTepi p-3 summary text-light">
            <h4 class="mb-3">2. Pesanan</h4>

            <label class="form-label">Player ID</label>
            <input type="text" id="playerId" class="form-control mb-3" placeholder="Contoh: 5123456789">

            <div class="d-flex justify-content-between"><span class="text-secondary">Paket</span><strong id="sPaket">-</strong></div>
            <div class="d-flex justify-content-between"><span class="text-secondary">Bonus</span><strong id="sBonus">-</strong></div>
            <hr>
            <div class="d-flex justify-content-between mb-3"><span>Total</span><strong class="text-warning fs-5" id="sTotal">Rp 0</strong></div>

            <button id="btnBeli" class="btn btn-gold w-100" disabled>Beli Sekarang</button>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBeli" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content warnaCard text-light garisTepi">
            <div class="modal-header border-secondary">
                <h5 class="modal-title">Konfirmasi Pesanan</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="isiModal"></div>
            <div class="modal-footer border-secondary">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-gold" id="btnKonfirmasi">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<div id="notif" class="mt-4"></div>
@endsection

@section('scripts')
<script>
    let terpilih = null;
    const rupiah = n => 'Rp ' + Number(n).toLocaleString('id-ID');
    const btnBeli = document.getElementById('btnBeli');
    const playerId = document.getElementById('playerId');

    function cekTombol() {
        btnBeli.disabled = !(terpilih && playerId.value.trim().length >= 5);
    }

    document.querySelectorAll('.package').forEach(el => {
        el.addEventListener('click', () => {
            document.querySelectorAll('.package').forEach(p => p.classList.remove('active'));
            el.classList.add('active');
            terpilih = { uc: el.dataset.uc, bonus: el.dataset.bonus, harga: el.dataset.harga };

            document.getElementById('sPaket').innerText = terpilih.uc + ' UC';
            document.getElementById('sBonus').innerText = terpilih.bonus > 0 ? '+' + terpilih.bonus + ' UC' : '-';
            document.getElementById('sTotal').innerText = rupiah(terpilih.harga);
            cekTombol();
        });
    });

    playerId.addEventListener('input', cekTombol);

    const modal = new bootstrap.Modal(document.getElementById('modalBeli'));
    btnBeli.addEventListener('click', () => {
        document.getElementById('isiModal').innerHTML =
            `<p>Player ID: <strong>${playerId.value}</strong></p>
             <p>Paket: <strong>${terpilih.uc} UC</strong> ${terpilih.bonus > 0 ? '(+' + terpilih.bonus + ' bonus)' : ''}</p>
             <p class="mb-0">Total bayar: <strong class="text-warning">${rupiah(terpilih.harga)}</strong></p>`;
        modal.show();
    });

    document.getElementById('btnKonfirmasi').addEventListener('click', () => {
        modal.hide();
        document.getElementById('notif').innerHTML =
            `<div class="alert alert-success"> Pesanan ${terpilih.uc} UC untuk ID ${playerId.value} berhasil dibuat!</div>`;
        playerId.value = '';
        document.querySelectorAll('.package').forEach(p => p.classList.remove('active'));
        terpilih = null;
        ['sPaket', 'sBonus'].forEach(id => document.getElementById(id).innerText = '-');
        document.getElementById('sTotal').innerText = 'Rp 0';
        cekTombol();
    });
</script>
@endsection