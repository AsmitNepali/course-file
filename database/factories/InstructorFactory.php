<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->paragraph(),
            'phone' => $this->faker->phoneNumber(),
            'profile_photo_path' => $this->faker->imageUrl(),
            'description' => $this->faker->text(200),
            'address_line_1' => $this->faker->streetAddress(),
            'address_line_2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip_code' => $this->faker->postcode(),
            'salary' => $this->faker->randomFloat(2, 30000, 100000), // Random salary between 30,000 and 100,000
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
