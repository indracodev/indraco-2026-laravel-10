@extends('layouts.app')

@section('title', __('Berita & Acara') . ' – INDRACO')

@section('content')
<main id="konten">
    <h1 class="visually-hidden">{{ __('news_h1') ?? 'halaman berita & acara' }}</h1>
    <div class="container pb-5">
        <div class="row row-gap-5 py-lg-5 justify-content-lg-between">
            <div class="col col-12 col-lg-8 col-xl-7">
                @php 
                    $current = $news->first(); 
                @endphp
                @if($current)
                <div class="sticky-top">
                    <div id="news-content">
                        <h2 class="fs-1 fw-bold text-capitalize mb-0 text-start">
                            {{ $current->translated_title }}
                        </h2>
                        <p class="small mb-4">
                            {{ $current->translated_date }}
                        </p>
                        <div class="news-body">
                            {!! $current->translated_content !!}
                        </div>
                        <hr>
                        <div class="ratio ratio-1x1 w-100 h-auto bg-light-subtle">
                            <img src="{{ asset($current->image_path) }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                        </div>
                    </div>
                </div>
                @else
                <p>{{ __('Belum ada berita.') }}</p>
                @endif
            </div>

            <div class="col col-12 col-lg-4">
                <div id="menu-news" class="order-lg-2">
                    <h3 class="text-uppercase fs-5 fw-bold" data-i18n="news_btn_calendar">{{ __('kalender acara') }}</h3>
                    <hr class="opacity-100 border-2">
                    <ul class="list-unstyled mb-0">
                        @foreach($news as $item)
                        <li>
                            <a href="{{ route('news.show', $item->slug) }}" class="text-reset text-decoration-none opacity-75-hover text-start {{ isset($current) && $current->id == $item->id ? 'fw-bold' : '' }}">
                                <h3 class="fs-5 text-capitalize text-2-line">
                                    {{ $item->translated_title }}
                                </h3>
                                <p class="small">
                                    {{ $item->translated_date }}
                                </p>
                            </a>
                        </li>
                        <li><hr></li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
