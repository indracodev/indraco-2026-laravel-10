@extends('layouts.app')

@section('title', __('career_title_page'))

@section('content')
<main id="konten">
    <h1 class="visually-hidden">{{ __('career_title_header') }}</h1>
    <div class="py-5">
        <div class="container pb-lg-5">
            <div class="banner text-dark" style="background-color: #e9e9e9;">
                <div class="row g-0 align-items-lg-center">
                    <div class="col col-12 col-lg-6 p-4 p-sm-5">
                        <h2 class="fw-bold">{{ __('career_1') }}</h2>
                        <p class="mb-0">{{ __('career_2') }}</p>
                    </div>
                    <div class="col col-12 col-lg-6">
                        <img src="{{ asset('images/banner-karir.png') }}" alt="" loading="lazy" class="img-fluid w-100">
                    </div>
                </div>
            </div>

            <p class="my-5">{{ __('career_3') }}</p>

            <ol class="list-unstyled row row-gap-5 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 text-center mb-5">
                <li>
                    <article>
                        <div class="w-75 mx-auto mb-3">
                            <div class="ratio ratio-1x1 w-50 mx-auto">
                                <img src="{{ asset('images/career-stage-1.png') }}" data-light="{{ asset('images/career-stage-1.png') }}" data-dark="{{ asset('images/career-stage-1-invert.png') }}" alt="" loading="lazy" aria-hidden="true" class="theme-image object-fit-contain">
                            </div>
                        </div>
                        <p class="text-capitalize">1. <br> <span>{{ __('career_4') }}</span></p>
                    </article>
                </li>
                <li>
                    <article>
                        <div class="w-75 mx-auto mb-3">
                            <div class="ratio ratio-1x1 w-50 mx-auto">
                                <img src="{{ asset('images/career-stage-2.png') }}" data-light="{{ asset('images/career-stage-2.png') }}" data-dark="{{ asset('images/career-stage-2-invert.png') }}" alt="" loading="lazy" aria-hidden="true" class="theme-image object-fit-contain">
                            </div>
                        </div>
                        <p class="text-capitalize">2. <br> <span>{{ __('career_5') }}</span></p>
                    </article>
                </li>
                <li>
                    <article>
                        <div class="w-75 mx-auto mb-3">
                            <div class="ratio ratio-1x1 w-50 mx-auto">
                                <img src="{{ asset('images/career-stage-3.png') }}" data-light="{{ asset('images/career-stage-3.png') }}" data-dark="{{ asset('images/career-stage-3-invert.png') }}" alt="" loading="lazy" aria-hidden="true" class="theme-image object-fit-contain">
                            </div>
                        </div>
                        <p class="text-capitalize">3. <br> <span>{{ __('career_6') }}</span></p>
                    </article>
                </li>
                <li>
                    <article>
                        <div class="w-75 mx-auto mb-3">
                            <div class="ratio ratio-1x1 w-50 mx-auto">
                                <img src="{{ asset('images/career-stage-4.png') }}" data-light="{{ asset('images/career-stage-4.png') }}" data-dark="{{ asset('images/career-stage-4-invert.png') }}" alt="" loading="lazy" aria-hidden="true" class="theme-image object-fit-contain">
                            </div>
                        </div>
                        <p class="text-capitalize">4. <br> <span>{{ __('career_7') }}</span></p>
                    </article>
                </li>
                <li>
                    <article>
                        <div class="w-75 mx-auto mb-3">
                            <div class="ratio ratio-1x1 w-50 mx-auto">
                                <img src="{{ asset('images/career-stage-5.png') }}" data-light="{{ asset('images/career-stage-5.png') }}" data-dark="{{ asset('images/career-stage-5-invert.png') }}" alt="" loading="lazy" aria-hidden="true" class="theme-image object-fit-contain">
                            </div>
                        </div>
                        <p class="text-capitalize">5. <br> <span>{{ __('career_8') }}</span></p>
                    </article>
                </li>
            </ol>

            <!-- <p class="fs-3 text-center text-danger">{{ __('career_9') }}</p> -->
            
            <!-- daftar situs job online -->
            <p class="text-center text-capitalize">{{ __('career_10') }}</p>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-xl-4 justify-content-lg-center">
                <div class="col">
                    <a href="https://id.jobstreet.com/id/companies/indraco-168551422470741" target="_blank" class="text-reset text-decoration-none">
                        <article class="ratio ratio-16x9 rounded-4 card p-4 bg-light-subtle border-0">
                            <img src="{{ asset('images/JobS.png') }}" data-light="{{ asset('images/JobS.png') }}" data-dark="{{ asset('images/JobS-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image object-fit-contain w-75 h-75 top-50 start-50 translate-middle">
                        </article>
                    </a>
                </div>
                <!--<div class="col">-->
                <!--   <a href="#" target="_blank" class="text-reset text-decoration-none">-->
                <!--      <article class="ratio ratio-16x9 rounded-4 card p-4 bg-light-subtle border-0">-->
                <!--         <img src="{{ asset('images/JobsDB.png') }}" data-light="{{ asset('images/JobsDB.png') }}" data-dark="{{ asset('images/JobsDB-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image object-fit-contain w-75 h-75 top-50 start-50 translate-middle">-->
                <!--      </article>-->
                <!--   </a>-->
                <!--</div>-->
                <div class="col">
                    <a href="https://www.linkedin.com/company/indraco-group/posts/?feedView=all" target="_blank" class="text-reset text-decoration-none">
                        <article class="ratio ratio-16x9 rounded-4 card p-4 bg-light-subtle border-0">
                            <img src="{{ asset('images/LinkedIn.png') }}" data-light="{{ asset('images/LinkedIn.png') }}" data-dark="{{ asset('images/LinkedIn-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image object-fit-contain w-75 h-75 top-50 start-50 translate-middle">
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
