@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Ваши отзывы</h1>
            <h2>Поделитесь своими впечатлениями о програмах EU Weekend!</h2>
            <div class="hero-buttons">
                <a href="#application" class="btn-primary">Оставить отзыв</a>
            </div>
        </div>
    </section>

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

    <section class="stats-section">
        <div class="container stats-inner">
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


@endsection
