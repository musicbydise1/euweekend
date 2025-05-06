@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Ваши отзывы</h1>
            <h2>Поделитесь своими впечатлениями о програмах EU Weekend!</h2>
            <div class="hero-buttons">
                <!-- Кнопка, по клику на которую откроется модальное окно -->
                <a href="javascript:void(0);" class="btn-primary open-modal-btn">
                    Оставить отзыв
                </a>
            </div>
        </div>
    </section>

    <!-- Модальное окно (изначально скрыто) -->
    <div class="review-modal-overlay" id="reviewModalOverlay">
        <div class="review-modal">
            <!-- Кнопка закрытия (иконка или текст) -->
            <button class="close-modal-btn" aria-label="Close modal">&times;</button>

            <div class="review-modal-inner">
                <!-- Левая часть с текстом и фоном -->
                <div class="review-modal-left">
                    <h3>Поделитесь<br>Вашими<br>Впечатлениями!</h3>
                </div>

                <!-- Правая часть с формой -->
                <div class="review-modal-right">
                    <!-- Зона для прикрепления фото -->
                    <div class="dotted-box dotted-box-photo">
                        <div class="plus-icon">+</div>
                        <span>Прикрепить фото</span>
                        <input type="file" accept="image/*" class="hidden-input" />
                    </div>

                    <!-- Поля ввода: Имя, Почта, Ваш возраст -->
                    <div class="form-row">
                        <input type="text" placeholder="Имя" />
                    </div>
                    <div class="form-row">
                        <input type="email" placeholder="Почта" />
                    </div>
                    <div class="form-row">
                        <input type="text" placeholder="Ваш возраст" />
                    </div>

                    <!-- Текстовая область отзыва -->
                    <div class="form-row">
                        <textarea placeholder="Ваш отзыв"></textarea>
                    </div>

                    <!-- Прикрепить видео -->
                    <div class="dotted-box dotted-box-video">
                        <div class="plus-icon">+</div>
                        <span>Прикрепить видео</span>
                        <input type="file" accept="video/*" class="hidden-input" />
                    </div>

                    <!-- Кнопка отправки отзыва -->
                    <div class="submit-row">
                        <button type="button" class="btn-submit">
                            Оставить отзыв
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="testimonials-section">
        <div class="testimonials-inner">
            <div class="testimonials-grid">
                <!-- Карточка 1 (Инона) -->
                <div class="testimonial-card">
                    <div class="photo">
                        <img src="{{ asset('images/inona.jpg') }}" alt="Инона">
                    </div>
                    <div class="name-age">
                        <h4 class="name">Инона</h4>
                        <span class="age">16 лет</span>
                    </div>
                    <p>
                        Учащиеся размещаются в студенческой резиденции The Mynid.
                        Это современное, новое студенческое общежитие со всеми удобствами.
                    </p>
                </div>

                <!-- Карточка 2 (Ира) -->
                <div class="testimonial-card">
                    <div class="name-age">
                        <h4 class="name">Ира</h4>
                        <span class="age">16 лет</span>
                    </div>
                    <p>
                        Добрый день, ведь что лагерь в резиденции, я не могу забыть
                        белого зимы и дорожки. Теперь я живу на два города: в Праге и
                        в Украине. Без поездки это было бы невозможно.
                    </p>
                </div>

                <!-- Карточка 3 (Дамир) -->
                <div class="testimonial-card">
                    <div class="name-age">
                        <h4 class="name">Дамир</h4>
                        <span class="age">16 лет</span>
                    </div>
                    <p>
                        Я очень рад был побывать в Праге! Мы много путешествовали,
                        и я познакомился со многими ребятами из других стран.
                        Мы вместе ходили на экскурсии и даже играли в футбол по вечерам.
                        Большое спасибо за поддержку! И я спасибо за всё.
                    </p>
                </div>

                <!-- Карточка 4 (Наргиза) -->
                <div class="testimonial-card">
                    <div class="name-age">
                        <h4 class="name">Наргиза</h4>
                        <span class="age">16 лет</span>
                    </div>
                    <p>
                        Всем привет! Меня зовут Наргиза, и мне 16 лет.
                        Я была в дубайском лагере этим летом, и это был невероятный опыт.
                        Не могу совершенно сказать словами, насколько там было круто.
                        Потрясающие экскурсии, классные преподаватели, и я нашла много новых друзей.
                        Спасибо!
                    </p>
                </div>

                <!-- Карточка 5 (Назар, с иконкой видео) -->
                <div class="testimonial-card">
                    <div class="photo video-wrapper">
                        <img src="{{ asset('images/nazar.jpg') }}" alt="Назар">
                        <!-- Иконка Play по центру -->
                        <div class="play-icon">
                            <img src="{{ asset('images/play-icon.svg') }}" alt="Play">
                        </div>
                    </div>
                    <div class="name-age">
                        <h4 class="name">Назар</h4>
                        <span class="age">16 лет</span>
                    </div>
                    <p>
                        Жду поездки радостно и с азартом! Спасибо! Даже планирую
                        снова приехать, когда закончу школу.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="stats-inner">
            <div class="stats-number">
                <h2>3500+</h2>
                <p>Участников программ</p>
            </div>
            <div class="stats-description">
                <p>“Уже более 3500 детей из разных стран мира, полезно отдыхают с нами!”</p>
            </div>
        </div>
    </section>

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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openModalBtn = document.querySelector(".open-modal-btn");
            const closeModalBtn = document.querySelector(".close-modal-btn");
            const reviewModalOverlay = document.getElementById("reviewModalOverlay");

            // Открыть модалку
            openModalBtn.addEventListener("click", function() {
                reviewModalOverlay.classList.add("show");
            });

            // Закрыть модалку
            closeModalBtn.addEventListener("click", function() {
                reviewModalOverlay.classList.remove("show");
            });

            // Закрыть при клике на подложку
            reviewModalOverlay.addEventListener("click", function(e) {
                if (e.target === reviewModalOverlay) {
                    reviewModalOverlay.classList.remove("show");
                }
            });
        });
    </script>



@endsection
