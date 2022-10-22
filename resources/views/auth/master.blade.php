<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Feb 2022 04:22:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ __('auth.login_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('admin/main.d810cf0ae7f39f28f336.css') }}" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-heavy-rain bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="mx-auto mb-3 text-center" style="height: 2rem">
                        <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="" class="mx-auto">
                    </div>
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                            @yield('content')
                        </div>
                    </div>
                    <div class="text-center text-dark opacity-8 mt-3">Copyright © Haptech 2022</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('admin/assets/scripts/main.d810cf0ae7f39f28f336.js') }}"></script></body>
</html>
