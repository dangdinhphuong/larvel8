@extends('admin.layout.master')

@push('title', __('admin.page.contact-info.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('contact-info.update', $id) : route('contact-info.store') }}"
          method="post" id="submit-form" class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    @stack('title')
                        <div class="page-title-subheading">
                            @stack('description')
                        </div>
                </div>
                <div class="page-title-actions">
                    @include('admin.layout.change-locale')
                    <button type="submit" data-toggle="tooltip" title="" data-placement="bottom"
                            class="btn-shadow btn btn-info" data-original-title="{{ __('admin.button.save') }}" form="submit-form">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        {{ __('admin.button.save') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{ isset($id) ? __('admin.action.edit') : __('admin.action.create') }} @stack('title')</h5>
                <div class="row">
                    @csrf
                    @method(isset($id) ? 'put' : 'post')

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.contact-info.attribute.name') }}</label>
                        <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                               placeholder="{{ __('admin.page.contact-info.attribute.name') }}..." type="text"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.contact-info.attribute.address') }}</label>
                        <input value="{{ old('address', $item->address ?? null) }}" name="address" id="address"
                               placeholder="{{ __('admin.page.contact-info.attribute.address') }}..." type="text"
                               class="form-control @error('address') is-invalid @enderror">
                        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.contact-info.attribute.email') }}</label>
                        <input value="{{ old('email', $item->email ?? null) }}" name="email" id="email"
                               placeholder="{{ __('admin.page.contact-info.attribute.email') }}..." type="text"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.contact-info.attribute.phone') }}</label>
                        <input value="{{ old('phone', $item->phone ?? null) }}" name="phone" id="phone"
                               placeholder="{{ __('admin.page.contact-info.attribute.phone') }}..." type="text"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="position">{{ __('admin.page.contact-info.attribute.position') }}</label>
                        <input value="{{ old('position', $item->position ?? null) }}" name="position" id="position"
                               placeholder="{{ __('admin.page.contact-info.attribute.position') }}..." type="number" min="0"
                               class="form-control @error('position') is-invalid @enderror">
                        @error('position')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="status">{{ __('admin.page.contact-info.attribute.status') }}</label>
                        <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                            @foreach(\App\Entities\ContactInfo::STATUS as $value => $status)
                                <option
                                    value="{{ $value }}" {{ old('status', $item->status ?? null) == $value ? "selected" : null }}>
                                    {{ __($status) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
