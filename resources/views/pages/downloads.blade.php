@extends('layouts.app')

@section('title', 'Unduhan – INDRACO')

@section('content')
<main id="konten">
    <h1 class="visually-hidden">halaman unduhan</h1>
    <div class="py-5">
        <div class="container py-lg-5">
            <ul class="list-unstyled row row-cols-1 row-cols-sm-2 g-3 g-sm-4 g-lg-5">
                @php
                    $downloads = [
                        ['name' => 'INDRACO', 'desc' => 'profil perusahaan', 'img' => 'brochure-cp.jpg', 'url' => 'https://indraco.com/brosur/Company Profile Indraco.pdf'],
                        ['name' => 'supresso', 'desc' => 'produk spesifikasi', 'img' => 'brochure-supresso.jpg', 'url' => 'https://indraco.com/brosur/BROCHURE CATALOG SPECIFICATION SUPRESSO NEW.pdf'],
                        ['name' => 'UCAFÉ', 'desc' => 'produk spesifikasi', 'img' => 'brochure-products.jpg', 'url' => 'https://indraco.com/brosur/Catalog Supresso UCAFE.pdf'],
                        ['name' => 'BROCHOCO', 'desc' => 'produk spesifikasi', 'img' => 'brochure-products.jpg', 'url' => 'https://indraco.com/brosur/Catalog BROCHOCO.pdf'],
                        ['name' => 'jaheku', 'desc' => 'produk spesifikasi', 'img' => 'brochure-products.jpg', 'url' => 'https://indraco.com/brosur/Catalog Jaheku.pdf'],
                    ];
                @endphp
                @foreach($downloads as $item)
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/' . $item['img']) }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">{{ $item['name'] }}</h2>
                            <p class="text-capitalize">{{ $item['desc'] }}</p>
                            <a href="{{ $item['url'] }}" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">download</a>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>
@endsection
