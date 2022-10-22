@extends('admin.layout.master')

@push('title', __('admin.page.post.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('post.update', $id) : route('post.store') }}"
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
        <div class="row">
            <div class="col-md-9">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($id) ? __('admin.action.edit') : __('admin.action.create') }} @stack('title')</h5>
                        <div>
                            @csrf
                            @method(isset($id) ? 'put' : 'post')
                            <div class="position-relative form-group">
                                <label for="name">{{ __('admin.page.post.attribute.name') }}</label>
                                <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                                       placeholder="{{ __('admin.page.post.attribute.name') }}..." type="text"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="position-relative form-group">
                                <label for="slug"
                                       class="@error('name') is-invalid @enderror">{{ __('admin.page.post.attribute.slug') }}</label>
                                <input value="{{ old('slug', $item->slug ?? null) }}" name="slug" id="slug"
                                       placeholder="{{ __('admin.page.post.attribute.slug') }}..." type="text"
                                       class="form-control @error('slug') is-invalid @enderror">
                                @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="position-relative form-group d-none">
                                <label for="category_ids">Danh mục</label>
                                <select name="category_ids[]" id="category_ids" multiple="multiple"
                                        class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, old('category_ids', $item->category_ids ?? [])) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="position-relative form-group">
                                <label for="thumbnail">{{ __('admin.page.post.attribute.thumbnail') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-info" id="thumbnail-btn">
                                            {{ __("admin.button.browse_server") }}
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" id="thumbnail" name="thumbnail"
                                           value="{{ old('thumbnail', $item->thumbnail ?? null) }}">
                                </div>
                            </div>

                            <div class="position-relative form-group">
                                <label
                                    for="short_description">{{ __('admin.page.post.attribute.short_description') }}</label><br>
                                @error('short_description')<small class="text-danger">{{ $message }}</small>@enderror
                                <textarea name="short_description" class="form-control"
                                          id="short_description">{{ old('short_description', $item->short_description ?? null) }}</textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="content">{{ __('admin.page.post.attribute.content') }}</label><br>
                                @error('content')<small class="text-danger">{{ $message }}</small>@enderror
                                <textarea name="content"
                                          id="content">{{ old('content', $item->content ?? null) }}</textarea>
                            </div>
                            <script>
                                let editor = CKEDITOR.replace('content');
                                CKEDITOR.config.extraPlugins = "toc";
                            </script>

                            @isset($item)
                                @seoForm($item)
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('admin.page.post.form.category_info') }}</h5>

                        <label for="categories">{{ __('admin.page.post.form.parent_category') }}</label>
                        @error('category_ids')<small class="text-danger">{{ $message }}</small>@enderror
                        <div id="categories" name="test_ft"></div>


                        <div class="position-relative form-group">
                            <label for="status">{{ __('admin.page.post.attribute.status') }}</label>
                            <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                @foreach(\App\Entities\Post::STATUS as $value => $status)
                                    <option
                                        value="{{ $value }}" {{ old('status', $item->status ?? null) == $value ? "selected" : null }}>
                                        {{ __($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="type">{{ __('admin.page.post.attribute.type') }}</label>
                            <select name="type" id="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                @foreach(\App\Entities\Category::TYPE as $value => $type)
                                    <option
                                        {{ old('type', $item->type ?? null) == $value ? 'selected' : '' }} value="{{ $value }}">{{ __($type) }}</option>
                                @endforeach
                            </select>
                            @error('type')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div>
                            <label for="preview-thumbnail">{{ __('admin.page.post.attribute.thumbnail') }}</label>
                            <br>
                            <img src="{{ old('thumbnail', $item->thumbnail ?? null) }}" alt="" id="preview-thumbnail"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.27.0/jquery.fancytree-all-deps.js"></script>
    <script>
        let init = false;
        let button = document.getElementById('thumbnail-btn');
        button.onclick = function () {
            selectFileWithCKFinder('thumbnail', 'preview-thumbnail');
        };
        $('#type').on('change', function () {
            let event = $(this);
            $("#category_ids option").prop('selected', false);
            $.ajax({
                data: {
                    type: event.val(),
                },
                url: "{{ route('fetch-category') }}",
                success: function (result) {
                    let tree = $('#categories').fancytree('getTree');
                    tree.reload(result)
                        .done(function () {
                            // console.log('tree reloaded');
                        });
                }
            });
        })
        $("#categories").fancytree({
            autoCollapse: true,
            autoScroll: true,
            checkbox: true,
            debugLevel: 4,
            generateIds: true,
            icon: false,
            quicksearch: true,
            selectMode: 2,
            tabindex: 0,
            source: {
                url:
                    "{{ route('fetch-category', ['type' => old('type', $item->type ?? \App\Entities\Category::TYPE_FAQ)]) }}"
            },
            init: function (event, data) {
                $("#category_ids option").each(function (index, element) {
                    let $element = $(element);
                    if ($element.prop('selected')) {
                        console.log($element.val());
                        let node = data.tree.findFirst(function (n) {
                            return n.key === $element.val();
                        })
                        node.setSelected();
                    }
                });
                init = true;
            },
            activate: function (event, data) {
                // $("#statusLine").text(event.type + ": " + data.node);
            },
            select: function (event, data) {
                if (init) {
                    let keys = data.tree.getSelectedNodes();
                    $("#category_ids option").prop('selected', false);
                    $.each(keys, function (event, data) {
                        $("#category_ids option[value=" + data.key + "]").prop('selected', true);
                    })
                }
            }
        });

    </script>
@endsection
