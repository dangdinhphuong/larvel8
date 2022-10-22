@extends('client.layout.master')
@section('content')
<section class="Breadcrumb container">
    <div class="Breadcrumb__banner">
        <div class="Breadcrumb__banner-image">
            <img src="{{ \App\Helpers\ConfigHelpers::get('about_us.banner') }}" alt="{{ \App\Helpers\ConfigHelpers::get('about_us.banner') }}" />
        </div>
        <div class="Breadcrumb__banner-desc">
            <div class="Breadcrumb__banner-label">{{ __('client.page.about_us.title') }}</div>
            <div class="Breadcrumb__banner-link">
                <a href="/">{{ __('client.page.homepage.title') }}</a>
                <span> > </span>
                <a href="" class="active">
                    {{ __('client.page.about_us.title') }}
                </a>
            </div>
        </div>
</section>
<section class="IntroducePage">
    <div class="IntroducePage__general">
        <div class="row">
            <div class="IntroducePage__general-title col-12 col-md-6">
                <div class="IntroducePage__label">
                    <div class="label__text">
                        {{ __('client.page.about_us.title') }}
                    </div>
                    <div class="label__hr"></div>
                </div>
                <div class="IntroducePage__general-title-desc">
                    {!! \App\Helpers\ConfigHelpers::get('about_us_main') !!}
                </div>
            </div>
            <div class="IntroducePage__general-image col-12 col-md-6">
                <img src="{{ \App\Helpers\ConfigHelpers::get('about_us_main_image') }}" alt="{{ \App\Helpers\ConfigHelpers::get('about_us_main_image') }}" />
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="IntroducePage__mission col-12 col-md-6">
            <div class="IntroducePage__label">
                <div class="label__text">
                    {{ __('client.page.about_us.vision') }}
                </div>
                <div class="label__hr"></div>
            </div>

            <div class="IntroducePage__mission-desc">
                {!! \App\Helpers\ConfigHelpers::get('about_us_vision') !!}
            </div>
            <div class="IntroducePage__mission-img">
                <img src="{{ \App\Helpers\ConfigHelpers::get('about_us_vision_image') }}" alt="{{ \App\Helpers\ConfigHelpers::get('about_us_vision_image') }}" />
            </div>
        </div>
        <div class="IntroducePage__mission col-12 col-md-6">
            <div class="IntroducePage__label">
                <div class="label__text">
                    {{ __('client.page.about_us.mission') }}
                </div>
                <div class="label__hr"></div>
            </div>

            <div class="IntroducePage__mission-desc">
                {!! \App\Helpers\ConfigHelpers::get('about_us_mission') !!}
            </div>
            <div class="IntroducePage__mission-img">
                <img src="{{ \App\Helpers\ConfigHelpers::get('about_us_mission_image') }}" alt="{{ \App\Helpers\ConfigHelpers::get('about_us_mission_image') }}" />
            </div>
        </div>
    </div>
    <div class="IntroducePage__CoreValues">
        <!-- <div class="IntroducePage__CoreValues-bg">
            <img src="{{ asset('html-finafa/images/bg_giatricotloi.jpg') }}" alt="" />
        </div> -->
        <div class="row">
            <div class="IntroducePage__CoreValues-desc col-12 col-md-9 pl-0">
                <div class="desc__title">
                    <div class="IntroducePage__label">
                        <div class="label__text">
                            {{ __('client.page.about_us.value') }}
                        </div>
                        <div class="label__hr"></div>
                    </div>
                </div>
                <div class="desc__body row">
                    <!--  -->
                    <div class="desc__body-item col-12 col-sm-6 col-md-4 pt-5">
                        <div class="desc__body-item-label">
                            {!! \App\Helpers\ConfigHelpers::get('about_us_value_title_1') !!}
                        </div>
                        <div class="desc__body-item-text">
                            {!! \App\Helpers\ConfigHelpers::get('about_us_value_content_1') !!}
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="desc__body-item col-12 col-sm-6 col-md-4 pt-5">
                        <div class="desc__body-item-label">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_title_2') }}
                        </div>
                        <div class="desc__body-item-text">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_content_2') }}
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="desc__body-item col-12 col-sm-6 col-md-4 pt-5">
                        <div class="desc__body-item-label">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_title_3') }}
                        </div>
                        <div class="desc__body-item-text">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_content_3') }}
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="desc__body-item col-12 col-sm-6 col-md-4 pt-5">
                        <div class="desc__body-item-label">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_title_4') }}
                        </div>
                        <div class="desc__body-item-text">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_content_4') }}
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="desc__body-item col-12 col-sm-6 col-md-4 pt-5">
                        <div class="desc__body-item-label">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_title_5') }}
                        </div>
                        <div class="desc__body-item-text">
                            {{ \App\Helpers\ConfigHelpers::get('about_us_value_content_5') }}
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->

                    <!--  -->
                </div>
            </div>
            <div class="IntroducePage__CoreValues-img col-12 col-md-3 pr-0">
                <div class="img__item">
                    <img style="object-fit: fill;" src="{{ \App\Helpers\ConfigHelpers::get('about_us_value_image_1') }}" alt="{{ \App\Helpers\ConfigHelpers::get('about_us_value_image_1') }}" />
                </div>
            
            </div>
        </div>
    </div>
    <div class="IntroducePage__CoreCompetencies">
    </div>
</section>
@endsection