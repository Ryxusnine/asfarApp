<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence,
            'question_type' => 'options',
            'options' => [
                5 => 'Sangat Suka',
                4 => 'Suka',
                3 => 'Netral',
                2 => 'Tidak Suka',
                1 => 'Sangat Tidak Suka',
            ],
        ];
    }
}
