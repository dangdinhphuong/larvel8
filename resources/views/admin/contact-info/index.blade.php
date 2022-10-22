@extends('admin.layout.master')

@push('title', __('admin.page.contact-info.title'))
@push('description', '')

@section('content')
    <div class="app-main__inner">
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
                    <a href="{{ route('contact-info.create') }}" type="button" data-toggle="tooltip" title="" data-placement="bottom"
                       class="btn-shadow btn btn-info" data-original-title="{{ __('admin.button.create') }} @stack('title')">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        {{ __('admin.button.create') }}
                    </a>
                </div>
            </div>
        </div>
        @include('admin.layout.search_form', ['page' => 'contact-info', 'search_array' => ['name', 'phone', 'address', 'email']])
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">@stack('title')</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.page.contact-info.attribute.name') }}</th>
                        <th>{{ __('admin.page.contact-info.attribute.address') }}</th>
                        <th>{{ __('admin.page.contact-info.attribute.phone') }}</th>
                        <th>{{ __('admin.page.contact-info.attribute.email') }}</th>
                        <th>{{ __('admin.button.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactInfos as $contactInfo)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $contactInfo->name }}</td>
                            <td>{{ $contactInfo->address }}</td>
                            <td>{{ $contactInfo->phone }}</td>
                            <td>{{ $contactInfo->email }}</td>
                            <td>
                                <a href="{{ route('contact-info.edit', $contactInfo->id) }}" type="button" data-toggle="tooltip" title="" data-placement="bottom"
                                   class="btn-shadow btn btn-info" data-original-title="{{ __('admin.action.edit') }}">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                    </span>
                                </a>
                                <button href="{{ route('contact-info.destroy', $contactInfo->id) }}" type="button" data-toggle="tooltip" title="" data-placement="bottom"
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
