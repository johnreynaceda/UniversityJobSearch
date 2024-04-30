<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use Livewire\Component;

class ApplicationDescription extends Component
{
    public $application_id, $message;

    public function mount(){
        $this->application_id = request('id');
    }

    public function send(){
        sleep(1);
        $this->validate([
            'message' => 'required'
        ]);

        Message::create([
            'application_id' => $this->application_id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => auth()->user()->user_type == 'employer' ? Application::where('id', $this->application_id)->first()->user_id : Application::where('id', $this->application_id)->first()->employerInformation->user_id,
            'subject' => $this->message
        ]);

        $this->reset('message');
    }


    public function reject(){
        sleep(1);
        $data = Application::where('id', $this->application_id)->first();
        $data->update([
           'status' => 'rejected'
        ]);
        // Notification::create([
        //     'user_id' => auth()->user()->id,
        //     'receiver_id' => $data->user_id,
        //     'description' => $data->user->name.', Your Application has been rejected by the Employer.'
        // ]);
        sweetalert()->addSuccess('Application Rejected.');
        return redirect()->route('employer.application');
    }

    public function hire(){
        sleep(1);
        $data = Application::where('id', $this->application_id)->first();
        $data->update([
           'status' => 'hired'
        ]);
        User::where('id', $data->user_id)->first()->update([
            'is_hired' => true
        ]);
        sweetalert()->addSuccess('Hired Applicant.');
        return redirect()->route('employer.application');
    }

    public function render()
    {

        return view('livewire.application-description',[
            'details' => Application::where('id', $this->application_id)->first(),
            'messages' => Message::where('application_id', $this->application_id)->get(),
        ]);
    }
}
