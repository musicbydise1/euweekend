@php
    $startYear = 2022;
    $endYear = 2035;
    $months = [];
    // Генерируем (Год-месяц)
    for($y = $startYear; $y <= $endYear; $y++){
        for($m = 1; $m <= 12; $m++){
            // Создаём Carbon
            $dateObj = \Carbon\Carbon::create($y, $m, 1);
            $months[] = $dateObj->translatedFormat('F Y'); // "Декабрь 2022" (зависит от локали)
        }
    }
@endphp

<div class="time-arrival-dropdown">
    <!-- Кнопка, по клику на которую открываем/закрываем dropdown -->
    <button class="btn-time-arrival" id="timeArrivalBtn">Время Заезда</button>

    <!-- Сам dropdown (скрыт по умолчанию) -->
    <div class="time-arrival-menu" id="timeArrivalMenu">
        <div class="time-arrival-tabs">
            <!-- Кнопки табов: "Календарь" / "Гибкие даты" -->
            <button class="time-tab active" data-tab="calendar">Календарь</button>
            <button class="time-tab" data-tab="flexible">Гибкие даты</button>
        </div>

        <!-- Блок "Календарь" -->
        <div class="time-arrival-content" id="calendarTab" style="display: block;">
            <div class="calendar-view">
                <div class="calendar-header">
                    <button class="prev-month" id="prevMonthBtn">&lt;</button>
                    <span class="calendar-month-year" id="calendarMonthYear"></span>
                    <button class="next-month" id="nextMonthBtn">&gt;</button>
                </div>
                <div class="calendar-days">

                    <div style="display: grid; grid-template-columns: repeat(7, 1fr);">
                    <!-- Шапка дней недели -->
                    <div class="day-name">S</div>
                    <div class="day-name">M</div>
                    <div class="day-name">T</div>
                    <div class="day-name">W</div>
                    <div class="day-name">T</div>
                    <div class="day-name">F</div>
                    <div class="day-name">S</div>
                    </div>

                    <!-- Здесь JS будет вставлять <div class="day">... -->
                    <div id="calendarDaysContainer" class="days-container"></div>
                </div>
            </div>
        </div>

        <!-- Блок "Гибкие даты" -->
        <div class="time-arrival-content" id="flexibleTab" style="display: none;">
            <div class="flexible-view">
                <!-- Пример: сезоны -->
                <button class="flex-season">Зима</button>
                <button class="flex-season">Весна</button>
                <button class="flex-season">Лето</button>
                <button class="flex-season">Осень</button>

                <div class="months-list">
                    @foreach($months as $m)
                        <button class="flex-month">{{ $m }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Кнопки "Отменить" / "Готово" -->
        <div class="time-arrival-actions">
            <button id="timeArrivalCancel" class="btn-cancel">Отменить</button>
            <button id="timeArrivalDone" class="btn-done">Готово</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('timeArrivalBtn');
        const menu = document.getElementById('timeArrivalMenu');
        const cancelBtn = document.getElementById('timeArrivalCancel');
        const doneBtn = document.getElementById('timeArrivalDone');

        // Табы
        const tabButtons = document.querySelectorAll('.time-tab');
        const calendarTab = document.getElementById('calendarTab');
        const flexibleTab = document.getElementById('flexibleTab');

        tabButtons.forEach(btnTab => {
            btnTab.addEventListener('click', () => {
                tabButtons.forEach(b => b.classList.remove('active'));
                btnTab.classList.add('active');

                if (btnTab.dataset.tab === 'calendar') {
                    calendarTab.style.display = 'block';
                    flexibleTab.style.display = 'none';
                } else {
                    calendarTab.style.display = 'none';
                    flexibleTab.style.display = 'block';
                }
            });
        });

        // Открыть/закрыть меню
        btn.addEventListener('click', () => {
            menu.style.display = (!menu.style.display || menu.style.display === 'none') ? 'block' : 'none';
        });

        // "Отменить"
        cancelBtn.addEventListener('click', () => {
            menu.style.display = 'none';
        });

        // Две переменные для диапазона
        let startDate = null; // YYYY-MM-DD
        let endDate = null;   // YYYY-MM-DD

        // "Готово"
        doneBtn.addEventListener('click', () => {
            // Если выбрано startDate и endDate
            if (startDate && endDate) {
                // Пример: отправляем GET ?start_date=...&end_date=...
                const baseUrl = window.location.origin + window.location.pathname;
                const params = new URLSearchParams(window.location.search);
                params.set('start_date', startDate);
                params.set('end_date', endDate);
                window.location.href = baseUrl + '?' + params.toString();
            } else {
                // Если неполный выбор, просто закрываем
                menu.style.display = 'none';
            }
        });

        // ======== ЛОГИКА КАЛЕНДАРЯ (ДИАПАЗОН) ======== //
        const calendarDaysContainer = document.getElementById('calendarDaysContainer');
        const calendarMonthYear = document.getElementById('calendarMonthYear');
        const prevMonthBtn = document.getElementById('prevMonthBtn');
        const nextMonthBtn = document.getElementById('nextMonthBtn');

        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        function renderCalendar(year, month) {
            // Очищаем контейнер
            calendarDaysContainer.innerHTML = '';

            // Устанавливаем заголовок (Месяц Год)
            const dateObj = new Date(year, month, 1);
            const monthName = dateObj.toLocaleString('default', { month: 'long' });
            const yearNum = dateObj.getFullYear();
            calendarMonthYear.textContent = `${monthName} ${yearNum}`;

            // День недели первого числа (0=вс,1=пн,...)
            const firstDayIndex = new Date(year, month, 1).getDay();
            // Кол-во дней в месяце
            const daysInMonth = new Date(year, month+1, 0).getDate();

            // Выводим "пустые" ячейки до первого дня
            for (let i=0; i<firstDayIndex; i++) {
                const emptyDiv = document.createElement('div');
                emptyDiv.classList.add('day', 'disabled');
                emptyDiv.textContent = '';
                calendarDaysContainer.appendChild(emptyDiv);
            }

            // Функция-помощник для сравнения дат (YYYY-MM-DD)
            function parseDate(str) {
                // "2023-05-15" => Date
                const [yyyy, mm, dd] = str.split('-');
                return new Date(+yyyy, +mm - 1, +dd);
            }
            function isBetween(dateStr, startStr, endStr) {
                const d = parseDate(dateStr);
                const s = parseDate(startStr);
                const e = parseDate(endStr);
                return d >= s && d <= e;
            }

            // Выводим дни месяца
            for (let d=1; d <= daysInMonth; d++) {
                const dayDiv = document.createElement('div');
                dayDiv.classList.add('day');
                dayDiv.textContent = d;

                // Формируем ISO-дату (YYYY-MM-DD)
                const dayDate = new Date(year, month, d);
                const isoString = dayDate.toISOString().split('T')[0];

                // Определяем, нужно ли выделять
                if (startDate && endDate) {
                    // Если isoString между startDate и endDate
                    if (isBetween(isoString, startDate, endDate)) {
                        dayDiv.classList.add('in-range'); // фон для диапазона
                    }
                    if (isoString === startDate) {
                        dayDiv.classList.add('start-day');
                    }
                    if (isoString === endDate) {
                        dayDiv.classList.add('end-day');
                    }
                } else if (startDate && !endDate) {
                    // Если выбрана только startDate
                    if (isoString === startDate) {
                        dayDiv.classList.add('start-day');
                    }
                }

                // Клик по дню
                dayDiv.addEventListener('click', () => {
                    // Если ничего не выбрано
                    if (!startDate && !endDate) {
                        startDate = isoString;
                        endDate = null;
                    }
                    // Если есть startDate, но нет endDate
                    else if (startDate && !endDate) {
                        // Сравним isoString со startDate
                        if (isoString < startDate) {
                            // Если клик раньше startDate, поменяем местами
                            endDate = startDate;
                            startDate = isoString;
                        } else {
                            endDate = isoString;
                        }
                    }
                    // Если уже есть startDate и endDate
                    else {
                        // Сбросить и установить startDate = isoString
                        startDate = isoString;
                        endDate = null;
                    }

                    // Перерисовываем календарь
                    renderCalendar(currentYear, currentMonth);
                });

                calendarDaysContainer.appendChild(dayDiv);
            }
        }

        // Кнопки prev/next
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentYear, currentMonth);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentYear, currentMonth);
        });

        // Первый рендер
        renderCalendar(currentYear, currentMonth);
    });
</script>
