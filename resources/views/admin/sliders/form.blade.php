@extends('admin.layout.master')

@push('title', __('admin.page.slider.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('slider.update', $id) : route('slider.store') }}"
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
                    <div class="col-md-9 col-12">
                        <div class="position-relative form-group">
                            <label for="content">{{ __('admin.page.slider.attribute.content') }}</label>
                            @error('content')<small class="text-danger">{{ $message }}</small>@enderror
                            <textarea name="content" id="content"
                                      class="form-control @error('position') is-invalid @enderror">{{ old('content', $item->content ?? null) }}</textarea>
                        </div>

                        <div class="position-relative form-group">
                            <label for="thumbnail" class="@error('thumbnail') is-invalid @enderror">{{ __('admin.page.slider.attribute.thumbnail') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info" id="thumbnail-btn">{{ __('admin.button.browse_server') }}</button>
                                </div>
                                <input type="text" class="form-control" id="thumbnail" name="thumbnail"
                                       value="{{ old('thumbnail', $item->thumbnail ?? null) }}">
                                @error('thumbnail')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="position-relative form-group col-md-6 col-12">
                                <label for="position">{{ __('admin.page.slider.attribute.position') }}</label>
                                <input value="{{ old('position', $item->position ?? null) }}" name="position"
                                       id="position"
                                       placeholder="{{ __('admin.page.slider.attribute.position') }}..." type="text"
                                       class="form-control @error('position') is-invalid @enderror">
                                @error('position')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="position-relative form-group col-md-6 col-12">
                                <label for="status">{{ __('admin.page.slider.attribute.status') }}</label>
                                <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                    @foreach(\App\Entities\Slider::STATUS as $value => $status)
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
                    <div class="col-md-3 col-12">
                        <label for="preview-thumbnail">Thumbnail</label>
                        <br>
                        <img src="{{ old('thumbnail', $item->thumbnail ?? null) }}" alt="" id="preview-thumbnail" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('admin/assets/scripts/custom.js') }}"></script>
    <script>
        let button = document.getElementById('thumbnail-btn');
        button.onclick = function () {
            selectFileWithCKFinder('thumbnail', 'preview-thumbnail');
        };
    </script>
@endsection
