<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
  
        return [
            'email_address' => 'chrysanthusobinna@gmail.com',
            'password' => static::$password ??= Hash::make('12345678'),
            'first_name' => 'Chrysanthus',
            'last_name' => 'Obinna',
            'phone_number' => fake()->unique()->phoneNumber(),
            'home_address' => fake()->address,
            'main_role' => 'general_admin',
            'access_booking_record_statistics' => 0,
            'access_sales_record_statistics' => 0,
            'access_laundry_record_statistics' => 0,
            'access_paystack' => 0,
            'access_communication' => 0,
            'access_website_management' => 0,
            'remember_token' => Str::random(10),

        ];

 
    }

 
}
