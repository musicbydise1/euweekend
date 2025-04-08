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
        Schema::create('program_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // Для SEO/URL
            // Можно добавить любые поля, которые не зависят от языка
            // например: $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_categories');
    }
};
