@extends('themes.tema_1.layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">URL Listesi</h5>
                @auth
                <a href="{{ route('urls.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-lg"></i> Yeni URL Ekle
                </a>
                @endauth
            </div>
            <div class="card-body">
                @if($urls->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-link-45deg display-1 text-muted"></i>
                        <p class="mt-3">Henüz hiç kısaltılmış URL bulunmuyor.</p>
                        @auth
                            <a href="{{ route('urls.create') }}" class="btn btn-primary">
                                İlk URL'nizi Kısaltın
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                URL Kısaltmak için Giriş Yapın
                            </a>
                        @endauth
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kısa URL</th>
                                    <th>Orijinal URL</th>
                                    <th>Ziyaret</th>
                                    <th>Oluşturulma Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($urls as $url)
                                <tr>
                                    <td>
                                        <a href="{{ route('urls.redirect', $url->short_code) }}" target="_blank" class="text-decoration-none">
                                            {{ route('urls.redirect', $url->short_code) }}
                                        </a>
                                    </td>
                                    <td class="text-truncate" style="max-width: 300px;">
                                        <a href="{{ $url->original_url }}" target="_blank" class="text-decoration-none">
                                            {{ $url->original_url }}
                                        </a>
                                    </td>
                                    <td>{{ $url->visits }}</td>
                                    <td>{{ $url->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $urls->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
