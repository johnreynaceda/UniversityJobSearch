<?php

namespace App\Livewire;

use App\Models\UserInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;
    public $number, $name, $age, $birthdate, $status, $address, $contact, $gsuite, $year_of_graduated, $file, $resume;
    public function render()
    {
        $data = UserInformation::where('user_id', auth()->user()->id)->get();
        if ($data->count() > 0) {
           $this->name = $data->first()->name;
           $this->number = $data->first()->number;
           $this->age = $data->first()->age;
           $this->birthdate = $data->first()->birthdate;
           $this->status = $data->first()->status;
           $this->address = $data->first()->address;
           $this->contact = $data->first()->contact;
           $this->gsuite = $data->first()->gsuite;
           $this->resume = $data->first()->resume_path;
        }else{

        }

        return view('livewire.user-profile');
    }

    public function submitRecord(){
        $data = UserInformation::where('user_id', auth()->user()->id)->get();
        if ($data->count() == 0) {
            UserInformation::create([
                'user_id' => auth()->user()->id,
                'type_of_employee' => auth()->user()->user_type,
                'number' => $this->number,
                'name' => $this->name,
                'age' => $this->age,
                'birthdate' => $this->birthdate,
                'status' => $this->status,
                'address' => $this->address,
                'contact' => $this->contact,
                'gsuite' => $this->gsuite,
                'year_of_graduated' => $this->year_of_graduated,
                'date_of_registration' => now(),
                'resume_path' => $this->file->store('Resume', 'public'),
            ]);
        }else{
            $data->first()->update([
                'user_id' => auth()->user()->id,
                'type_of_employee' => auth()->user()->user_type,
                'number' => $this->number,
                'name' => $this->name,
                'age' => $this->age,
                'birthdate' => $this->birthdate,
                'status' => $this->status,
                'address' => $this->address,
                'contact' => $this->contact,
                'gsuite' => $this->gsuite,
                'year_of_graduated' => $this->year_of_graduated,
                'date_of_registration' => now(),
                'resume_path' => $this->file != null ? $this->file->store('Resume', 'public') : $this->resume
            ]);
        }
        return redirect()->route('user.profile');
    }
}
