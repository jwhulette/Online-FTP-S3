<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> 

    @stack('css')
</head>

@if(!Session::get('loggedIn'))
    <body id="login">
@else
    <body>
@endif

    @yield('content')

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- <script src="{{ mix('js/vendor.js') }}"></script> --}}
    @stack('js')
</body>

</html>