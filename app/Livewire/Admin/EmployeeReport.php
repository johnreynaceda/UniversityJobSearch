<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EmployeeReport extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.employee-report',[
            'students' => User::where('user_type', 'employer')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->where('status', 'accepted')
            ->get(),
        ]);
    }
}
