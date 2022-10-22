@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
            <div class="Breadcrumb__banner-image text-center" >
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
    <section class="NewsPage">
        <div class="container">
            <div class="NewsPage__label">
                <div class="label__text">{{ __('client.page.news.title') }}</div>
                <div class="label__hr"></div>
            </div>

            <div class="NewsPage__body row">
                @foreach($blogs as $blog)
                    <div class="NewsPage__body-item col-sx-12 col-sm-6 col-md-4">
                        <div class="item__box">
                            <div class="item__image">
                                <a href="{{ route('client.blog', $blog->slug) }}">
                                    <div class="image">
                                        <img
                                            src="{{ $blog->thumbnail }}"
                                            alt=""
                                        />
                                    </div>
                                </a>
                            </div>
                            <div class="item__info">
                                <div class="item__info-time">
                                    <span>{{ $blog->created_at->format('d-m-Y') }}</span>
                                </div>
                                <div class="item__info-label">
                                    <a href="{{ route('client.blog', $blog->slug) }}">
                                        {{ $blog->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="NewsPage__bottom">
                {!! $blogs->links('client.layout.paginate') !!}
            </div>
        </div>
    </section>
@endsection
