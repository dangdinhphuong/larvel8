@extends('admin.layout.master')

@push('title', __('admin.page.role.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('role.update', $id) : route('role.store') }}"
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
                        <label for="name">{{ __('admin.page.role.attribute.name') }}</label>
                        <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                               placeholder="{{ __('admin.page.role.attribute.name') }}..." type="text"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="description">{{ __('admin.page.role.attribute.description') }}</label>
                        <input value="{{ old('description', $item->description ?? null) }}" name="description"
                               id="description"
                               placeholder="{{ __('admin.page.role.attribute.description') }}..." type="text"
                               class="form-control @error('description') is-invalid @enderror">
                        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="position-relative form-group col-md-12 col-12">
                        <label for="permissions">{{ __('admin.page.role.attribute.permission_ids') }}</label>
                        <small class="text-danger rule" id="rule-permissions"></small>
                        <div class="row">
                            <div class="col-3">
                                <h4>{{ __('admin.page.role.form.all_permissions') }}</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full"
                                           onchange="$('.permission').prop('checked', this.checked);">
                                    <label class="form-check-label" for="full">{{ __('admin.page.role.form.get_all_permissions') }}</label>
                                </div>
                            </div>
                            @foreach($formattedRoles as $key=>$group)
                                <div class="col-3">
                                    <h4>{{ $key }}</h4>
                                    @foreach($group as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input permission" type="checkbox"
                                                   {{--                                                                   {{ in_array(old('permissions', $permission->id), $role->permissions) ? 'checked' : '' }}--}}
                                                   {{ in_array($permission->id, old('permission_ids', $item->permission_ids ?? [])) ? "checked" : null }}
                                                   name="permission_ids[]" id="{{ $permission->id }}"
                                                   value="{{ $permission->id }}">
                                            <label class="form-check-label"
                                                   for="{{ $permission->id }}">{{ $permission->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
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
