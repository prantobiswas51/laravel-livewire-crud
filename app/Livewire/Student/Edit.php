<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.student.edit', [
            'classes' => Classes::all(),
            'sections' => Section::all()
        ]);
    }

    // Thanks
    public function mount()
    {
        $this->fill(
            $this->student->only('name', 'email', 'section_id', 'class_id')
        );
    }
}
