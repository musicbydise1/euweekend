<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/program-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <title>@yield('title', 'Program Detail')</title>
    <!-- Подключение стилей и скриптов -->
</head>
<body>
{{-- Хэдер специфичный для детальной страницы --}}
<div class="top-bar">
    <div class="container top-bar-inner">
        <div class="top-bar-text">
            Проверь свой уровень английского, пройди бесплатный тест!
        </div>
    </div>
</div>

<header class="header-nav detail">
    <div class="container nav-inner">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-blue.svg') }}" alt="Site Logo" class="default-logo">
                <img src="{{ asset('images/logo-blue.svg') }}" alt="Site Logo" class="fixed-logo">
            </a>
        </div>

        <nav class="menu">
            <ul>
                <li class="{{ Request::is('about') ? 'active' : '' }}">
                    <a href="/about">About</a>
                </li>
                <li class="{{ Request::is('programs') ? 'active' : '' }}">
                    <a href="/programs">Programs</a>
                </li>
                <li class="{{ Request::is('blog') ? 'active' : '' }}">
                    <a href="/blog">Blog</a>
                </li>
                <li class="{{ Request::is('education') ? 'active' : '' }}">
                    <a href="/education">Education</a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}">
                    <a href="/contact">Contact Us</a>
                </li>
                <li class="{{ Request::is('reviews') ? 'active' : '' }}">
                    <a href="/reviews">Reviews</a>
                </li>
            </ul>
        </nav>


        <!-- Блок с телефоном и языковым переключателем -->
        <div class="nav-extra">
            <div class="phone-info">
                <img src="{{ asset('images/icons/phone-icon-blue.svg') }}" alt="Phone Icon" class="phone-icon default-logo">
                <img src="{{ asset('images/icons/phone-icon-blue.svg') }}" alt="Phone Icon" class="phone-icon fixed-logo">
                <span class="phone-number">+420 774 545 580</span>
            </div>
            <div class="language-dropdown" id="lang-dropdown">
                <button class="lang-toggle" id="lang-toggle-btn">
                    En
                    <span class="arrow-down">&#9662;</span>
                </button>
                <ul class="lang-menu">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Ru</a></li>
                    <li><a href="#">Cs</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main class="detail-content">
    @yield('content')
</main>

<footer class="footer">
    <div class="container footer-top">
        <div class="footer-col footer-col-left">
            <div class="footer-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Site Logo">
                </a>
            </div>
            <ul class="footer-contacts">
                <li>
                    <img src="{{ asset('images/icons/location-icon-orange.svg') }}" alt="Location Icon">
                    <span>Zitna 1575/49, 110 00 Prague 1</span>
                </li>
                <li>
                    <img src="{{ asset('images/icons/location-icon-orange.svg') }}" alt="Location Icon">
                    <span>Jumeirah Lake Towers, Dubai</span>
                </li>
                <li>
                    <img src="{{ asset('images/icons/phone-icon-orange.svg') }}" alt="Phone Icon">
                    <span>+420 774 545 580</span>
                </li>
            </ul>
        </div>
        <div class="footer-col footer-col-middle">
            <h3>Be the first to know about education in the Czech Republic and promotions!</h3>
            <p class="footer-note">
                Closed promotions and special offers are available only for subscribers.
            </p>
            <form action="#" class="subscribe-form">
                <input type="email" placeholder="Your Email" required>
                <button type="submit">
                    <img src="{{ asset('images/icons/arrow-right.svg') }}" alt="Arrow right Icon">
                </button>
            </form>
            <div class="inst-icons">
                <img src="{{ asset('images/icons/instagram-icon.svg') }}" alt="Instagram Icon">
                <p class="footer-subscribe">Subscribe to us</p>
            </div>
        </div>
        <div class="footer-col footer-col-right">
            <ul class="footer-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Programs</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p class="footer-copyright">
                &copy; {{ date('Y') }} Euweekend. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Скролл вверх по нажатию на кнопку
        const scrollBtn = document.querySelector('.scroll-up-btn');
        if (scrollBtn) {
            scrollBtn.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Языковой переключатель
        const langToggleBtn = document.getElementById('lang-toggle-btn');
        const langDropdown = document.getElementById('lang-dropdown');

        langToggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            langDropdown.classList.toggle('open');
        });

        document.addEventListener('click', (e) => {
            if (!langDropdown.contains(e.target) && langDropdown.classList.contains('open')) {
                langDropdown.classList.remove('open');
            }
        });
    });
</script>
<script>
    // Скрипт для изменения позиционирования хедера при прокрутке
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('.header-nav');
        const topBar = document.querySelector('.top-bar');
        const topBarHeight = topBar.offsetHeight;

        window.addEventListener('scroll', function() {
            if (window.scrollY > topBarHeight) {
                header.classList.add('fixed-header');
            } else {
                header.classList.remove('fixed-header');
            }
        });
    });
</script>
</body>
</html>
