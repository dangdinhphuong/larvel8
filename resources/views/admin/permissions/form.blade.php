@extends('admin.layout.master')

@push('title', __('admin.page.permission.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('permission.update', $id) : route('permission.store') }}"
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
                        <label for="name">{{ __('admin.page.permission.attribute.name') }}</label>
                        <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                               placeholder="{{ __('admin.page.permission.attribute.name') }}..." type="text"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group col-md-6 col-12">
                        <label for="name">{{ __('admin.page.permission.attribute.group') }}</label>
                        <input value="{{ old('group', $item->group ?? null) }}" name="group" id="group"
                               placeholder="{{ __('admin.page.permission.attribute.group') }}..." type="text"
                               class="form-control @error('group') is-invalid @enderror">
                        @error('group')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="position-relative form-group col-md-12 col-12">
                        <label for="router">{{ __('admin.page.permission.attribute.router') }}</label>
                        <select class="duallistbox" multiple="multiple" name="router[]" id="router">
                            @foreach($routers as $router)
                                <option
                                    {{ in_array($router, old('type', $item->router ?? [])) ? 'selected' : '' }}
                                    value="{{ $router }}">
                                    {{ $router }}
                                </option>
                            @endforeach
                        </select>
                        @error('router')<small class="text-danger">{{ $message }}</small>@enderror
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
