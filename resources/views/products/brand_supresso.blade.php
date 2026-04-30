@extends('layouts.app')

@section('title', $brand->nama_merek . ' Collection – INDRACO')

@section('extra_css')
<style>
    .menu-variant-item .figure { width: 6.5rem; }
    .menu-variant-item .figure-img { overflow: visible !important; position: relative; border: 2px solid transparent; transition: all .3s ease; }
    .menu-variant-item .figure-img img { 
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        object-fit: contain;
        transform: translate(-50%, -50%) scale(1.1);
        transition: all .4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
    }
    .menu-variant-item > a:hover img, 
    .menu-variant-item > a.active img { 
        transform: translate(-50%, -60%) scale(1.6); 
        filter: drop-shadow(0 15px 25px rgba(0,0,0,0.5));
    }
    .menu-variant-item figcaption { transition: all .3s ease; opacity: .8; }
    .menu-variant-item > a:hover figcaption,
    .menu-variant-item > a.active figcaption { opacity: 1; font-weight: bold; }
    
    @media (min-width: 992px) {
        .map-img { max-width: 60vw; margin-top: 2vw; opacity: .7; pointer-events: none; }
        .variant-header { padding-top: 15vw; padding-bottom: 6rem; }
        .variant-body {margin-top: -6rem;}
        .header-tab-pane { z-index: 1020; }
    }
    .variant-item {padding-top: 100px;}
    .variant-item:first-child { padding-top: 0; }
    
    .rating-stars-container {
        display: inline-flex;
        gap: 4px;
        align-items: center;
        vertical-align: middle;
    }
    .dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 1.5px solid currentColor;
    }
    .dot.full {
        background-color: currentColor;
    }
    .dot.half {
        background: linear-gradient(to right, currentColor 50%, transparent 50%);
    }
    .dot.empty {
        background-color: transparent;
    }
</style>
@endsection

