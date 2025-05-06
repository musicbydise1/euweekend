@extends('layouts.detail')

@section('title', $program->title_ru ?? 'Программа')

@section('content')
    <!-- Hero / Верхний блок с градиентным фоном -->
    <section class="hero-program">
        <div class="hero-program-inner">
            <!-- Левая часть: текст и кнопки -->
            <div class="hero-program-content">
                <p class="program-label">Программа</p>
                <h1 class="program-title">
                    {{ $program->title_ru }}
                </h1>
                <div class="hero-text-second">
                    <h2 class="program-subtitle">Знакомься, Отдыхай, Учи Английский Язык!</h2>
                    <p class="program-description">
                        Программа языкового лагеря создана специально для подростков и молодежи в возрасте от 12 до 25 лет.
                    </p>
                    <div class="program-actions">
                        <a href="#" class="btn-apply">Оставить заявку</a>
                        <a href="#" class="btn-select">Выбрать Заезд</a>
                    </div>
                </div>

            </div>

            <!-- Правая часть: картинка -->
            <div class="hero-program-img">
                <!-- Замените путь к картинке, если нужно -->
                <img
                    src="{{ asset('storage/' . $program->image) }}"
                    alt="{{ $program->slug }}"
                    style="width: 100%; border-radius: 8px;"
                >
                <div class="program-card-info">
                    @if($program->is_premium)
                        <span class="program-badge">premium pack</span>
                    @endif
                        <span class="program-badge">standart pack</span>
                    <div class="program-price-wrap">
                        <span class="program-price">{{ $program->price ?? '—' }} €</span>
                        <span class="program-days">{{ $program->days ?? '—' }} Дней</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Основной блок с подробной информацией о программе -->
    @php
        // Пример подготовки данных:
        $startDate = optional($program->start_time)->translatedFormat('j F Y') ?? '—';
        $endDate   = optional($program->end_time)->translatedFormat('j F Y') ?? '—';
        $hours     = $program->duration_hours ?? '—';       // Количество часов
        $stock     = $program->stock ?? '—';       // Свободных мест
    @endphp

    <section class="program-info">
        <div class="container">
            <div class="program-brief-box">
                <!-- Начало -->
                <div class="brief-item">
                    <div class="brief-item-header">
                        <!-- Иконка (Rocket) -->
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="#4D52E3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M2.5 10.5l9 1.5-1.5 9m3.5-5.5l8-8a2.828 2.828 0 00-4-4l-8 8-1.5 4.5 4.5 1.5z"></path>
                            <path d="M12 8.5l3 3"></path>
                        </svg>
                        <span>Начало</span>
                    </div>
                    <div class="brief-item-value">
                        {{ $startDate }}
                    </div>
                </div>

                <!-- Конец -->
                <div class="brief-item">
                    <div class="brief-item-header">
                        <!-- Иконка (Calendar) -->
                        <svg width="20" height="20" fill="none" stroke="#4D52E3"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <span>Конец</span>
                    </div>
                    <div class="brief-item-value">
                        {{ $endDate }}
                    </div>
                </div>

                <!-- Количество часов -->
                <div class="brief-item">
                    <div class="brief-item-header">
                        <!-- Иконка (Clock) -->
                        <svg width="20" height="20" fill="none" stroke="#4D52E3"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>Количество часов</span>
                    </div>
                    <div class="brief-item-value">
                        {{ $hours }}
                    </div>
                </div>

                <!-- Свободных мест -->
                <div class="brief-item">
                    <div class="brief-item-header">
                        <!-- Иконка (Users) -->
                        <svg width="20" height="20" fill="none" stroke="#4D52E3"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M4 19v-2a4 4 0 0 1 3-3.87"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span>Свободных мест</span>
                    </div>
                    <div class="brief-item-value">
                        {{ $stock }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="days-program-section">
        <div class="container">
            <!-- Заголовок секции -->
            <h2 class="days-program-title">Программа Каникул</h2>

            <!-- Блок с нумерацией дней (верхняя навигация) -->
            <div class="days-nav">
                <span class="days-nav-label">День:</span>
                <ul class="days-list">
                    <!-- Каждый элемент имеет data-day для идентификации -->
                    <li data-day="1" class="active">1</li>
                    <li data-day="2">2</li>
                    <li data-day="3">3</li>
                    <li data-day="4">4</li>
                    <li data-day="5">5</li>
                    <li data-day="6">6</li>
                    <li data-day="7">7</li>
                    <li data-day="8">8</li>
                    <li data-day="9">9</li>
                    <li data-day="10">10</li>
                    <li data-day="11">11</li>
                    <li data-day="12">12</li>
                    <li data-day="13">13</li>
                    <li data-day="14">14</li>
                </ul>
            </div>

            <!-- Контейнер для основных карточек по дням (главный блок) -->
            <div class="day-main-cards">
                <!-- День 1 (по умолчанию активен) -->
                <div class="day-main-card active" data-day="1">
                    <h3 class="day-title">День 1</h3>
                    <p class="day-subtitle">Приезд, заселение</p>
                    <p class="day-description">
                        Первый день будет полон организационных моментов, но не переживайте — вас встретят в аэропорту и доставят до отеля.
                    </p>
                    <div class="day-photo">
                        <img src="{{ asset('images/day1-photo.jpg') }}" alt="Приезд, заселение">
                    </div>
                </div>

                <!-- День 2 -->
                <div class="day-main-card" data-day="2">
                    <h3 class="day-title">День 2</h3>
                    <p class="day-subtitle">Экскурсия по городу</p>
                    <p class="day-description">
                        Второй день наполнен незабываемыми экскурсиями по основным достопримечательностям города.
                    </p>
                    <div class="day-photo">
                        <img src="{{ asset('images/day2-photo.jpg') }}" alt="Экскурсия по городу">
                    </div>
                </div>

                <!-- День 3 -->
                <div class="day-main-card" data-day="3">
                    <h3 class="day-title">День 3</h3>
                    <p class="day-subtitle">Мастер-класс и отдых</p>
                    <p class="day-description">
                        На третий день запланирован мастер-класс по местной кухне и культурным традициям, а также время для отдыха.
                    </p>
                    <div class="day-photo">
                        <img src="{{ asset('images/day3-photo.jpg') }}" alt="Мастер-класс и отдых">
                    </div>
                </div>

                <!-- Добавьте остальные карточки, если необходимо -->
            </div>

            <!-- Нижний блок – мини-карточки дней (динамический, синхронизируется с выбранным днем) -->
            <div class="days-cards-list">
                <!-- Пример мини-карточки для дня 1 -->
                <div class="day-card active" data-day="1">
                    <h4 class="day-card-title">День 1</h4>
                    <img src="{{ asset('images/day1-thumb.jpg') }}" alt="День 1">
                    <p class="day-card-desc">Приезд и знакомство</p>
                </div>
                <!-- Пример мини-карточки для дня 2 -->
                <div class="day-card" data-day="2">
                    <h4 class="day-card-title">День 2</h4>
                    <img src="{{ asset('images/day2-thumb.jpg') }}" alt="День 2">
                    <p class="day-card-desc">Экскурсия</p>
                </div>
                <!-- Пример мини-карточки для дня 3 -->
                <div class="day-card" data-day="3">
                    <h4 class="day-card-title">День 3</h4>
                    <img src="{{ asset('images/day3-thumb.jpg') }}" alt="День 3">
                    <p class="day-card-desc">Мастер-класс</p>
                </div>
                <!-- Добавьте и другие карточки по аналогии -->
            </div>
        </div>
    </section>


    <section class="learning-dubai-section">
        <div class="container">
            <!-- Заголовок и подзаголовок -->
            <h2 class="learning-dubai-title">Обучение В Дубай</h2>
            <p class="learning-dubai-subtext">
                Дубай — один из самых безопасных городов мира с очень низким уровнем
                преступности и высоким уровнем жизни.
            </p>

            <!-- Белый блок с карточками -->
            <div class="learning-dubai-box">
                <!-- Карточка 1: Программа -->
                <div class="learning-card">
                    <!-- Иконка (пример: программный код / условия) -->
                    <div class="learning-card-icon">
                        <!-- Можно заменить на любой SVG или <img src="..." /> -->
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none"
                             stroke="#4D52E3" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="2" y1="10" x2="22" y2="10"></line>
                        </svg>
                    </div>
                    <div class="learning-card-content">
                        <h3>Программа языкового лагеря</h3>
                        <p>
                            Программа языкового лагеря создана специально для подростков
                            и молодых людей в возрасте от 12 до 25 лет.
                            Здесь вас ждут занятия и структурированные программы обучения,
                            знакомство с культурой и дополнительными активностями. Учащиеся
                            будут окружены носителями языка, что ускоряет процесс
                            освоения английского.
                        </p>
                    </div>
                </div>

                <!-- Карточка 2: Преподаватели -->
                <div class="learning-card">
                    <!-- Иконка (пример: ABC/teacher) -->
                    <div class="learning-card-icon">
                        <!-- Можно заменить на любой SVG или <img src="..." /> -->
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none"
                             stroke="#4D52E3" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 4h14a2 2 0 0 1 2 2v3a3 3 0 0 1-3 3H6.5"></path>
                            <path d="M12 13v7"></path>
                            <path d="M12 20h7"></path>
                            <circle cx="8.5" cy="14.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <div class="learning-card-content">
                        <h3>Преподаватели — носители английского языка</h3>
                        <p>
                            Наши преподаватели подтверждают соответствующие дипломы и сертификаты.
                            Уроки ведут носители языка, обладающие многолетним опытом.
                            Обучаясь у них, студенты получают возможность практиковаться
                            в живой, современной речи, а также получать международно
                            признанный сертификат по окончании обучения.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="accommodation-section">
        <div class="container">
            <!-- Заголовок -->
            <h2 class="accommodation-title">Проживание</h2>

            <!-- Верхний блок с описанием слева и видео справа -->
            <div class="accommodation-main-grid">
                <!-- Левая колонка: Карточка с текстом -->
                <div class="accommodation-card card-big">
                    <h3>Учащиеся размещаются в студенческой резиденции The Myriad.</h3>
                    <p>
                        Это современное, новое студенческое общежитие с комфортными
                        и просторными комнатами со всеми удобствами. На территории
                        резиденции есть всё необходимое: общие зоны для отдыха,
                        кафе, спортивные помещения, а также круглосуточная охрана.
                    </p>

                    <!-- Пример иконок (3-4 штуки), можно заменить на реальные -->
                    <div class="accommodation-icons">
                        <div class="icon-item">
                            <!-- Иконка (пример) -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="4" ry="4"/>
                                <path d="M7 2v4"></path>
                                <path d="M17 2v4"></path>
                            </svg>
                            <span>Общая кухня</span>
                        </div>
                        <div class="icon-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M8 21v-2a4 4 0 0 1 3-3.87"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <span>Лаунж-зоны</span>
                        </div>
                        <div class="icon-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Z"></path>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                            <span>24/7 охрана</span>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка: Видео -->
                <div class="accommodation-video">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                        encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>

            <!-- Нижняя часть: 2 карточки -->
            <div class="accommodation-cards-grid">
                <!-- Карточка 1 -->
                <div class="accommodation-card card-small">
                    <h3>Безопасность и вдохновляющая атмосфера</h3>
                    <p>
                        На его территории оборудованы зоны для отдыха и общения.
                        Студент может пользоваться тренажёрным залом, библиотекой,
                        кафе и другими преимуществами современного кампуса.
                    </p>
                    <div class="accommodation-icons">
                        <div class="icon-item">
                            <!-- Иконка (пример) -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                            <span>Комфорт</span>
                        </div>
                        <div class="icon-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M4 19v-2a4 4 0 0 1 3-3.87"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <span>Сообщество</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="accommodation-card card-small">
                    <h3>Проживание в лагере исключительно в двухместных номерах</h3>
                    <p>
                        Каждая комната оборудована всем необходимым для обучения
                        и отдыха. Студенты могут пользоваться совместной зоной
                        для приготовления еды и отдыха. В номерах — две кровати,
                        зона хранения, рабочее место и санузел.
                    </p>
                    <div class="accommodation-icons">
                        <div class="icon-item">
                            <!-- Иконка (пример) -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="12" rx="2" ry="2"></rect>
                                <path d="M2 10h20M13 10v10"></path>
                            </svg>
                            <span>Удобные комнаты</span>
                        </div>
                        <div class="icon-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M3 7l9 6 9-6"></path>
                                <path d="M21 7l-9 6-9-6v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2Z"></path>
                            </svg>
                            <span>Рабочая зона</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container cta-gradient-inner">
        <div class="cta-gradient-text">
            <h2>Каникулы, Которые Изменят Твою Жизнь</h2>
            <p>
                Свяжитесь с нами, и мы с радостью подберем <br /> для вас подходящий курс!
            </p>
        </div>
        <a href="#" class="cta-gradient-btn">Оставить заявку</a>
    </div>


    <section class="program-summary-section">
        <div class="program-summary-card">
            <!-- Левая часть: Изображение -->
            <div class="program-summary-image">
                <img src="{{ asset('images/dubai-hero.png') }}" alt="Dubai">
            </div>

            <!-- Правая часть: Текстовое содержание -->
            <div class="program-summary-content">
                <p class="program-label">Программа</p>
                <h3 class="program-title">Дубай</h3>

                <!-- Даты с иконками -->
                <div class="program-dates">
                    <!-- Начало -->
                    <div class="date-item">
                        <!-- Иконка (Rocket) -->
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                             stroke="#4D52E3" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M2.5 10.5l9 1.5-1.5 9m3.5-5.5l8-8a2.828 2.828 0 00-4-4l-8 8-1.5 4.5 4.5 1.5z"></path>
                            <path d="M12 8.5l3 3"></path>
                        </svg>
                        <span>Начало</span>
                        <strong>1 июля 2022</strong>
                    </div>

                    <!-- Конец -->
                    <div class="date-item">
                        <!-- Иконка (Calendar) -->
                        <svg width="18" height="18" fill="none" stroke="#4D52E3"
                             stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <span>Конец</span>
                        <strong>15 июля 2022</strong>
                    </div>
                </div>

                <!-- Кнопка скачать -->
                <a href="#" class="btn-download">
                    Скачать Программу (PDF)
                    <!-- Иконка загрузки -->
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <section class="more-programs-section">
        <div class="container">
            <h2 class="more-programs-title">Также Вас Могут Заинтересовать</h2>

            <div class="programs-cards-wrap">
                <!-- Карточка 1 -->
                <div class="program-card">
                    <div class="program-card-img">
                        <img src="{{ asset('images/prague-summer.jpg') }}" alt="Prague Summer Camp">
                        <!-- Кнопка Read More (только на первой карточке) -->
                        <a href="#" class="read-more-btn">Read More</a>
                    </div>
                    <div class="program-card-content">
                        <h3>15-day Summer Camp program in Prague</h3>
                        <p class="program-dates">18 July - 01 August</p>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="program-card">
                    <div class="program-card-img">
                        <img src="{{ asset('images/dubai-summer.jpg') }}" alt="Dubai Program">
                    </div>
                    <div class="program-card-content">
                        <h3>7 Days in Dubai to increase your language level</h3>
                        <p class="program-dates">18 July - 01 August</p>
                    </div>
                </div>

                <!-- Карточка 3 -->
                <div class="program-card">
                    <div class="program-card-img">
                        <img src="{{ asset('images/turkey-summer.jpg') }}" alt="Turkey Program">
                    </div>
                    <div class="program-card-content">
                        <h3>Summer 8 days in Turkey to increase your language level</h3>
                        <p class="program-dates">18 July - 01 August</p>
                    </div>
                </div>
            </div>

            <!-- Кнопка внизу -->
            <div class="more-programs-btn">
                <a href="#" class="btn-view-all">See All Programms</a>
            </div>
        </div>
    </section>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dayListItems = document.querySelectorAll('.days-list li');
            const mainCards = document.querySelectorAll('.day-main-card');
            const miniCards = document.querySelectorAll('.days-cards-list .day-card');

            dayListItems.forEach(item => {
                item.addEventListener('click', function() {
                    const selectedDay = this.getAttribute('data-day');
                    if (this.classList.contains('active')) return;

                    // Обновляем верхнюю навигацию
                    document.querySelector('.days-list li.active').classList.remove('active');
                    this.classList.add('active');

                    // Обновление основной карточки
                    const currentMain = document.querySelector('.day-main-card.active');
                    const nextMain = document.querySelector(`.day-main-card[data-day="${selectedDay}"]`);

                    if (currentMain) {
                        currentMain.classList.add('animate-fade-out');
                        currentMain.addEventListener('animationend', function handler() {
                            currentMain.classList.remove('active', 'animate-fade-out');
                            currentMain.removeEventListener('animationend', handler);
                            nextMain.classList.add('active', 'animate-fade-in');
                            nextMain.addEventListener('animationend', function handler2() {
                                nextMain.classList.remove('animate-fade-in');
                                nextMain.removeEventListener('animationend', handler2);
                            });
                        });
                    } else {
                        nextMain.classList.add('active', 'animate-fade-in');
                        nextMain.addEventListener('animationend', function handler() {
                            nextMain.classList.remove('animate-fade-in');
                            nextMain.removeEventListener('animationend', handler);
                        });
                    }

                    // Обновление мини-карточек
                    const currentMini = document.querySelector('.days-cards-list .day-card.active');
                    const nextMini = document.querySelector(`.days-cards-list .day-card[data-day="${selectedDay}"]`);
                    if (currentMini && nextMini) {
                        currentMini.classList.add('animate-fade-out');
                        currentMini.addEventListener('animationend', function handler() {
                            currentMini.classList.remove('active', 'animate-fade-out');
                            currentMini.removeEventListener('animationend', handler);
                            nextMini.classList.add('active', 'animate-fade-in');
                            nextMini.addEventListener('animationend', function handler2() {
                                nextMini.classList.remove('animate-fade-in');
                                nextMini.removeEventListener('animationend', handler2);
                            });
                        });
                    } else if (!currentMini && nextMini) {
                        nextMini.classList.add('active', 'animate-fade-in');
                        nextMini.addEventListener('animationend', function handler() {
                            nextMini.classList.remove('animate-fade-in');
                            nextMini.removeEventListener('animationend', handler);
                        });
                    }
                });
            });
        });
    </script>


@endsection
