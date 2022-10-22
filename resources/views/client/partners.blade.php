@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
            <div class="Breadcrumb__banner-image text-center">
                <img
                    style="object-fit: fill;"
                    src="{{ \App\Helpers\ConfigHelpers::get('partner.banner') }}"
                    alt="{{ \App\Helpers\ConfigHelpers::get('partner.banner') }}"
                />
            </div>
            <div class="Breadcrumb__banner-desc">
                <div class="Breadcrumb__banner-label">{{ __('client.page.partners.title') }}</div>
                <div class="Breadcrumb__banner-link">
                    <a href="/">{{ __('client.page.homepage.title') }}</a>
                    <span> > </span>
                    <a href="" class="active">{{ __('client.page.partners.title') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="PartnerPage">
        <div class="container">
            <div class="PartnerPage__header">
                <div class="PartnerPage__header-label">{{ __('client.page.partners.partnerships') }}</div>
                <div class="PartnerPage__header-hr"></div>
                <div class="PartnerPage__header-desc">
                    {{ \App\Helpers\ConfigHelpers::get('partnerships_content') }}
                </div>
            </div>
            <div class="PartnerPage__body">
                <table class="PartnerPage__body-table table table-bordered">
                    <tbody>
{{--                    <tr>--}}
{{--                        <td colspan="4">--}}
{{--                            <h3>--}}
{{--                                <span style="color: #c8993d"--}}
{{--                                >{{ __('client.page.partners.sponsor') }}</span--}}
{{--                                >--}}
{{--                            </h3>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @include('client.partners.item', ['item' => $sponsors])--}}
                    <tr>
                        <td colspan="4">
                            <h3>
                                <span style="color: #c8993d"
                                >{{ __('client.page.partners.vendor') }}</span
                                >
                            </h3>
                        </td>
                    </tr>
                    @include('client.partners.item', ['item' => $vendors])
                    <tr>
                        <td colspan="4">
                            <h3>
                                <span style="color: #c8993d"
                                >{{ __('client.page.partners.customer') }}</span
                                >
                            </h3>
                        </td>
                    </tr>
                    @include('client.partners.item', ['item' => $customers])
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
