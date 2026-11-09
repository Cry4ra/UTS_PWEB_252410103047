<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | RV Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:radial-gradient(circle at top,#1b1f3b,#0d0f1a 60%);color:#eee;min-height:100vh;display:flex;flex-direction:column}
        main{flex:1}
        .warnaCard{background:#171a2b}
        .garisTepi{border:1px solid #2c3050!important;border-radius:14px}
        .btnLogin,.btn-gold{background:linear-gradient(90deg,#ff9f1c,#ffcf56);border:none;color:#111;font-weight:700}
        .btnLogin:hover,.btn-gold:hover{filter:brightness(1.1);color:#111}
        .btn-gold:disabled{background:#3a3f60;color:#888}
        .nav-custom{background:#171a2b;border-bottom:2px solid #ff9f1c}
        .brand-text{color:#ff9f1c!important;font-weight:700;letter-spacing:.5px}
        .hero{background:linear-gradient(135deg,#3b1f6e,#12142a);border-radius:16px;padding:32px 24px}
        .package{background:#171a2b;border:2px solid #2c3050;border-radius:14px;padding:18px;text-align:center;cursor:pointer;transition:.2s;height:100%}
        .package:hover{border-color:#ff9f1c;transform:translateY(-4px)}
        .package.active{border-color:#ff9f1c;background:#2a2340;box-shadow:0 0 18px rgba(255,159,28,.35)}
        .uc-big{font-size:1.7rem;font-weight:700}
        .bonus{color:#ffcf56;font-size:.95rem}
        .price{color:#ff9f1c;font-weight:600;margin:6px 0 0}
        .summary{position:sticky;top:16px}
        .footer{text-align:center;padding:18px;background:#171a2b;color:#888;font-size:.85rem}
        .form-control,.form-control:focus{background:#0f1222;color:#eee;border-color:#2c3050}
        .table{--bs-table-bg:transparent;--bs-table-color:#eee}
    </style>
</head>
<body>
    @yield('navbar')

    <main class="container py-4">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>