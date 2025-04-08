@extends('layouts.app')

@section('content')
    <section class="hero hero-home">
        <div class="hero-content">
            <h1>Стань студентом вуза в Дубае</h1>
            <div class="hero-buttons">
                <a href="#application" class="btn-primary">Получить консультацию</a>
            </div>
        </div>
    </section>

    <section class="study-dubai-section">
        <div class="container study-dubai-inner">
            <!-- Левая часть: заголовок и текст -->
            <div class="study-dubai-left">
                <h2>Почему Стоит Учиться В Дубае</h2>
                <p>
                    Every year more than 40,000 foreign students from all over the world study here
                    and most do on a full scholarship in the Czech language. Is it too good to be true?
                </p>
                <p>
                    Successful admission to Czech universities requires knowledge of the Czech language
                    at the B2-C1 level, as well as specialized preparation for entrance exams.
                </p>
            </div>

            <!-- Правая часть: видео-миниатюра -->
            <div class="study-dubai-right">
                <div class="video-wrapper">
                    <img src="{{ asset('images/video-thumb.jpg') }}" alt="Video thumbnail" class="video-thumb">
                    <div class="play-icon">
                        <img src="{{ asset('images/play-icon.svg') }}" alt="Play icon">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="steps-section">
        <div class="container steps-inner">
            <!-- Сетка карточек (2 колонки, 3 строки) -->
            <div class="steps-grid">
                <!-- Карточка 1 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Этап 1</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Учащиеся размещаются в студенческой резиденции The Mynid.</p>
                        <p>Это современное, новое студенческое общежитие со всеми удобствами.</p>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Этап 3</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Проживание в лагере исключено в двухместном номере Mynid.</p>
                        <p>Это современное, новое студенческое общежитие со всеми удобствами.</p>
                    </div>
                </div>

                <!-- Карточка 3 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Подписание договора</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Договор будет вам выслан на подтверждение.</p>
                    </div>
                </div>

                <!-- Карточка 4 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Этап 5</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Подготовка документов на визу.</p>
                        <p>Консультации по сбору пакета документов и сопровождение.</p>
                    </div>
                </div>

                <!-- Карточка 5 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Этап 2</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Безопасность и вдохновляющая атмосфера — главные особенности резиденции.</p>
                    </div>
                </div>

                <!-- Карточка 6 -->
                <div class="step-card">
                    <div class="step-card-header">
                        <h3>Этап 6</h3>
                    </div>
                    <div class="step-card-body">
                        <p>Учащиеся размещаются в исключительной резиденции The Mynid.</p>
                    </div>
                </div>
            </div>

            <!-- Кнопка "Оставить заявку" -->
            <div class="steps-cta">
                <a href="#" class="steps-btn">Оставить заявку</a>
            </div>
        </div>
    </section>

    <section class="university-section">
        <div class="container university-inner">
            <h2 class="university-title">Список университетов с которыми мы сотрудничаем</h2>

            <!-- Обёртка для прокрутки (если таблица большая) -->
            <div class="university-table-wrapper">
                <table class="university-table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Бакалавр</th>
                        <th>Магистр</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>American University in Dubai</td>
                        <td>19,000 USD</td>
                        <td>19,000 USD</td>
                    </tr>
                    <tr>
                        <td>University of Wollongong in Dubai</td>
                        <td>20,000 USD</td>
                        <td>20,000 USD</td>
                    </tr>
                    <tr>
                        <td>American University in the Emirates</td>
                        <td>12,500 USD</td>
                        <td>12,500 USD</td>
                    </tr>
                    <tr>
                        <td>University in Dubai</td>
                        <td>20,000 USD</td>
                        <td>19,000 USD</td>
                    </tr>
                    <tr>
                        <td>American University in the Emirates</td>
                        <td>12,500 USD</td>
                        <td>12,500 USD</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Блок "Не нашли свой университет?" -->
            <div class="university-contact">
                <h3>Не нашли свой университет?</h3>
                <p>Не проблема, свяжитесь с нами и мы с радостью вам поможем!</p>
            </div>
        </div>
    </section>

    <section class="contact-section">
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

            <!-- Правая часть: белая карточка с формой -->
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

                    <!-- recaptcha-информация (пример) -->
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
