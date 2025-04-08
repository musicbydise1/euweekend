@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Get in touch
                to find out more!</h1>
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

    <section class="departments-section">
        <div class="container">
            <h2 class="departments-title">Наши Отделения</h2>

            <div class="departments-grid">
                <!-- Левая колонка -->
                <div class="department-card">
                    <div class="department-header">
                        <span>Чехия</span>
                        <span class="arrow">▼</span>
                    </div>
                    <!-- Если скрыто, уберите/закомментируйте этот блок -->
                    <div class="department-content">
                        <!-- Контент, если нужно раскрывать -->
                        <p>Email: czech@company.com</p>
                        <p>Нажмите на стрелку, чтобы скрыть</p>
                    </div>
                </div>

                <div class="department-card">
                    <div class="department-header">
                        <span>Украина</span>
                        <span class="arrow">▼</span>
                    </div>
                    <!-- Скрытый контент (по умолчанию пусто) -->
                </div>

                <!-- Пример "развёрнутой" карточки: Грузия -->
                <div class="department-card expanded">
                    <div class="department-header">
                        <span>Грузия</span>
                        <span class="arrow">▼</span>
                    </div>
                    <div class="department-content">
                        <p>Email: kunduz@esdubai.com</p>
                        <p>Напишите нам и мы с Вами обязательно свяжемся!</p>
                    </div>
                </div>

                <!-- Правая колонка -->
                <div class="department-card">
                    <div class="department-header">
                        <span>Россия</span>
                        <span class="arrow">▼</span>
                    </div>
                </div>

                <div class="department-card">
                    <div class="department-header">
                        <span>Казахстан</span>
                        <span class="arrow">▼</span>
                    </div>
                </div>

                <!-- Пример "развёрнутой" карточки: Дубай -->
                <div class="department-card expanded">
                    <div class="department-header">
                        <span>Дубай</span>
                        <span class="arrow">▼</span>
                    </div>
                    <div class="department-content">
                        <p>Kunduz Kadirova</p>
                        <p>WhatsApp: +971 54 433 0157</p>
                        <p>Mobile: +971 54 433 0157</p>
                        <p>Email: kunduz@esdubai.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container map-inner">
            <!-- Левая колонка с часами и адресами -->
            <div class="map-info-box">
                <h3>Opening hours:</h3>
                <p>
                    Пн - Пт: 09:00 am — 05:00 pm <br>
                    Сб - Вс: Выходной
                </p>
                <br>
                <h4>Prague Office:</h4>
                <p>Žitná 49, 110 00 Nové Město</p>
                <br>
                <h4>Dubai Office:</h4>
                <p>Žitná 49, 110 00 Nové Město</p>
            </div>

            <!-- Правая колонка: карта -->
            <div class="map-embed">
                <!-- Пример Iframe из Google Maps Embed -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2657.644358575376!2d14.426342415454545!3d50.07806237942664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94ec3c1e0e5f%3A0x18bbcbfb32b655b5!2s%C5%BDitn%C3%A1%2049%2C%20110%2000%20Nov%C3%A9%20M%C4%9Bsto%2C%20Czechia!5e0!3m2!1sen!2s!4v1692104247709!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>
@endsection
