<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic SEO -->
    <title>@yield('title', 'Talisha Software — Agentic AI & Enterprise Engineering')</title>
    <meta name="description" content="@yield('description', 'World-class Agentic AI solutions, Web3 blockchain development, and Industrial IoT transformations. Powering forward-thinking enterprises with cinematic precision.')">
    <meta name="keywords" content="@yield('keywords', 'Agentic AI, Software Development, Web3, IoT, Blockchain, Enterprise Technology India')">
    <meta name="author" content="Talisha Software">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Talisha Software')">
    <meta property="og:description" content="@yield('description', 'Agentic AI Solutions & Enterprise Digital Transformation')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">

    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/favicon-512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Fonts — Human-Crafted Modern Tech Typography (Plus Jakarta Sans & Outfit) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Outfit:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>

    @include('components.navigation')

    <!-- Flash Alert Messages -->
    @if(session('success'))
        <div class="flash-alert flash-success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="flash-alert flash-error">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="{{ asset('js/three-hero.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
