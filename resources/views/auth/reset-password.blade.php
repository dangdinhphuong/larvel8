@extends('auth.master')
@section('content')
    <div class="modal-body">
        <div class="h5 modal-title text-center">
            <h4 class="mt-2">
                <div>{{ __('auth.forgot_password_hint') }},</div>
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
                        <input name="password" id="password" placeholder="{{ __('auth.password_placeholder') }}" type="password" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <input name="password_confirmation" id="password_confirmation" placeholder="{{ __('auth.password_confirmation_placeholder') }}" type="password" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer clearfix">
        <div class="float-right">
            <button type="submit" form="form" class="btn btn-primary btn-lg">{{ __('auth.change_password_btn') }}</button>
        </div>
    </div>
@endsection
