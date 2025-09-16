<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', \App\Helpers\SettingsHelper::siteTitle())</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('description', \App\Helpers\SettingsHelper::siteDescription())">
    <meta name="keywords" content="@yield('keywords', \App\Helpers\SettingsHelper::siteKeywords())">
    
    <!-- Favicon -->
    @if(\App\Helpers\SettingsHelper::siteFavicon())
        <link rel="icon" type="image/x-icon" href="{{ \App\Helpers\SettingsHelper::siteFavicon() }}">
    @endif
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');
        @font-face {
            font-family: 'Bongo Lekhon';
            src: url('/font-files/Bongo-Lekhon.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        html {
            font-size: 1.2rem;
        }
        body {
            font-family: 'Bongo Lekhon', 'Hind Siliguri', sans-serif;
        }
        .btn-primary {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }
        .font-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        .font-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .bengali-text {
            font-family: 'Bongo Lekhon', 'Hind Siliguri', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <!-- Scripts -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.font-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
    
    @stack('scripts')
</body>
</html>
