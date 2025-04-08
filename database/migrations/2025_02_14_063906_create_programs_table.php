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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();  // Уникальный slug
            // Если нужно привязать к категории, раскомментируйте:
            $table->unsignedBigInteger('program_category_id')->nullable();
            $table->foreign('program_category_id')
                ->references('id')
                ->on('program_categories')
                ->onDelete('set null');

            // Пример других полей:
            $table->boolean('is_premium')->default(false);
            $table->integer('price')->nullable();
            $table->string('days')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->integer('duration_hours')->nullable();
            $table->integer('stock')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
