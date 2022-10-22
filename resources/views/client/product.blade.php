@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
        <div class="Breadcrumb__banner-image">
            <img  src="{{ asset('html-finafa/images/banner/products.jpg') }}" alt="{{ \App\Helpers\ConfigHelpers::get('products.banner') }}" />
        </div>
            <div class="Breadcrumb__banner-desc">
                <div class="Breadcrumb__banner-label">{{ __('client.page.product.title') }}</div>
                <div class="Breadcrumb__banner-link">
                    <a href="/">{{ __('client.page.homepage.title') }}</a>
                    <span> > </span>
                    <a href="" class="active">{{ __('client.page.product.title') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="ProductsDetailPage">
        <img
            src="{{ asset('html-finafa/images/bg_chitiet.jpg') }}"
            class="ProductsDetailPage__bg"
            alt=""
        />
        <div class="container">
            <div class="row">
                <div class="ProductsDetailPage__body col-12 col-md-8">
                    <div class="ProductsDetailPage__label">
                        <div class="label__text">{{ __('client.page.product.product_detail') }}</div>
                        <div class="label__hr"></div>
                        <div class="label__time">
                            <span></span>{{ $product->created_at->format('d-m-Y') }}
                        </div>

                        <div class="body__box">
                            {!! $product->content !!}
                        </div>
                        <div class="body__bottom">
                            <a href="{{ route('client.contact-us') }}" class="body__bottom-contact">
                                {{ __('client.page.product.advice') }}
                            </a>
                            <a href="{{ route('client.products') }}" class="body__bottom-back">
                                {{ __('client.page.product.back') }}
                            </a>
                        </div>
                    </div>

                </div>
                <div class="ProductsDetailPage__option col-12 col-md-4">
                    <div class="ProductsDetailPage__option-image">
                        <img src="{{ $product->thumbnail }}" alt="">
                    </div>



                    <div class="ProductsDetailPage__option-recent">
                        <div class="recent__label">
                            <div class="recent__label-text">{{ __('client.page.product.product_list') }}</div>
                            <div class="recent__label-hr"></div>

                        </div>

                        <div class="recent__list ">
                            @foreach($related_posts as $related_post)
                                <div class="recent__list-item">
                                    <div class="item__image">
                                        <a href="{{ $related_post->slug }}">
                                            <div class="image">
                                                <img src="{{ $related_post->thumbnail }}" alt="{{ $related_post->thumbnail }}">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info-time">
                                            {{ $related_post->created_at }}
                                        </div>
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
            </div>
        </div>
    </section>
@endsection
