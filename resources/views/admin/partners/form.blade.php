@extends('admin.layout.master')

@push('title', __('admin.page.partner.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('partner.update', $id) : route('partner.store') }}"
          method="post" id="submit-form" class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        @stack('title')
                        <div class="page-title-subheading">
                            @stack('description')
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
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
                    <div class="col-md-8 col-12">
                        <div class="position-relative form-group ">
                            <label for="type">{{ __('admin.page.partner.attribute.type') }}</label>
                            <select name="type" id="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                @foreach(\App\Entities\Partner::TYPE as $key => $type)
                                    <option
                                        {{ old('type', $item->type ?? null) == $key ? 'selected' : '' }}
                                        value="{{ $key }}">
                                        {{ __($type) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="position-relative form-group ">
                            <label for="status">{{ __('admin.page.partner.attribute.status') }}</label>
                            <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                @foreach(\App\Entities\Partner::STATUS as $value => $status)
                                    <option
                                        value="{{ $value }}" {{ old('status', $item->status ?? null) == $value ? "selected" : null }}>
                                        {{ __($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="position-relative form-group ">
                            <label for="logo" class="@error('logo') is-invalid @enderror">
                                {{ __('admin.page.partner.attribute.logo') }}
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info" id="logo-btn">
                                        {{ __('admin.button.browse_server') }}
                                    </button>
                                </div>
                                <input type="text" class="form-control" id="logo" name="logo"
                                       value="{{ old('logo', $item->logo ?? null) }}">
                                @error('logo')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="preview-thumbnail">
                            {{ __('admin.page.partner.attribute.logo') }}
                        </label>
                        <br>
                        <img src="{{ old('logo', $item->logo ?? null) }}" alt="" id="preview-logo" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('admin/assets/scripts/custom.js') }}"></script>
    <script>
        let button = document.getElementById('logo-btn');
        button.onclick = function () {
            selectFileWithCKFinder('logo', 'preview-logo');
        };
    </script>
@endsection
