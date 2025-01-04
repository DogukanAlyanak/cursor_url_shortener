@extends('themes.tema_1.layouts.app')

@section('title', 'URL İstatistikleri')

@section('content')
<div class="row justify-content-center">
    <!-- İstatistik Kartları -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-link-45deg display-4 text-primary mb-3"></i>
                <h5 class="card-title">Toplam URL</h5>
                <p class="display-6">{{ $generalStats['total_urls'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-eye display-4 text-success mb-3"></i>
                <h5 class="card-title">Toplam Ziyaret</h5>
                <p class="display-6">{{ $generalStats['total_visits'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-graph-up display-4 text-info mb-3"></i>
                <h5 class="card-title">Ortalama Ziyaret</h5>
                <p class="display-6">{{ $generalStats['avg_visits'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <i class="bi bi-calendar-check display-4 text-warning mb-3"></i>
                <h5 class="card-title">Bugünkü Ziyaret</h5>
                <p class="display-6">{{ $generalStats['total_visits_today'] }}</p>
            </div>
        </div>
    </div>

    <!-- En Çok Ziyaret Edilen URLler -->
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">En Çok Ziyaret Edilen URL'ler</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kısa URL</th>
                                <th>Orijinal URL</th>
                                <th>Ziyaret</th>
                                <th>Son Güncelleme</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topUrls as $url)
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
                                <td>{{ $url->updated_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary copy-btn" 
                                            data-url="{{ route('urls.redirect', $url->short_code) }}"
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" 
                                            title="URL'yi Kopyala">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Günlük İstatistikler -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Son 7 Günün İstatistikleri</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>URL Sayısı</th>
                                <th>Toplam Ziyaret</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyStats as $stat)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($stat->date)->format('d.m.Y') }}</td>
                                <td>{{ $stat->total_urls }}</td>
                                <td>{{ $stat->total_visits }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tooltip'leri etkinleştir
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Kopyalama butonlarını ayarla
    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            navigator.clipboard.writeText(url).then(() => {
                // Tooltip metnini güncelle
                const tooltip = bootstrap.Tooltip.getInstance(this);
                const originalTitle = this.getAttribute('data-bs-original-title');
                
                this.setAttribute('data-bs-original-title', 'Kopyalandı!');
                tooltip.show();

                // 2 saniye sonra orijinal metni geri yükle
                setTimeout(() => {
                    this.setAttribute('data-bs-original-title', originalTitle);
                    tooltip.hide();
                }, 2000);
            }).catch(err => {
                console.error('URL kopyalanamadı:', err);
            });
        });
    });
});
</script>
@endpush
@endsection
