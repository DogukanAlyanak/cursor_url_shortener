@extends('themes.tema_1.layouts.app')

@section('title', 'URL Raporları')

@section('content')
<div class="row">
    <!-- Genel İstatistik Kartları -->
    <div class="col-12 mb-4">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-link-45deg display-4 text-primary mb-2"></i>
                        <h5 class="card-title mb-1">Toplam URL</h5>
                        <h3 class="mb-0">{{ number_format($generalStats['total_urls']) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-eye display-4 text-success mb-2"></i>
                        <h5 class="card-title mb-1">Toplam Ziyaret</h5>
                        <h3 class="mb-0">{{ number_format($generalStats['total_visits']) }}</h3>
                        @if($generalStats['total_visits_today'] > 0)
                            <small class="text-success">
                                +{{ number_format($generalStats['total_visits_today']) }} bugün
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-graph-up display-4 text-info mb-2"></i>
                        <h5 class="card-title mb-1">Ortalama Ziyaret</h5>
                        <h3 class="mb-0">{{ $generalStats['avg_visits'] }}</h3>
                        <small class="text-muted">ziyaret/URL</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-x-circle display-4 text-danger mb-2"></i>
                        <h5 class="card-title mb-1">Ziyaret Edilmemiş</h5>
                        <h3 class="mb-0">{{ number_format($generalStats['urls_without_visits']) }}</h3>
                        <small class="text-muted">URL</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- En Çok Ziyaret Edilen URLler -->
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-trophy me-2"></i>En Çok Ziyaret Edilen URLler
                </h5>
            </div>
            <div class="card-body">
                @if($topUrls->isEmpty())
                    <div class="text-center py-4">
                        <i class="bi bi-info-circle display-4 text-muted"></i>
                        <p class="mt-3 mb-0">Henüz hiç URL ziyaret edilmemiş.</p>
                    </div>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($topUrls as $url)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-truncate me-3">
                                        <h6 class="mb-0 text-truncate">
                                            <a href="{{ $url->original_url }}" target="_blank" class="text-decoration-none">
                                                {{ $url->original_url }}
                                            </a>
                                        </h6>
                                        <small class="text-muted d-block">
                                            <a href="{{ route('urls.redirect', $url->short_code) }}" target="_blank" class="text-decoration-none">
                                                {{ route('urls.redirect', $url->short_code) }}
                                            </a>
                                        </small>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">
                                        {{ number_format($url->visits) }} ziyaret
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Son 7 Günün İstatistikleri -->
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-check me-2"></i>Son 7 Günün İstatistikleri
                </h5>
            </div>
            <div class="card-body">
                @if($dailyStats->isEmpty())
                    <div class="text-center py-4">
                        <i class="bi bi-info-circle display-4 text-muted"></i>
                        <p class="mt-3 mb-0">Henüz hiç ziyaret kaydı yok.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tarih</th>
                                    <th class="text-end">URL Sayısı</th>
                                    <th class="text-end">Toplam Ziyaret</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyStats as $stat)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($stat->date)->format('d.m.Y') }}</td>
                                        <td class="text-end">{{ number_format($stat->total_urls) }}</td>
                                        <td class="text-end">{{ number_format($stat->total_visits) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
