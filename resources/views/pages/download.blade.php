@extends('layouts.app')

@section('title', __('download_title_page'))

@section('content')
<main id="konten">
    <h1 class="visually-hidden">{{ __('download_h1') }}</h1>
    <div class="py-5">
        <div class="container py-lg-5">
            <ul class="list-unstyled row row-cols-1 row-cols-sm-2 g-3 g-sm-4 g-lg-5">
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/brochure-cp.jpg') }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">INDRACO</h2>
                            <p class="text-capitalize">{{ __('download_company_profile') }}</p>
                            <a href="https://indraco.com/brosur/Company Profile Indraco.pdf" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">{{ __('download_btn') }}</a>
                        </div>
                    </article>
                </li>
                <li class="col d-sm-none"><hr></li>
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/brochure-supresso.jpg') }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">supresso</h2>
                            <p class="text-capitalize">{{ __('download_product_spec') }}</p>
                            <a href="https://indraco.com/brosur/BROCHURE CATALOG SPECIFICATION SUPRESSO NEW.pdf" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">{{ __('download_btn') }}</a>
                        </div>
                    </article>
                </li>
                <li class="col d-sm-none"><hr></li>
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/brochure-products.jpg') }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">UCAFÉ</h2>
                            <p class="text-capitalize">{{ __('download_product_spec') }}</p>
                            <a href="https://indraco.com/brosur/Catalog Supresso UCAFE.pdf" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">{{ __('download_btn') }}</a>
                        </div>
                    </article>
                </li>
                <li class="col d-sm-none"><hr></li>
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/brochure-products.jpg') }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">BROCHOCO</h2>
                            <p class="text-capitalize">{{ __('download_product_spec') }}</p>
                            <a href="https://indraco.com/brosur/Catalog BROCHOCO.pdf" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">{{ __('download_btn') }}</a>
                        </div>
                    </article>
                </li>
                <li class="col d-sm-none"><hr></li>
                <li class="col">
                    <article class="d-flex align-items-center">
                        <div class="w-50">
                            <div class="ratio ratio-1x1 w-100 bg-secondary-subtle">
                                <img src="{{ asset('images/brochure-products.jpg') }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                            </div>
                        </div>
                        <div class="w-50 p-4">
                            <h2 class="fs-4 text-capitalize lh-1">jaheku</h2>
                            <p class="text-capitalize">{{ __('download_product_spec') }}</p>
                            <a href="https://indraco.com/brosur/Catalog Jaheku.pdf" target="_blank" class="btn btn-outline-invert rounded-0 text-capitalize">{{ __('download_btn') }}</a>
                        </div>
                    </article>
                </li>
            </ul>
        </div>
    </div>
</main>
@endsection
