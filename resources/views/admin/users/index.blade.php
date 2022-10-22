@extends('admin.layout.master')

@push('title', __('admin.page.user.title'))
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
                    <a href="{{ route('user.create') }}" type="button" data-toggle="tooltip" title=""
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
        @include('admin.layout.search_form', ['page' => 'user', 'search_array' => ['name', 'email']])
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">@stack('title')</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.page.user.attribute.name') }}</th>
                        <th>{{ __('admin.page.user.attribute.email') }}</th>
                        <th>{{ __('admin.button.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" type="button" data-toggle="tooltip"
                                   title="" data-placement="bottom"
                                   class="btn-shadow btn btn-info" data-original-title="{{ __('admin.action.edit') }}">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                    </span>
                                </a>
                                <button href="{{ route('user.destroy', $user->id) }}" type="button"
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
