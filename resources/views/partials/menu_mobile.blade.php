<aside id="menu" class="offcanvas offcanvas-start" tabindex="-1" aria-labelledby="menu-title">
   <div class="p-3 pb-0">
      <h5 id="menu-title" class="visually-hidden">Menu Navigasi</h5>
      <button class="btn-close rounded-0 border-0 shadow-none float-end" type="button" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
   </div>
   <div class="p-3 pt-0 flex-grow-1 overflow-y-auto">
      <!-- navigasi mobile -->
      <nav aria-label="navigasi mobile">
         <ul class="nav d-block">
            <li class="nav-item">
               <a href="{{ route('about') }}" class="nav-link text-reset opacity-75-hover px-0">{{ __('nav_about') }}</a>
            </li>
            <li class="nav-item collapse-item">
               <a data-bs-toggle="collapse" href="#collapse-prduk" class="nav-link collapse-toggler text-reset opacity-75-hover px-0 collapsed">{{ __('nav_product') }}</a>
               <div class="collapse" id="collapse-prduk">
                  <ul class="nav d-block ps-4">
                     <li class="nav-item collapse-item">
                        <a data-bs-toggle="collapse" href="#collapse-produk-konsummen" class="nav-link collapse-toggler text-reset opacity-75-hover px-0 collapsed">Produk Konsumen</a>
                        <div class="collapse" id="collapse-produk-konsummen">
                           <ul id="brand" class="nav d-block ps-4">
                              @php
                                 $consumer_cat = $main_categories->where('slug', 'produk-konsumen')->first();
                              @endphp
                              @if($consumer_cat && isset($sub_categories_map[$consumer_cat->id]))
                                 @foreach($sub_categories_map[$consumer_cat->id] as $sub)
                                    <li class="nav-item">
                                       @php
                                          $brand_slug = str_replace('consumer-', '', $sub->slug);
                                          $brand_route = (str_contains($sub->slug, 'supresso')) ? 'product.supresso' : 'product.indraco';
                                       @endphp
                                       <a href="{{ route($brand_route, $brand_slug) }}" class="nav-link text-reset opacity-75-hover px-0">{{ $sub->name }}</a>
                                    </li>
                                 @endforeach
                              @endif
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('foodservice') }}" class="nav-link text-reset opacity-75-hover px-0">Food Service</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('equipment') }}" class="nav-link text-reset opacity-75-hover px-0">Mesin & Peralatan</a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="nav-item">
               <a href="{{ route('businesses') }}" class="nav-link text-reset opacity-75-hover px-0">{{ __('nav_business') }}</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('stores') }}" class="nav-link text-reset opacity-75-hover px-0">{{ __('nav_stores') }}</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('news') }}" class="nav-link text-reset opacity-75-hover px-0">{{ __('nav_news') }}</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('download') }}" class="nav-link text-reset opacity-75-hover px-0">Unduhan</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('career') }}" class="nav-link text-reset opacity-75-hover px-0">Karir</a>
            </li>
            <li class="nav-item">
               <a href="{{ route('contact') }}" class="nav-link text-reset opacity-75-hover px-0">{{ __('nav_contact') }}</a>
            </li>
         </ul>
      </nav>
   </div>
   <div class="px-3"><hr class="m-0"></div>
   <div class="p-3">
      <ul class="nav flex-column text-capitalize">
         <li class="nav-item">
            <a href="https://indracostore.com/" target="_blank" class="nav-link text-reset opacity-75-hover px-0">INDRACO Store</a>
         </li>
         <li class="nav-item">
            <a href="{{ route('lang.switch', 'en') }}" class="nav-link text-reset opacity-75-hover px-0 {{ app()->getLocale() == 'en' ? 'fw-bold' : '' }}">&#x1f1fa;&#x1f1f8; English</a>
         </li>
         <li class="nav-item">
            <a href="{{ route('lang.switch', 'id') }}" class="nav-link text-reset opacity-75-hover px-0 {{ app()->getLocale() == 'id' ? 'fw-bold' : '' }}">&#x1F1EE;&#x1F1E9; Indonesia</a>
         </li>
      </ul>
   </div>
</aside>
