<div class="app-sidebar sidebar-shadow bg-premium-dark sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src" style="background: url({{ asset('admin/assets/images/logo-light.svg') }}); width: 117px; height: 32px">
        </div>

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
            <button type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                @foreach(config('admin_sidebar') as $item)
                    <li>
                        @php
                            $href = '#';
                            if(empty($item['sub_menu']) && isset($item['route']) && $item['route'] !== ''){
                                $href = route($item['route']);
                            }
                        @endphp
                        <a href="{{ $href }}"
                           class="{{ \Request::route()->getName() == ($item['route'] ?? '') ? "mm-active" : "" }}">
                            <i class="metismenu-icon {{ $item['icon'] }}"></i>
                            {{ __($item['name']) }}
                            @if(!empty($item['sub_menu']))
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            @endif
                        </a>
                        @if(!empty($item['sub_menu']))
                            <ul>
                                @foreach($item['sub_menu'] as $sub_item)
                                    <li>
                                        @php
                                            $href = '#';
                                            if(empty($sub_item['sub_menu']) && isset($sub_item['route']) && $sub_item['route'] !== ''){
                                                $href = route($sub_item['route']);
                                            }
                                        @endphp
                                        <a href="{{ $href }}"
                                           class="{{ \Request::route()->getName() == ($sub_item['route'] ?? '') ? "mm-active" : " " }}">
                                            <i class="metismenu-icon"></i>
                                            {{ __($sub_item['name']) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

