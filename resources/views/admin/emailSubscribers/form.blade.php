@extends('admin.layout.master')

@push('title', __('admin.page.email-subscriber.title'))
@push('description', '')

@section('content')
    <form action="{{ isset($id) ? route('contact-info.update', $id) : route('contact-info.store') }}"
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
                <div>
                    @csrf
                    @method(isset($id) ? 'put' : 'post')

                    <div class="position-relative form-group">
                        <label for="name">Name</label>
                        <input value="{{ old('name', $item->name ?? null) }}" name="name" id="name"
                               placeholder="Name..." type="text"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="name">Address</label>
                        <input value="{{ old('address', $item->address ?? null) }}" name="address" id="address"
                               placeholder="Address..." type="text"
                               class="form-control @error('address') is-invalid @enderror">
                        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="name">Email</label>
                        <input value="{{ old('email', $item->email ?? null) }}" name="email" id="email"
                               placeholder="Email..." type="text"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="name">Phone</label>
                        <input value="{{ old('phone', $item->phone ?? null) }}" name="phone" id="phone"
                               placeholder="Phone..." type="text"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="position" class="@error('position') is-invalid @enderror">Vị trí</label>
                        <input value="{{ old('position', $item->position ?? null) }}" name="position" id="position"
                               placeholder="Position..." type="number" min="0"
                               class="form-control @error('position') is-invalid @enderror">
                        @error('position')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status', $item->status ?? null) == 1 ? "selected" : null }}>
                                Activate
                            </option>
                            <option value="0" {{ old('status', $item->status ?? null) == 0 ? "selected" : null }}>
                                Deactivate
                            </option>
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
