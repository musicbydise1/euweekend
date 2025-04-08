<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();

            // Связь с программой
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');

            // Допустим, храним порядковый номер дня
            $table->unsignedInteger('day_number')->nullable();

            // Или, если хотите дату, можно добавить:
            // $table->date('day_date')->nullable();

            // Другие поля, не зависящие от языка (например, is_active, и т.д.)

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('days');
    }
};
