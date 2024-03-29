<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
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

    public $name;
    public $email;

    public ?Student $student;
    // Thanks
    public function mount(Student $student)
    {
        $this->student = $student;

        $this->fill(
            $this->student->only('name', 'email'),
        );
    }

    public function update(Student $student)
    {
        $this->student->update(
            $this->all()
        );

        return redirect()->route('students.index')->with('status', 'Update Successfully');
    }
}