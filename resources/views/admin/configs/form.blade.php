@extends('admin.layout.master')

@push('title', __('admin.page.config.title'))
@push('description', '')

@section('content')

    <form action="{{ isset($id) ? route('config.update', $id) : route('config.store') }}"
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
                            class="btn-shadow btn btn-info" data-original-title="{{ __('admin.button.save') }}"
                            form="submit-form">
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
                    <div class="col-md-4 col-12">
                        <div class="position-relative form-group">
                            <label for="key">{{ __('admin.page.config.attribute.key') }}</label>
                            <input value="{{ old('key', $item->key ?? null) }}" name="key" id="key"
                                   placeholder="{{ __('admin.page.config.attribute.key') }}..." type="text"
                                   class="form-control @error('key') is-invalid @enderror">
                            @error('key')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="status">{{ __('admin.page.config.attribute.status') }}</label>
                            <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                @foreach(\App\Entities\Config::STATUS as $value => $status)
                                    <option
                                        value="{{ $value }}" {{ old('status', $item->status ?? null) == $value ? "selected" : null }}>
                                        {{ __($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="type">{{ __('admin.page.config.attribute.type') }}</label>
                            <select name="type" id="type" class="form-control">
                                <option value="flat" {{ old('type') == 'flat' ? "selected" : null }}>
                                    {{ __('admin.page.config.form.type.flat') }}
                                </option>
                                <option value="textarea" {{ old('type') == 'textarea' ? "selected" : null }}>
                                    {{ __('admin.page.config.form.type.textarea') }}
                                </option>
                                <option value="image" {{ old('type') == 'image' ? "selected" : null }}>
                                    {{ __('admin.page.config.form.type.image') }}
                                </option>
                            </select>
                            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                    </div>
                    <div class="col-md-8 col-12">
                        <label>{{ __('admin.page.config.attribute.value') }}</label>
                        <div class="position-relative form-group js-config-type js-type-flat">
                            <input value="{{ old('value', $item->value ?? null) }}" name="value-flat" id="value-flat"
                                   placeholder="{{ __('admin.page.config.attribute.value') }}..." type="text"
                                   class=" form-control">
                            @error('value-flat')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="position-relative form-group js-config-type js-type-textarea">
                            @error('value-textarea')<small class="text-danger">{{ $message }}</small>@enderror
                            <textarea name="value-textarea" class="form-control" cols="30"
                                      id="value-textarea">{{ old('value', $item->value ?? null) }}</textarea>
                        </div>

                        <script>
                            let editor = CKEDITOR.replace('value-textarea');
                        </script>
                        <div class="position-relative form-group js-config-type js-type-image">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info"
                                            id="value-btn">{{ __('admin.button.browse_server') }}</button>
                                </div>
                                <input type="text" class="form-control" id="value-image" name="value-image"
                                       value="{{ old('value', $item->value ?? null) }}">
                            </div>
                            @error('value-image')<small class="text-danger">{{ $message }}</small>@enderror
                            <br>
                            <img src="{{ old('thumbnail', $item->value ?? null) }}" alt="" id="preview-value"
                                 class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('admin/assets/scripts/custom.js') }}"></script>
    <script>
        let button = document.getElementById('value-btn');
        button.onclick = function () {
            selectFileWithCKFinder('value-image', 'preview-value');
        };
        $(document).ready(function () {
            $('#type').on('change', function () {
                changeType();
            })
            changeType();
        });

        function changeType() {
            let type = $('#type').val();
            $('.js-config-type').hide();

            if (type === 'flat') {
                $('.js-type-flat').show();

            } else if (type === 'image') {
                $('.js-type-image').show();

            } else if (type === 'textarea') {
                $('.js-type-textarea').show();
            }
        }
    </script>
@endsection
