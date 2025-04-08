@extends('layouts.app')
{{-- Или другой ваш макет --}}

@section('title', $program->title)

@section('content')
    <section class="program-detail-section">
        <div class="container">
            <h1>{{ $program->title }}</h1>

            <!-- Даты, цена и т.д. -->
            <p>
                <strong>Период:</strong>
                {{ $program->start_date->format('d.m.Y') }} —
                {{ $program->end_date->format('d.m.Y') }}
            </p>

            <p>
                <strong>Цена:</strong>
                {{ $program->price }} USD
            </p>

            <!-- Описание -->
            <div class="program-description">
                {!! nl2br(e($program->description)) !!}
            </div>

            <!-- Пример кнопки или ссылки на "Забронировать" -->
            <a href="#" class="btn btn-primary">Подать заявку</a>
        </div>
    </section>
@endsection
