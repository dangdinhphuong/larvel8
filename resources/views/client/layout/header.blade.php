<section class="topbar">
    <div
        class="topbar__box container d-flex flex-column flex-md-row justify-content-md-end align-items-center"
    >
        <div class="topbar__box-item">
            <i class="fa fa-phone-square"></i>
            <span> {{ __('client.layout.header.hotline') }}: {{ \App\Helpers\ConfigHelpers::get('hotline') }} </span>
        </div>
        <div class="topbar__box-item">
            <i class="fa fa-envelope"></i>
            <span>Email: {{ \App\Helpers\ConfigHelpers::get('email') }} </span>
        </div>
        <div class="topbar__box-item">
            <i class="fa fa-language"></i>
            @if(app()->getLocale() == 'en')
                <a href="{{ route('change-locale', ['locale' => 'vi']) }}"> Tiếng Việt </a>
            @else
                <a href="{{ route('change-locale', ['locale' => 'en']) }}"> English </a>
            @endif
        </div>
    </div>
</section>

<header class="navCustom" id="navCustom" `>
    <div class="navCustom__box container d-flex">
        <div class="navCustom__box-logo mr-auto">
            <a href="/">
                <img src="{{ asset('html-finafa/images/logo.svg') }}" alt=""/>
            </a>
        </div>
        <div
            class="navCustom__box-link d-none d-lg-flex align-items-center"
        >
            <ul>
                <li class="link__item {{ request()->route()->getName() == 'client.index' ? 'active' : null }}">
                    <a href="{{ route('client.index') }}" class="">
                        {{ __('client.layout.header.homepage') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.about' ? 'active' : null }}">
                    <a href="{{ route('client.about') }}" class="">
                        {{ __('client.layout.header.about') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.products' ? 'active' : null }}">
                    <a href="{{ route('client.products') }}" class="">
                        {{ __('client.layout.header.products') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.partners' ? 'active' : null }}">
                    <a href="{{ route('client.partners') }}" class="">
                        {{ __('client.layout.header.partners') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.blogs' ? 'active' : null }}">
                    <a href="{{ route('client.blogs') }}" class="">
                        {{ __('client.layout.header.news') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.contact-us' ? 'active' : null }}">
                    <a href="{{ route('client.contact-us') }}" class="">
                        {{ __('client.layout.header.contact') }}
                    </a>
                </li>
                <li class="link__item {{ request()->route()->getName() == 'client.recruit' ? 'active' : null }}">
                    <a href="{{ route('client.recruit') }}" class="">
                        {{ __('client.layout.header.recruit') }}
                    </a>
                </li>


                <li class="link__search">
                    <button
                        onclick="handleHeaderSearch()"
                        class="btn link__search-button"
                    >
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>

                    <div
                        class="link__search-form"
                        id="link__search-form"
                    >
                        <form action="{{ route('client.products') }}" class="form">
                            <div class="form__input">
                                <input
                                    class="form-control"
                                    type="text" name="term"
                                    placeholder="{{ __('admin.action.search') }}..."
                                    value="{{ request()->get('term') }}"
                                />
                            </div>
                            <button class="form__icon btn">
                                <i
                                    class="fa fa-search"
                                    aria-hidden="true"
                                ></i>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <div
            class="navCustom__box-toggle d-flex d-lg-none align-items-center"
        >
            <label class="toggle__btn" for="toggleHeader">
                <span class="toggle__btn-icon-bar"> </span>
                <span class="toggle__btn-icon-bar"> </span>
                <span class="toggle__btn-icon-bar"> </span>
            </label>

            <input
                type="checkbox"
                class="toggle__input d-none"
                name=""
                id="toggleHeader"
            />
            <div class="toggle__list">
                <label for="toggleHeader" class="list__btn-close">
                    <i class="fa fa-close"></i>
                </label>
                <div class="list__body">
                    <ul>
                        <li class="list__body-search">
                            <div class="link__search-form">
                                <form action="{{ route('client.products') }}" class="form">
                                    <div class="form__input">
                                        <input
                                            class="form-control"
                                            type="text" name="term"
                                            placeholder="{{ __('admin.action.search') }}..."
                                            value="{{ request()->get('term') }}"
                                        />
                                    </div>
                                    <button class="form__icon btn">
                                        <i
                                            class="fa fa-search"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </form>
                            </div>
                        </li>

                        <li class="list__body-link {{ request()->route() == 'client.index' ? 'active' : null }}">
                            <a href="{{ route('client.index') }}" class="">
                                {{ __('client.layout.header.homepage') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.about') }}" class="">
                                {{ __('client.layout.header.about') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.products') }}" class="">
                                {{ __('client.layout.header.products') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.partners') }}" class="">
                                {{ __('client.layout.header.partners') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.blogs') }}" class="">
                                {{ __('client.layout.header.news') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.contact-us') }}" class="">
                                {{ __('client.layout.header.contact') }}
                            </a>
                        </li>
                        <li class="list__body-link">
                            <a href="{{ route('client.recruit') }}" class="">
                                {{ __('client.layout.header.recruit') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
