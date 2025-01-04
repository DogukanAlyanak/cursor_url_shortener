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
                --primary-color: #6b21a8;
                --secondary-color: #7c3aed;
                --accent-color: #8b5cf6;
                --background-color: #f5f3ff;
                --text-color: #1e1b4b;
            }

            body {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                background-color: var(--background-color);
                color: var(--text-color);
            }

            .navbar {
                background: var(--primary-color);
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }

            .card {
                border: none;
                border-radius: 1rem;
                box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            }

            .card-header {
                background: var(--primary-color);
                color: white;
                border-radius: 1rem 1rem 0 0 !important;
            }

            .btn-primary {
                background: var(--accent-color);
                border: none;
                border-radius: 0.5rem;
            }

            .btn-primary:hover {
                background: var(--secondary-color);
            }

            .footer {
                background: var(--primary-color);
                margin-top: auto;
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
        <main class="container py-4">
            @include('themes.tema_1.components.flash-messages')
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer text-white py-4">
            <div class="container text-center">
                <span>{{ date('Y') }} © URL Kısaltıcı</span>
            </div>
        </footer>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
