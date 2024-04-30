<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class StudentReport extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.student-report',[
            'students' => User::where('user_type', 'student')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('userInformation', function ($query) {
                        $query->where('number', 'like', '%' . $this->search . '%');
                    });
            })
            ->where('status', 'accepted')
            ->get(),
        ]);
    }
}
