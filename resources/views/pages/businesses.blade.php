@extends('layouts.app')

@section('title', __('business_title_page'))

@section('content')
<main id="konten">
    <h1 class="visually-hidden">{{ __('business_h1') }}</h1>
    <div class="container">
        <!-- Section: Ekspor -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">{!! __('ekspor_title') !!}</h2>
                <p class="lead mb-5">{{ __('ekspor_desc') }}</p>
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('images/exim2.png') }}" data-light="{{ asset('images/exim2.png') }}" data-dark="{{ asset('images/exim2-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image icon-rounded" style="aspect-ratio: 1/1; object-fit: contain;">
                    <ul class="mb-0">
                        <li>{{ __('ekspor_list1') }}</li>
                        <li>{{ __('ekspor_list2') }}</li>
                        <li>{{ __('ekspor_list3') }}</li>
                    </ul>
                </div>
            </div>
        </section>

        <hr class="m-0">

        <!-- Section: Packaging -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">{!! __('packaging_title') !!}</h2>
                <p class="lead mb-5">{{ __('packaging_desc') }}</p>
                <div class="d-flex gap-3 align-items-center">
                    <img src="{{ asset('images/layanan-pengemasan.png') }}" data-light="{{ asset('images/layanan-pengemasan.png') }}" data-dark="{{ asset('images/layanan-pengemasan-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image icon-rounded" style="aspect-ratio: 1/1; object-fit: contain;">
                    <ul class="mb-0">
                        <li>{{ __('packaging_list1') }}</li>
                        <li>{{ __('packaging_list2') }}</li>
                        <li>{{ __('packaging_list3') }}</li>
                    </ul>
                </div>
            </div>
        </section>

        <hr class="m-0">

        <!-- Section: Distribusi -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">{!! __('business_dist_title') !!}</h2>
                <p class="lead mb-5">{{ __('business_dist_desc') }}</p>
                <ul class="list-unstyled mb-0 row row-gap-5 gx-lg-5">
                    <li class="col col-12 col-lg-6 pe-xl-5">
                        <article>
                            <img src="{{ asset('images/businesses-domestic.png') }}" data-light="{{ asset('images/businesses-domestic.png') }}" data-dark="{{ asset('images/businesses-domestic-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 20%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ __('business_domestic_title') }}</h3>
                            <p>{{ __('business_domestic_desc') }}</p>
                        </article>
                    </li>
                    <li class="col col-12 col-lg-6 pe-xl-5 ps-xl-5">
                        <article>
                            <img src="{{ asset('images/businesses-global.png') }}" data-light="{{ asset('images/businesses-global.png') }}" data-dark="{{ asset('images/businesses-global-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 20%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ __('business_international_title') }}</h3>
                            <p>{{ __('business_international_desc') }}</p>
                        </article>
                    </li>
                </ul>
            </div>
        </section>

        <hr class="m-0">

        <!-- Section: Online Store -->
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize">{!! __('business_online_title') !!}</h2>
                <p class="lead mb-5">{{ __('business_online_desc') }}</p>
                <ul class="list-unstyled mb-0 row row-gap-5 gx-lg-5">
                    <li class="col col-12 col-lg-6 pe-xl-5">
                        <article>
                            <img src="{{ asset('images/businesses-ecommerce.png') }}" data-light="{{ asset('images/businesses-ecommerce.png') }}" data-dark="{{ asset('images/businesses-ecommerce-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 20%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ __('business_ecommerce_title') }}</h3>
                            <p class="mb-4">{{ __('business_ecommerce_desc') }}</p>
                            <ul class="list-unstyled row row-cols-2 row-gap-3 gx-5">
                                <li class="col">
                                    <a href="https://supresso.com/" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-supresso-typograph-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="https://indracostore.com/" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-indracostore-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                            </ul>
                        </article>
                    </li>
                    <li class="col col-12 col-lg-6 pe-xl-5 ps-xl-5">
                        <article>
                            <img src="{{ asset('images/businesses-marketplace.png') }}" data-light="{{ asset('images/businesses-marketplace.png') }}" data-dark="{{ asset('images/businesses-marketplace-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image" style="aspect-ratio: 1/1; width: 20%; object-fit: contain;">
                            <h3 class="fw-bold fs-4 text-capitalize my-3">{{ __('business_marketplace_title') }}</h3>
                            <p class="mb-4">{{ __('business_marketplace_desc') }}</p>
                            <ul class="list-unstyled row row-cols-2 row-cols-sm-3 row-gap-3 gx-5 align-items-center">
                                <li class="col">
                                    <a href="https://www.tokopedia.com/indracoofficial" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-tokopedia-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="https://shopee.co.id/indracoofficial" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-shopee-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="https://www.lazada.co.id/shop/indraco/" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-lazada-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="https://www.blibli.com/merchant/indraco/INT-60044?pickupPointCode=PP-3056342&fbbActivated=false" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-blibli-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-75 h-auto">
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="https://www.tiktok.com/@indracostore" target="_blank" class="text-reset text-decoration-none">
                                        <img src="{{ asset('images/logo-tiktok-shop-flat.png') }}" alt="" loading="lazy" aria-hidden="true" class="w-100 h-auto">
                                    </a>
                                </li>
                            </ul>
                        </article>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</main>

@endsection

@section('styles')
<style>
    .icon-rounded { width: 20%; }
    @media (min-width: 992px) { .icon-rounded { width: 95px; } }
    @media (min-width: 1200px) { .icon-rounded { width: 107px; } }
</style>
@endsection
