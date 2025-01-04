@extends('themes.tema_1.layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">URL Listesi</h5>
                <a href="{{ route('urls.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-lg"></i> Yeni URL Ekle
                </a>
            </div>
            <div class="card-body">
                @if($urls->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-link-45deg display-1 text-muted"></i>
                        <p class="mt-3">Henüz hiç kısaltılmış URL bulunmuyor.</p>
                        <a href="{{ route('urls.create') }}" class="btn btn-primary">
                            İlk URL'nizi Kısaltın
                        </a>
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
                                    <th>İşlemler</th>
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
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary copy-btn" 
                                                data-url="{{ route('urls.redirect', $url->short_code) }}"
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" 
                                                title="URL'yi Kopyala">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                        <!-- Safari için gizli input -->
                                        <input type="text" 
                                               value="{{ route('urls.redirect', $url->short_code) }}" 
                                               class="copy-input"
                                               style="position: absolute; left: -9999px;">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @auth
                        {{ $urls->links() }}
                    @endauth
                @endif
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
        button.addEventListener('click', async function() {
            const url = this.getAttribute('data-url');
            const tooltip = bootstrap.Tooltip.getInstance(this);
            const originalTitle = this.getAttribute('data-bs-original-title');

            try {
                // Modern tarayıcılar için Clipboard API
                if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(url);
                } else {
                    // Safari ve güvenli olmayan bağlamlar için fallback
                    const input = this.parentElement.querySelector('.copy-input');
                    input.select();
                    document.execCommand('copy');
                }

                // Başarılı kopyalama geri bildirimi
                this.setAttribute('data-bs-original-title', 'Kopyalandı!');
                tooltip.show();

                // 2 saniye sonra orijinal metni geri yükle
                setTimeout(() => {
                    this.setAttribute('data-bs-original-title', originalTitle);
                    tooltip.hide();
                }, 2000);
            } catch (err) {
                console.error('URL kopyalanamadı:', err);
                // Hata durumunda kullanıcıya bildir
                this.setAttribute('data-bs-original-title', 'Kopyalanamadı!');
                tooltip.show();
                setTimeout(() => {
                    this.setAttribute('data-bs-original-title', originalTitle);
                    tooltip.hide();
                }, 2000);
            }
        });
    });
});
</script>
@endpush
@endsection
