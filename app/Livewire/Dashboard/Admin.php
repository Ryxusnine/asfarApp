<?php

namespace App\Livewire\Dashboard;

use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use Livewire\Component;

class Admin extends Component
{
    public $count = [
        'users' => 0,
        'questionnaires' => 0,
        'answers' => 0,
    ];

    public $reports = [];

    public function loadCount()
    {
        $this->count = [
            'users' => User::count(),
            'questionnaires' => Questionnaire::count(),
            'answers' => Answer::query()->distinct('user_id', 'questionnaire_id')->count('user_id'),
        ];
    }

    public function loadReports()
    {
        $questionnaires = Questionnaire::with('questions.answers')->get();

        foreach ($questionnaires as $questionnaire) {
            $answerKeyCount = [];

            foreach ($questionnaire->questions as $question) {
                foreach ($question->answers as $answer) {
                    if (isset($answerKeyCount[$answer->answer])) {
                        $answerKeyCount[$answer->answer] += 1;
                    } else {
                        $answerKeyCount[$answer->answer] = 1;
                    }
                }
            }

            $this->reports[] = [
                'data' => $questionnaire,
                'series' => collect($answerKeyCount)->sortKeysDesc()->values()->toArray(),
                'categories' => [
                    'Sangat Suka',
                    'Suka',
                    'Netral',
                    'Tidak Suka',
                    'Sangat Tidak Suka',
                ],
            ];
        }
    }

    public function mount()
    {
        $this->loadCount();
        $this->loadReports();
    }

    public function placeholder()
    {
        return <<<'HTML'
            <div class="text-center">
                <div class="spinner-border spinner-border-sm text-secondary" role="status">
                    <span class="visually-hidden">Memuat...</span>
                </div>

                <span class="ms-2">Memuat Data</span>
            </div>
        HTML;
    }

    public function render()
    {
        $this->dispatch('load-charts', $this->reports);

        return view('livewire.dashboard.admin', [
            'count' => $this->count,
            'reports' => $this->reports,
        ]);
    }
}
