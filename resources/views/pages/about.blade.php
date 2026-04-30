@extends('layouts.app')

@section('title', __('about_page_title'))

@section('content')
<main id="konten" class="py-5">

    <h1 class="visually-hidden">{{ __('about_1') }}</h1>

    <!-- Scroll indicator desktop -->
    <div id="scroll-indicator" class="position-fixed d-none d-lg-flex flex-column align-items-center justify-content-center text-center" style="bottom: 3rem; right: 3rem; z-index: 2000; opacity: 1; transition: opacity 0.3s ease;">
        <span class="text-uppercase tracking-wider small fw-medium mb-2 text-shadow" style="letter-spacing: 1px; text-shadow: 0 1px 3px rgba(0,0,0,0.5);">scroll <br> down</span>
        <div class="scroll-indicator" style="text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M12 5V19M12 19L19 12M12 19L5 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>

    <!-- Section: About -->
    <section class="section-content" aria-labelledby="about-title">
        <div class="section-header">
            <div class="container">
                <img src="{{ asset('images/about-us-sketch.png') }}" alt="Ilustrasi tentang perjalanan dan perkembangan INDRACO" loading="lazy" class="w-100 h-auto">
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="section-caption">
                    <header class="d-flex gap-3 align-items-center mb-3">
                        <h2 id="about-title" class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ __('about_1') }}</h2>
                    </header>
                    <p>{!! __('about_2') !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline sections -->
    @php
        $timeline = [
            ['year' => '1971', 'img' => 'about-1971-sketch.png', 'subtitle' => __('about_4'), 'text' => __('about_5'), 'visually_hidden' => __('about_3')],
            ['year' => '1977', 'img' => 'about-1977-sketch.png', 'subtitle' => __('about_7'), 'text' => __('about_8'), 'visually_hidden' => __('about_6')],
            ['year' => '1996', 'img' => 'about-1996-sketch.png', 'subtitle' => __('about_10'), 'text' => __('about_11'), 'visually_hidden' => __('about_9')],
            ['year' => '2000', 'img' => 'about-2000-sketch.png', 'subtitle' => __('about_13'), 'text' => __('about_14'), 'visually_hidden' => __('about_12')],
            ['year' => '2018', 'img' => 'about-2018-sketch.png', 'subtitle' => __('about_16'), 'text' => __('about_17'), 'visually_hidden' => __('about_15')],
        ];
    @endphp

    @foreach($timeline as $item)
    <section class="section-content" aria-labelledby="journey-{{ $item['year'] }}-title" data-section="timeline" data-year="{{ $item['year'] }}">
        <div class="section-header">
            <div class="container">
                <img src="{{ asset('images/' . $item['img']) }}" alt="Ilustrasi perjalanan INDRACO {{ $item['year'] }}" loading="lazy" class="w-100 h-auto">
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="section-caption">
                    <header class="d-flex gap-3 align-items-center mb-3">
                        <h3 id="journey-{{ $item['year'] }}-title" class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ $item['year'] }} <span class="visually-hidden">{{ $item['visually_hidden'] }}</span></h3>
                        <p class="caption-text text-line-2 mb-0">{{ $item['subtitle'] }}</p>
                    </header>
                    <p>{{ $item['text'] }}</p>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <!-- Vision & Mission -->
    <section class="section-content" aria-labelledby="vision-mission-title">
        <h2 id="vision-mission-title" class="visually-hidden">{{ __('about_18') }}</h2>
        <div class="section-header">
            <div class="container">
                <img src="{{ asset('images/about-vision-mission-sketch.png') }}" alt="background visi misi INDRACO" loading="lazy" class="w-100 h-auto">
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="section-caption mb-5">
                    <header class="d-flex gap-3 align-items-center mb-3">
                        <h3 class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ __('about_19') }}</h3>
                    </header>
                    <p>{{ __('about_20') }}</p>
                </div>
                <div class="section-caption">
                    <header class="d-flex gap-3 align-items-center mb-3">
                        <h3 class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ __('about_21') }}</h3>
                    </header>
                    <p>{{ __('about_22') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai Kami (Values) -->
    <section class="section-content" aria-labelledby="value-title">
        <div class="section-header">
            <div class="container">
                <img src="{{ asset('images/about-value-sketch.png') }}" alt="background nilai-nilai INDRACO" loading="lazy" class="w-100 h-auto">
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row row-cols-1 row-gap-5">
                    <div class="col">
                        <div class="section-caption">
                            <header class="d-flex gap-3 align-items-center mb-3">
                                <h2 id="value-title" class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ __('about_23') }}</h2>
                            </header>
                        </div>
                    </div>
                    <div class="col">
                        <ul class="list-unstyled row row-cols-1 row-gap-5 row-cols-md-2 gx-md-5 row-cols-xl-3">
                            <li class="col">
                                <article class="d-flex gap-4 align-items-start">
                                    <div class="ratio ratio-1x1 w-25">
                                        <img src="{{ asset('images/about-customer-focus.png') }}" data-light="images/about-customer-focus.png" data-dark="images/about-customer-focus-invert.png" alt="" class="object-fit-contain theme-image" aria-hidden="true">
                                    </div>
                                    <div class="w-75">
                                        <h3 class="fs-5 fw-bold text-uppercase">{{ __('about_25') }}</h3>
                                        <p class="small">{{ __('about_26') }}</p>
                                    </div>
                                </article>
                            </li>
                            <li class="col">
                                <article class="d-flex gap-4 align-items-start">
                                    <div class="ratio ratio-1x1 w-25">
                                        <img src="{{ asset('images/about-teamwork.png') }}" data-light="images/about-teamwork.png" data-dark="images/about-teamwork-invert.png" alt="" class="object-fit-contain theme-image" aria-hidden="true">
                                    </div>
                                    <div class="w-75">
                                        <h3 class="fs-5 fw-bold text-uppercase">{{ __('about_27') }}</h3>
                                        <p class="small">{{ __('about_28') }}</p>
                                    </div>
                                </article>
                            </li>
                            <li class="col">
                                <article class="d-flex gap-4 align-items-start">
                                    <div class="ratio ratio-1x1 w-25">
                                        <img src="{{ asset('images/about-innovation.png') }}" data-light="images/about-innovation.png" data-dark="images/about-innovation-invert.png" alt="" class="object-fit-contain theme-image" aria-hidden="true">
                                    </div>
                                    <div class="w-75">
                                        <h3 class="fs-5 fw-bold text-uppercase">{{ __('about_29') }}</h3>
                                        <p class="small">{{ __('about_30') }}</p>
                                    </div>
                                </article>
                            </li>
                            <li class="col">
                                <article class="d-flex gap-4 align-items-start">
                                    <div class="ratio ratio-1x1 w-25">
                                        <img src="{{ asset('images/about-integrity.png') }}" data-light="images/about-integrity.png" data-dark="images/about-integrity-invert.png" alt="" class="object-fit-contain theme-image" aria-hidden="true">
                                    </div>
                                    <div class="w-75">
                                        <h3 class="fs-5 fw-bold text-uppercase">{{ __('about_31') }}</h3>
                                        <p class="small">{{ __('about_32') }}</p>
                                    </div>
                                </article>
                            </li>
                            <li class="col">
                                <article class="d-flex gap-4 align-items-start">
                                    <div class="ratio ratio-1x1 w-25">
                                        <img src="{{ asset('images/about-resources.png') }}" data-light="images/about-resources.png" data-dark="images/about-resources-invert.png" alt="" class="object-fit-contain theme-image" aria-hidden="true">
                                    </div>
                                    <div class="w-75">
                                        <h3 class="fs-5 fw-bold text-uppercase">{{ __('about_33') }}</h3>
                                        <p class="small">{{ __('about_34') }}</p>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pabrik Kami (Factory) -->
    <section class="section-content" aria-labelledby="factory-title">
        <div class="section-header">
            <div class="container">
                <img src="{{ asset('images/about-factory-sketch.png') }}" alt="background pabrik INDRACO" loading="lazy" class="w-100 h-auto">
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row row-cols-1 row-gap-5">
                    <div class="col">
                        <div class="section-caption">
                            <header class="d-flex gap-3 align-items-center mb-3">
                                <h2 id="factory-title" class="caption-title mb-0 display-2 fw-bold text-capitalize">{{ __('about_35') }}</h2>
                            </header>
                        </div>
                    </div>
                    <div class="col">
                        <ul class="list-unstyled factory-list row row-cols-1 row-gap-5">
                            <li class="col factory-item">
                                <article class="d-flex flex-column gap-3 flex-md-row align-items-md-center column-gap-md-5">
                                    <div class="factory-header ratio ratio-16x9 order-md-2">
                                        <img src="{{ asset('images/factory-bambe.jpg') }}" alt="Pabrik INDRACO Bambe, Gresik" loading="lazy" class="object-fit-cover">
                                    </div>
                                    <div class="factory-body order-md-1">
                                        <h3 class="fs-5 fw-bold text-uppercase mb-2">PT. Indraco Global Indonesia</h3>
                                        <p class="small mb-2">Driyorejo, Gresik Mfg. Facility</p>
                                        <p>Jl. Semeru No. 133-135 Bambe, Kec. Driyorejo. Gresik 61177 Jawa Timur - Indonesia.</p>
                                        <a href="https://maps.app.goo.gl/vLD5kH5WLryYcZwy6" target="_blank" rel="noopener" class="text-capitalize text-reset opacity-75-hover" aria-label="Lihat lokasi Pabrik Bambe di peta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg> <span>{{ __('antar_saya_kesana') }}</span>
                                        </a>
                                    </div>
                                </article>
                            </li>
                            <li class="col factory-item ms-md-auto">
                                <article class="d-flex flex-column gap-3 flex-md-row align-items-md-center column-gap-md-5">
                                    <div class="factory-header ratio ratio-16x9 order-md-2">
                                        <img src="{{ asset('images/factory-dumai.jpg') }}" alt="Pabrik INDRACO Dumai" loading="lazy" class="object-fit-cover">
                                    </div>
                                    <div class="factory-body order-md-1">
                                        <h3 class="fs-5 fw-bold text-uppercase mb-2">PT. Indraco Global Indonesia</h3>
                                        <p class="small mb-2">Dumai Mfg. Facility</p>
                                        <p>Jl. Pemuda Darat no.11 Kel. Pangkalan Sesai, Dumai Barat 28824 - Riau</p>
                                        <a href="https://maps.app.goo.gl/tmydyGwYoZvcbBVv5" target="_blank" rel="noopener" class="text-capitalize text-reset opacity-75-hover" aria-label="Lihat lokasi Pabrik Dumai di peta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg> <span>{{ __('antar_saya_kesana') }}</span>
                                        </a>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section('styles')
