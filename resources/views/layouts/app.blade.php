<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ShoeStore - Step Into Style')</title>
    <meta name="description" content="@yield('description', 'Discover our latest collection of premium sneakers — comfort, design, and performance in every pair.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col min-h-screen bg-white text-gray-900">

    @include('partials.header')
    @include('partials.flash')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
