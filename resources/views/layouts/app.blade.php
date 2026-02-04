<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LifeGuard+') }} - @yield('title', 'Healing Beyond Boundaries')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'Shifa provides AI-powered healthcare services and devices for Bangladesh\'s most underserved populations. Revolutionary medical technology made in Bangladesh.')">
    <meta name="keywords" content="@yield('keywords', 'healthcare, AI, medical devices, Bangladesh, rural healthcare, telehealth, emergency services')">
    <meta name="author" content="Shifa Healthcare">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Shifa - Healing Beyond Boundaries')">
    <meta property="og:description" content="@yield('og_description', 'AI-powered healthcare services and devices for Bangladesh\'s most underserved populations')">
    <meta property="og:image" content="@yield('og_image', asset('images/shifa-og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Shifa - Healing Beyond Boundaries')">
    <meta name="twitter:description" content="@yield('twitter_description', 'AI-powered healthcare services and devices for Bangladesh\'s most underserved populations')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/shifa-twitter-image.jpg'))">

    <!-- Styles -->
    @vite(['resources/css/app.css'])

    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" as="style">
    <link rel="preload" href="{{ asset('images/hero-bg.jpg') }}" as="image">

    <!-- Google Maps API (will be loaded dynamically) -->
    <script>
        window.googleMapsApiKey = '{{ env("GOOGLE_MAPS_API_KEY", "YOUR_GOOGLE_MAPS_API_KEY_HERE") }}';
    </script>

    <!-- Additional Head Content -->
    @stack('head')

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-inter antialiased bg-white text-gray-900 overflow-x-hidden">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded-md z-50">
        Skip to main content
    </a>

    <!-- Header -->
    @include('components.header')

    <!-- Navigation -->
    @include('components.nav')

    <!-- Main Content -->
    <main id="main-content" class="relative">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Back to Top Button -->
    <div id="back-to-top"
         class="fixed bottom-8 right-8 z-40 opacity-0 transition-all duration-300">
        <button onclick="window.ShifaHealthcare.scrollToTop()"
                class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 group">
            <svg class="w-6 h-6 transform group-hover:-translate-y-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>
    </div>

    <!-- Loading Overlay -->
    <div id="loading-overlay"
         class="fixed inset-0 bg-gradient-to-br from-blue-50 to-green-50 z-50 flex items-center justify-center hidden">
        <div class="text-center space-y-4">
            <div class="relative">
                <div class="animate-spin rounded-full h-16 w-16 border-4 border-blue-200 border-t-blue-600 mx-auto"></div>
                <div class="absolute inset-0 rounded-full border-4 border-transparent border-r-green-600 animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
            </div>
            <div class="space-y-2">
                <p class="text-lg font-semibold text-gray-800">Shifa Healthcare</p>
                <p class="text-sm text-gray-600">Loading your healthcare experience...</p>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Main Application Script -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Additional Scripts -->
    @stack('scripts')

    <!-- Performance monitoring -->
    <script>
        // Basic performance monitoring
        window.addEventListener('load', () => {
            if ('performance' in window) {
                const loadTime = performance.now();
                console.log('Shifa Healthcare - Page loaded in:', Math.round(loadTime) + 'ms');
            }
        });
    </script>
</body>
</html>
