@extends('admin.layout.master')

@push('title', __('admin.page.email-subscriber.title'))
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

                </div>
            </div>
        </div>

        @include('admin.layout.search_form', ['page' => 'email-subscriber', 'search_array' => ['email', 'phone']])
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">@stack('title')</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.page.email-subscriber.attribute.email') }}</th>
                        <th>{{ __('admin.page.email-subscriber.attribute.phone') }}</th>
                        <th>{{ __('admin.page.email-subscriber.attribute.option') }}</th>
                        <th>{{ __('admin.page.email-subscriber.attribute.status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emailSubscribers as $emailSubscriber)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $emailSubscriber->email }}</td>
                            <td>{{ $emailSubscriber->phone }}</td>
                            <td>{{ $emailSubscriber->option }}</td>
                            <td>{{ $emailSubscriber->status ? "Hoạt động" : "Không hoạt động" }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
