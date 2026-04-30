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
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-full-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-full-auto" aria-selected="true" data-i18n="naveq_5">{{ __('naveq_5') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-semi-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-semi-auto" aria-selected="false" data-i18n="naveq_6">{{ __('naveq_6') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-brew" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-brew" aria-selected="false" data-i18n="naveq_7">{{ __('naveq_7') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-capsule" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-capsule" aria-selected="false" data-i18n="naveq_8">{{ __('naveq_8') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-grinder" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-grinder" aria-selected="false" data-i18n="naveq_9">{{ __('naveq_9') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-full-auto" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_10">{{ __('naveq_10') }}</h3>
                    <p class="mb-4" data-i18n="naveq_11">{{ __('naveq_11') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-semi-auto" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_12">{{ __('naveq_12') }}</h3>
                    <p class="mb-4" data-i18n="naveq_13">{{ __('naveq_13') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-brew" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_14">{{ __('naveq_14') }}</h3>
                    <p class="mb-4" data-i18n="naveq_15">{{ __('naveq_15') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-capsule" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_16">{{ __('naveq_16') }}</h3>
                    <p class="mb-4" data-i18n="naveq_17">{{ __('naveq_17') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-grinder" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_18">{{ __('naveq_18') }}</h3>
                    <p class="mb-4" data-i18n="naveq_19">{{ __('naveq_19') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Beverage Dispensers --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-dispenser" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-instant" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-instant" aria-selected="true" data-i18n="naveq_20">{{ __('naveq_20') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-cold" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-cold" aria-selected="false" data-i18n="naveq_21">{{ __('naveq_21') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-instant" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_22">{{ __('naveq_22') }}</h3>
                    <p class="mb-4" data-i18n="naveq_23">{{ __('naveq_23') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-cold" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_24">{{ __('naveq_24') }}</h3>
                    <p class="mb-4" data-i18n="naveq_25">{{ __('naveq_25') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Accessories --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-accessories" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-frother" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-frother" aria-selected="true" data-i18n="naveq_26">{{ __('naveq_26') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-kettle" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-kettle" aria-selected="false" data-i18n="naveq_27">{{ __('naveq_27') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-french" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-french" aria-selected="false" data-i18n="naveq_28">{{ __('naveq_28') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-moka" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-moka" aria-selected="false" data-i18n="naveq_29">{{ __('naveq_29') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-glass" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-glass" aria-selected="false" data-i18n="naveq_30">{{ __('naveq_30') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-frother" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_31">{{ __('naveq_31') }}</h3>
                    <p class="mb-4" data-i18n="naveq_32">{{ __('naveq_32') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-kettle" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_33">{{ __('naveq_33') }}</h3>
                    <p class="mb-4" data-i18n="naveq_34">{{ __('naveq_34') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-french" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_35">{{ __('naveq_35') }}</h3>
                    <p class="mb-4" data-i18n="naveq_36">{{ __('naveq_36') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-moka" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_37">{{ __('naveq_37') }}</h3>
                    <p class="mb-4" data-i18n="naveq_38">{{ __('naveq_38') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-glass" role="tabpanel" tabindex="0">
                    <h3 class="mb-3 fw-bold" data-i18n="naveq_39">{{ __('naveq_39') }}</h3>
                    <p class="mb-4" data-i18n="naveq_40">{{ __('naveq_40') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
