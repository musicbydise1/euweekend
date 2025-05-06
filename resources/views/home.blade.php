@extends('layouts.app')

@section('title', 'Euweekend')

@section('content')
    <!-- Hero Section -->
    <section class="hero hero-home">
        <div class="hero-content">
            <h1>EXPLORE THE WORLD WITH ENGLISH</h1>
            <p>
                If you want to spend your holidays in a meaningful way, explore new country,
                broaden your outlook, and find friends from all over the world,
                then you definitely will like our proposition!
            </p>
            <div class="hero-buttons">
                <a href="#application" class="btn-primary">Send an Application</a>
                <a href="#programs" class="btn-outline">See All Programs</a>
            </div>
        </div>
    </section>

    <!-- Custom Programs Section -->
    <section class="section-programs" id="programs">
        <div class="container">
            <div class="section-title">
                <h2>Camps programs</h2>
                <p>Our school is located in JLT, a convenient location offering
                    a huge variety of food, retail, sports and entertainment</p>
            </div>
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
                        <a href="{{ route('public.programs.show', ['slug' => $program->slug]) }}"  class="">Read More</a>
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
            <div class="section-programs-btn">
                <a href="#">See All Programs</a>
            </div>
        </div>
    </section>

    <!-- About Us -->

    <section class="about-section">
        <div class="container-card">
            <div class="about-card">
                <!-- Заголовок и краткое описание -->
                <div class="about-header">
                    <h2>О Нас</h2>
                    <p>
                        EU Weekend — команда профессионалов, которые работают каждый день,
                        чтобы предоставить лучший сервис и сделать наших клиентов счастливыми.
                    </p>
                </div>

                <!-- Блок с элементами (иконка + текст) -->
                <div class="about-items">
                <!-- Элемент 1 -->
                <div class="about-item">
                    <div class="about-icon">
                        <!-- Можно вставить <img src="..." alt="icon" /> или <svg> -->
                        <span class="icon-experience">5</span>
                    </div>
                    <div class="about-text">
                        <h3>Пятилетний опыт в сфере образования</h3>
                    </div>
                </div>

                <!-- Элемент 2 -->
                <div class="about-item">
                    <div class="about-icon">
                        <img src="{{ asset('images/icons/icon-transparency.svg') }}" alt="Прозрачность">
                    </div>
                    <div class="about-text">
                        <h3>Прозрачность и честность</h3>
                    </div>
                </div>

                <!-- Элемент 3 -->
                <div class="about-item">
                    <div class="about-icon">
                        <img src="{{ asset('images/icons/icon-programs.svg') }}" alt="Программы">
                    </div>
                    <div class="about-text">
                        <h3>Разнообразие образовательных программ</h3>
                    </div>
                </div>

                <!-- Элемент 4 -->
                <div class="about-item">
                    <div class="about-icon">
                        <img src="{{ asset('images/icons/icon-online.svg') }}" alt="Онлайн">
                    </div>
                    <div class="about-text">
                        <h3>Авторские онлайн платформы</h3>
                    </div>
                </div>

                <!-- Элемент 5 -->
                <div class="about-item">
                    <div class="about-icon">
                        <img src="{{ asset('images/icons/icon-immersion.svg') }}" alt="Погружение">
                    </div>
                    <div class="about-text">
                        <h3>Полное погружение в языковую среду</h3>
                    </div>
                </div>

                <!-- Элемент 6 -->
                <div class="about-item">
                    <div class="about-icon">
                        <img src="{{ asset('images/icons/icon-support.svg') }}" alt="Поддержка">
                    </div>
                    <div class="about-text">
                        <h3>Сопровождение и поддержка</h3>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section class="test-section">
        <div class="container">
            <div class="test-section-inner">
                <!-- Левая часть: иконка + текст -->
                <div class="test-info">
                    <img src="{{ asset('images/icons/test-icon.svg') }}" alt="Test icon" class="test-icon">
                    <p class="test-text">
                        Проверь свой уровень английского, <br> пройди бесплатный тест!
                    </p>
                </div>
                <!-- Правая часть: кнопка -->
                <a href="#" class="test-btn">Пройти тест</a>
            </div>
        </div>
    </section>

    <section class="slider-section">
            <!-- Обёртка Swiper -->
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
    </section>

    <section>
        <div class="container">
            <div class="cta-section">
                <div class="cta-inner">
                    <div class="cta-text">
                        <h2>Хотите Выучить Английский?<br>Не Уверены В Выборе Курса?</h2>
                        <p>Свяжитесь с нами, и мы с радостью подберем для вас подходящий курс!</p>
                    </div>
                    <div class="cta-buttons">
                        <a href="#" class="cta-btn cta-btn-black">Send an Application</a>
                        <a href="#" class="cta-btn cta-btn-outline">Request a Call</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-choose-section">
        <div class="why-choose-inner">
            <!-- Левая колонка -->
            <div class="why-left">
                <h2>Почему Стоит Выбрать EU Weekend?</h2>
                <p>
                    Полное погружение в языковую среду (преподаватели носители языка с соответствующими сертификатами,
                    международная команда, студенты со всего мира)
                </p>
            </div>

            <!-- Правая колонка: статистика -->
            <div class="why-right">
                <div class="stats-item">
                    <h3>200+</h3>
                    <p>Всего программ</p>
                </div>
                <div class="stats-item">
                    <h3>988</h3>
                    <p>Счастливых клиентов</p>
                </div>
                <div class="stats-item">
                    <h3>98%</h3>
                    <p>Клиентов вернулось</p>
                </div>
            </div>
        </div>
    </section>


    <section class="reviews-section">
        <div class="container reviews-inner">
            <!-- Левая часть: заголовок и текст -->
            <div class="reviews-left">
                <h2>What Our Students Are Saying About Us</h2>
                <p>
                    We carry out regular teacher evaluations and our students consistently rate
                    their courses and teachers 4.8 and above.
                </p>
            </div>

            <!-- Правая часть: слайдер Swiper -->
            <div class="reviews-right">
                <!-- Один общий контейнер Swiper для всех отзывов -->
                <div class="swiper mySwiperReviews">
                    <div class="swiper-wrapper">
                        @foreach($reviews as $review)
                            @php
                                // Получаем нужный перевод:
                                $locale = app()->getLocale();
                                $translation = $review->translations->where('locale', $locale)->first();
                                // Заголовок: если перевода нет, fallback на slug
                                $title = $translation ? $translation->title : $review->slug;
                            @endphp

                                <!-- Каждый отзыв как слайд -->
                            <div class="swiper-slide review-card">
                                <div class="review-header">
                                    <img class="review-avatar"
                                         src="{{ $review->avatar ? asset('storage/' . $review->avatar) : asset('images/default_program.jpg') }}"
                                         alt="{{ $review->name }}">
                                    <div class="review-name">
                                        {{ $review->name }}, {{ $review->country }} <br /> {{ $review->age }} лет
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>
                                        {{ $title }}
                                    </p>
                                    @if($review->video_url)
                                        <a href="{{ $review->video_url }}" class="review-video-link">Watch Video</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Единая пагинация для всего слайдера -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    </section>

    <section class="reviews-section">
        <div class="container reviews-inner">
            <!-- Левая часть: заголовок и текст -->
            <div class="reviews-left">
                <h2>Certificates from
                    our partners </h2>
                <p>
                    We carry out regular teacher evaluations and our students consistently rate
                    their courses and teachers 4.8 and above.
                </p>
            </div>

            <!-- Правая часть: слайдер Swiper -->
            <div class="certificates-right">
                <!-- Заголовок блока (как на скриншоте "American University in Dubai") -->

                <!-- Обёртка слайдера -->
                <div class="swiper mySwiperReviews">
                    <!-- Внутренний контейнер слайдов -->
                    <div class="swiper-wrapper">
                        <!-- Карточка сертификата 1 -->
                        <div class="swiper-slide certificate-card">
                            <h2 class="certificates-title">American University In Dubai</h2>
                            <div class="certificate-image-wrap">
                                <img
                                    src="{{ asset('images/certificate-1.png') }}"
                                    alt="Сертификат 1"
                                    class="certificate-image"
                                >
                                <!-- Кнопка увеличения (лупа/иконка) -->
                            </div>
                            <a href="{{ asset('images/certificate-1.png') }}" class="zoom-icon" target="_blank">
                                <img src="{{ asset('images/icons/zoom-icon.svg') }}" alt="Zoom">
                            </a>
                        </div>

                        <!-- Карточка сертификата 2 -->
                        <div class="swiper-slide certificate-card">
                            <h2 class="certificates-title">American University In Dubai</h2>
                            <div class="certificate-image-wrap">
                                <img
                                    src="{{ asset('images/certificate-2.png') }}"
                                    alt="Сертификат 2"
                                    class="certificate-image"
                                >
                                <a href="{{ asset('images/certificate-2.png') }}" class="zoom-icon" target="_blank">
                                    <img src="{{ asset('images/icons/zoom-icon.svg') }}" alt="Zoom">
                                </a>
                            </div>
                        </div>
                        <!-- Добавьте столько карточек, сколько нужно -->
                    </div>

                    <!-- Пагинация для слайдера (точки) -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>



        </div>
    </section>

    <!-- Инициализация слайдера -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.mySwiperReviews', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 1,
                    },
                    480: {
                        slidesPerView: 1,
                    },
                }
            });
        });

    </script>





    <!-- Contact / Form Section -->
    <section class="contact-section">
        <div class="container contact-wrapper">
            <!-- Левая часть: градиентный блок с информацией -->
            <div class="contact-left">
                <h3>Drop Us A Line!</h3>
                <p>
                    Contact us for any queries you may have,
                    and leave the rest to us.
                </p>
                <ul class="business-hours">
                    <li>Пн - Пт: 09:00 am — 05:00 pm</li>
                    <li>Сб - Вс: Выходной</li>
                </ul>
            </div>

            <!-- Правая часть: белая карточка с формой -->
            <div class="contact-right">
                <form action="#" method="POST" class="contact-form-card">
                    @csrf
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

                    <!-- recaptcha-информация (пример) -->
                    <div class="contact-btn">
                        <p class="recaptcha-info">
                            This site is protected by reCAPTCHA and the <br>
                            Google <a href="#">Privacy Policy</a> and
                            <a href="#">Terms of Service</a> apply.
                        </p>

                        <button type="submit" class="btn-submit">Оставить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.mySwiper', {
                slidesPerView: 4,          // Сколько слайдов показывать за раз (на больших экранах)
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
