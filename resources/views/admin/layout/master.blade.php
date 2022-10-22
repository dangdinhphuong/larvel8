<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@stack('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('admin/main.d810cf0ae7f39f28f336.css') }}" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/ckfinder/ckfinder.js') }}"></script>
    @stack('head')
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar">
    @include('admin.layout.header')
    <div class="app-main">
        @include('admin.layout.sidebar')
        <div class="app-main__outer">
            @yield('content')
{{--            @include('admin.layout.footer')--}}
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('admin/assets/scripts/main.d810cf0ae7f39f28f336.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '{{ __('admin.notify.confirm-delete.title') }}',
            text: "{{ __('admin.notify.confirm-delete.subtitle') }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (!!result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: "JSON",
                    contentType: "application/json",
                    success: function (response) {
                        Toast.fire({
                            icon: response.status,
                            title: response.message
                        })
                        window.location.reload()
                    },
                    error: function (response) {
                        Toast.fire({
                            icon: 'error',
                            title: response.responseJSON.message
                        })
                    }
                });
            }
        })
    }

    $('.delete-btn').on('click', function () {
        let btn = $(this);
        let href = btn.attr('href');
        confirmDelete(href);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    })

    @if (\Session::has('message'))
    Toast.fire({
        title: "{{ Session::get('message') }}"
    })
    @endif
</script>
@stack('scripts')
@yield('scripts')
</body>
</html>
