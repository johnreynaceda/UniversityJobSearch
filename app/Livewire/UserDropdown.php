<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;

class UserDropdown extends Component
{
    public function render()
    {
        return view('livewire.user-dropdown',[
            'counts' => Notification::where('receiver_id', auth()->user()->id)->where('is_seen', false)->count(),
            'notifs' => Notification::where('receiver_id', auth()->user()->id)->where('is_seen', false)->get(),
        ]);
    }
}
