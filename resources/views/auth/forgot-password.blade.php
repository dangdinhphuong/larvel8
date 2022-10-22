@extends('auth.master')
@section('content')
    <div class="modal-body">
        <div class="h5 modal-title text-center">
            <h4 class="mt-2">
                <div>{{ __('auth.forgot_password_hint') }}</div>
                @if($errors->any())
                    <br>
                    <span class="text-danger">{{ $errors->first() }}</span>
                @endif
            </h4>
        </div>
        <form class="" method="post"  id="form">
            @csrf
            <div class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <input name="email" id="email" placeholder="{{ __('auth.email_placeholder') }}" type="email" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer clearfix">
        <div class="float-left">
            <a href="{{ route('login') }}" class="btn-lg btn btn-link">{{ __('auth.login_title') }}</a>
        </div>
        <div class="float-right">
            <button type="submit" form="form" class="btn btn-primary btn-lg">{{ __('auth.request_password_btn') }}</button>
        </div>
    </div>
@endsection
