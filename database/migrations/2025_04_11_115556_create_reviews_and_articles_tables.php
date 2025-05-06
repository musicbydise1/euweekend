<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsAndArticlesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * Создаёт таблицы:
     * 1) reviews
     * 2) review_translations
     * 3) articles
     * 4) article_translations
     *
     * Вы можете адаптировать структуру под конкретные нужды.
     */
    public function up()
    {
        // 1) Основная таблица отзывов
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // Если отзыв привязан к пользователю (опционально)
            // Если не нужно, можно убрать.
            $table->foreignId('user_id')
                ->nullable()            // если не обязательно указывать пользователя
                ->constrained()
                ->onDelete('cascade');

            // Имя автора отзыва
            $table->string('name');

            // Почта
            $table->string('email');

            // Страна (если необязательно, сделаем nullable)
            $table->string('country')->nullable();

            // Возраст
            $table->unsignedInteger('age')->nullable();

            // Ссылка на фото (например, avatar.jpg), можно сделать text, если нужны длинные пути
            $table->string('avatar')->nullable();

            // Ссылка на видео (YouTube и т.д.)
            $table->string('video_url')->nullable();


            // Если хотите хранить текст отзыва и на дефолтном языке здесь
            // $table->text('content')->nullable();

            $table->timestamps();
        });

        // 2) Таблица переводов отзывов
        Schema::create('review_translations', function (Blueprint $table) {
            $table->id();

            // Внешний ключ на reviews
            $table->unsignedBigInteger('review_id');

            // Например, 'en', 'ru', 'de'
            $table->string('locale', 10)->index();

            // Переводимые поля (только контент)
            $table->text('content')->nullable();

            // Уникальная пара (review_id, locale)
            $table->unique(['review_id', 'locale']);

            $table->timestamps();

            // Связь
            $table
                ->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade');
        });

        // 3) Основная таблица статей
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // Если нужно поле slug
            $table->string('slug')->unique();
            // Основной контент на "дефолтном" языке (по необходимости)
            $table->timestamps();
        });

        // 4) Таблица переводов статей
        Schema::create('article_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->string('locale', 10)->index();

            // Переводимые поля
            $table->string('title')->nullable();
            $table->text('content')->nullable();

            $table->unique(['article_id', 'locale']);

            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('article_translations');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('review_translations');
        Schema::dropIfExists('reviews');
    }
}
