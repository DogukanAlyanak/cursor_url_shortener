@extends('themes.tema_1.layouts.app')

@section('title', 'Giriş Yap')

@section('content')
<div class="row justify-content-center align-items-center min-vh-75">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center border-0 pt-4">
                <h3 class="card-title fw-bold mb-0">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Giriş Yap
                </h3>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-envelope me-2"></i>E-posta Adresi
                        </label>
                        <input type="email" name="email"
                               class="form-control form-control-lg bg-light @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock me-2"></i>Şifre
                        </label>
                        <div class="input-group">
                            <input type="password" name="password"
                                   class="form-control form-control-lg bg-light @error('password') is-invalid @enderror"
                                   required id="password">
                            <button class="btn btn-light border" type="button" onclick="togglePassword()">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Beni Hatırla</label>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Giriş Yap
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-transparent border-0 text-center pb-4">
                <p class="mb-0">Hesabınız yok mu?
                    <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">
                        Hemen Kayıt Olun
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    }
}
</script>
@endpush
@endsection
