<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'INDRACO adalah perusahaan FMCG terkemuka di Indonesia sejak 1971, menghadirkan berbagai produk berkualitas seperti kopi, teh, jahe, dan cokelat.')">
    
    <meta property="og:title" content="@yield('og_title', 'INDRACO – Indonesia Leading FMCG Company Since 1971')">
    <meta property="og:description" content="@yield('og_description', 'Perusahaan kopi dan produk konsumen Indonesia sejak 1971.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:type" content="website">
    
    <link rel="shortcut icon" href="{{ asset('images/icon-indraco.ico') }}" type="image/x-icon">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap.min.css') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    
    @yield('styles')
    
    <title>@yield('title', 'Perusahaan FMCG Terkemuka di Indonesia Sejak 1971 – INDRACO')</title>
</head>

<body>
    <a href="#konten" class="visually-hidden-focusable">{{ __('skip_to_content') }}</a>
    
    @include('partials.header')
    @include('partials.menu_mobile')

    <main id="konten">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.modal_search')

    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/ScrollTrigger.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
    
    @yield('scripts')

    @if(request()->has('preview'))
    <style>
        [data-i18n] {
            position: relative !important;
            outline: 1px dashed rgba(13, 110, 253, 0.3) !important;
        }
        [data-i18n]:hover {
            outline: 2px solid #0d6efd !important;
            outline-offset: 2px !important;
            z-index: 9999 !important;
        }
        [data-i18n]::after {
            content: attr(data-i18n);
            position: absolute;
            top: -18px;
            left: 0;
            background: #0d6efd;
            color: white;
            font-size: 10px;
            padding: 1px 4px;
            border-radius: 3px;
            white-space: nowrap;
            pointer-events: none;
            z-index: 10000;
            font-family: monospace;
            line-height: 1.2;
            opacity: 0.8;
            display: none; /* Hidden by default, toggled via parent class */
        }
        body.show-keys [data-i18n]::after {
            display: block;
        }
        body.show-keys [data-i18n] {
            outline: 1px solid rgba(13, 110, 253, 0.5) !important;
        }
    </style>
    <script>
        window.addEventListener('message', function(event) {
            if (event.data.type === 'translationUpdate') {
                const key = event.data.key;
                const value = event.data.value;
                const elements = document.querySelectorAll(`[data-i18n="${key}"]`);
                elements.forEach(el => {
                    el.innerHTML = value;
                });
            } else if (event.data.type === 'toggleKeys') {
                if (event.data.show) {
                    document.body.classList.add('show-keys');
                } else {
                    document.body.classList.remove('show-keys');
                }
            }
        });
    </script>
    @endif
</body>
</html>
