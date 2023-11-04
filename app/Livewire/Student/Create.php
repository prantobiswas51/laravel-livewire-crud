<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $class_id;
    public $section_id;

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => Classes::all(),
            'sections' => Section::all()
        ]);
    }


    public function save()
    {

        $validated = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        Student::create($validated);

        return redirect(route('students.index'))
            ->with('status', 'Student added successfully');
    }
}
