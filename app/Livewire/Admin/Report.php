<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Report extends Component
{
    public function render()
    {
        return view('livewire.admin.report', [
            'students' => User::where('user_type', 'student')
            ->where('is_hired', true)
            ->get(),
            'alumnis' =>  User::where('user_type', 'alumni')
            ->where('is_hired', true)
            ->get(),
        ]);
    }
}
