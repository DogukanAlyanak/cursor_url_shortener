@extends('layouts.app')

@section('title', 'Yeni URL Ekle')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Yeni URL Ekle</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('urls.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="original_url" class="form-label">URL</label>
                        <input type="url" class="form-control @error('original_url') is-invalid @enderror"
                               id="original_url" name="original_url" value="{{ old('original_url') }}"
                               placeholder="https://example.com" required>
                        @error('original_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-link-45deg"></i> URL'yi Kısalt
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
