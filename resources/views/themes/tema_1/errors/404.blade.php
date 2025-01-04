@extends('themes.tema_1.layouts.app')

@section('title', 'Sayfa Bulunamadı')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 text-center">
        <div class="card shadow-sm">
            <div class="card-body py-5">
                <i class="bi bi-exclamation-triangle display-1 text-warning mb-4"></i>
                <h2 class="mb-4">Sayfa Bulunamadı</h2>
                <p class="mb-4">Aradığınız sayfa bulunamadı veya taşınmış olabilir.</p>
                <a href="{{ route('urls.index') }}" class="btn btn-primary">
                    <i class="bi bi-house-door"></i> Ana Sayfaya Dön
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
