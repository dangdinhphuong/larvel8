@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
            <div class="Breadcrumb__banner-image">
                <img
                    src="{{ \App\Helpers\ConfigHelpers::get('blog.banner') }}"
                    alt="{{ \App\Helpers\ConfigHelpers::get('blog.banner') }}"
                />
            </div>
            <div class="Breadcrumb__banner-desc">
                <div class="Breadcrumb__banner-label">{{ __('client.page.news.title') }}</div>
                <div class="Breadcrumb__banner-link">
                    <a href="/">{{ __('client.page.homepage.title') }}</a>
                    <span> > </span>
                    <a href="" class="active">{{ __('client.page.news.title') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="NewsDetailPage">
        <div class="container">
            <div class="NewsDetailPage__label">
                <div class="label__text">
                    {{ $blog->name }}
                </div>
                <div class="label__hr"></div>
                <div class="label__time"><span></span>{{ $blog->created_at->format('d-m-Y') }}</div>
            </div>

            <div class="row NewsDetailPage__body row">
                <div class="col-12 NewsDetailPage__body-box">
                    {!! $blog->content !!}
                </div>
            </div>

            <div class="NewsDetailPage__related">
                <div class="related__label">
                    <div class="related__label-text">
                        {{ __('client.page.detail-news.related_posts') }}
                    </div>
                    <div class="related__label-hr"></div>
                </div>

                <div class="related__list row">
                    @foreach($related_posts as $related_post)
                        <div class="related__list-item col-12 col-md-6">
                            <div class="item__image">
                                <a href="">
                                    <div class="image">
                                        <img
                                            src="{{ $related_post->thumbnail }}"
                                            alt="{{ $related_post->thumbnail }}"
                                        />
                                    </div>
                                </a>
                            </div>
                            <div class="item__info">
                                <div class="item__info-time">{{ $related_post->created_at->format('d-m-Y') }}</div>
                                <div class="item__info-label">
                                    <a href="{{ $related_post->slug }}">
                                        {{ $related_post->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
