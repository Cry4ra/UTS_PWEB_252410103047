
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | RV Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top, #1b1f3b, #0d0f1a 60%);
            color: #eee;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .warnaCard {
            background: #171a2b;
        }

        .garisTepi {
            border: 1px solid #2c3050 !important;
            border-radius: 14px;
        }

        .btnLogin,
        .btn-gold {
            background: linear-gradient(90deg, #ff9f1c, #ffcf56);
            border: none;
            color: #111;
            font-weight: 700;
        }

        .btnLogin:hover,
        .btn-gold:hover {
            filter: brightness(1.1);
            color: #111;
        }

        .btn-gold:disabled {
            background: #3a3f60;
            color: #888;
        }

        .nav-custom {
            background: #171a2b;
            border-bottom: 2px solid #ff9f1c;
        }

        .brand-text {
            color: #ff9f1c !important;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .hero {
            background: linear-gradient(135deg, #3b1f6e, #12142a);
            border-radius: 16px;
            padding: 32px 24px;
        }

        .package {
            background: #171a2b;
            border: 2px solid #2c3050;
            border-radius: 14px;
            padding: 18px;
            text-align: center;
            cursor: pointer;
            transition: .2s;
            height: 100%;
        }

        .package:hover {
            border-color: #ff9f1c;
            transform: translateY(-4px);
        }

        .package.active {
            border-color: #ff9f1c;
            background: #2a2340;
            box-shadow: 0 0 18px rgba(255, 159, 28, .35);
        }

        .uc-big {
            font-size: 1.7rem;
            font-weight: 700;
        }

        .bonus {
            color: #ffcf56;
            font-size: .95rem;
        }

        .price {
            color: #ff9f1c;
            font-weight: 600;
            margin: 6px 0 0;
        }

        .summary {
            position: sticky;
            top: 16px;
        }

        .form-control,
        .form-control:focus {
            background: #0f1222;
            color: #eee;
            border-color: #2c3050;
        }

        .form-control::placeholder {
            color: #888;
        }

        .table-wrap {
            background: #171a2b;
            border: 1px solid #2c3050;
            border-radius: 14px;
            overflow: hidden;
        }

        .table-dark {
            --bs-table-bg: #171a2b;
            --bs-table-color: #eee;
            --bs-table-border-color: #343b55;
            --bs-table-hover-bg: #252a43;
            --bs-table-hover-color: #fff;
            margin-bottom: 0;
        }

        .table-dark th {
            color: #ffcf56;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-dark td {
            color: #eee;
            vertical-align: middle;
        }

        .badge {
            padding: 7px 12px;
            border-radius: 20px;
        }

        h1, h2, h3 {
            color: #fff;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            padding: 18px;
            background: #171a2b;
            color: #888;
            font-size: .85rem;
        }
        
    .profile-container {
        max-width: 750px;
        margin: 20px auto;
    }

    .profile-card {
        background: #171a2b;
        color: #eee;
        border: 1px solid #2c3050;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .profile-avatar {
        width: 85px;
        height: 85px;
        background: #2a2340;
        border: 2px solid #ff9f1c;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin: 0 auto 15px;
    }

    .profile-header h2 {
        color: #ffcf56;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .profile-header p {
        color: #aaa;
        margin: 0;
    }

    .profile-username {
        background: #20243a;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .profile-username span,
    .profile-total span {
        color: #aaa;
        font-size: 14px;
    }

    .profile-username h4 {
        color: #fff;
        margin: 5px 0 0;
    }

    .profile-total {
        background: linear-gradient(135deg, #3b1f6e, #20243a);
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 25px;
    }

    .profile-total h2 {
        color: #ffcf56;
        font-weight: 700;
        margin: 8px 0 0;
    }

    .profile-info h5 {
        color: #ffcf56;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .profile-info-item {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 14px 5px;
        border-bottom: 1px solid #343b55;
    }

    .profile-info-item span {
        color: #aaa;
    }

    .profile-info-item strong {
        color: #fff;
        text-align: right;
    }

    .profile-footer {
        text-align: center;
        margin-top: 25px;
    }

    @media (max-width: 576px) {
        .profile-card {
            padding: 20px;
        }

        .profile-info-item {
            font-size: 14px;
        }
    }
        .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #ff9f1c;
        margin: 0 auto 15px;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    .banner-pubg {
    width: 100%;
    height: 230px;
    overflow: hidden;
    border-radius: 16px;
    border: 1px solid #ff9f1c;
    margin-bottom: 25px;
    }

    .banner-pubg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center 35%;
        display: block;
    }

    @media (max-width: 576px) {
        .banner-pubg {
            height: 150px;
        }
    }
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
