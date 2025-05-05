<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WeightLog;

class RegisterModal extends Component
{
    public $weightLog;
    public $showModal = false;

    protected $listeners = [
        'openModal' => "openModal",
        'closeModal' => "closeModal"
    ];

    public function openModal($id)
    {
        $this->weightLog = WeightLog::with('user')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function createWeightLog()
    {
        WeightLog::create([
            'user_id' => $this->user_id,
            'date' => $this->date,
            'weight' => $this->weight,
            'calories' => $this->calories,
            'exercise_time' => $this->exercise_time,
            'exercise_content' => $this->exercise_content,
        ]);

        $this->emit('weightLogCreated');
        $this->reset(['user_id', 'date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.register-modal');
    }
}
