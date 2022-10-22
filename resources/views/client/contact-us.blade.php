@extends('client.layout.master')
@section('content')
    <section class="Breadcrumb container">
        <div class="Breadcrumb__banner">
            <div class="Breadcrumb__banner-image">
                <img
                    src="{{ \App\Helpers\ConfigHelpers::get('contact_us.banner') }}"
                    alt="{{ \App\Helpers\ConfigHelpers::get('contact_us.banner') }}"
                />
            </div>
            <div class="Breadcrumb__banner-desc">
                <div class="Breadcrumb__banner-label">{{ __('client.page.contact.title') }}</div>
                <div class="Breadcrumb__banner-link">
                    <a href="/">{{ __('client.page.homepage.title') }}</a>
                    <span> > </span>
                    <a href="" class="active">{{ __('client.page.contact.title') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="ContactUsPage" style="background-image: none;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ContactUsPage__header">
                        <span> {{ __('admin.page.contact.title') }} </span>
                    </div>
                </div>

                <div class="ContactUsPage__left col-12 col-md-6">
                    @foreach($contact_infos as $info)
                        <div class="left__item">
                            <div class="left__item-header">{{ $info->name }}</div>
                            <div class="left__item-body">
                                <div class="left__item-body-icon">
                                    <i
                                        class="fa fa-map-marker"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <div class="left__item-body-text">
                                    {{ $info->address }}
                                </div>
                            </div>
                            <div class="left__item-body">
                                <div class="left__item-body-icon">
                                    <i
                                        class="fa fa-phone"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <div class="left__item-body-text">
                                    {{ $info->phone }}
                                </div>
                            </div>
                            <div class="left__item-body">
                                <div class="left__item-body-icon">
                                    <i
                                        class="fa fa-envelope-o"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                                <div class="left__item-body-text">
                                    {{ $info->email }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ContactUsPage__right col-12 col-md-6">
                    <div class="right__map" id="map">
                    </div>
                    <div class="right__form">
                        <form action="{{ route('client.send-contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="right__form-title col-12">
                                    {{ __('client.page.contact.send_contact_hint') }}
                                </div>
                                @if($errors->any())
                                    <div class=" col-12">
                                        {{ $errors->first() }}
                                    </div>
                                    <br>
                                @endif
                                <div class="right__form-item col-12 col-md-6 pr-md-1 pb-2">
                                    <input value="{{ old('name') }}" required
                                        type="text" name="name"
                                        class="form-control"
                                        placeholder="{{ __('client.page.contact.name_placeholder') }}"
                                    />
                                </div>
                                <div class="right__form-item col-12 col-md-6 pl-md-1 pb-2">
                                    <input value="{{ old('phone') }}" required
                                        type="text" name="phone" pattern="(84|0[3|5|7|8|9])+([0-9]{8})"
                                        class="form-control"
                                           placeholder="{{ __('client.page.contact.phone_placeholder') }}"
                                    />
                                </div>

                                <div class="right__form-item col-12 col-md-6 pr-md-1 pb-2">
                                    <input value="{{ old('address') }}" required
                                        type="text" name="address"
                                        class="form-control"
                                           placeholder="{{ __('client.page.contact.address_placeholder') }}"
                                    />
                                </div>
                                <div class="right__form-item col-12 col-md-6 pl-md-1 pb-2">
                                    <input value="{{ old('email') }}" required
                                        type="email" name="email"
                                        class="form-control"
                                           placeholder="Email"
                                    />
                                </div>

                                <div class="right__form-item col-12 col-md-6 pr-md-1 pb-2">
                                    <input value="{{ old('company_name') }}" required
                                        type="text" name="company_name"
                                        class="form-control"
                                           placeholder="{{ __('client.page.contact.company_name_placeholder') }}"
                                    />
                                </div>
                                <div class="right__form-item col-12 col-md-6 pl-md-1 pb-2">
                                    <input value="{{ old('content') }}" required
                                        type="text" name="content"
                                        class="form-control"
                                           placeholder="{{ __('client.page.contact.content_placeholder') }}"
                                    />
                                </div>

                                <div class="right__form-btn col-12 d-flex justify-content-end">
                                    <button class="btn">
                                        {{ __('client.page.contact.submit_btn') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHB8OcAlosjUgK3gNXS9P2cSBXsi0gTgg&libraries=places&callback=initMap&center=47.65,-122.35&zoom=12&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0xf5f5f5&style=element:labels.icon%7Cvisibility:off&style=element:labels.text.fill%7Ccolor:0x616161&style=element:labels.text.stroke%7Ccolor:0xf5f5f5&style=feature:administrative.land_parcel%7Celement:labels%7Cvisibility:off&style=feature:administrative.land_parcel%7Celement:labels.text.fill%7Ccolor:0xbdbdbd&style=feature:poi%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:poi.park%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:road%7Celement:geometry%7Ccolor:0xffffff&style=feature:road.arterial%7Celement:labels%7Cvisibility:off&style=feature:road.arterial%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:road.highway%7Celement:geometry%7Ccolor:0xdadada&style=feature:road.highway%7Celement:labels%7Cvisibility:off&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:road.local%7Cvisibility:off&style=feature:road.local%7Celement:labels%7Cvisibility:off&style=feature:road.local%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:transit.line%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:transit.station%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:water%7Celement:geometry%7Ccolor:0xc9c9c9&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&size=480x360"
        async="" defer=""></script>

    <script>
        let map, searchBox, Marker, geocoder;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 15.75,
                    center: {
                        lat: 21.0309054,
                        lng: 105.7496717
                    },
                }
            );
            Marker = new google.maps.Marker({
                map: map,
                draggable: false,
                position: {
                    lat: 21.0309054,
                    lng: 105.7496717
                },
            });
        }
    </script>
@endpush
