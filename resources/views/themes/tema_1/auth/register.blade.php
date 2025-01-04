@extends('themes.tema_1.layouts.app')

@section('title', 'Kayıt Ol')

@section('content')
<div class="row justify-content-center align-items-center min-vh-75">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center border-0 pt-4">
                <h3 class="card-title fw-bold mb-0">
                    <i class="bi bi-person-plus me-2"></i>Yeni Hesap Oluştur
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-person me-2"></i>Ad Soyad
                        </label>
                        <input type="text" name="name"
                               class="form-control form-control-lg bg-light @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-envelope me-2"></i>E-posta Adresi
                        </label>
                        <input type="email" name="email"
                               class="form-control form-control-lg bg-light @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock me-2"></i>Şifre
                        </label>
                        <div class="input-group">
                            <input type="password" name="password"
                                   class="form-control form-control-lg bg-light @error('password') is-invalid @enderror"
                                   required id="password">
                            <button class="btn btn-light border" type="button" onclick="togglePassword('password', 'toggleIcon1')">
                                <i class="bi bi-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-lock-fill me-2"></i>Şifre Tekrar
                        </label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation"
                                   class="form-control form-control-lg bg-light"
                                   required id="password_confirmation">
                            <button class="btn btn-light border" type="button" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                <i class="bi bi-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Kayıt Ol
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-transparent border-0 text-center pb-4">
                <p class="mb-0">Zaten hesabınız var mı?
                    <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">
                        Giriş Yapın
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);

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
