<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_category_id');
            $table->string('locale', 5); // Например: 'en', 'ru', 'cs'
            $table->string('title');     // Название категории
            $table->text('description')->nullable(); // Описание категории

            $table->timestamps();

            // Связь с основной таблицей
            $table->foreign('program_category_id')
                ->references('id')
                ->on('program_categories')
                ->onDelete('cascade');

            // Уникальный индекс, чтобы нельзя было вставить дубли для одной категории и локали
            $table->unique(['program_category_id', 'locale']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_category_translations');
    }
};
