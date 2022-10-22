@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
            <div class="Breadcrumb__banner-image">
                <img
                    src="{{ \App\Helpers\ConfigHelpers::get('recruit.banner') }}"
                    alt="{{ \App\Helpers\ConfigHelpers::get('recruit.banner') }}"
                />
            </div>
            <div class="Breadcrumb__banner-desc">
                <div class="Breadcrumb__banner-label">{{ __('client.page.recruit.title') }}</div>
                <div class="Breadcrumb__banner-link">
                    <a href="/">{{ __('client.page.homepage.title') }}</a>
                    <span> > </span>
                    <a href="" class="active">{{ __('client.page.recruit.title') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="RecruitmentPage">
        <div class="container">
            <div class="RecruitmentPage__label">
                <div class="label__text">{{ __('client.page.recruit.title') }}</div>
                <div class="label__hr"></div>
            </div>
            <div class="row">
                <div class="RecruitmentPage__option col-12 col-lg-4">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="RecruitmentPage__option-item col-12 col-sm-6 col-md-4 col-lg-12">
                                <div class="item__box">
                                    <div class="item__label">
                                        <a href="{{ route('client.recruit', ['job' => $post->slug]) }}"> {{ $post->name }} </a>
                                    </div>
                                    <div class="item__btn">
                                        <a href="{{ route('client.recruit', ['job' => $post->slug]) }}" class="item__btn-readmore">
                                            {{ __('client.page.recruit.read_more') }}
                                        </a>
                                        <a href="/" class="item__btn-apply">
                                            {{ __('client.page.recruit.apply_now') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(is_null($current_post))
                    @php
                        $current_post = $posts->first();
                    @endphp
                @endif
                <div class="RecruitmentPage__body col-12 col-lg-8">
                    <div class="body__box">
                        @if(!is_null($current_post))
                            <div class="box__header">{{ __('client.page.recruit.job_description') }}</div>
                            <div class="box__text">
                                {!! $current_post->content !!}
                            </div>
                            <div class="box__btn">
                                <a href="/">{{ __('client.page.recruit.apply_now') }} </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
