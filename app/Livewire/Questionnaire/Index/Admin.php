<?php

namespace App\Livewire\Questionnaire\Index;

use App\Models\Questionnaire;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Admin extends Component
{
    public $questionnaires;

    public function mount($questionnaires)
    {
        $this->questionnaires = $questionnaires;
    }

    public function delete($id)
    {
        $questionnaire = Questionnaire::find($id);

        if ($questionnaire) {
            foreach ($questionnaire->questions as $question) {
                if ($question->image) {
                    $this->deleteImageFile($question->image);
                }
                $question->delete();
            }

            if ($questionnaire->image) {
                $this->deleteImageFile($questionnaire->image);
            }

            $questionnaire->delete();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil menghapus kuisioner.',
            ]);

            return redirect()->route('questionnaire.index');
        }
    }

    protected function deleteImageFile($imagePath)
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function render()
    {
        return view('livewire.questionnaire.index.admin', [
            'questionnaires' => $this->questionnaires,
        ]);
    }
}
