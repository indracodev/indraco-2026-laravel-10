@extends('layouts.app')

@section('title', __('fs_page_title'))

@section('content')
<main id="konten">
    <h1 class="visually-hidden" data-i18n="fs_heading">{{ __('fs_heading') }}</h1>
    <div class="container">
        @php
            $services = [
                ['key' => 'coffee', 'title_key' => 'fs_coffee_title', 'desc_key' => 'navdesc_coffee'],
                ['key' => 'creamer', 'title_key' => 'fs_creamer_title', 'desc_key' => 'navdesc_creamer'],
                ['key' => 'tea', 'title_key' => 'fs_tea_title', 'desc_key' => 'navdesc_tea'],
                ['key' => 'ginger', 'title_key' => 'fs_ginger_title', 'desc_key' => 'navdesc_ginger'],
                ['key' => 'chocolate', 'title_key' => 'fs_chocolate_title', 'desc_key' => 'navdesc_chocolate'],
                ['key' => 'sugar', 'title_key' => 'fs_sugar_title', 'desc_key' => 'navdesc_sugar'],
            ];
        @endphp

        @foreach($services as $index => $service)
        <section class="py-5">
            <div class="py-lg-5">
                <h2 class="display-4 fw-thin text-capitalize"><b class="fw-bold" data-i18n="{{ $service['title_key'] }}">{{ __($service['title_key']) }}</b></h2>
                <p class="lead mb-5" data-i18n="{{ $service['desc_key'] }}">{{ __($service['desc_key']) }}</p>
            </div>
        </section>
        @if(!$loop->last)
        <hr class="m-0">
        @endif
        @endforeach
    </div>
</main>
@endsection
