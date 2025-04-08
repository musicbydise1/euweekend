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
                    <a href="#programms" class="btn-outline">See All Programs</a>
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
    <section class="programs-section" id="programms">
        <div class="container programs-inner">
            <!-- Заголовок и подзаголовок -->
            <div class="programs-header">
                <h2>Choose The Way</h2>
                <p>We Will Open The Doors To The World Of English For You!</p>
            </div>

            <!-- Фильтры (пример, пока статично) -->
            <div class="programs-filters">
                <button class="btn-time-arrival">Время Заезда</button>
                <button class="btn-filter active">All</button>
                <button class="btn-filter">Dubai</button>
                <button class="btn-filter">Turkey</button>
                <button class="btn-filter">Georgia</button>
                <button class="btn-filter">Czech Republic</button>
            </div>

            <!-- Сетка карточек программ (динамически) -->
            <div class="programs-grid">
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
                        <div class="program-img-wrapper">
                            {{-- Предположим, у программы есть поле "image" или заглушка --}}
                            <img src="{{ $program->image ?? asset('images/default_program.jpg') }}"
                                 alt="{{ $program->slug }}">

                            {{-- Если программа премиум, показываем бейдж --}}
                            @if($program->is_premium)
                                <span class="program-badge">premium pack</span>
                            @endif

                            {{-- Кнопка Read More (ведёт на детальную страницу по slug) --}}
                            <a href="{{ route('public.programs.show', $program->slug) }}" class="program-read-more">
                                Read More
                            </a>
                        </div>
                        <div class="program-info">
                            <h3>{{ $title }}</h3>
                            @if($start && $end)
                                <span class="program-date">{{ $start }} - {{ $end }}</span>
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
@endsection
