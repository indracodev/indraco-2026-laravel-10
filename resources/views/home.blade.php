@extends('layouts.app')

@section('title', 'Perusahaan FMCG Terkemuka di Indonesia Sejak 1971 – INDRACO')

@section('content')
<section aria-labelledby="hero-banner-title">
    <div class="hero-banner position-relative overflow-hidden bg-secondary">
        <div class="videotron position-absolute top-50 start-50 translate-middle" style="aspect-ratio: 16/9;">
            <div class="ratio ratio-16x9 overflow-hidden pointer-event-none">
                <iframe class="position-absolute top-50 start-50 translate-middle w-100 h-100"
                    src="https://www.youtube.com/embed/ePqLLciPHKg?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=ePqLLciPHKg&amp;controls=0&amp;modestbranding=1&amp;rel=0&amp;playsinline=1"
                    loading="eager" aria-hidden="true" tabindex="-1" title="Video profil INDRACO" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen=""></iframe>
            </div>
        </div>
        <div class="z-1 video-overlay position-absolute bg-black opacity-50"
            style="inset: 0; pointer-events: none;"></div>
        <div class="banner-caption z-2 position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center p-4">
            <div class="container">
                <div class="text-white" style="max-width: 660px;">
                    <h1 id="hero-banner-title" class="display-5 fw-bold text-start" data-i18n="home_banner_title">{{ __('home_banner_title') }}</h1>
                    <p class="lead mb-4" data-i18n="home_banner_text">{{ __('home_banner_text') }}</p>
                    <a href="{{ route('about') }}" class="btn btn-outline-invert text-capitalize" data-i18n="learn_more">{{ __('learn_more') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <section class="py-5">
        <div class="py-lg-5">
            <div class="row row-gap-5 gx-md-5 justify-content-md-between align-items-md-center">
                <div class="col col-12 col-md col-xl-7">
                    <h2 class="fs-3 fw-bold mb-4 text-capitalize">PT. Indraco Global Indonesia </h2>
                    <p data-i18n="home_1" class="split-paragraph">
                        Kami INDRACO &ndash; Dimulai pada tahun 1971 dengan gudang di Sumatera oleh pendiri kami, kami telah terus tumbuh dan berkembang menjadi beberapa fasilitas manufaktur canggih di seluruh Indonesia dan Singapura. Di INDRACO, kami berusaha untuk berinovasi dalam industri yang selalu berubah dan dapat beroperasi dengan kecerdasan dan kreativitas yang dengan bangga kami bawa dan tanamkan dalam semua usaha kami, sejak momen pendirian kami.
                    </p>
                </div>
                <div class="col col-12 col-md-auto">
                    <div class="card p-4 bg-light-subtle rounded-4 border-0 d-flex flex-column"
                        style="aspect-ratio: 1/1; min-width: 240px; max-width: 300px;">
                        <div class="flex-grow-1">
                            <h3 class="fw-thin text-capitalize w-75" style="font-size: 2.25rem;" data-i18n="home_2">our newsletter</h3>
                        </div>
                        <form id="formNewsletter">
                            @csrf
                            <div class="input-group border-bottom border-light">
                                <input type="email" name="email"
                                    class="form-control rounded-0 px-0 border-0 bg-transparent text-reset"
                                    placeholder="Email" required>
                                <button class="btn text-reset p-0" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em"
                                        fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="py-5 text-center" aria-labelledby="brands">
        <div class="py-lg-5">
            <h2 id="brands" class="fs-3 fw-bold text-capitalize mb-5">{{ __('product_brands_title') }}</h2>

            <div class="daftar-kategori-produk text-start text-capitalize row row-cols-1 row-gap-5">
                <div class="col">
                    <h3 class="fs-4 fw-bold mb-4">{{ __('coffee') }}</h3>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 g-sm-4 g-md-5">
                        <div class="col">
                           <a href="{{ route('product.supresso', 'supresso') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-supresso.png') }}" data-light="{{ asset('images/logo-supresso.png') }}" data-dark="{{ asset('images/logo-supresso.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'balicafe') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-balicafe.png') }}" data-light="{{ asset('images/logo-balicafe.png') }}" data-dark="{{ asset('images/logo-balicafe.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'ucafe') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-ucafe-invert.png') }}" data-light="{{ asset('images/logo-ucafe.png') }}" data-dark="{{ asset('images/logo-ucafe-invert.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'rasa-sayang') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-rasa-sayang.png') }}" data-light="{{ asset('images/logo-rasa-sayang.png') }}" data-dark="{{ asset('images/logo-rasa-sayang.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'tugu-buaya') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-tugu-buaya-invert.png') }}" data-light="{{ asset('images/logo-tugu-buaya.png') }}" data-dark="{{ asset('images/logo-tugu-buaya-invert.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'uang-emas') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-uang-emas-invert.png') }}" data-light="{{ asset('images/logo-uang-emas.png') }}" data-dark="{{ asset('images/logo-uang-emas-invert.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <a href="{{ route('product.indraco', 'haoCafe') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-hao-cafe.png') }}" data-light="{{ asset('images/logo-hao-cafe.png') }}" data-dark="{{ asset('images/logo-hao-cafe.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                     <h3 class="fs-4 fw-bold mb-4 d-none d-xl-block">
                        <span>{{ __('ginger') }}</span> | <span>{{ __('choconutmilk') }}</span> |
                        <span>{{ __('chocolate') }}</span>
                     </h3>
                     <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 g-sm-4 g-md-5">
                        <div class="col">
                           <h3 class="fs-4 fw-bold mb-4 d-xl-none">{{ __('ginger') }}</h3>
                           <a href="{{ route('product.indraco', 'jaheku') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-jaheku.png') }}" data-light="{{ asset('images/logo-jaheku.png') }}" data-dark="{{ asset('images/logo-jaheku.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <h3 class="fs-4 fw-bold mb-4 d-xl-none">{{ __('choconutmilk') }}</h3>
                           <a href="{{ route('product.indraco', 'intirasa') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-intirasa.png') }}" data-light="{{ asset('images/logo-intirasa.png') }}" data-dark="{{ asset('images/logo-intirasa.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                        <div class="col">
                           <h3 class="fs-4 fw-bold mb-4 d-xl-none">{{ __('chocolate') }}</h3>
                           <a href="{{ route('product.indraco', 'brochoco') }}" class="text-reset text-decoration-none opacity-100">
                              <article class="ratio ratio-16x9 card bg-light-subtle p-4 rounded-4 border-0">
                                 <img src="{{ asset('images/logo-brochoco.png') }}" data-light="{{ asset('images/logo-brochoco.png') }}" data-dark="{{ asset('images/logo-brochoco.png') }}" class="theme-image object-fit-contain w-50 h-50 top-50 start-50 translate-middle" alt="" loading="lazy" aria-hidden="true">
                              </article>
                           </a>
                        </div>
                     </div>
                  </div>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="py-5">
        <div class="py-lg-5">
            <h2 class="fs-3 fw-bold mb-4 text-capitalize">{{ __('home_3') }}</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 g-sm-4 g-md-5">
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-distribution.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">{{ __('home_4') }}</h3>
                            <p class="card-text">{{ __('home_5') }}</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-market.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">{{ __('home_6') }}</h3>
                            <p class="card-text">{{ __('home_7') }}</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-F&B.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">{{ __('home_8') }}</h3>
                            <p class="card-text">{{ __('home_9') }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="py-5">
        <div class="py-lg-5">
            <div class="row row-gap-5 gx-md-5 align-items-md-center justify-content-md-between">
                <div class="col col-12 col-md-auto">
                    <div class="position-relative py-4 pe-5 d-inline-block">
                        <div class="bg-light-subtle rounded-4 position-absolute top-0 end-0 h-100 z-0" style="aspect-ratio: 1/1;"></div>
                        <h2 class="display-1 lh-1 fw-thin text-uppercase text-nowrap z-1 position-relative"><span>{{ __('home_10') }}</span> <br> <span class="fw-medium small">1.000.000 +</span></h2>
                    </div>
                    <p class="fs-3 mb-0">{{ __('home_11') }}</p>
                </div>
                <div class="col col-12 col-md col-xl-6">
                    <p>{{ __('home_12') }}</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-invert text-capitalize">{{ __('contact_us') }}</a>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="py-5">
        <div class="py-lg-5">
            <div class="row row-gap-5 gx-lg-5 align-items-lg-center justify-content-lg-between">
                <div class="col col-12 col-lg-auto order-lg-2">
                    <img src="{{ asset('images/cart-indracostore.png') }}" alt="" aria-hidden="true" loading="lazy" class="w-100 h-auto" style="max-width: 450px;">
                </div>
                <div class="col col-12 col-lg col-xl-6 order-lg-1">
                    <p>{{ __('home_13') }}</p>
                    <a href="https://www.indracostore.com/" target="_blank" class="btn btn-outline-invert text-capitalize">{{ __('buy_now') }}</a>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="py-5">
        <div class="py-lg-5 text-md-center">
            <h2 id="contact-title" class="fw-bold fs-3 mb-5 text-capitalize">{{ __('contact_us') }}</h2>
            <address class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 g-sm-4 g-md-5">
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-office.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">{{ __('home_14') }}</h3>
                            <p class="card-text">
                                <a href="{{ $settings['contact_maps_link'] ?? 'https://maps.app.goo.gl/vLD5kH5WLryYcZwy6' }}" target="_blank" class="text-reset text-decoration-none opacity-75-hover">{{ $settings['contact_address'] ?? 'Jl. Semeru No. 133-135 Bambe, Kec. Driyorejo. Gresik 61177 Jawa Timur - Indonesia' }}</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-phone.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">{{ __('home_15') }}</h3>
                            <p class="card-text text-start d-inline">
                                <b>T</b>. <a href="tel:{{ str_replace(' ', '', $settings['contact_phone1'] ?? '+62 31 766 8777') }}" target="_blank" class="text-reset text-decoration-none opacity-75-hover">{{ $settings['contact_phone1'] ?? '+62 31 766 8777' }}</a>
                                <br>
                                <b>T</b>. <a href="tel:{{ str_replace(' ', '', $settings['contact_phone2'] ?? '+62 31 766 7388') }}" target="_blank" class="text-reset text-decoration-none opacity-75-hover">{{ $settings['contact_phone2'] ?? '+62 31 766 7388' }}</a>
                                <br>
                                <b>F</b>. <a href="fax:{{ str_replace(' ', '', $settings['contact_fax'] ?? '+62 31 766 9590') }}" target="_blank" class="text-reset text-decoration-none opacity-75-hover">{{ $settings['contact_fax'] ?? '+62 31 766 9590' }}</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="card bg-light-subtle rounded-4 border-0 h-100">
                        <div class="card-body p-5">
                            <img src="{{ asset('images/landing-icon-email.png') }}" alt="" aria-hidden="true" loading="lazy" style="aspect-ratio: 1/1; width: 30%; object-fit: contain;">
                            <h3 class="card-title fs-5 fw-bold text-capitalize my-3">email</h3>
                            <p class="card-text">
                                <a href="{{ route('contact') }}" class="text-reset text-decoration-none opacity-75-hover">{{ $settings['contact_email'] ?? 'info@indraco.com' }}</a>
                            </p>
                        </div>
                    </article>
                </div>
            </address>
        </div>
    </section>
</div>

<!-- Newsletter Modal -->
<div id="modalNewsletter" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-light border-0 shadow" style="background-color: #595959; border-radius: 12px;">
            <div class="modal-body text-center py-5 position-relative">
                <button class="btn-close btn-close-white rounded-0 shadow-none position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="container-fluid py-3">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <h3 class="display-4 fw-light mb-4 text-white">{{ __('subscribe_modal_title') }}</h3>
                            <p class="fs-5 mb-5 text-white">{{ __('subscribe_modal_subtitle') }}</p>
                            <p class="small mb-5 text-white-50 px-2" style="font-weight: 300;">{!! __('subscribe_modal_desc') !!}</p>
                            <hr class="border-light opacity-50 mt-0 mb-4 mx-auto" style="width: 80%;">
                            <p class="text-white-50 m-0 fs-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#formNewsletter').on('submit', function (e) {
            e.preventDefault();
            var $form = $(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("subscribe") }}',
                data: $form.serialize(),
                success: function (response) {
                    if (response.status === 'success') {
                        var myModal = new bootstrap.Modal(document.getElementById('modalNewsletter'));
                        myModal.show();
                        $form[0].reset();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    .hero-banner { aspect-ratio: 3/5; }
    @media (min-width: 648px) { .hero-banner { aspect-ratio: 4/3; } }
    @media (min-width: 992px) { .hero-banner { aspect-ratio: 21/9; } }
    .videotron { width: auto; height: 135%; }
    @media (min-width: 992px) { .videotron { width: 110%; height: auto; } }
</style>
@endsection
