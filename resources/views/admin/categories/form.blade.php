@extends('admin.layout.master')

@push('title', __('admin.page.category.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('category.update', $id) : route('category.store') }}"
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
        <div class="row">
            <div class="col-md-9">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($id) ? __('admin.action.edit') : __('admin.action.create') }} @stack('title')</h5>
                        <div>
                            @csrf
                            @method(isset($id) ? 'put' : 'post')

                            <div class="position-relative form-group">
                                <label for="name">
                                    {{ __('admin.page.category.attribute.name') }}
                                </label>
                                <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                                       placeholder="{{ __('admin.page.category.attribute.name') }}..." type="text"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="position-relative form-group">
                                <label for="slug">
                                    {{ __('admin.page.category.attribute.slug') }}
                                </label>
                                <input value="{{ old('slug', $item->slug ?? null) }}" name="slug" id="slug"
                                       placeholder="{{ __('admin.page.category.attribute.slug') }}..." type="text"
                                       class="form-control @error('slug') is-invalid @enderror">
                                @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('admin.page.category.form.category_info') }}</h5>
                        <div class="position-relative form-group">
                            <label for="type">{{ __('admin.page.category.attribute.type') }}</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                @foreach(\App\Entities\Category::TYPE as $value => $type)
                                    <option
                                        {{ old('type', $item->type ?? null) == $value ? 'selected' : '' }} value="{{ $value }}">{{ __($type) }}</option>
                                @endforeach
                            </select>
                            @error('type')<small class="text-dangerk">{{ $message }}</small>@enderror
                        </div>
                        <input type="text" name="parent_id" id="parent_id"
                               value="{{ old('parent_id', $item->parent_id ?? null) }}"
                               hidden>

                        <label for="categories">{{ __('admin.page.category.form.category_info') }}</label>
                        <div id="categories" name="test_ft"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.27.0/jquery.fancytree-all-deps.js"></script>
    <script>
        let init = false;
        $('#type').on('change', function () {
            let event = $(this);
            $("#parent_id").val('');
            $.ajax({
                data: {
                    type: event.val(),
                    exclude: "{{ $item->id ?? null }}"
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
            selectMode: 1,
            tabindex: 0,
            source: {
                url:
                    "{!! route('fetch-category', ['type' => old('type', $item->type ?? \App\Entities\Category::TYPE_FAQ), 'exclude' => $item->id ?? null]) !!}"
            },
            init: function (event, data) {
                if ($("#parent_id").val() !== '') {
                    let node = data.tree.findFirst(function (n) {
                        console.log($("#parent_id").val());
                        return n.key === $("#parent_id").val();
                    })
                    node.setSelected();
                }
                init = true;
            },
            activate: function (event, data) {
                // $("#statusLine").text(event.type + ": " + data.node);
            },
            select: function (event, data) {
                if (init) {
                    let keys = data.tree.getSelectedNodes();
                    $.each(keys, function (event, data) {
                        $("#parent_id").val(data.key);
                    })
                }
            }
        });

    </script>
@endpush
