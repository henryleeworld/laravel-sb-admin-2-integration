<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/sass/app.scss'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
