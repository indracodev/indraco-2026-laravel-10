@extends('layouts.app')

@section('title', $item->translated_title . ' – INDRACO')

@section('content')
<main id="konten">
    <div class="container pb-5">
        <div class="row row-gap-5 py-lg-5 justify-content-lg-between">
            <div class="col col-12 col-lg-8 col-xl-7">
                <div class="sticky-top">
                    <div id="news-content">
                        <h2 class="fs-1 fw-bold text-capitalize mb-0 text-start">
                            {{ $item->translated_title }}
                        </h2>
                        <p class="small mb-4">
                            {{ $item->translated_date }}
                        </p>
                        <div class="news-body">
                            {!! $item->translated_content !!}
                        </div>
                        <hr>
                        <div class="ratio ratio-1x1 w-100 h-auto bg-light-subtle">
                            <img src="{{ asset($item->image_path) }}" alt="" loading="lazy" aria-hidden="true" class="object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-12 col-lg-4">
                <div id="menu-news">
                    <h3 class="text-uppercase fs-5 fw-bold" data-i18n="news_btn_calendar">{{ __('news_btn_calendar') }}</h3>
                    <hr class="opacity-100 border-2">
                    <ul class="list-unstyled mb-0">
                        @foreach($news as $other)
                        <li>
                            <a href="{{ route('news.show', ['slug' => $other->slug, 'page' => request()->get('page')]) }}" class="text-reset text-decoration-none opacity-75-hover text-start">
                                <h3 class="fs-5 text-capitalize text-2-line {{ $item->id == $other->id ? 'fw-bold text-primary' : '' }}">
                                    {{ $other->translated_title }}
                                </h3>
                                <p class="small">
                                    {{ $other->translated_date }}
                                </p>
                            </a>
                        </li>
                        <li><hr></li>
                        @endforeach
                    </ul>
                    <div class="mt-4 custom-pagination">
                        {{ $news->links() }}
                    </div>
                    <a href="{{ route('news') }}" class="btn btn-outline-secondary w-100 mt-3" data-i18n="news_back">{{ __('news_back') }}</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
