<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BlogCategory::class;
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),
            'slug'=>str_replace(" ","-",$this->faker->sentence()),
            'is_active'=>1,
        ];
    }
}
