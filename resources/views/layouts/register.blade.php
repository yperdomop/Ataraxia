<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
    @stack('css')

    <!-- Scripts -->
    {{-- <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}" defer></script> --}}
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-poppins antialiased bg-light">
    <x-jet-banner />

    <!-- Page Content -->
    <main class="container fondoimg" @stack('image')>
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

</body>

</html>
