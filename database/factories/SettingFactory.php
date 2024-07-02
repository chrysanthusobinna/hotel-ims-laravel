<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'default_check_in_hours' => '10:00 AM',
            'default_check_out_hours' => '12:00 PM',
            'company_email_address' => 'info@chrys-hotel.com',
            'company_phone_number' => '+44 7765 093130',
            'company_address' => '123 Main St, Manchester, UK',
        ];
    }
}
