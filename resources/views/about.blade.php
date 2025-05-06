@extends('layouts.app')

@section('content')
    <section class="hero hero-about">
        <div class="hero-content">
            <h1>A little about us</h1>
            <p>
                All our teachers are native English speakers, who are qualified
                and experienced in teaching and in helping you learn English
                using digital classroom technology.
            </p>
            <div class="hero-buttons">
                <a href="#application" class="btn-primary">Send an Application</a>
                <a href="#programs" class="btn-outline">See All Programs</a>
            </div>
        </div>
    </section>

    <section class="achievements-section">
        <div class="achievements-inner">
            <!-- Левая часть: текст и кнопка -->
            <div class="achievements-left">
                <h2>Our Achievements</h2>
                <p>
                    Every year more than 40,000 foreign students from all over the world study here
                    and most do on a full scholarship in the Czech language. Is it too good to be true?
                </p>
                <p>
                    Successful admission to Czech universities requires knowledge of the Czech language
                    at the B2-C1 level, as well as specialized preparation for entrance exams.
                </p>
                <a href="#" class="achievements-btn">See All Programs</a>
            </div>

            <!-- Правая часть: видео (миниатюра) -->
            <div class="achievements-right">
                <div class="video-wrapper">
                    <!-- Изображение-миниатюра (может быть стоп-кадр из видео) -->
                    <img src="{{ asset('images/achievements-video-thumb.jpg') }}" alt="Video thumbnail" class="video-thumb">
                    <!-- Иконка Play по центру -->
                    <div class="play-icon">
                        <img src="{{ asset('images/play-icon.svg') }}" alt="Play Icon">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="container team-inner">
            <!-- Левая колонка: заголовок и подзаголовок -->
            <div class="team-left">
                <h2>EU Weekend - Это Лучшая Команда Профессионалов</h2>
                <p>
                    которые работают каждый день, чтобы предоставить лучший сервис и
                    сделать наших клиентов счастливыми. Каждый представитель команды знает,
                    как найти подход к любому клиенту.
                </p>
            </div>

            <!-- Средняя колонка: две перекрывающиеся картинки -->
            <div class="team-main">
                <div class="team-center">
                    <div class="img-wrapper img-top">
                        <img src="{{ asset('images/team1.jpeg') }}" alt="Team photo 1">
                    </div>
                    <div class="img-wrapper img-bottom">
                        <img src="{{ asset('images/team2.jpeg') }}" alt="Team photo 2">
                    </div>
                </div>

                <!-- Правая колонка: текст + кнопка -->
                <div class="team-right">
                    <p>
                        Мы динамично-развивающийся молодой коллектив, но уже
                        с достаточным опытом в сфере образовательных каникул.
                        Наши клиенты и партнеры разбросаны по всему миру.
                        Мы говорим на русском, украинском, казахском, английском, чешском,
                        немецком, французском языках и всегда учимся чему-то новому.
                        Именно поэтому мы создаем каникулярные программы, которые дают провести время отдыха с пользой.
                    </p>
                    <p>
                        Локации, культурные и учебные программы, преподавателей и резиденции для
                        проживания всегда проходят нашу проверку. Мы лично посещаем все места и только
                        после этого можем рекомендовать их нашим студентам.

                    </p>
                    <p>
                        Мы оказываем вам любую дополнительную услугу, которая может
                        вам понадобиться, например, консультирование по проживанию
                        и страхованию.
                    </p>
                    <a href="#" class="team-btn">Get In Touch</a>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section">
        <div class="container gallery-inner">
            <!-- Блок с текстом (заголовок + описание) -->
            <div class="gallery-text">
                <h2>Gallery</h2>
                <p>
                    With students from over 68 nationalities each year,
                    you’ll have to use your English language skills to socialise
                    and make long-lasting friendships.
                </p>
            </div>

            <!-- Слайдер Swiper -->
            <div class="swiper mySwiper">
                <!-- Контейнер слайдов -->
                <div class="swiper-wrapper">
                    <!-- Слайд 1 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide1.jpeg') }}" alt="Photo 1" />
                    </div>
                    <!-- Слайд 2 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide2.jpeg') }}" alt="Photo 2" />
                    </div>
                    <!-- Слайд 3 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide3.jpeg') }}" alt="Photo 3" />
                    </div>
                    <!-- Слайд 4 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide4.jpeg') }}" alt="Photo 4" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide5.jpeg') }}" alt="Photo 4" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/slide6.jpeg') }}" alt="Photo 4" />
                    </div>
                    <!-- Добавьте больше слайдов по необходимости -->
                </div>

                <!-- Пагинация (точки) -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="container cta-gradient-inner">
            <div class="cta-gradient-text">
                <h2>Каникулы, Которые Изменят Твою Жизнь</h2>
                <p>
                    Свяжитесь с нами, и мы с радостью подберем <br /> для вас подходящий курс!
                </p>
            </div>
            <a href="#" class="cta-gradient-btn">Оставить заявку</a>
        </div>
    </section>

    <!-- Скрипт инициализации Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.mySwiper', {
                slidesPerView: 2,          // Сколько слайдов показывать за раз (на больших экранах)
                spaceBetween: 32,          // Отступ между слайдами (px)
                loop: true,                // Зациклить прокрутку (опционально)
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,       // Можно кликать по точкам пагинации
                },
                // Адаптивные настройки
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    480: {
                        slidesPerView: 1,
                    }
                }
            });
        });
    </script>

@endsection
