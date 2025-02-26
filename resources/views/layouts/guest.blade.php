<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('theme/favicon.ico') }}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/theme.min.css') }}">
    <script src="{{ asset('theme/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>


    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="flex-row bg-white row h-100">
                <div class="p-0 col-xl-8 col-lg-6 col-md-5 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg"
                        style="background-image: url('{{ asset('theme/img/auth/login-bg.jpg') }}')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('theme/src/js/vendor/jquery-3.3.1.min.js') }}"><\/script>')
    </script>
    <script src="{{ asset('theme/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('theme/dist/js/theme.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/imask/7.6.1/imask.min.js'
        integrity='sha512-+3RJc0aLDkj0plGNnrqlTwCCyMmDCV1fSYqXw4m+OczX09Pas5A/U+V3pFwrSyoC1svzDy40Q9RU/85yb/7D2A=='
        crossorigin='anonymous'></script>
    @stack('scripts')

</body>

</html>
