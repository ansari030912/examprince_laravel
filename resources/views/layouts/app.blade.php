<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta_title', 'ExamPrince - Your Exam Guide')</title>

    <meta name="description" content="@yield('meta_title', 'Examprince provides real and valid IT certification exam questions.')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    @hasSection('meta_referrer')
        <meta name="referrer" content="@yield('meta_referrer')">
    @endif
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('meta_canonical', url()->current())">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.umd.js" defer></script>

</head>

<body>

    @include('components.nav-timer')
    @include('layouts.header')

    <main>
        @yield('main-content')
    </main>
    @include('layouts.footer')
</body>

</html>
