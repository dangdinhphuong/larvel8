<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">{{ __('admin.action.search') }}</h5>
        <form action="" class="row" id="search">
            @foreach($search_array as $key)
                <div class="col-lg-3 col-md-4 col-12 mb-1">
                    <input type="text" class="form-control" name="{{ $key }}"
                           placeholder="{{ __('admin.page.' . $page .'.attribute.' . $key) }}"
                           value="{{ request($key) }}">
                </div>
            @endforeach
        </form>
    </div>
    <div class="card-footer">
        <div class="page-title-actions">
            <button type="submit" form="search" data-toggle="tooltip" title=""
                    data-placement="bottom"
                    class="btn-shadow btn btn-info"
                    data-original-title="{{ __('admin.action.search') }} @stack('title')">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-business-time fa-w-20"></i>
                </span>
                {{ __('admin.action.search') }}
            </button>
            <button onclick="$('#search input').val('')" form="search" data-toggle="tooltip" title=""
                    data-placement="bottom"
                    class="btn-shadow btn btn-info"
                    data-original-title="{{ __('admin.action.reset') }} @stack('title')">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-business-time fa-w-20"></i>
                </span>
                {{ __('admin.action.reset') }}
            </button>
        </div>
    </div>
</div>
