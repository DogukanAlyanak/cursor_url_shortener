<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>URL Kısaltıcı - Premium SaaS Teması</title>
    <meta name="description"
        content="İnternette bulabileceğiniz en iyi URL kısaltma scripti. SaaS versiyonu ile kendi işinizi kurmanıza olanak sağlayan harika özelliklerle donatılmıştır!">
    <meta name="keywords" content="url, kısaltıcı, harika, en iyi kısaltıcı, muhteşem">
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="#" />
    <meta property="og:title" content="URL Kısaltıcı - Premium SaaS Teması" />
    <meta property="og:description"
        content="İnternette bulabileceğiniz en iyi URL kısaltma scripti. SaaS versiyonu ile kendi işinizi kurmanıza olanak sağlayan harika özelliklerle donatılmıştır!" />
    <meta property="og:site_name" content="URL Kısaltıcı - Premium SaaS Teması" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="#">
    <meta name="twitter:title" content="URL Kısaltıcı - Premium SaaS Teması">
    <meta name="twitter:description"
        content="İnternette bulabileceğiniz en iyi URL kısaltma scripti. SaaS versiyonu ile kendi işinizi kurmanıza olanak sağlayan harika özelliklerle donatılmıştır!">
    <meta name="twitter:creator" content="#">
    <meta name="twitter:domain" content="#">
    <link rel="icon" type="image/png" href="#"
        sizes="32x32" />
    <link rel="canonical" href="#">
    <link rel="stylesheet" type="text/css"
        href="https://demo.gempixel.com/saastheme/static/frontend/libs/fontawesome/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://demo.gempixel.com/saastheme/static/frontend/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://demo.gempixel.com/saastheme/static/cookieconsent.min.css">
    <link rel="stylesheet" href="https://demo.gempixel.com/saastheme/content/bootstrap.min.css" id="stylesheet">
    <link rel="stylesheet" href="https://demo.gempixel.com/saastheme/content/style.css" id="stylesheet">
    <link rel="stylesheet" href="https://demo.gempixel.com/saastheme/content/main.css?v=2.0" id="stylesheet">
    <script>
        var appurl = '#';
    </script>
</head>

