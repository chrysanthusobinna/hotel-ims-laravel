<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('weekday_price');
            $table->text('weekend_price');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('room_categories');
    }
};
