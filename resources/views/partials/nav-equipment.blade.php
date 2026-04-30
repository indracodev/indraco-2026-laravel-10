{{-- Equipment 3-level mega menu --}}
<div class="nav flex-column nav-pills" role="tablist">
    <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover active" id="tab-link-product-equipment-coffee-machine" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-coffee-machine" aria-selected="true">{{ __('naveq_1') }}</button>
    <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-dispenser" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-dispenser" aria-selected="false">{{ __('naveq_2') }}</button>
    <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-product-equipment-accessories" data-bs-toggle="pill" data-bs-target="#tab-pane-product-equipment-accessories" aria-selected="false">{{ __('naveq_3') }}</button>
    <a href="https://supresso.com/id/kraton" target="_blank" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover">{{ __('naveq_4') }}</a>
</div>
<div class="vr"></div>
<div class="tab-content">

    {{-- Coffee Machines --}}
    <div class="tab-pane fade show active" id="tab-pane-product-equipment-coffee-machine" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-full-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-full-auto" aria-selected="true">{{ __('naveq_5') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-semi-auto" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-semi-auto" aria-selected="false">{{ __('naveq_6') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-brew" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-brew" aria-selected="false">{{ __('naveq_7') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-capsule" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-capsule" aria-selected="false">{{ __('naveq_8') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-grinder" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-grinder" aria-selected="false">{{ __('naveq_9') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-full-auto" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_10') }}</h3>
                    <p class="mb-4">{{ __('naveq_11') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-semi-auto" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_12') }}</h3>
                    <p class="mb-4">{{ __('naveq_13') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-brew" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_14') }}</h3>
                    <p class="mb-4">{{ __('naveq_15') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-capsule" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_16') }}</h3>
                    <p class="mb-4">{{ __('naveq_17') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-grinder" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_18') }}</h3>
                    <p class="mb-4">{{ __('naveq_19') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Beverage Dispensers --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-dispenser" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-instant" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-instant" aria-selected="true">{{ __('naveq_20') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-cold" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-cold" aria-selected="false">{{ __('naveq_21') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-instant" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_22') }}</h3>
                    <p class="mb-4">{{ __('naveq_23') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-cold" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_24') }}</h3>
                    <p class="mb-4">{{ __('naveq_25') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Accessories --}}
    <div class="tab-pane fade" id="tab-pane-product-equipment-accessories" role="tabpanel" tabindex="0">
        <div class="d-flex column-gap-4">
            <div class="nav flex-column nav-pills" role="tablist">
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover active" id="tab-link-eq-frother" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-frother" aria-selected="true">{{ __('naveq_26') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-kettle" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-kettle" aria-selected="false">{{ __('naveq_27') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-french" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-french" aria-selected="false">{{ __('naveq_28') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-moka" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-moka" aria-selected="false">{{ __('naveq_29') }}</button>
                <button type="button" class="nav-link text-reset text-start px-0 text-capitalize bg-transparent rounded-0 opacity-75-hover" id="tab-link-eq-glass" data-bs-toggle="pill" data-bs-target="#tab-pane-eq-glass" aria-selected="false">{{ __('naveq_30') }}</button>
            </div>
            <div class="vr"></div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-eq-frother" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_31') }}</h3>
                    <p class="mb-4">{{ __('naveq_32') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-kettle" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_33') }}</h3>
                    <p class="mb-4">{{ __('naveq_34') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-french" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_35') }}</h3>
                    <p class="mb-4">{{ __('naveq_36') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-moka" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_37') }}</h3>
                    <p class="mb-4">{{ __('naveq_38') }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-eq-glass" role="tabpanel" tabindex="0">
                    <h3 class="text-capitalize mb-3 fw-bold">{{ __('naveq_39') }}</h3>
                    <p class="mb-4">{{ __('naveq_40') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
