@extends('layouts.app')
{{-- Или другой ваш макет --}}

@section('title', $article->title)

@section('content')
    <section class="blog-article-section">
        <div class="container">
            <h1>{{ $article->title }}</h1>

            <!-- Автор, дата публикации -->
            <p class="article-meta">
                <span class="author">{{ $article->author }}</span>
                <span class="date">{{ $article->published_at->format('d.m.Y') }}</span>
            </p>

            <!-- Контент статьи -->
            <div class="article-content">
                {!! $article->content !!}
            </div>

            <!-- Пример кнопки "Назад к блогу" -->
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Вернуться в блог</a>
        </div>
    </section>
@endsection
