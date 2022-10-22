<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <!-- Bootstrap core CSS -->
    <link
        href="{{ asset('html-finafa/vendor/bootstrap-4.6.1/css/bootstrap.min.css') }}"
        rel="stylesheet"
    />

    <!-- slick -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('html-finafa/vendor/slick/slick.css') }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('html-finafa/vendor/slick/slick-theme.css') }}"
    />

    <!-- jquery -->
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-3.6.0.js"
    ></script>
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-migrate-3.3.2.js"
    ></script>

    <link rel="stylesheet" href="{{ asset('html-finafa/css/app.css') }}"/>

    <!-- icon -->
    <link
        rel="stylesheet"
        href="{{ asset('html-finafa/vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}"
    />
    @seoTags()

</head>
<body>
<!-- header -->
@include('client.layout.header')


<!--  body -->
@yield('content')


@include('client.layout.footer')
<!-- footer -->
<script src="{{ asset('html-finafa/vendor/bootstrap-4.6.1/js/bootstrap.bundle.min.js') }}"></script>
<script
    type="text/javascript"
    src="{{ asset('html-finafa/vendor/slick/slick.min.js') }}"
></script>
<script src="{{ asset('html-finafa/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
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
    @if($errors->any())
    Toast.fire({
        title: "{{ $errors->first() }}",
        icon: "error"
    })
    @endif
</script>
@stack('scripts')
</body>
</html>
