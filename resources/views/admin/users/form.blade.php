@extends('admin.layout.master')

@push('title', __('admin.page.user.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('user.update', $id) : route('user.store') }}"
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

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.user.attribute.name') }}</label>
                        <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                               placeholder="{{ __('admin.page.user.attribute.name') }}..." type="text"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="email">{{ __('admin.page.user.attribute.email') }}</label>
                        <input value="{{ old('email', $item->email ?? null) }}" name="email"
                               id="email"
                               placeholder="{{ __('admin.page.user.attribute.email') }}..." type="email"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="phone">{{ __('admin.page.user.attribute.phone') }}</label>
                        <input value="{{ old('phone', $item->phone ?? null) }}" name="phone"
                               id="phone"
                               placeholder="{{ __('admin.page.user.attribute.phone') }}..." type="phone"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="role_ids">{{ __('admin.page.user.attribute.role_ids') }}</label>
                        <select name="role_ids[]" id="role_ids" multiple="multiple"
                                class="form-control select2 @error('role_ids') is-invalid @enderror">
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}"
                                    {{ in_array($role->id ,old('role_ids', $item->role_ids ?? [])) ? 'selected' : null }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_ids')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.css') }}">
    <script src="{{ asset('admin/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script>
        $('.duallistbox').bootstrapDualListbox();
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $("select.tag ").select2({
                tags: true,
            })
        });
    </script>
@endpush
