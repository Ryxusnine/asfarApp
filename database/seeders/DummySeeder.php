<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        Questionnaire::factory()->count(10)->create()->each(function ($questionnaire) {
            Question::factory()->count(random_int(5, 25))
                ->create(['questionnaire_id' => $questionnaire->id])
                ->each(function ($question) use ($questionnaire) {
                    Answer::factory()->count(50)->create([
                        'question_id' => $question->id,
                        'questionnaire_id' => $questionnaire->id,
                        'user_id' => User::inRandomOrder()->first()->id,
                    ]);
                });
        });
    }
}
