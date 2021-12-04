<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->sentence(rand(5, 7)));
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');

        $content = '';

        for ($i=0; $i < 5; $i++) { 
            $content .= '<p class="mb-4">' . $this->faker->sentences(rand(5, 10), true) . '</>';
        };

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999),
            'company' => $this->faker->company(),
            'location' => $this->faker->country(),
            'logo' => basename($this->faker->image(storage_path('app/public'))),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'content' => $content,
            'apply_link' => $this->faker->url(),
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];
    }
}
