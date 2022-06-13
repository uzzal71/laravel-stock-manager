<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'site_name' => 'Stock Manager',
            'mobile' => '+880 1788574569',
            'email' => 'stock@gmail.com',
            'address' => 'Uttara, Dhaka, Bangladesh',
        ];
    }
}
