<!DOCTYPE html>
<html lang="tr" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'URL Kısaltıcı') - {{ config('app.name') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            :root {
                --primary-color: #2c3e50;
                --secondary-color: #34495e;
                --accent-color: #3498db;
                --background-color: #f8f9fa;
                --text-color: #2c3e50;
            }

            body {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                background-color: var(--background-color);
                color: var(--text-color);
            }

            .navbar {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .navbar-brand {
                font-size: 1.618rem;
                font-weight: 600;
            }

            .card {
                border: none;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                transition: transform 0.2s;
            }

            .card:hover {
                transform: translateY(-2px);
            }

            .card-header {
                background: linear-gradient(135deg, var(--accent-color), #2980b9);
                color: white;
                border-bottom: none;
                padding: 1rem 1.618rem;
            }

            .btn-primary {
                background: var(--accent-color);
                border: none;
                padding: 0.618rem 1.618rem;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                background: #2980b9;
                transform: translateY(-1px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }

            .table {
                margin-bottom: 1.618rem;
            }

            .table th {
                font-weight: 600;
                color: var(--primary-color);
            }

            .footer {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                padding: 1rem 0;
                margin-top: auto;
            }

            main {
                flex: 1 0 auto;
                padding: 1.618rem 0;
            }

            .nav-link {
                padding: 0.618rem 1rem;
                transition: color 0.3s ease;
            }

            .nav-link:hover {
                color: #3498db !important;
            }

            .dropdown-menu {
                border: none;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }

            .form-control {
                border: 1px solid #e1e8ef;
                padding: 0.618rem 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: var(--accent-color);
                box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
            }

            .table-hover tbody tr:hover {
                background-color: rgba(52, 152, 219, 0.05);
            }

            .pagination {
                margin-top: 1.618rem;
            }

            .pagination .page-link {
                color: var(--accent-color);
                border: none;
                margin: 0 0.2rem;
                border-radius: 4px;
            }

            .pagination .page-item.active .page-link {
                background-color: var(--accent-color);
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('urls.index') }}">
                    <i class="bi bi-link-45deg"></i> URL Kısaltıcı
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('urls.index') }}">
                                <i class="bi bi-house-door"></i> Ana Sayfa
                            </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('urls.create') }}">
                                <i class="bi bi-plus-circle"></i> Yeni URL Ekle
                            </a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('urls.reports') }}">
                                <i class="bi bi-graph-up"></i> İstatistikler
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right"></i> Çıkış Yap
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right"></i> Giriş Yap
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus"></i> Kayıt Ol
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer text-white">
            <div class="container text-center">
                <span>{{ date('Y') }} © URL Kısaltıcı</span>
            </div>
        </footer>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
