@extends('layouts.app')

@section('title', 'Produk Kami – INDRACO')

@section('content')
<main id="konten">
    <h1 class="visually-hidden">halaman produk</h1>

    @if($banners->count() > 0)
    <section>
        <div id="carouselBanner" class="carousel carousel-fade slide" data-bs-ride="carousel" data-bs-theme="light">
            <div class="carousel-indicators">
                @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="carousel-caption position-static d-lg-flex align-items-lg-center column-gap-lg-5 justify-content-lg-around">
                        <img src="{{ asset($banner->image_path) }}" alt="" loading="lazy" aria-hidden="true" class="carousel-img w-100 h-auto order-lg-2">
                        <div class="caption-text text-start order-lg-1">
                            <h2 class="fw-bold fs-1 text-capitalize">{{ app()->getLocale() == 'en' ? $banner->title_en : $banner->title_id }}</h2>
                            <hr>
                            <p class="fs-4 fw-bold mb-4">{{ app()->getLocale() == 'en' ? $banner->subtitle_en : $banner->subtitle_id }}</p>
                            <a href="{{ $banner->link }}" target="_blank" class="btn btn-outline-invert text-capitalize">{{ app()->getLocale() == 'en' ? $banner->button_text_en : $banner->button_text_id }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    @endif

    <section class="py-5 text-center" aria-labelledby="brands">
        <div class="container py-lg-5">
            <h2 id="brands" class="fs-3 fw-bold text-capitalize mb-5">{{ __('product_brands_title') }}</h2>

            <div class="daftar-kategori-produk text-start text-capitalize row row-cols-1 row-gap-5">
                <div class="col">
                    <h3 class="fs-4 fw-bold mb-4">{{ __('coffee') }}</h3>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 g-sm-4 g-md-5">
                        @foreach($brands->where('category_id', 1) as $brand)
                        <div class="col">
                            <a href="{{ route($brand->slug == 'supresso' ? 'product.supresso' : 'product.indraco', $brand->slug) }}" class="text-reset text-decoration-none opacity-100">
                                <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                    <img src="{{ asset($brand->logo_path) }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="{{ $brand->name }}" loading="lazy">
                                </article>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-bg-primary text-center" aria-labelledby="marketplace">
        <div class="container py-lg-5">
            <h2 id="marketplace" class="fs-3 fw-bold text-capitalize mb-5">{{ __('product_order_title') }}</h2>
            <div class="mb-5">
                <p class="small">Website INDRACO Store</p>
                <a href="https://indracostore.com/" target="_blank" class="text-reset text-decoration-none">
                    <img src="{{ asset('images/logo-indracostore-invert.png') }}" alt="Logo INDRACO Store" loading="lazy" class="w-100 h-auto" style="max-width: 18rem;">
                </a>
            </div>
            <div>
                <p class="small">{{ __('product_available_at') }} :</p>
                <nav aria-label="online store" class="d-flex flex-wrap justify-content-center align-items-center" style="gap: 3rem 5rem;">
                    <a href="https://www.tokopedia.com/indracoofficial" target="_blank" class="text-reset text-decoration-none">
                        <img src="{{ asset('images/logo-tokopedia.png') }}" alt="Logo Tokopedia" loading="lazy" class="w-100 h-auto" style="max-width: 10rem;">
                    </a>
                    <a href="https://shopee.co.id/indracoofficial" target="_blank" class="text-reset text-decoration-none">
                        <img src="{{ asset('images/logo-shopee.png') }}" alt="Logo Shopee" loading="lazy" class="w-100 h-auto" style="max-width: 3rem;">
                    </a>
                    <a href="https://www.blibli.com/merchant/indraco/INT-60044" target="_blank" class="text-reset text-decoration-none">
                        <img src="{{ asset('images/logo-blibli.png') }}" alt="Logo Blibli" loading="lazy" class="w-100 h-auto" style="max-width: 8rem;">
                    </a>
                    <a href="https://www.lazada.co.id/shop/indraco/" target="_blank" class="text-reset text-decoration-none">
                        <img src="{{ asset('images/logo-lazada.png') }}" alt="Logo Lazada" loading="lazy" class="w-100 h-auto" style="max-width: 4rem;">
                    </a>
                    <a href="https://www.tiktok.com/@indracostore" target="_blank" class="text-reset text-decoration-none">
                        <img src="{{ asset('images/logo-tiktokshop.png') }}" alt="Logo TikTok Shop" loading="lazy" class="w-100 h-auto" style="max-width: 10rem;">
                    </a>
                </nav>
            </div>
        </div>
    </section>
</main>
@endsection

@section('styles')
<style>
    #carouselBanner, #carouselBanner .carousel-item { background-color: #1a1a1a; }
    #carouselBanner .carousel-caption { padding: 0 15% 15% 15%; }
    #carouselBanner .carousel-img { aspect-ratio: 1/1; object-fit: contain; }
    @media (min-width: 992px) {
        #carouselBanner .carousel-caption { padding: 2% 15%; }
        #carouselBanner .carousel-caption > * { max-width: 26rem; }
    }
</style>
@endsection
