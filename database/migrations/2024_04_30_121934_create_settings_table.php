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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('default_check_in_hours');
            $table->text('default_check_out_hours');
            $table->text('company_email_address');
            $table->text('company_email_address_2')->nullable();
            $table->text('company_phone_number');
            $table->text('company_phone_number_2')->nullable();
            $table->text('company_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
