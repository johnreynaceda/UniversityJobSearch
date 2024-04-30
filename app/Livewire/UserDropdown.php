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

    public function openNotif($id){
        $data = Notification::where('id', $id)->first();
        $data->update([
            'is_seen' => true,
        ]);
        if (auth()->user()->user_type == 'employer') {
           return redirect()->route('employer.application-description', ['id' => $data->application_id]);
        }elseif(auth()->user()->user_type == 'admin'){
            return redirect()->route('admin.request');
        }
        else{
            return redirect()->route('user.application-open', ['id' => $data->application_id]);
        }


    }
}
