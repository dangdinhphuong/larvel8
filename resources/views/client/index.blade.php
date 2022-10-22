@extends('client.layout.master')
@section('content')
<section class="Homepage">
    <section class="BannerSlide1">
        <!--  -->
        @foreach($sliders as $slider)
        <div class="BannerSlide1__item">
            <div class="BannerSlide1__item-image">
                <img src="{{ $slider->thumbnail }}" alt="{{ $slider->thumbnail }}" />
            </div>
            <div class="BannerSlide1__item-body">
                @foreach(explode("\n", $slider->content) as $content)
                <div class="BannerSlide1__item-body-text">
                    {{ $content }}
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </section>
    <section class="Introduce">
        <div class="container">
            <div class="row">
                <div class="Introduce__desc col-12 col-md-7">
                    <div class="Introduce__label">
                        <div class="label__text">{{ __('client.page.homepage.about_us') }}</div>
                        <div class="label__hr"></div>
                    </div>
                    <div class="Introduce__text">
                        {!! \App\Helpers\ConfigHelpers::get('about_us_line_1') !!}
                        <br>
                        <br>
                        {!! \App\Helpers\ConfigHelpers::get('about_us_line_2') !!}
                    </div>
                </div>
                <!-- <div class="Introduce__image col-12 col-md-5">
                    <div class="image">
                        <img src="{{ \App\Helpers\ConfigHelpers::get('index.about_us.image') }}" alt="{{ \App\Helpers\ConfigHelpers::get('index.about_us.image') }}">
                    </div>
                </div> -->
                <div class="IntroducePage__vision-img">
                    <img  src="{{ \App\Helpers\ConfigHelpers::get('index.about_us.image') }}" alt="{{ \App\Helpers\ConfigHelpers::get('index.about_us.image') }}" />
                </div>
            </div>
        </div>
    </section>
    <section class="Solution container">
        <div class="Solution__header">
            <div class="Solution__header-label">
                {{ __('client.page.homepage.solution') }}
            </div>

            <div class="Solution__header-hr"></div>
            <div class="Solution__header-desc">
                {{ \App\Helpers\ConfigHelpers::get('solution') }}
            </div>
        </div>

        <div class="Solution__body row">
            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <!-- <i class="fa fa-sitemap"></i> -->
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_1') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_1') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_1') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_1') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_2') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_2') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_2') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_2') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_3') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_3') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_3') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_3') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_4') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_4') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_4') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_4') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_5') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_5') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_5') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_5') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="Solution__body-item col-sm-12 col-md-6 col-lg-4">
                <div class="item__box">
                    <div class="item__box-icon">
                        <div class="image">
                            <img src="{{ \App\Helpers\ConfigHelpers::get('solution_image_6') }}" alt="{{ \App\Helpers\ConfigHelpers::get('solution_image_6') }}">
                        </div>
                    </div>
                    <div class="item__box-body">
                        <div class="body__label">
                            {{ \App\Helpers\ConfigHelpers::get('solution_title_6') }}
                        </div>
                        <div class="body__text">
                            {{ \App\Helpers\ConfigHelpers::get('solution_content_6') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="LatestNews">
        <div class="container">
            <div class="row">
                <div class="LatestNews__label col-12">
                    <div class="label__text">{{ __('client.page.homepage.lasted_news') }}</div>
                    <div class="label__hr"></div>
                </div>
                @foreach($lasted_news as $news)
                <div class="LatestNews__item col-xs-12 col-sm-6 col-lg-4">
                    <div class="LatestNews__item-box">
                        <div class="box__image">
                            <img src="{{ $news->thumbnail }}" alt="{{ $news->thumbnail }}">
                        </div>
                        <div class="box__desc">
                            <div class="box__desc-title">
                                <a href="{{ route('client.blog', ['slug' => $news->slug]) }}">
                                    {{ $news->name }}
                                </a>
                            </div>
                            <div class="box__desc-time">{{ $news->created_at->format("d-m-Y") }}</div>
                            <div class="box__desc-desc">
                                {{ $news->short_description }}
                            </div>
                            <div class="box__desc-link">
                                <a href="{{ route('client.blog', ['slug' => $news->slug]) }}">
                                    {{ __('client.page.homepage.read_more') }} <span> &gt;&gt;</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="SignUpFor">
        <!-- <div class="SignUpFor__bg">
                <img src="{{ asset('html-finafa/images/bg_footer.jpg') }}" alt="">
            </div> -->
        <div class="SignUpFor__label">{{ __('client.page.homepage.sign_up_newsletter') }}</div>
        <div class="SignUpFor__desc">
            {{ __('client.page.homepage.sign_up_desc') }}
        </div>
        <form class="SignUpFor__form" action="{{ route('client.send-contact') }}" method="post">
            @csrf
            <div class="container mt-3">
                <div class="row">
                    <div class="form__item col-12 col-lg-4 col-md-6  pb-2">
                        <input value="{{ old('name') }}" required type="text" name="name" class="form-control" placeholder="{{ __('client.page.contact.name_placeholder') }}" />
                    </div>
                    <div class="form__item col-12 col-lg-4 col-md-6  pb-2">
                        <input value="{{ old('phone') }}" required type="text" name="phone" pattern="(84|0[3|5|7|8|9])+([0-9]{8})" class="form-control" placeholder="{{ __('client.page.contact.phone_placeholder') }}" />
                    </div>

                    <div class="form__item col-12 col-lg-4 col-md-6 pb-2">
                        <input value="{{ old('address') }}" required type="text" name="address" class="form-control" placeholder="{{ __('client.page.contact.address_placeholder') }}" />
                    </div>
                    <div class="form__item col-12 col-lg-4 col-md-6  pb-2">
                        <input value="{{ old('email') }}" required type="text" name="email" class="form-control" placeholder="Email" />
                    </div>

                    <div class="form__item col-12 col-lg-4 col-md-6 pb-2">
                        <input value="{{ old('company_name') }}" required type="text" name="company_name" class="form-control" placeholder="{{ __('client.page.contact.company_name_placeholder') }}" />
                    </div>
                    <div class="form__item col-12 col-lg-4 col-md-6  pb-2">
                        <input value="{{ old('content') }}" required type="text" name="content" class="form-control" placeholder="{{ __('client.page.contact.content_placeholder') }}" />
                    </div>

                    <div class="form__btn col-12 d-flex justify-content-end">
                        <button class="btn submit">
                            {{ __('client.page.contact.submit_btn') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</section>
@endsection