@section('content')
<main id="konten">
    <nav aria-label="breadcrumb" class="container py-3 mb-5 small">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-reset opacity-75-hover text-decoration-none">Produk Kami</a></li>
            <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ $brand->nama_merek }}</li>
        </ol>
    </nav>

    <div class="text-center container mb-5" style="max-width: 860px;">
        <img src="{{ asset($brand->logo_path) }}" alt="Logo {{ $brand->nama_merek }}" loading="lazy" class="img-fluid mb-3" style="max-width: 9rem;">
        <p class="lead">{{ $brand->deskripsi }}</p>
    </div>

    <div class="overflow-auto">
        <div class="d-flex">
            <div class="menu-category nav nav-tabs flex-nowrap text-nowrap mx-auto border-0">
                @foreach ($collections as $col)
                <a href="?col={{ $col->id }}" class="menu-category-item nav-link text-capitalize text-reset opacity-75-hover border-0 {{ $col->id == $collectionId ? 'active' : '' }}">
                    {{ $col->collection_name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="category">
        @if ($variants->isNotEmpty())
            <header id="nav-variant-container" class="header-tab-pane sticky-top bg-light-subtle shadow-sm" style="overflow-x: auto; overflow-y: visible;">
                <ol class="menu-variant list-unstyled d-flex gap-4 px-4 py-5 mb-0 justify-content-lg-center">
                    @foreach ($variants as $v)
                    @php
                        $v_icon = !empty($v->icon_path) ? $v->icon_path : ($v->products->first()->gambar_utama ?? 'images/no-image.png');
                    @endphp
                    <li class="menu-variant-item">
                        <a href="#variant-{{ $v->slug }}" class="text-reset text-decoration-none">
                            <figure class="figure mb-0 text-center">
                                <div class="figure-img ratio ratio-1x1 rounded-circle mx-auto" style="background-color: {{ $v->bg_color }};">
                                    <img src="{{ asset($v_icon) }}" alt="" class="object-fit-contain">
                                </div>
                                <figcaption class="figure-caption text-reset text-capitalize mt-2"><small>{{ $v->variant_name }}</small></figcaption>
                            </figure>
                        </a>
                    </li>
                    @endforeach
                </ol>
            </header>

            <div class="variant-list">
                @foreach ($variants as $v)
                <section class="variant-item" id="variant-{{ $v->slug }}">
                    <header class="variant-header overflow-hidden position-relative" style="background-color: {{ $v->bg_color }}; color: {{ $v->text_color }};">
                        <div class="container">
                            <div class="row align-items-lg-end">
                                <div class="col col-12 z-1">
                                    @if(!empty($v->map_image))
                                    <img src="{{ asset($v->map_image) }}" alt="" class="map-img w-100 h-auto position-lg-absolute top-0 end-0" style="opacity: {{ $v->map_opacity ?? 0.70 }};">
                                    @endif
                                </div>
                                <div class="col col-12 col-lg-5 z-2">
                                    <h3 class="product-title display-5 fw-bold text-capitalize">{{ $v->variant_name }}</h3>
                                    <p class="product-description">{!! nl2br(e($v->description)) !!}</p>
                                    @if(!empty($v->taste))
                                    <p class="product-taste text-uppercase fw-bold">{{ $v->taste }}</p>
                                    @endif
                                </div>
                                <div class="col col-12 col-lg-auto ms-lg-auto z-2">
                                    @if (!$isKraton)
                                    <p class="product-acidity text-capitalize">acidity <br> {!! renderRatingStars($v->acidity) !!}</p>
                                    <p class="product-viscosity text-capitalize">body <br> {!! renderRatingStars($v->body) !!}</p>
                                    @endif
                                    @if(!empty($v->roast))
                                    <p class="product-process text-capitalize small opacity-75">{{ $v->roast }}</p>
                                    @endif
                                    @if(!empty($v->ingredient))
                                    <p class="product-ingredient text-capitalize small opacity-75">{{ $v->ingredient }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="variant-body container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 py-5 g-4">
                            @forelse ($v->products as $prod)
                            @php
                                $img_p = !empty($prod->gambar_utama) ? $prod->gambar_utama : 'images/no-image.png';
                                $link_p = !empty($prod->link_web) ? $prod->link_web : '#';
                            @endphp
                            <div class="col">
                                <a href="{{ $link_p }}" {{ $link_p != '#' ? 'target="_blank"' : '' }} class="text-reset text-decoration-none">
                                    <article class="card border-0 bg-light-subtle h-100">
                                        <div class="card-header p-0 bg-transparent border-0 rounded-0">
                                            <div class="card-img ratio ratio-1x1">
                                                <img src="{{ asset($img_p) }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-contain">
                                            </div>
                                        </div>
                                        <div class="card-body text-center d-flex flex-column p-3">
                                            <h4 class="card-title fs-6 fw-bold text-capitalize mb-0">{{ $prod->nama_produk }}</h4>
                                            @if(!empty($prod->tipe_packing))
                                            <p class="card-text small mt-1">{{ $prod->tipe_packing }}</p>
                                            @endif
                                        </div>
                                    </article>
                                </a>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5 text-muted">Belum ada produk untuk variant ini.</div>
                            @endforelse
                        </div>
                    </div>
                </section>
                @endforeach
            </div>
        @else
            <div class="container text-center py-5 my-5">
                <p class="text-muted lead">Silakan pilih kategori koleksi di atas atau tambahkan data di Admin.</p>
            </div>
        @endif
    </div>
</main>
@endsection

@php
function renderRatingStars($score) {
    $score = (float)$score;
    $full = floor($score);
    $half = ($score - $full) >= 0.5 ? 1 : 0;
    $empty = 5 - $full - $half;
    $out = '<div class="rating-stars-container">';
    for($i=0; $i<$full; $i++) $out .= '<span class="dot full"></span>';
    if($half) $out .= '<span class="dot half"></span>';
    for($i=0; $i<$empty; $i++) $out .= '<span class="dot empty"></span>';
    return $out . '</div>';
}
@endphp
