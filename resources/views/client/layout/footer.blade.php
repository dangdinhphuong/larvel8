<section>
    <button onclick="topFunction()" id="myBtnScroll" title="Go to top" style="display: none;">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </button>
</section>
<footer class="footer">
    <div class="footer__box">
        <div class="footer__bg ">
            <!-- <img src="{{ asset('html-finafa/images/bg_footer.jpg') }}" alt="" /> -->
        </div>
        
        <div class="container">
            <div class="row">
                <div class="footer__box-main col-12 col-md-4">
                    <div class="main__image text-center">
                        <img src="{{ asset('html-finafa/images/logo_footer.svg') }}" alt="" height="64pxte" />
                    </div>
                    <div class="main__text">
                        {{ \App\Helpers\ConfigHelpers::get('company_name') }}
                        {{-- <br/> --}}
                        {{-- {{ \App\Helpers\ConfigHelpers::get('email') }} --}}
                    </div>
                </div>
                @foreach($footer_contact_info as $info)
                    <div class="footer__box-item col-12 col-md">
                        <div class="item__header" style="font-size: 19px;">{{ $info->name }}</div>
                        <div class="item__body d-flex flex-row">
                            <div class="item__body-icon">
                                <i
                                    class="fa fa-map-marker"
                                    aria-hidden="true"
                                ></i>
                            </div>
                            <div class="item__body-text" style="font-size: 15px;">
                                {{ $info->address }}
                            </div>
                        </div>
                        <div class="item__body">
                            <div class="item__body-icon1">
                                <i
                                    class="fa fa-phone"
                                    aria-hidden="true"
                                ></i>
                            </div>
                            <div class="item__body-text">
                                <a href="tel:{{ $info->phone }}" style="font-size: 15px;" >{{ $info->phone }}</a>
                            </div>
                        </div>
                        <div class="item__body">
                            <div class="item__body-icon1">
                                <i
                                    class="fa fa-envelope-o"
                                    aria-hidden="true"
                                ></i>
                            </div>
                            <div class="item__body-text">
                                <a href="#" style="font-size: 15px;">{{ $info->email }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="footer__bottom container">
        <div class="row">
            <div class="footer__bottom-item col-12 col-md-6">
                {{ \App\Helpers\ConfigHelpers::get('copyright') }}
            </div>
            <div
                class="footer__bottom-link col-12 col-md-6 d-flex justify-content-end align-items-center"
            >
                <a class="link__item" href="{{ \App\Helpers\ConfigHelpers::get('facebook-link') }}" target="_blank">
                    <i
                        class="fa fa-facebook-official"
                        aria-hidden="true"
                    ></i>
                </a>
                <a class="link__item" href="{{ \App\Helpers\ConfigHelpers::get('youtube-link') }}" target="_blank">
                    <i
                        class="fa fa-youtube-play"
                        aria-hidden="true"
                    ></i>
            </div>
        </div>
    </div>
</footer>
