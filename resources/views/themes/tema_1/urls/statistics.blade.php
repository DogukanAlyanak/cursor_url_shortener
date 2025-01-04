@extends('themes.tema_1.layouts.app')

@section('title', 'URL İstatistikleri')

@section('content')
<div class="row">
    <!-- İstatistik Kartları -->
    <div class="col-12 mb-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-link-45deg display-4 text-primary mb-2"></i>
                        <h5 class="card-title mb-1">Toplam URL</h5>
                        <h3 class="mb-0">{{ number_format($totalStats['total_urls']) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-eye display-4 text-success mb-2"></i>
                        <h5 class="card-title mb-1">Toplam Ziyaret</h5>
                        <h3 class="mb-0">{{ number_format($totalStats['total_visits']) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-graph-up display-4 text-info mb-2"></i>
                        <h5 class="card-title mb-1">Ortalama Ziyaret</h5>
                        <h3 class="mb-0">{{ $totalStats['avg_visits'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-trophy display-4 text-warning mb-2"></i>
                        <h5 class="card-title mb-1">En Çok Ziyaret</h5>
                        <h3 class="mb-0">{{ $totalStats['most_visited'] ? number_format($totalStats['most_visited']->visits) : 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- URL Listesi -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">URL Ziyaret İstatistikleri</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kısa URL</th>
                                <th>Orijinal URL</th>
                                <th>Ziyaret</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Son Ziyaret</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($statistics as $url)
                            <tr>
                                <td>
                                    <a href="{{ route('urls.redirect', $url->short_code) }}"
                                       target="_blank"
                                       class="text-decoration-none">
                                        {{ route('urls.redirect', $url->short_code) }}
                                    </a>
                                </td>
                                <td class="text-truncate" style="max-width: 300px;">
                                    <a href="{{ $url->original_url }}"
                                       target="_blank"
                                       class="text-decoration-none"
                                       title="{{ $url->original_url }}">
                                        {{ $url->original_url }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ number_format($url->visits) }}
                                    </span>
                                </td>
                                <td>{{ $url->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    @if($url->visits > 0)
                                        {{ $url->updated_at->format('d.m.Y H:i') }}
                                    @else
                                        <span class="text-muted">Henüz ziyaret edilmemiş</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="bi bi-info-circle display-4 text-muted d-block mb-2"></i>
                                    <p class="mb-0">Henüz hiç URL kısaltılmamış.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $statistics->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