<body class="home light" id="body">
    <a href="#body" id="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <header>
        <div class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="https://softeast.net/assets/common/images/branding/project_logo_light_256.png"
                            alt="URL Kısaltıcı - Premium SaaS Teması">
                    </a>
                    <button class="navbar-toggler d-block d-sm-none float-end" type="button" data-toggle="collapse"
                        data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false"
                        aria-label="Menüyü Aç/Kapat">
                        <span class="fa fa-bars text-dark"></span>
                    </button>
                </div>
                <div id="mainmenu" class="navbar-collapse">
                    <ul class="nav me-auto mb-2">
                        <li><a href="{{ route('urls.index') }}" class="{{ request()->routeIs('urls.index') ? 'active' : '' }}">Ana Sayfa</a></li>
                        <li><a href="{{ route('urls.reports') }}" class="{{ request()->routeIs('urls.reports') ? 'active' : '' }}">İstatistikler</a></li>
                        {{-- <li class="dropdown mt-0">
                            <a href="#" data-bs-toggle="dropdown">Yardım</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="list-group-item border-0">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <a href="#"
                                                    class="d-block h6 mb-0 ps-0">Nasıl Kullanılır?</a>
                                                <small class="text-sm text-muted mb-0">URL kısaltma hakkında detaylı bilgi</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-group-item border-0">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <a href="#"
                                                    class="d-block h6 mb-0 ps-0">SSS</a>
                                                <small class="text-sm text-muted mb-0">Sıkça sorulan sorular</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-group-item border-0">
                                        <div class="media d-flex">
                                            <div class="media-body">
                                                <a href="#"
                                                    class="d-block h6 mb-0 ps-0">İletişim</a>
                                                <small class="text-sm text-muted mb-0">Bizimle iletişime geçin</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> --}}
                        @auth
                            <li class="dropdown mt-0">
                                <a href="#" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="list-group-item border-0">
                                            <div class="media d-flex">
                                                <div class="media-body">
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link d-block h6 mb-0 ps-0 text-decoration-none">Çıkış Yap</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Giriş Yap</a></li>
                            <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Kayıt Ol</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="section-featured mb-5">
        <svg id="heroback">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="80%" y2="0%">
                    <stop offset="0%" style="stop-color:var(--color-stop-1);stop-opacity:1" />
                    <stop offset="100%" style="stop-color:var(--color-stop-2);stop-opacity:1" />
                </linearGradient>
            </defs>
            <path
                d="M38.9,-65.6C49.4,-61.2,56.4,-48.9,58.5,-36.7C60.6,-24.4,57.7,-12.2,57.4,-0.2C57.1,11.9,59.4,23.8,57.5,36.2C55.6,48.7,49.4,61.8,39.1,65.3C28.8,68.8,14.4,62.6,-0.5,63.5C-15.4,64.4,-30.9,72.3,-40.4,68.4C-50,64.5,-53.6,48.8,-60.3,35.4C-67,22.1,-76.7,11,-81.2,-2.6C-85.7,-16.3,-85.1,-32.5,-78.2,-45.4C-71.2,-58.4,-58,-68,-43.9,-70.3C-29.9,-72.6,-14.9,-67.7,-0.4,-67C14.1,-66.3,28.3,-69.9,38.9,-65.6Z"
                fill="url(#grad1)" transform="translate(520 540) scale(6 5)" />
        </svg>
        <svg id="hero">
            <defs>
                <linearGradient id="grad2" x1="0%" y1="0%" x2="80%" y2="0%">
                    <stop offset="0%" style="stop-color:var(--color-stop-1);stop-opacity:1" />
                    <stop offset="100%" style="stop-color:var(--color-stop-2);stop-opacity:1" />
                </linearGradient>
            </defs>
            <path
                d="M38.9,-65.6C49.4,-61.2,56.4,-48.9,58.5,-36.7C60.6,-24.4,57.7,-12.2,57.4,-0.2C57.1,11.9,59.4,23.8,57.5,36.2C55.6,48.7,49.4,61.8,39.1,65.3C28.8,68.8,14.4,62.6,-0.5,63.5C-15.4,64.4,-30.9,72.3,-40.4,68.4C-50,64.5,-53.6,48.8,-60.3,35.4C-67,22.1,-76.7,11,-81.2,-2.6C-85.7,-16.3,-85.1,-32.5,-78.2,-45.4C-71.2,-58.4,-58,-68,-43.9,-70.3C-29.9,-72.6,-14.9,-67.7,-0.4,-67C14.1,-66.3,28.3,-69.9,38.9,-65.6Z"
                fill="url(#grad2)" transform="translate(510 550) scale(6 5)" />
        </svg>
        <img src="https://demo.gempixel.com/saastheme/content/promo.png" id="herofront" class="d-xl-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="hero-icon"><i class="fa fa-link"></i></span>

                    <h2>Basit bir link <br>ama güçlü bir araç<br> <span class="forPeople"></span> için</h2>
                    <p>Aracımız, basit ve akılda kalıcı ama güçlü linklerle kitlenizi sorunsuz bir şekilde takip etmenizi ve müşterilerinize benzersiz bir deneyim sunmanızı sağlar.</p>

                    <div class="shortener-simple">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                            </div>
                        @endif
                        <div class="share-this"></div>
                        <div class="ajax"></div>
                        <form action="{{ route('urls.store') }}" id="main-form"
                            class="shadow-sm rounded" role="form" method="POST">
                            @csrf
                            <div class="main-form position-relative">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-link mt-3"></i></span>
                                            <input type="text" class="form-control main-input" name="original_url"
                                                id="url" value="{{ old('original_url') }}"
                                                placeholder="https://youtube.com/watch?v=xxxxxxxx"
                                                autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-primary main-button copy-button d-none"
                                            type="button" onclick="copyToClipboard()"><span>Kopyala</span><i class="fa fa-clipboard"></i></button>
                                        <button class="btn btn-secondary main-button submit-button" type="submit"><span>Kısalt</span> <i class="fa fa-link"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if(isset($urls) && $urls->count() > 0)
                        <div class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kısa URL</th>
                                            <th>Orijinal URL</th>
                                            <th>Ziyaret</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($urls as $url)
                                        <tr>
                                            <td>
                                                <a href="{{ route('urls.redirect', $url->short_code) }}" target="_blank">
                                                    {{ route('urls.redirect', $url->short_code) }}
                                                </a>
                                            </td>
                                            <td class="text-truncate" style="max-width: 300px;">
                                                <a href="{{ $url->original_url }}" target="_blank">
                                                    {{ $url->original_url }}
                                                </a>
                                            </td>
                                            <td>{{ $url->visits }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" 
                                                        onclick="copyToClipboard('{{ route('urls.redirect', $url->short_code) }}')"
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="URL'yi Kopyala">
                                                    <i class="fa fa-clipboard"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if(method_exists($urls, 'links'))
                                <div class="d-flex justify-content-center">
                                    {{ $urls->links() }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <footer class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <p>2025 &copy; URL Kısaltıcı - Softeast.net Ürünüdür.</p>
                </div>
                <div class="col-sm-7 text-end">
                    <a href="#" title="Kullanım Koşulları">Kullanım Koşulları</a>
                    <a href="#">Geliştirici API</a>
                    <a href="#">İş Ortaklığı Programı</a>
                    <a href="#" title="Blog">Blog</a>
                    <a href="#" title="Link Bildir">Link Bildir</a>
                    <a href="#" title="İletişim">İletişim</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://demo.gempixel.com/saastheme/static/bundle.pack.js"></script>
    <script src="https://demo.gempixel.com/saastheme/content/custom.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
    <script src="https://demo.gempixel.com/saastheme/static/frontend/libs/clipboard/dist/clipboard.min.js"></script>
    <script src="https://demo.gempixel.com/saastheme/static/frontend/libs/typedjs/typed.min.js"></script>
    <script type="text/javascript">
        var lang = {
            "error": "Lütfen geçerli bir URL girin.",
            "cookie": "Bu web sitesi, size en iyi deneyimi sunmak için çerezleri kullanır.",
            "cookieok": "Anladım!",
            "cookiemore": "Daha fazla bilgi",
            "cookielink": "#",
            "couponinvalid": "Girilen kupon geçerli değil",
            "minurl": "En az 1 URL seçmelisiniz.",
            "minsearch": "Anahtar kelime 3 karakterden uzun olmalıdır!",
            "nodata": "Bu istek için veri bulunmuyor.",
            "typed": ["Pazarlamacılar.", "Influencerlar.", "YouTuberlar.", "Sanatçılar.", "Kurumsal.", "Herkes."],
            "datepicker": {
                "7d": "Son 7 Gün",
                "3d": "Son 30 Gün",
                "tm": "Bu Ay",
                "lm": "Geçen Ay"
            }
        }

        // URL kopyalama fonksiyonu
        async function copyToClipboard(text) {
            try {
                if (!text) {
                    text = document.getElementById('url').value;
                }
                
                if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(text);
                    showToast('URL başarıyla kopyalandı!', 'success');
                } else {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = text;
                    document.body.appendChild(textArea);
                    textArea.select();
                    try {
                        document.execCommand('copy');
                        showToast('URL başarıyla kopyalandı!', 'success');
                    } catch (err) {
                        showToast('URL kopyalanamadı!', 'error');
                    }
                    document.body.removeChild(textArea);
                }
            } catch (err) {
                showToast('URL kopyalanamadı!', 'error');
            }
        }

        // Toast mesajı gösterme fonksiyonu
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed bottom-0 end-0 m-3`;
            toast.setAttribute('role', 'alert');
            toast.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
            `;
            document.body.appendChild(toast);
            
            // 3 saniye sonra toast'ı kaldır
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Form submit işlemi
        document.getElementById('main-form').addEventListener('submit', function(e) {
            const urlInput = document.getElementById('url');
            if (!urlInput.value) {
                e.preventDefault();
                showToast('Lütfen bir URL girin!', 'error');
            }
        });

        // Typed.js animasyonu
        var typed = new Typed('.forPeople', {
            strings: lang.typed,
            typeSpeed: 50,
            backSpeed: 30,
            backDelay: 2000,
            loop: true
        });
    </script>
    <script>
        feather.replace({
            'width': '1em',
            'height': '1em'
        })
    </script>
    <script src="https://demo.gempixel.com/saastheme/static/frontend/js/app.min.js"></script>
    <script src="https://demo.gempixel.com/saastheme/static/server.min.js"></script>
</body>

</html>
