<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>

<body class="antialiased">

    @include('frontend.partials.header')

    <main>

        

        @yield('frontend_content')

    </main>

    @include('frontend.partials.footer')

    <script src="{{ mix('js/all.js') }}"></script>
</body>

</html>
