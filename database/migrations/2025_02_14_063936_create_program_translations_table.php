<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('program_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->string('locale', 5); // 'en', 'ru', 'cs' и т.д.

            $table->string('title');      // Название программы
            $table->text('description')->nullable(); // Полное описание

            $table->timestamps();

            // Связь с таблицей programs
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');

            // Уникальная пара (program_id, locale)
            $table->unique(['program_id', 'locale']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_translations');
    }
};
