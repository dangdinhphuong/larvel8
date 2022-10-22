@extends('admin.layout.master')

@push('title', __('admin.page.contact.title'))
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

                </div>
            </div>
        </div>
        @include('admin.layout.search_form', ['page' => 'contact', 'search_array' => ['name', 'phone', 'address', 'company_name', 'email']])
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">@stack('title')</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.page.contact.attribute.name') }}</th>
                        <th>{{ __('admin.page.contact.attribute.phone') }}</th>
                        <th>{{ __('admin.page.contact.attribute.address') }}</th>
                        <th>{{ __('admin.page.contact.attribute.business_type') }}</th>
                        <th>{{ __('admin.page.contact.attribute.company_name') }}</th>
                        <th>{{ __('admin.page.contact.attribute.email') }}</th>
                        <th>{{ __('admin.page.contact.attribute.content') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->business_type }}</td>
                            <td>{{ $contact->company_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td data-toggle="tooltip" title="" data-placement="bottom" data-original-title="{{ $contact->content }}">{{ substr($contact->content,0, 50)  }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
