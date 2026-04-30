<header class="fixed-top">
    <!-- navigasi utama -->
    <nav aria-label="navigasi utama" class="navbar bg-light-subtle">
       <div class="container-xxl flex-column row-gap-lg-3">
          <div class="navbar-atas w-100 d-grid d-lg-flex align-items-center column-gap-4 column-gap-lg-5" style="grid-template-columns: 1fr auto 1fr;">
             <!-- toggler navigasi mobile -->
             <div class="d-lg-none">
                <button class="navbar-toggler rounded-0 p-0 border-0 shadow-none" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-label="Toggle navigasi">
                   <span class="navbar-toggler-icon"></span>
                </button>
             </div>
             <a href="{{ route('home') }}" class="navbar-brand m-0 d-flex">
                 <img src="{{ asset($settings['logo_light'] ?? 'images/logo-indraco-est-2.png') }}" data-light="{{ asset($settings['logo_light'] ?? 'images/logo-indraco-est-2.png') }}" data-dark="{{ asset($settings['logo_dark'] ?? 'images/logo-indraco-est-2-invert.png') }}" alt="Logo INDRACO" class="theme-image w-100 h-auto">
                 <span class="visually-hidden">INDRACO</span>
              </a>
             <div class="d-lg-none">
                <button type="button" class="theme-toggle d-flex float-end" aria-label="Ganti tema gelap atau terang">
                   <svg aria-hidden="true" class="theme-icon" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none">
                      <g class="icon-sun">
                         <circle cx="12" cy="12" r="5" fill="currentColor"></circle>
                         <g stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="4"></line>
                            <line x1="12" y1="20" x2="12" y2="23"></line>
                            <line x1="1" y1="12" x2="4" y2="12"></line>
                            <line x1="20" y1="12" x2="23" y2="12"></line>
                            <line x1="4.2" y1="4.2" x2="6.3" y2="6.3"></line>
                            <line x1="17.7" y1="17.7" x2="19.8" y2="19.8"></line>
                            <line x1="4.2" y1="19.8" x2="6.3" y2="17.7"></line>
                            <line x1="17.7" y1="6.3" x2="19.8" y2="4.2"></line>
                         </g>
                      </g>
                      <g class="icon-moon">
                         <path d="M21 12.8A9 9 0 1111.2 3 a7 7 0 109.8 9.8z" fill="currentColor"></path>
                      </g>
                   </svg>
                </button>
             </div>
             <ul class="list-unstyled mb-0 d-none d-lg-flex flex-wrap gap-3 ms-auto small align-items-center">
                <li><a href="https://indracostore.com/" target="_blank" class="text-reset text-decoration-none opacity-75-hover">INDRACO Store</a></li>
                <li class="vr"></li>
                <li><a href="{{ route('lang.switch', 'en') }}" class="text-reset text-decoration-none lang-toggler {{ app()->getLocale() == 'en' ? '' : 'opacity-50' }}">&#x1f1fa;&#x1f1f8; <span class="opacity-75-hover {{ app()->getLocale() == 'en' ? 'fw-bold' : '' }}">English</span></a></li>
                <li class="vr"></li>
                <li><a href="{{ route('lang.switch', 'id') }}" class="text-reset text-decoration-none lang-toggler {{ app()->getLocale() == 'id' ? '' : 'opacity-50' }}">&#x1F1EE;&#x1F1E9; <span class="opacity-75-hover {{ app()->getLocale() == 'id' ? 'fw-bold' : '' }}">Indonesia</span></a></li>
             </ul>
          </div>
          <div class="navbar-bawah w-100 d-none d-lg-flex align-items-lg-center column-gap-lg-5">
             <ul aria-label="navigasi desktop" class="list-unstyled mb-0 d-flex flex-wrap gap-3 flex-lg-grow-1">
                <li><a href="{{ route('about') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('about') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_about">{{ __('nav_about') }}</a></li>
                <li class="vr"></li>
                <li class="dropdown">
                    <a href="{{ route('products') }}" class="text-reset text-decoration-none opacity-75-hover dropdown-link {{ request()->routeIs('products*') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_product">{{ __('nav_product') }}</a>
                    <div class="dropdown-menu rounded-0 border-0 bg-light-subtle position-fixed start-0 end-0 py-4">
                        <div class="container-lg pb-3">
                            <h2 class="fw-bold fs-4" data-i18n="product_brands_title">{{ __('product_brands_title') }}</h2>
                            <hr class="opacity-75 border-2">
                            <div class="d-flex column-gap-4">
                                @php
                                $mainCatKeyMap = [
                                    'produk-konsumen'      => 'nav_produk_konsumen',
                                    'food-service'         => 'nav_food_service',
                                    'mesin-peralatan-khusus' => 'nav_mesin_peralatan_khusus',
                                ];
                                $labelKeyMap = [
                                    'service-kopi'    => 'coffee', 'service-krimer' => 'creamer',
                                    'service-teh'     => 'tea',    'service-jahe'   => 'ginger',
                                    'service-cokelat' => 'chocolate', 'service-gula' => 'sugar',
                                    'consumer-supresso'    => 'nav_supresso',
                                    'consumer-tugu-buaya'  => 'nav_tugu_buaya',
                                    'consumer-rasa-sayang' => 'nav_rasa_sayang',
                                    'consumer-jaheku'      => 'nav_jaheku',
                                    'consumer-brochoco'    => 'nav_brochoco',
                                    'consumer-intirasa'    => 'nav_intirasa',
                                    'consumer-hao-cafe'    => 'nav_hao_cafe',
                                    'consumer-ucafe'       => 'nav_ucafe',
                                    'consumer-balicafe'    => 'nav_balicafe',
                                    'consumer-uang-emas'   => 'nav_uang_emas',
                                ];
                                $descKeyMap = [
                                    'service-kopi'    => 'navdesc_coffee',
                                    'service-krimer'  => 'navdesc_creamer',
                                    'service-teh'     => 'navdesc_tea',
                                    'service-jahe'    => 'navdesc_ginger',
                                    'service-cokelat' => 'navdesc_chocolate',
                                    'service-gula'    => 'navdesc_sugar',
                                ];
                                @endphp
                                <div class="d-flex column-gap-4 w-100">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        @foreach($main_categories as $index => $cat)
                                            @php $lk = $labelKeyMap[$cat->slug] ?? ('nav_' . str_replace('-','_',$cat->slug)); @endphp
                                            <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover {{ $index === 0 ? 'active' : '' }}" id="tab-link-{{ $cat->slug }}" data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $cat->slug }}" role="tab" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" data-i18n="{{ $lk }}">{{ __($lk) }}</button>
                                        @endforeach
                                    </div>
                                    <div class="vr"></div>
                                    <div class="tab-content flex-grow-1">
                                        @foreach($main_categories as $index => $cat)
                                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab-pane-{{ $cat->slug }}" role="tabpanel">
                                            <div class="d-flex column-gap-4 w-100 h-100">
                                                @if($cat->slug === 'mesin-peralatan-khusus')
                                                    @include('partials.nav-equipment')
                                                @elseif(isset($sub_categories_map[$cat->id]))
                                                <div class="nav flex-column nav-pills" role="tablist">
                                                    @foreach($sub_categories_map[$cat->id] as $subIndex => $sub)
                                                        @php $lk = $labelKeyMap[$sub->slug] ?? ('nav_' . str_replace('-','_',$sub->slug)); @endphp
                                                        @if($cat->slug === 'produk-konsumen')
                                                            @php
                                                                $ms = str_replace('consumer-', '', $sub->slug);
                                                                $href = str_contains($sub->slug,'supresso') ? route('product.supresso',$ms) : route('product.indraco',$ms);
                                                            @endphp
                                                            <a href="{{ $href }}" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover {{ $subIndex === 0 ? 'active' : '' }}" id="tab-link-{{ $sub->slug }}" data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $sub->slug }}" data-i18n="{{ $lk }}">{{ __($lk) }}</a>
                                                        @else
                                                            <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover {{ $subIndex === 0 ? 'active' : '' }}" id="tab-link-{{ $sub->slug }}" data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $sub->slug }}" role="tab" aria-selected="{{ $subIndex === 0 ? 'true' : 'false' }}" data-i18n="{{ $lk }}">{{ __($lk) }}</button>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="vr"></div>
                                                <div class="tab-content flex-grow-1 d-flex flex-column">
                                                    @foreach($sub_categories_map[$cat->id] as $subIndex => $sub)
                                                    @php
                                                        $lk = $labelKeyMap[$sub->slug] ?? ('nav_' . str_replace('-','_',$sub->slug));
                                                        $ms = str_replace('consumer-', '', $sub->slug);
                                                        $dk = $descKeyMap[$sub->slug] ?? ('navdesc_' . str_replace('-','_',$ms));
                                                    @endphp
                                                    <div class="tab-pane fade flex-grow-1 {{ $subIndex === 0 ? 'show active' : '' }}" id="tab-pane-{{ $sub->slug }}" role="tabpanel" tabindex="0">
                                                        <div class="d-flex flex-column h-100 w-100">
                                                            @if($cat->slug === 'produk-konsumen')
                                                                @php
                                                                    $tk = ['brochoco'=>'chocolate','jaheku'=>'ginger','intirasa'=>'choconutmilk','hao-cafe'=>'creamer&sugar'][$ms] ?? 'coffee';
                                                                @endphp
                                                                <h3 class="mb-3"><span class="fw-bold" data-i18n="{{ $lk }}">{{ __($lk) }}</span> <span class="fw-thin"> | <span data-i18n="{{ $tk }}">{{ __($tk) }}</span></span></h3>
                                                                <p class="mb-4" data-i18n="{{ $dk }}">{{ __($dk) }}</p>
                                                                <div class="d-flex gap-3 w-100 align-items-end mt-auto">
                                                                    @for($i=1;$i<=3;$i++)
                                                                    <figure class="figure flex-grow-1 m-0">
                                                                        <div class="figure-img ratio ratio-1x1 bg-secondary m-0">
                                                                            <img src="{{ asset('images/submenu-'.$ms.$i.'.jpg') }}" alt="" loading="lazy" class="object-fit-cover w-100 h-100">
                                                                        </div>
                                                                    </figure>
                                                                    @endfor
                                                                </div>
                                                            @else
                                                                <h3 class="mb-3 fw-bold" data-i18n="{{ $lk }}">{{ __($lk) }}</h3>
                                                                <p class="mb-4" data-i18n="{{ $dk }}">{{ __($dk) }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="vr"></li>
                <li><a href="{{ route('businesses') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('businesses') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_business">{{ __('nav_business') }}</a></li>
                <li class="vr"></li>
                <li class="dropdown">
                  <a href="{{ route('stores') }}" class="text-reset text-decoration-none opacity-75-hover dropdown-link {{ request()->routeIs('stores') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_stores">{{ __('nav_stores') }}</a>
                  <div class="dropdown-menu rounded-0 border-0 bg-light-subtle position-fixed start-0 end-0 py-4">
                     <div class="container-lg pb-3">
                        <h2 class="fw-bold fs-4" data-i18n="nav_stores_official">{{ __('nav_stores_official') }}</h2>
                        <hr class="opacity-75 border-2">
                        <div class="d-flex column-gap-4">
                           <div class="nav flex-column nav-pills" role="tablist">
                              <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-store-ecommerce" data-bs-toggle="pill" data-bs-target="#tab-pane-store-ecommerce" aria-selected="true" data-i18n="nav_official">{{ __('nav_official') }}</button>
                              <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-marketplace" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace" aria-selected="false" data-i18n="nav_marketplace">{{ __('nav_marketplace') }}</button>
                           </div>
                           <div class="vr"></div>
                           <div class="tab-content">
                              <div class="tab-pane fade show active" id="tab-pane-store-ecommerce" role="tabpanel" tabindex="0">
                                 <div class="d-flex column-gap-4">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                       <button type="button" onclick="window.open('https://supresso.com/', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-store-ecommerce-supresso" data-bs-toggle="pill" data-bs-target="#tab-pane-store-ecommerce-supresso" aria-selected="true">supresso</button>
                                       <button type="button" onclick="window.open('https://indracostore.com/', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-ecommerce-indracostore" data-bs-toggle="pill" data-bs-target="#tab-pane-store-ecommerce-indracostore" aria-selected="false">INDRACO store</button>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="tab-content">
                                       <div class="tab-pane fade show active" id="tab-pane-store-ecommerce-supresso" role="tabpanel" tabindex="0">
                                          <img src="{{ asset('images/logo-supresso-typograph-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 17rem;">
                                       </div>
                                       <div class="tab-pane fade" id="tab-pane-store-ecommerce-indracostore" role="tabpanel" tabindex="0">
                                          <img src="{{ asset('images/logo-indracostore-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 17rem;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab-pane-store-marketplace" role="tabpanel" tabindex="0">
                                 <div class="d-flex column-gap-4">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                       <button type="button" onclick="window.open('https://www.indraco.com/mplink/redirect.php?linkclick=tokopedia', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-store-marketplace-tokopedia" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace-tokopedia" aria-selected="true">tokopedia</button>
                                       <button type="button" onclick="window.open('https://www.indraco.com/mplink/redirect.php?linkclick=shopee', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-marketplace-shopee" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace-shopee" aria-selected="false">shopee</button>
                                       <button type="button" onclick="window.open('https://www.indraco.com/mplink/redirect.php?linkclick=lazada', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-marketplace-lazada" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace-lazada" aria-selected="false">lazada</button>
                                       <button type="button" onclick="window.open('https://www.indraco.com/mplink/redirect.php?linkclick=blibli', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-marketplace-blibli" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace-blibli" aria-selected="false">blibli</button>
                                       <button type="button" onclick="window.open('https://www.tiktok.com/@indracostore', '_blank')" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-store-marketplace-tiktokshop" data-bs-toggle="pill" data-bs-target="#tab-pane-store-marketplace-tiktokshop" aria-selected="false">tikTok shop</button>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="tab-content">
                                       <div class="tab-pane fade show active" id="tab-pane-store-marketplace-tokopedia" role="tabpanel" tabindex="0">
                                          <p class="small text-muted">{{ __('nav_marketplace_desc') }}</p>
                                          <img src="{{ asset('images/logo-tokopedia-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 14rem;">
                                       </div>
                                       <div class="tab-pane fade" id="tab-pane-store-marketplace-shopee" role="tabpanel" tabindex="0">
                                          <p class="small text-muted">{{ __('nav_marketplace_desc') }}</p>
                                          <img src="{{ asset('images/logo-shopee-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 12rem;">
                                       </div>
                                       <div class="tab-pane fade" id="tab-pane-store-marketplace-lazada" role="tabpanel" tabindex="0">
                                          <p class="small text-muted">{{ __('nav_marketplace_desc') }}</p>
                                          <img src="{{ asset('images/logo-lazada-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 12rem;">
                                       </div>
                                       <div class="tab-pane fade" id="tab-pane-store-marketplace-blibli" role="tabpanel" tabindex="0">
                                          <p class="small text-muted">{{ __('nav_marketplace_desc') }}</p>
                                          <img src="{{ asset('images/logo-blibli-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 10rem;">
                                       </div>
                                       <div class="tab-pane fade" id="tab-pane-store-marketplace-tiktokshop" role="tabpanel" tabindex="0">
                                          <p class="small text-muted">{{ __('nav_marketplace_desc') }}</p>
                                          <img src="{{ asset('images/logo-tiktok-shop-flat.png') }}" alt="" loading="lazy" class="w-100 h-auto" style="max-width: 14rem;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </li>

               <li class="vr"></li>
               <li><a href="{{ route('news') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('news*') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_news">{{ __('nav_news') }}</a></li>
               <li class="vr"></li>
               <li><a href="{{ route('download') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('download') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_download">{{ __('nav_download') }}</a></li>
               <li class="vr"></li>
               <li><a href="{{ route('career') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('career') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_career">{{ __('nav_career') }}</a></li>
               <li class="vr"></li>
               <li><a href="{{ route('contact') }}" class="text-reset text-decoration-none opacity-75-hover {{ request()->routeIs('contact') ? 'fw-bold text-primary' : '' }}" data-i18n="nav_contact">{{ __('nav_contact') }}</a></li>
             </ul>
             <div class="d-flex column-gap-4">
                <button type="button" class="btn p-0 rounded-0 border-0" data-bs-toggle="modal" data-bs-target="#modal-search">
                   <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 640 640"><path fill="currentColor" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z" /></svg>
                </button>
                <button type="button" class="theme-toggle">
                   <svg aria-hidden="true" class="theme-icon" width="1.25em" height="1.25em" viewBox="0 0 24 24" fill="none">
                      <g class="icon-sun"><circle cx="12" cy="12" r="5" fill="currentColor"></circle></g>
                      <g class="icon-moon"><path d="M21 12.8A9 9 0 1111.2 3 a7 7 0 109.8 9.8z" fill="currentColor"></path></g>
                   </svg>
                </button>
             </div>
          </div>
       </div>
    </nav>
</header>
