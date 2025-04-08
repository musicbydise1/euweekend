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
                <a href="#programms" class="btn-outline">See All Programms</a>
            </div>
        </div>
    </section>

    <section class="achievements-section">
        <div class="container achievements-inner">
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
                <a href="#" class="achievements-btn">See All Programms</a>
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
            <div class="team-center">
                <div class="img-wrapper img-top">
                    <img src="{{ asset('images/team1.jpg') }}" alt="Team photo 1">
                </div>
                <div class="img-wrapper img-bottom">
                    <img src="{{ asset('images/team2.jpg') }}" alt="Team photo 2">
                </div>
            </div>

            <!-- Правая колонка: текст + кнопка -->
            <div class="team-right">
                <p>
                    Мы динамично-развивающийся молодой коллектив, но уже
                    с достаточным опытом в сфере образовательных кампаний. Наша
                    главная цель — помочь каждому студенту раскрыть свой потенциал
                    и добиться успеха.
                </p>
                <p>
                    Локации, культурные и учебные программы, преподаватели,
                    персональный подход — всё это создаёт благоприятную атмосферу
                    для обучения и обмена опытом.
                </p>
                <p>
                    Мы оказываем вам любую дополнительную услугу, которая может
                    вам понадобиться, например, консультирование по проживанию
                    и страхованию.
                </p>
                <a href="#" class="team-btn">Get In Touch</a>
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
            <div class="swiper mySwiperGallery">
                <div class="swiper-wrapper">
                    <!-- Слайд 1 -->
                    <div class="swiper-slide gallery-card">
                        <img src="{{ asset('images/gallery1.jpg') }}" alt="Gallery Image 1">
                    </div>
                    <!-- Слайд 2 -->
                    <div class="swiper-slide gallery-card">
                        <img src="{{ asset('images/gallery2.jpg') }}" alt="Gallery Image 2">
                    </div>
                    <!-- Слайд 3 -->
                    <div class="swiper-slide gallery-card">
                        <img src="{{ asset('images/gallery3.jpg') }}" alt="Gallery Image 3">
                    </div>
                    <!-- Добавьте больше слайдов при необходимости -->
                </div>
                <!-- Пагинация (точки) -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Скрипт инициализации Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.mySwiperGallery', {
                slidesPerView: 3,         // Сколько карточек показывать на больших экранах
                spaceBetween: 20,         // Отступ между карточками
                loop: true,               // Зациклить прокрутку (опционально)
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3,
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


    <section class="cta-gradient-section">
        <div class="container cta-gradient-inner">
            <div class="cta-gradient-text">
                <h2>Каникулы, Которые Изменят Твою Жизнь</h2>
                <p>
                    Свяжитесь с нами, и мы с радостью подберем для вас подходящий курс!
                </p>
            </div>
            <a href="#" class="cta-gradient-btn">Оставить заявку</a>
        </div>
    </section>
@endsection
