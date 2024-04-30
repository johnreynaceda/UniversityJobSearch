<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AlumniReport extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.alumni-report',[
            'students' => User::where('user_type', 'alumni')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');

            })
            ->where('status', 'accepted')
            ->get(),
        ]);
    }
}
