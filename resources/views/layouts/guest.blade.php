<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!--KW-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    @include('admin.elements.alerts')
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>