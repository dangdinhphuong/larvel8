@extends('admin.layout.master')

@push('title', __('admin.page.partner.title'))
@push('description', '')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    @stack('title')
                    <div class="page-title-subheading">
                        @stack('description')
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('partner.create') }}" type="button" data-toggle="tooltip" title=""
                       data-placement="bottom"
                       class="btn-shadow btn btn-info" data-original-title="{{ __('admin.button.create') }} @stack('title')">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        {{ __('admin.button.create') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">@stack('title')</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.page.partner.attribute.logo') }}</th>
                        <th>{{ __('admin.page.partner.attribute.type') }}</th>
                        <th>{{ __('admin.button.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partners as $partner)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                                    <div class="avatar-icon rounded">
                                        <img src="{{ $partner->logo }}" alt="{{ $partner->logo }}">
                                    </div>
                                </div>
                            </td>
                            <td>{{ __(\App\Entities\Partner::TYPE[$partner->type]) }}</td>
                            <td>
                                <a href="{{ route('partner.edit', $partner->id) }}" type="button" data-toggle="tooltip"
                                   title="" data-placement="bottom"
                                   class="btn-shadow btn btn-info" data-original-title="{{ __('admin.action.edit') }}">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                    </span>
                                </a>
                                <button href="{{ route('partner.destroy', $partner->id) }}" type="button"
                                        data-toggle="tooltip" title="" data-placement="bottom"
                                        class="btn-shadow btn btn-danger delete-btn" data-original-title="{{ __('admin.action.delete') }}">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
