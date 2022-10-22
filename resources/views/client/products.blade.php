@extends('client.layout.master')
@section('content')
<section class="Breadcrumb container">
    <div class="Breadcrumb__banner">
        <div class="Breadcrumb__banner-image">
            <img  src="{{ asset('html-finafa/images/banner/products.jpg') }}" alt="{{ \App\Helpers\ConfigHelpers::get('products.banner') }}" />
        </div>
        <div class="Breadcrumb__banner-desc">
            <div class="Breadcrumb__banner-label">{{ __('client.page.products.title') }}</div>
            <div class="Breadcrumb__banner-link">
                <a href="/">{{ __('client.page.homepage.title') }}</a>
                <span> > </span>
                <a href="" class="active">{{ __('client.page.products.title') }}</a>
            </div>
        </div>
    </div>
</section>
<section class="ProductsPage">
    <div class="container">
        <div class="ProductsPage__label">
            <div class="label__text">{{ __('client.page.products.title') }}</div>
            <div class="label__hr"></div>
        </div>
        <div class="row">
            <div class="ProductsPage__option col-12 col-md-4">
                <div class="ProductsPage__option-box">
                    <div class="box__label" >{{ __('client.page.products.categories') }}</div>
                    <div class="box__body">
                        <ul>
                            @foreach($product_categories as $category)
                            <li class="box__body-item">
                                <a href="{{ route('client.product-category', $category->slug) }}"> {{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ProductsPage__list col-12 col-md-8">
                <div class="row">
                    @foreach($products as $product)
                    <div class="ProductsPage__list-item col-xs-6 col-sm-4">
                        <div class="item__image">
                            <img src="{{ $product->thumbnail }}" alt="" />
                        </div>
                        <div class="item__title">
                            <a href="{{ route('client.product', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </div>
                        <div class="item__desc">
                            {{ $product->short_description ?? "" }}
                        </div>
                        <div class="item__btn">
                            <a class="item__btn-link" href="{{ route('client.contact-us') }}">
                                {{ __('client.page.products.advice') }}
                            </a>
                            <a class="item__btn-link" href="{{ route('client.product', $product->slug) }}">
                                {{ __('client.page.products.detail') }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="ProductsPage__bottom row">
                    {!! $products->links('client.layout.paginate') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection