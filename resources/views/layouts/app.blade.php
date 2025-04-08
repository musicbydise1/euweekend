<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Главная')</title>
    <!-- Подключение вашего CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/programs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/education.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>
<body>

<!-- Верхняя плашка с телефоном -->
<div class="top-bar">
    <div class="container top-bar-inner">
        <div class="top-bar-text">
            Проверь свой уровень английского, пройди бесплатный тест!
        </div>
    </div>
</div>

<!-- Навигация -->
<header class="header-nav">
    <div class="container nav-inner">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Site Logo">
            </a>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="/about">About</a></li>
                <li><a href="/programs">Programms</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/education">Education</a></li>
                <li><a href="/contact">Contact Us</a></li
                <li><a href="/reviews">Reviews</a></li>
            </ul>
        </nav>

        <!-- Блок с телефоном и языковым переключателем -->
        <div class="nav-extra">
            <!-- Телефон -->
            <div class="phone-info">
                <!-- Иконку телефона можно взять в виде SVG/PNG -->
                <img src="{{ asset('images/icons/phone-icon.svg') }}" alt="Phone Icon" class="phone-icon">
                <span class="phone-number">+420 774 545 580</span>
            </div>

            <!-- Языковой переключатель -->
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

<!-- Основной контент (будет вставляться из home.blade.php) -->
<main>
    @yield('content')
</main>

<!-- Футер -->
<footer class="footer">
    <div class="container footer-top">
        <!-- Левая колонка: Логотип и контакты -->
        <div class="footer-col footer-col-left">
            <div class="footer-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Site Logo">
                </a>
            </div>
            <ul class="footer-contacts">
                <li>
                    <img src="{{ asset('images/location-icon.svg') }}" alt="Location Icon">
                    <span>Zitna 1575/49, 110 00 Prague 1</span>
                </li>
                <li>
                    <img src="{{ asset('images/location-icon.svg') }}" alt="Location Icon">
                    <span>Jumeirah Lake Towers, Dubai</span>
                </li>
                <li>
                    <img src="{{ asset('images/phone-icon.svg') }}" alt="Phone Icon">
                    <span>+420 774 545 580</span>
                </li>
            </ul>
        </div>

        <!-- Средняя колонка: Текст, форма подписки -->
        <div class="footer-col footer-col-middle">
            <h3>Be the first to know about education in the Czech Republic and promotions!</h3>
            <p class="footer-note">
                Closed promotions and special offers are available only for subscribers.
            </p>
            <form action="#" class="subscribe-form">
                <input type="email" placeholder="Your Email" required>
                <button type="submit">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <!-- Пример иконки стрелки (Bootstrap Icons, Font Awesome, и т.п.) -->
                        <path d="M5.646 15.854a.5.5 0 0 1 0-.708L10.293 10H1.5a.5.5 0 0 1 0-1h8.793L5.646.854a.5.5 0 1 1 .708-.708l5.657 5.657a.5.5 0 0 1 0 .708l-5.657 5.657a.5.5 0 0 1-.708 0z"/>
                    </svg>
                </button>
            </form>
            <p class="footer-subscribe">Subscribe to us</p>
        </div>

        <!-- Правая колонка: Меню -->
        <div class="footer-col footer-col-right">
            <ul class="footer-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Programms</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <!-- Нижняя часть футера -->
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p class="footer-copyright">
                &copy; {{ date('Y') }} EnglishWorld. All rights reserved.
            </p>
            <a href="#" class="scroll-up-btn">
                <img src="{{ asset('images/arrow-up.svg') }}" alt="Go Up">
            </a>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
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
        const langToggleBtn = document.getElementById('lang-toggle-btn');
        const langDropdown = document.getElementById('lang-dropdown');

        // По клику переключаем класс .open
        langToggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            langDropdown.classList.toggle('open');
        });

        // Если нужно закрывать меню при клике вне его
        document.addEventListener('click', (e) => {
            // Проверяем, что клик был за пределами блока .language-dropdown
            if (!langDropdown.contains(e.target) && langDropdown.classList.contains('open')) {
                langDropdown.classList.remove('open');
            }
        });
    });
</script>

</body>
</html>
