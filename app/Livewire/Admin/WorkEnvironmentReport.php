<?php

namespace App\Livewire\Admin;

use App\Models\WorkEnvironment;
use Livewire\Component;

class WorkEnvironmentReport extends Component
{
    public function render()
    {
        return view('livewire.admin.work-environment-report',[
            'environments' => WorkEnvironment::with('ojtJobs')->get(),
        ]);
    }
}
