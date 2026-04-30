{{-- Equipment 3-level mega menu --}}
<div class="nav flex-column nav-pills" role="tablist">
    <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-product-equipment-coffee-machine" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine" aria-selected="true" data-i18n="naveq_1">{{ __('naveq_1') }}</button>
    <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-dispenser" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-dispenser" aria-selected="false" data-i18n="naveq_2">{{ __('naveq_2') }}</button>
    <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories" aria-selected="false" data-i18n="naveq_3">{{ __('naveq_3') }}</button>
    <a href="https://supresso.com/id/kraton" target="_blank" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" data-i18n="naveq_4">{{ __('naveq_4') }}</a>
</div>
<div class="vr"></div>
<div class="tab-content">

    {{-- Coffee Machines --}}
    <div class="tab-pane fade show active" id="tab-pane-product-equipment-coffee-machine" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-product-equipment-coffee-machine-full-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine-full-auto" aria-selected="true" data-i18n="naveq_5">{{ __('naveq_5') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-coffee-machine-semi-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine-semi-auto" aria-selected="false" data-i18n="naveq_6">{{ __('naveq_6') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-coffee-machine-brew" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine-brew" aria-selected="false" data-i18n="naveq_7">{{ __('naveq_7') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-coffee-machine-capsules" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine-capsules" aria-selected="false" data-i18n="naveq_8">{{ __('naveq_8') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-coffee-machine-grinder" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine-grinder" aria-selected="false" data-i18n="naveq_9">{{ __('naveq_9') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                @php
                    $coffee_subs = [
                        ['id' => 'full-auto', 'tk' => 'naveq_10', 'dk' => 'naveq_11', 'img' => 'eq-full-auto'],
                        ['id' => 'semi-auto', 'tk' => 'naveq_12', 'dk' => 'naveq_13', 'img' => 'eq-semi-auto'],
                        ['id' => 'brew', 'tk' => 'naveq_14', 'dk' => 'naveq_15', 'img' => 'eq-brew'],
                        ['id' => 'capsules', 'tk' => 'naveq_16', 'dk' => 'naveq_17', 'img' => 'eq-capsule'],
                        ['id' => 'grinder', 'tk' => 'naveq_18', 'dk' => 'naveq_19', 'img' => 'eq-grinder'],
                    ];
                @endphp
                @foreach($coffee_subs as $index => $sub)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab-pane-product-equipment-coffee-machine-{{ $sub['id'] }}" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="{{ $sub['tk'] }}">{{ __($sub['tk']) }}</h3>
                    <p class="mb-4" data-i18n="{{ $sub['dk'] }}">{{ __($sub['dk']) }}</p>
                    <div class="d-flex gap-3 w-100 tab-figure-image flex-grow-1 align-items-end">
                        @for($i=1;$i<=3;$i++)
                        <figure class="figure w-100 m-0">
                            <div class="figure-img ratio ratio-1x1 w-100 bg-secondary m-0">
                                <img src="{{ asset('images/submenu-'.$sub['img'].$i.'.jpg') }}" alt="" loading="lazy" class="object-fit-cover w-100 h-100" onerror="this.parentElement.style.display='none'">
                            </div>
                        </figure>
                        @endfor
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Beverage Dispensers --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-dispenser" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-product-equipment-dispenser-instant" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-dispenser-instant" aria-selected="true" data-i18n="naveq_20">{{ __('naveq_20') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-dispenser-cold" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-dispenser-cold" aria-selected="false" data-i18n="naveq_21">{{ __('naveq_21') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-product-equipment-dispenser-instant" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_22">{{ __('naveq_22') }}</h3>
                    <p class="mb-4" data-i18n="naveq_23">{{ __('naveq_23') }}</p>
                    <div class="d-flex gap-3 w-100 tab-figure-image flex-grow-1 align-items-end">
                        @for($i=1;$i<=3;$i++)
                        <figure class="figure w-100 m-0">
                            <div class="figure-img ratio ratio-1x1 w-100 bg-secondary m-0">
                                <img src="{{ asset('images/submenu-dispenser-instant'.$i.'.jpg') }}" alt="" loading="lazy" class="object-fit-cover w-100 h-100" onerror="this.parentElement.style.display='none'">
                            </div>
                        </figure>
                        @endfor
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-product-equipment-dispenser-cold" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_24">{{ __('naveq_24') }}</h3>
                    <p class="mb-4" data-i18n="naveq_25">{{ __('naveq_25') }}</p>
                    <div class="d-flex gap-3 w-100 tab-figure-image flex-grow-1 align-items-end">
                        @for($i=1;$i<=3;$i++)
                        <figure class="figure w-100 m-0">
                            <div class="figure-img ratio ratio-1x1 w-100 bg-secondary m-0">
                                <img src="{{ asset('images/submenu-dispenser-cold'.$i.'.jpg') }}" alt="" loading="lazy" class="object-fit-cover w-100 h-100" onerror="this.parentElement.style.display='none'">
                            </div>
                        </figure>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Accessories --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-accessories" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-product-equipment-accessories-frother" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories-frother" aria-selected="true" data-i18n="naveq_26">{{ __('naveq_26') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories-kettle" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories-kettle" aria-selected="false" data-i18n="naveq_27">{{ __('naveq_27') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories-french-press" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories-french-press" aria-selected="false" data-i18n="naveq_28">{{ __('naveq_28') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories-moka-pot" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories-moka-pot" aria-selected="false" data-i18n="naveq_29">{{ __('naveq_29') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories-glass" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories-glass" aria-selected="false" data-i18n="naveq_30">{{ __('naveq_30') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                @php
                    $acc_subs = [
                        ['id' => 'frother', 'tk' => 'naveq_31', 'dk' => 'naveq_32', 'img' => 'eq-accessories-frother'],
                        ['id' => 'kettle', 'tk' => 'naveq_33', 'dk' => 'naveq_34', 'img' => 'eq-accessories-kettle'],
                        ['id' => 'french-press', 'tk' => 'naveq_35', 'dk' => 'naveq_36', 'img' => 'eq-accessories-french-press'],
                        ['id' => 'moka-pot', 'tk' => 'naveq_37', 'dk' => 'naveq_38', 'img' => 'eq-accessories-moka-pot'],
                        ['id' => 'glass', 'tk' => 'naveq_39', 'dk' => 'naveq_40', 'img' => 'eq-accessories-glass'],
                    ];
                @endphp
                @foreach($acc_subs as $index => $sub)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab-pane-product-equipment-accessories-{{ $sub['id'] }}" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="{{ $sub['tk'] }}">{{ __($sub['tk']) }}</h3>
                    <p class="mb-4" data-i18n="{{ $sub['dk'] }}">{{ __($sub['dk']) }}</p>
                    <div class="d-flex gap-3 w-100 tab-figure-image flex-grow-1 align-items-end">
                        @for($i=1;$i<=3;$i++)
                        <figure class="figure w-100 m-0">
                            <div class="figure-img ratio ratio-1x1 w-100 bg-secondary m-0">
                                <img src="{{ asset('images/submenu-'.$sub['img'].$i.'.jpg') }}" alt="" loading="lazy" class="object-fit-cover w-100 h-100" onerror="this.parentElement.style.display='none'">
                            </div>
                        </figure>
                        @endfor
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
