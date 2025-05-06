@extends('layouts.app')

@section('content')
    <!-- Hero Section (оставляем как было) -->
    <section class="hero hero-programs">
        <div class="hero-content-container">
            <div class="hero-content">
                <h1>Check out <br /> our Programs</h1>
                <p>
                    You will not only enjoy the beautiful views, but
                    also "pump up" the level of a foreign language
                    with native teachers.
                </p>
                <div class="hero-buttons">
                    <a href="#application" class="btn-primary">Send an Application</a>
                    <a href="#programs" class="btn-outline">See All Programs</a>
                </div>
            </div>
            <div class="hero-img">
                <img src="{{ asset('images/programs-bg-1.gif') }}" alt="">
                <img src="{{ asset('images/programs-bg-2.gif') }}" alt="">
                <img src="{{ asset('images/programs-bg-3.gif') }}" alt="">
                <img src="{{ asset('images/programs-bg-4.gif') }}" alt="">
            </div>
        </div>
    </section>

    <!-- Секция с программами -->
    <section class="programs-section" id="programs">
        <div class="container programs-inner">
            <!-- Заголовок и подзаголовок -->
            <div class="programs-header">
                <h2>Choose The Way</h2>
                <p>We Will Open The Doors To The World Of English For You!</p>
            </div>

            <!-- Фильтры (пример, пока статично) -->
            <div class="programs-filters">
                @include('partials.time-arrival-dropdown')
                <a href="{{ route('public.programs.index') }}"
                   class="btn-filter {{ !$categorySlug ? 'active' : '' }}">
                    All
                </a>
                @foreach($categories as $cat)
                    @php
                        $isActive = ($categorySlug == $cat->slug);
                    @endphp
                    @php
                        $locale = app()->getLocale();
                        $trans = $cat->translations->where('locale', $locale)->first();
                        $title = $trans ? $trans->title : $cat->slug; // fallback на slug, если перевода нет
                    @endphp

                    <a href="{{ route('public.programs.index', ['category' => $cat->slug]) }}"
                       class="btn-filter {{ $isActive ? 'active' : '' }}">
                        {{ $title }}
                    </a>
                @endforeach
            </div>

            <!-- Сетка карточек программ (динамически) -->
            <div class="programs-cards">
                @foreach($programs as $program)
                    @php
                        // Если используете мультиязычность, получаем нужный перевод:
                        $locale = app()->getLocale(); // или 'ru' / 'en' и т.д.
                        $translation = $program->translations->where('locale', $locale)->first();

                        // Подготовим заголовок (если нет перевода, fallback на slug)
                        $title = $translation ? $translation->title : $program->slug;

                        // Даты, если заданы
                        $start = $program->start_time ? $program->start_time->format('d M') : null;
                        $end = $program->end_time ? $program->end_time->format('d M') : null;
                    @endphp
                    <div class="program-card">
                        <!-- Изображение -->
                        <div class="program-card-img">
                            <img src="{{ $program->image ? asset('storage/' . $program->image) : asset('images/default_program.jpg') }}" alt="{{ $program->slug }}">
                        </div>

                        @if($program->is_premium)
                            <span class="program-badge">premium pack</span>
                        @endif

                        <!-- Кнопка, появляющаяся по центру при ховере -->
                        <div class="read-more-btn">
                            <a href="#" class="">Read More</a>
                        </div>

                        <!-- Контент (заголовок, дата и т.д.) -->
                        <div class="program-card-content">
                            <h3>{{ $title }}</h3>
                            @if($start && $end)
                                <span class="card-date">{{ $start }} - {{ $end }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Кнопка «Show More» -->
            <div class="programs-show-more">
                <button class="btn-show-more">Show More</button>
            </div>
        </div>
    </section>

    <!-- Contact / Form Section (как было) -->
    <section class="contact-section" id="application">
        <div class="container contact-wrapper">
            <!-- Левая часть: градиентный блок с информацией -->
            <div class="contact-left">
                <h3>Drop Us A Line!</h3>
                <p>
                    Contact us for any queries you may have, <br>
                    and leave the rest to us.
                </p>
                <ul class="business-hours">
                    <li>Пн - Пт: 09:00 am — 05:00 pm</li>
                    <li>Сб - Вс: Выходной</li>
                </ul>
            </div>

            <!-- Правая часть: форма -->
            <div class="contact-right">
                <form action="#" method="POST" class="contact-form-card">
                    @csrf
                    <h3>Свяжитесь с нами</h3>

                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="country">Страна</label>
                        <input
                            type="text"
                            id="country"
                            name="country"
                        />
                    </div>

                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                        ></textarea>
                    </div>

                    <p class="recaptcha-info">
                        This site is protected by reCAPTCHA and the <br>
                        Google <a href="#">Privacy Policy</a> and
                        <a href="#">Terms of Service</a> apply.
                    </p>

                    <button type="submit" class="btn-submit">Оставить заявку</button>
                </form>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container faq-container">
            <h2 class="faq-title">Frequently Asked Question</h2>

            <!-- FAQ Item #1 (открыт по умолчанию) -->
            <div class="faq-item open">
                <div class="faq-question">
                    <!-- Иконка -->
                    <span class="faq-icon"></span>
                    <!-- Текст вопроса -->
                    <span class="faq-question-text">
                    How do I add shot change markers to the video file I am working with?
                </span>
                </div>
                <div class="faq-answer" style="display: block;">
                    Yes, you may connect your available dictionaries or obtain additional free ones
                    from LibreOffice, OpenOffice or Mozilla sites and put the <code>.dic</code>
                    and <code>.aff</code> files in <strong>Dict</strong> subfolder of the application.
                </div>
            </div>
            <hr />

            <!-- FAQ Item #2 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon"></span>
                    <span class="faq-question-text">
                    What is the limit of colors and transparency I can use in my styles?
                </span>
                </div>
                <div class="faq-answer">
                    In most cases, you can use any valid CSS color format (HEX, RGB, RGBA, etc.).
                    Transparency is supported by using the alpha channel (e.g. RGBA).
                </div>
            </div>
            <hr />

            <!-- FAQ Item #3 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon"></span>
                    <span class="faq-question-text">
                    My video file and my subtitle file have different frame rates. Can I work like that?
                </span>
                </div>
                <div class="faq-answer">
                    Yes, you can. The software will attempt to sync subtitles automatically,
                    but you can adjust timings if needed.
                </div>
            </div>
            <hr />

            <!-- FAQ Item #4 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon"></span>
                    <span class="faq-question-text">
                    Are there limitations of languages I can create titles for?
                </span>
                </div>
                <div class="faq-answer">
                    There are no strict limitations, as long as you have the correct language packs or dictionaries installed.
                </div>
            </div>
            <hr />

            <!-- FAQ Item #5 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon"></span>
                    <span class="faq-question-text">
                    Can I use dictionaries in other languages? Can I add new dictionaries to the default ones?
                </span>
                </div>
                <div class="faq-answer">
                    Absolutely. You can install new dictionaries by copying the <code>.dic</code>
                    and <code>.aff</code> files into the <strong>Dict</strong> folder, or
                    configure the app to load them from other paths.
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Находим все .faq-item
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const icon = item.querySelector('.faq-icon');
                const answer = item.querySelector('.faq-answer');

                // Первоначальная логика: если item имеет класс .open, значит он развернут
                if (item.classList.contains('open')) {
                    icon.textContent = '-';
                    answer.style.display = 'block';
                } else {
                    icon.textContent = '+';
                    answer.style.display = 'none';
                }

                // При клике переключаем состояние
                question.addEventListener('click', () => {
                    // Если уже открыт, закрываем
                    if (item.classList.contains('open')) {
                        item.classList.remove('open');
                        icon.textContent = '+';
                        answer.style.display = 'none';
                    } else {
                        // Сначала закрываем все остальные
                        faqItems.forEach(i => {
                            i.classList.remove('open');
                            i.querySelector('.faq-icon').textContent = '+';
                            i.querySelector('.faq-answer').style.display = 'none';
                        });
                        // Открываем текущий
                        item.classList.add('open');
                        icon.textContent = '-';
                        answer.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection
