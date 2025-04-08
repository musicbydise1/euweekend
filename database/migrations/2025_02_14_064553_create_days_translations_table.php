<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('day_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('day_id');
            $table->string('locale', 5); // 'en', 'ru', 'cs', и т.д.

            // Название и описание дня
            $table->string('day');
            $table->string('title');
            $table->text('description')->nullable();

            $table->timestamps();

            // Связь с days
            $table->foreign('day_id')
                ->references('id')
                ->on('days')
                ->onDelete('cascade');

            // Уникальная пара (day_id, locale), чтобы не дублировать перевод
            $table->unique(['day_id', 'locale']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_translations');
    }
};
