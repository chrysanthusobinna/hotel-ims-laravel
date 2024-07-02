<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('email_address');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('home_address');
            $table->string('main_role');
            $table->integer('access_booking_record_statistics')->default(0);
            $table->integer('access_sales_record_statistics')->default(0);
            $table->integer('access_laundry_record_statistics')->default(0);
            $table->integer('access_paystack')->default(0);
            $table->integer('access_communication')->default(0);
            $table->integer('access_website_management')->default(0);
            $table->timestamp('last_online_time')->default(now());
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
