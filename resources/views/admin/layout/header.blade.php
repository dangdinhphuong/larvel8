<div class="app-header header-shadow bg-slick-carbon header-text-light">
    <div class="app-header__logo">
        <img src="{{ asset('admin/assets/images/logo-light.svg') }}" alt="">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-dots">
                <div class="dropdown">
                    <button type="button" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-focus"></span>
                            <span class="language-icon opacity-8 flag large {{ config('locale.' . app()->getLocale() . '.flag' ) }}"></span>
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                         class="rm-pointers dropdown-menu dropdown-menu-right">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                <div class="menu-header-image opacity-05"
                                     style="background-image: url('assets/images/dropdown-header/city2.jpg');"></div>
                                <div class="menu-header-content text-center text-white">
                                    <h6 class="menu-header-subtitle mt-0"> {{ __('admin.button.select_language') }}</h6>
                                </div>
                            </div>
                        </div>
                        @foreach(config('locale') as $locale)
                            <a href="{{ route('change-locale', ['locale' => $locale['code']]) }}" type="button" tabindex="0"
                                    class="dropdown-item {{ app()->getLocale() == $locale['code'] ? 'active' : null }}">
                                <span class="mr-3 opacity-8 flag large {{ $locale['flag'] }}"></span> {{ $locale['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{ Auth::user()->avatar ?? '' }}" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                 style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <img width="42" class="rounded-circle"
                                                                 src="{{ Auth::user()->avatar ?? '' }}" alt="">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">{{ Auth::user()->name }}</div>
                                                            <div class="widget-subheading opacity-8">
{{--                                                                A short profile description--}}
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <a href="{{ route('logout') }}"
                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                                {{ __('auth.logout_title') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-xs" style="height: 150px;">
                                        <div class="scrollbar-container ps">
                                            <ul class="nav flex-column">
                                                {{--                                                <li class="nav-item-header nav-item">Activity</li>--}}
                                                {{--                                                <li class="nav-item">--}}
                                                {{--                                                    <a href="javascript:void(0);" class="nav-link">Chat--}}
                                                {{--                                                        <div class="ml-auto badge badge-pill badge-info">8</div>--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </li>--}}
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        {{ __('auth.recover_password_title') }}
                                                    </a>
                                                </li>
                                                {{--                                                <li class="nav-item-header nav-item">My Account--}}
                                                {{--                                                </li>--}}
                                                {{--                                                <li class="nav-item">--}}
                                                {{--                                                    <a href="javascript:void(0);" class="nav-link">Settings--}}
                                                {{--                                                        <div class="ml-auto badge badge-success">New</div>--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </li>--}}
                                                {{--                                                <li class="nav-item">--}}
                                                {{--                                                    <a href="javascript:void(0);" class="nav-link">Messages--}}
                                                {{--                                                        <div class="ml-auto badge badge-warning">512</div>--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </li>--}}
                                                {{--                                                <li class="nav-item">--}}
                                                {{--                                                    <a href="javascript:void(0);" class="nav-link">Logs</a>--}}
                                                {{--                                                </li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider mb-0 nav-item"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">{{ Auth::user()->name }}</div>
{{--                            <div class="widget-subheading"> VP People Manager</div>--}}
                        </div>
{{--                        <div class="widget-content-right header-user-info ml-3">--}}
{{--                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">--}}
{{--                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
