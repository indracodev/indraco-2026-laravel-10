<footer class="bg-light-subtle small py-3">
    <div class="container py-5">
        <div class="row row-gap-5 gx-md-5 justify-content-lg-between">
            <div class="col col-12 col-lg-auto order-lg-1 d-lg-flex flex-lg-column">
                <div class="flex-lg-grow-1">
                    <img src="{{ asset('images/logo-indraco-light.png') }}" data-light="{{ asset('images/logo-indraco-dark.png') }}" data-dark="{{ asset('images/logo-indraco-light.png') }}" alt="Logo INDRACO" class="theme-image w-100 h-auto" style="max-width: 18.75em;">
                    <p class="small mt-2">INDRACO roasting fine exquisite coffee since 1971.</p>
                </div>
                <nav aria-label="navigasi sosial media" class="d-flex flex-wrap gap-3 flex-lg-grow-0 mt-4">
                    @if (!empty($settings['socmed_facebook']))
                    <a href="{{ $settings['socmed_facebook'] }}" target="_blank" rel="noopener" class="text-reset text-decoration-none opacity-75-hover" aria-label="Facebook">
                        <svg aria-hidden="true" width="2em" height="2em" viewBox="0 0 640 640"><path fill="currentColor" d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"></path></svg>
                    </a>
                    @endif
                    @if (!empty($settings['socmed_instagram']))
                    <a href="{{ $settings['socmed_instagram'] }}" target="_blank" rel="noopener" class="text-reset text-decoration-none opacity-75-hover" aria-label="Instagram">
                        <svg aria-hidden="true" width="2em" height="2em" viewBox="0 0 640 640"><path fill="currentColor" d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z"></path></svg>
                    </a>
                    @endif
                    @if (!empty($settings['socmed_youtube']))
                    <a href="{{ $settings['socmed_youtube'] }}" target="_blank" rel="noopener" class="text-reset text-decoration-none opacity-75-hover" aria-label="Youtube">
                        <svg aria-hidden="true" width="2em" height="2em" viewBox="0 0 640 640"><path fill="currentColor" d="M581.7 188.1C575.5 164.4 556.9 145.8 533.4 139.5C490.9 128 320.1 128 320.1 128C320.1 128 149.3 128 106.7 139.5C83.2 145.8 64.7 164.4 58.4 188.1C47 231 47 320.4 47 320.4C47 320.4 47 409.8 58.4 452.7C64.7 476.3 83.2 494.2 106.7 500.5C149.3 512 320.1 512 320.1 512C320.1 512 490.9 512 533.5 500.5C557 494.2 575.5 476.3 581.8 452.7C593.2 409.8 593.2 320.4 593.2 320.4C593.2 320.4 593.2 231 581.8 188.1zM264.2 401.6L264.2 239.2L406.9 320.4L264.2 401.6z"></path></svg>
                    </a>
                    @endif
                    @if (!empty($settings['socmed_tiktok']))
                    <a href="{{ $settings['socmed_tiktok'] }}" target="_blank" rel="noopener" class="text-reset text-decoration-none opacity-75-hover" aria-label="Tiktok">
                        <svg aria-hidden="true" width="2em" height="2em" viewBox="0 0 640 640"><path fill="currentColor" d="M544.5 273.9C500.5 274 457.5 260.3 421.7 234.7L421.7 413.4C421.7 446.5 411.6 478.8 392.7 506C373.8 533.2 347.1 554 316.1 565.6C285.1 577.2 251.3 579.1 219.2 570.9C187.1 562.7 158.3 545 136.5 520.1C114.7 495.2 101.2 464.1 97.5 431.2C93.8 398.3 100.4 365.1 116.1 336C131.8 306.9 156.1 283.3 185.7 268.3C215.3 253.3 248.6 247.8 281.4 252.3L281.4 342.2C266.4 337.5 250.3 337.6 235.4 342.6C220.5 347.6 207.5 357.2 198.4 369.9C189.3 382.6 184.4 398 184.5 413.8C184.6 429.6 189.7 444.8 199 457.5C208.3 470.2 221.4 479.6 236.4 484.4C251.4 489.2 267.5 489.2 282.4 484.3C297.3 479.4 310.4 469.9 319.6 457.2C328.8 444.5 333.8 429.1 333.8 413.4L333.8 64L421.8 64C421.7 71.4 422.4 78.9 423.7 86.2C426.8 102.5 433.1 118.1 442.4 131.9C451.7 145.7 463.7 157.5 477.6 166.5C497.5 179.6 520.8 186.6 544.6 186.6L544.6 274z"></path></svg>
                    </a>
                    @endif
                    @if (!empty($settings['socmed_linkedin']))
                    <a href="{{ $settings['socmed_linkedin'] }}" target="_blank" rel="noopener" class="text-reset text-decoration-none opacity-75-hover" aria-label="Linkedin">
                        <svg aria-hidden="true" width="2em" height="2em" viewBox="0 0 640 640"><path fill="currentColor" d="M196.3 512L103.4 512L103.4 212.9L196.3 212.9L196.3 512zM149.8 172.1C120.1 172.1 96 147.5 96 117.8C96 103.5 101.7 89.9 111.8 79.8C121.9 69.7 135.6 64 149.8 64C164 64 177.7 69.7 187.8 79.8C197.9 89.9 203.6 103.6 203.6 117.8C203.6 147.5 179.5 172.1 149.8 172.1zM543.9 512L451.2 512L451.2 366.4C451.2 331.7 450.5 287.2 402.9 287.2C354.6 287.2 347.2 324.9 347.2 363.9L347.2 512L254.4 512L254.4 212.9L343.5 212.9L343.5 253.7L344.8 253.7C357.2 230.2 387.5 205.4 432.7 205.4C526.7 205.4 544 267.3 544 347.7L544 512L543.9 512z"></path></svg>
                    </a>
                    @endif
                </nav>
            </div>

            <div class="col col-12 col-md-6 col-lg-auto order-lg-3">
                <h5 class="fs-6 fw-bold text-uppercase mb-3">{{ __('footbar_heading_address') }}</h5>
                <address aria-label="Alamat" class="mb-0">
                    <a href="{{ $settings['contact_maps_link'] ?? '#' }}" target="_blank" class="text-reset hover-underline opacity-75-hover">{{ $settings['contact_address'] ?? '' }}</a>
                    <br><br>
                    <b>T</b>. <a href="tel:{{ str_replace(' ', '', $settings['contact_phone1'] ?? '') }}" class="text-reset hover-underline opacity-75-hover">{{ $settings['contact_phone1'] ?? '' }}</a>, <a href="tel:{{ str_replace(' ', '', $settings['contact_phone2'] ?? '') }}" class="text-reset hover-underline opacity-75-hover">{{ $settings['contact_phone2'] ?? '' }}</a>
                    <br>
                    <b>F</b>. <a href="fax:{{ str_replace(' ', '', $settings['contact_fax'] ?? '') }}" class="text-reset hover-underline opacity-75-hover">{{ $settings['contact_fax'] ?? '' }}</a>
                    <br>
                    <b>E</b>. <a href="mailto:{{ $settings['contact_email'] ?? '' }}" class="text-reset hover-underline opacity-75-hover">{{ $settings['contact_email'] ?? '' }}</a>
                </address>
            </div>

            <div class="col col-12 col-md-6 col-lg-auto order-lg-2">
                <h5 class="fs-6 fw-bold text-uppercase mb-3">{{ __('footbar_heading_product') }}</h5>
                <ul class="list-unstyled mb-0 d-flex flex-wrap row-gap-2 column-gap-3 d-lg-grid column-gap-lg-5" style="grid-template-columns: repeat(2, 1fr);">
                    @php
                        $footer_brands_list = ['supresso', 'balicafe', 'ucafe', 'rasa-sayang', 'tugu-buaya', 'uang-emas', 'brochoco', 'jaheku', 'intirasa', 'haoCafe'];
                    @endphp
                    @foreach($footer_brands_list as $fb)
                    @php
                        $brand_name = ucwords(str_replace('-', ' ', $fb));
                        if($fb == 'ucafe') $brand_name = 'UCAFÉ';
                        if($fb == 'balicafe') $brand_name = 'BaliCafé';
                        if($fb == 'brochoco') $brand_name = 'BROCHOCO';
                        if($fb == 'intirasa') $brand_name = 'intiRasa';
                    @endphp
                    <li>
                        <a href="{{ $fb == 'supresso' ? route('product.supresso', $fb) : route('product.indraco', $fb) }}" class="text-reset hover-underline opacity-75-hover">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="1em" height="1em"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg>
                            {{ $brand_name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="container small">
        <div class="d-flex flex-wrap column-gap-5 justify-content-between">
            <ul class="list-unstyled d-flex flex-wrap gap-2 text-capitalize">
                <li><a href="{{ route('privacy') }}" class="text-reset hover-underline opacity-75-hover">{{ __('footbar_policy') }}</a></li>
                <li class="vr"></li>
                <li><a href="{{ route('terms') }}" class="text-reset hover-underline opacity-75-hover">{{ __('footbar_terms') }}</a></li>
            </ul>
            <p class="text-muted text-capitalize">{{ __('footbar_developed_by') }} &copy; {{ date('Y') }} <b class="fw-bold">INDRACO</b>. {{ __('footbar_copyright') }}</p>
        </div>
    </div>
</footer>

