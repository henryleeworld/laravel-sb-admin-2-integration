<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/fontawsome-free-all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            @yield('content')
        </div>
        @vite('resources/js/app.js')
        <script src="{{ asset('js/jquery.easing-1.4.1.min.js') }}" defer></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
    </body>
</html>
