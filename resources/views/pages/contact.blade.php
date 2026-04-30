@extends('layouts.app')

@section('title', __('contact_title_page'))

@section('content')
<main id="konten">
    <div class="py-5">
        <div class="container py-lg-5">
            <h1 class="display-4 fw-bold text-uppercase lh-1">{{ __('contact_1') }}</h1>
            <p class="mb-5">{{ __('contact_1_desc') }}</p>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="post" aria-labelledby="form-title" action="{{ route('contact.submit') }}">
                @csrf
                <h2 id="form-title" class="visually-hidden">{{ __('contact_2') }}</h2>

                <div class="d-flex flex-column row-gap-5">
                    <div class="form-group border-bottom">
                        <label class="form-label" for="name">{{ __('contact_3') }}</label>
                        <input id="name" name="name" type="text" autocomplete="name"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none"
                            placeholder="{{ __('contact_placeholder_name') }}" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group border-bottom">
                        <label class="form-label" for="email">{{ __('contact_11') }}</label>
                        <input id="email" name="email" type="email" autocomplete="email"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none"
                            placeholder="{{ __('contact_placeholder_email') }}" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group border-bottom">
                        <label class="form-label" for="phone">{{ __('contact_phone') }}</label>
                        <input id="phone" name="phone" type="tel" autocomplete="tel"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none"
                            placeholder="{{ __('contact_placeholder_phone') }}" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group border-bottom">
                        <label class="form-label" for="subject">{{ __('contact_4') }}</label>
                        <input id="subject" name="subject" type="text"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none"
                            placeholder="{{ __('contact_placeholder_subject') }}" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label visually-hidden" for="message">{{ __('contact_5') }}</label>
                        <textarea name="message" id="message" rows="5"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none"
                            placeholder="{{ __('contact_placeholder_message') }}" required>{{ old('message') }}</textarea>
                    </div>
                    <div class="form-group d-flex align-items-center column-gap-3 border-bottom w-50">
                        <label for="captcha" class="text-nowrap fw-bold">
                            {{ __('contact_verification') }}
                            {{ $num1 }} + {{ $num2 }} =
                        </label>
                        <input id="captcha" name="captcha" type="number"
                            class="form-control form-control-lg rounded-0 text-reset bg-transparent border-0 px-0 shadow-none text-center"
                            placeholder="?" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-invert float-end px-4 px-xl-5">
                            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" width="1em" height="1em">
                                <path fill="currentColor"
                                    d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z">
                                </path>
                            </svg>
                            {{ __('contact_6') }}
                            <span class="visually-hidden">
                                {{ __('contact_6') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <hr class="my-5 opacity-100">

            <address class="pt-lg-5 d-flex flex-column row-gap-5 d-lg-grid text-start" style="grid-template-columns: 1fr auto 1fr auto 1fr;">

                <div>
                    <h3 class="fs-5 text-capitalize mb-4">PT. Indraco Global Indonesia</h3>
                    <p class="mb-0" style="max-width: 350px">
                        <a href="https://maps.app.goo.gl/vLD5kH5WLryYcZwy6" target="_blank"
                            class="text-reset text-decoration-none">Jl. Semeru No. 133-135 Bambe, Kec. Driyorejo. Gresik
                            61177
                            Jawa Timur - Indonesia</a>
                        <br><br>
                        <b>T</b>. <a href="tel:+62317668777" target="_blank" class="text-reset text-decoration-none">+62
                            31
                            766 8777</a>
                        <br>
                        <b>T</b>. <a href="tel:+62317667388" target="_blank" class="text-reset text-decoration-none">+62
                            31
                            766 7388</a>
                        <br>
                        <b>F</b>. <a href="fax:+62317669590" target="_blank" class="text-reset text-decoration-none">+62
                            31
                            766 9590</a>
                        <br>
                        <b>E</b>. <a href="mailto:info@indraco.com" target="_blank"
                            class="text-reset text-decoration-none">info@indraco.com</a>
                        <br><br>
                        <a href="https://indracocoffee.com" target="_blank" class="text-reset text-decoration-none">www.indracocoffee.com</a>
                    </p>
                </div>

                <div class="d-none d-lg-block vr mx-5"></div>

                <div>
                    <h5 class="fs-5 text-capitalize mb-4">
                        {{ __('contact_7') }}
                    </h5>
                    <ul class="mb-0">
                        <li>
                            General Trade : <a href="mailto:getra@indraco.com"
                                class="text-reset text-decoration-none">getra@indraco.com</a>
                        </li>
                        <li>
                            Modern Trade : <a href="mailto:motra@indraco.com"
                                class="text-reset text-decoration-none">motra@indraco.com</a>
                        </li>
                        <li>
                            E-commerce : <a href="mailto:ecom@indraco.com"
                                class="text-reset text-decoration-none">ecom@indraco.com</a>
                        </li>
                        <li>
                            Food Service : <a href="mailto:fopro@indraco.com"
                                class="text-reset text-decoration-none">fopro@indraco.com</a>
                        </li>
                        <li>
                            F&amp;B Services : <a href="mailto:fobev@indraco.com"
                                class="text-reset text-decoration-none">fobev@indraco.com</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none d-lg-block vr mx-5"></div>

                <div>
                    <h5 class="fs-5 text-capitalize mb-4">
                        {{ __('contact_8') }}
                    </h5>
                    <ul class="mb-0">
                        <li>
                            {{ __('contact_8') }} : <a href="mailto:inbus@indraco.com"
                                class="text-reset text-decoration-none">inbus@indraco.com</a>
                        </li>
                    </ul>
                </div>

            </address>
        </div>
    </div>
</main>
@endsection
