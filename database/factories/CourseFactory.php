<?php

namespace Database\Factories;

use App\Enums\CourseStatus;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $title = $this->faker->unique()->name,
            'slug' => Str::slug($title),
            'course_category_id' => CourseCategory::factory(),
            'instructor_id' => Instructor::factory(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'status' => CourseStatus::Published,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
