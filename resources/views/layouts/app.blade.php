<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>@yield('title', 'Products') </title>    

    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <meta name="color-scheme" content="light only">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="max-image-preview:large">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')

</head>

<body>

    <div class="">

        @yield('web-content')

    </div>

</body>

</html>