<style>
    .section-content {
        padding: calc(3rem + 2vw) 0;
        z-index: 10;
    }

    @media (min-width: 992px) {
        .section-content {padding: 0;}
    }

    .section-header .container {max-width: 1600px;}

    .section-body {
        margin-top: -20%;
        position: relative;
        z-index: 20; /* Ensure this is higher than the pinned image's z-index */
    }

    @media (min-width: 992px) {
        .section-body {margin-top: -26%;}
        section[aria-labelledby="value-title"] .section-body {margin-top: -40%;}
        section[aria-labelledby="factory-title"] .section-body {margin-top: -46%;}
    }

    .section-caption {max-width: 640px;}

    @media (min-width: 768px) {
        .factory-item {max-width: 910px;}
        .factory-header {width: 60%;}
        .factory-body {width: 40%;}
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
        40% {transform: translateY(-10px);}
        60% {transform: translateY(-5px);}
    }

    .scroll-indicator {
        animation: bounce 2s infinite;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        const brushPathData = "M149.3,385.3c80.9-72.6,141.6-121.7,150.3-113.5c16.7,15.7-169,235.8-155.9,247.5 c25.7,22.9,414.8-344.3,430.4-328.3c13.7,14-277.5,307.8-258.5,328.3c22.8,24.6,469.3-364.7,492.5-339.7 c20,21.6-297.9,331.5-274.4,357.8c28.3,31.6,519.3-382.7,549.4-349.5C1109,216.3,777.9,552.3,791,565.4 c14.3,14.2,413.1-378.2,434.8-357.9c24.2,22.7-445.4,536.6-416.6,564.8c32.4,31.7,668.6-576.2,685-559.2 c16.6,17.1-617.2,645.4-595.6,668.3c21.3,22.5,662.5-556.6,680.9-536.9c16.6,17.9-497.3,507.6-471.1,536.9 c24.3,27.2,492.6-366.2,517.3-338.3c21.4,24.3-310.2,347.9-299.2,359.3c11.1,11.4,355.7-310,370.5-295 c11.6,11.8-193.5,218-174.8,239.1c12.1,13.5,113-54.4,255.8-162.2";

        // Scroll Indicator Logic
        const scrollIndicator = document.getElementById('scroll-indicator');
        if (scrollIndicator) {
            ScrollTrigger.create({
                trigger: 'section[aria-labelledby="journey-1971-title"]', // Section ke-2
                start: "top center", // Ketika bagian atas section ke-2 mencapai tengah layar
                onEnter: () => scrollIndicator.style.opacity = '0', // Sembunyikan
                onLeaveBack: () => scrollIndicator.style.opacity = '1' // Tampilkan kembali saat scroll ke atas
            });
        }

        ScrollTrigger.matchMedia({
            // Desktop only
            "(min-width: 992px)": function() {
                const headers = document.querySelectorAll('section:not([aria-labelledby="about-title"]) .section-header .container');
                const cleanupItems = [];

                headers.forEach((container, index) => {
                    const img = container.querySelector('img');
                    if (!img) return;

                    // Hide original image
                    const originalDisplay = img.style.display;
                    img.style.display = 'none';

                    // Create SVG structure
                    const svgNS = "http://www.w3.org/2000/svg";
                    const svg = document.createElementNS(svgNS, "svg");
                    svg.setAttribute("viewBox", "0 0 1920 1080");
                    svg.setAttribute("class", "w-100 h-auto brush-svg");
                    svg.setAttribute("preserveAspectRatio", "xMidYMid slice");
                    
                    // Accessibility: Transfer alt text to SVG title if available
                    if (img.alt) {
                        const titleId = `svg-title-${index}`;
                        const title = document.createElementNS(svgNS, "title");
                        title.setAttribute("id", titleId);
                        title.textContent = img.alt;
                        svg.appendChild(title);
                        svg.setAttribute("aria-labelledby", titleId);
                        svg.setAttribute("role", "img");
                    } else {
                        svg.setAttribute("aria-hidden", "true"); // Hide decorative images
                    }
                    
                    const defs = document.createElementNS(svgNS, "defs");
                    const maskId = `brushMask-dynamic-${index}`;
                    const mask = document.createElementNS(svgNS, "mask");
                    mask.setAttribute("id", maskId);

                    const path = document.createElementNS(svgNS, "path");
                    path.setAttribute("d", brushPathData);
                    path.setAttribute("fill", "none");
                    path.setAttribute("stroke", "white");
                    path.setAttribute("stroke-width", "150");
                    path.setAttribute("stroke-linecap", "round");
                    path.setAttribute("stroke-linejoin", "round");
                    path.classList.add("drawPath");

                    mask.appendChild(path);
                    defs.appendChild(mask);
                    svg.appendChild(defs);

                    const svgImage = document.createElementNS(svgNS, "image");
                    svgImage.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", img.src);
                    svgImage.setAttribute("width", "1920");
                    svgImage.setAttribute("height", "1080");
                    svgImage.setAttribute("preserveAspectRatio", "xMidYMid slice");
                    svgImage.setAttribute("mask", `url(#${maskId})`);

                    svg.appendChild(svgImage);
                    container.appendChild(svg);

                    // Store for cleanup
                    cleanupItems.push({
                        img: img,
                        svg: svg,
                        originalDisplay: originalDisplay
                    });

                    // Animation
                    const length = path.getTotalLength();
                    gsap.set(path, {
                        strokeDasharray: length,
                        strokeDashoffset: length
                    });

                    // Ensure text appears above pinned image
                    container.style.position = 'relative';
                    container.style.zIndex = '1'; 
                    
                    // Find the next sibling (section-body) and ensure it's on top
                    const nextSibling = container.parentElement.querySelector('.section-body');
                    if (nextSibling) {
                        nextSibling.style.position = 'relative';
                        nextSibling.style.zIndex = '10'; // Higher z-index to be above the pinned image
                        nextSibling.style.backgroundColor = 'transparent'; // Ensure transparency if needed, or set a bg color to block
                    }
                    
                    gsap.to(path, {
                        strokeDashoffset: 0,
                        ease: "none",
                        scrollTrigger: {
                            trigger: container,
                            start: "top top", // Start pinning when image hits top
                            end: "+=100%", // Pin for a distance equal to 100% of viewport height (or adjust duration)
                            pin: true,
                            pinSpacing: true, // IMPORTANT:Push following content down so it doesn't overlap immediately
                            scrub: 1,
                            // Prevent overlap by ensuring z-index handling during pin
                            onEnter: () => gsap.set(container, { zIndex: 1 }),
                            onLeave: () => gsap.set(container, { zIndex: 0 }) 
                        }
                    });
                });

                // 2. Parallax Text (Text moves slightly slower/faster than scroll)
                // Reduced intensity to prevent overlap/clash with pinned elements
                gsap.utils.toArray('.section-caption').forEach(caption => {
                    gsap.fromTo(caption, 
                        { y: 50 }, // Starting a bit lower
                        {
                            y: -50, // Moving up acting as a parallax
                            ease: "none",
                            scrollTrigger: {
                                trigger: caption,
                                start: "top bottom",
                                end: "bottom top",
                                scrub: 1
                            }
                        }
                    );
                });

                // 3. Stagger Animation for "Nilai Kami" (Values)
                const valueSection = document.querySelector('section[aria-labelledby="value-title"]');
                if (valueSection) {
                    const listItems = valueSection.querySelectorAll('li');
                    // Ensure they are hidden initially
                    gsap.set(listItems, { opacity: 0, y: 50 });
                    
                    ScrollTrigger.batch(listItems, {
                        start: "top 85%",
                        onEnter: batch => gsap.to(batch, {opacity: 1, y: 0, stagger: 0.15, overwrite: true}),
                        onLeave: batch => gsap.set(batch, {opacity: 0, y: -50, overwrite: true}),
                        onEnterBack: batch => gsap.to(batch, {opacity: 1, y: 0, stagger: 0.15, overwrite: true}),
                        onLeaveBack: batch => gsap.set(batch, {opacity: 0, y: 50, overwrite: true})
                    });
                }

                // Cleanup function to restore state when matching media query changes
                return function() {
                    cleanupItems.forEach(item => {
                        item.img.style.display = item.originalDisplay;
                        item.svg.remove();
                    });
                };
            }
        });
    });
</script>
@endsection
