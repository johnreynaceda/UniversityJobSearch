<?php

namespace App\Livewire;

use App\Models\EmployerInformation;
use App\Models\User;
use App\Models\UserInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterUser extends Component
{
    use WithFileUploads;
    public $student_modal = false;
    public $alumni_modal = false;
    public $employer_modal = false;

    public $course, $grade_year, $files;

    public $name, $email, $password, $confirm_password, $logo, $company_name,$address,$contact,$license, $snumber;
    public $picture, $age, $birthday, $status,$gsuite, $year_graduated, $date_of_registraion;
    public function render()
    {
        return view('livewire.register-user');
    }

    public function createStudent(){
        $this->validate([
            'snumber' => 'required',
            'name' =>'required',
            'email' =>'required|unique:users,email',
            'course' => 'required',
            'grade_year' => 'required',
            'gsuite' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'files' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',

        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'user_type' => 'student'
        ]);

        UserInformation::create([
            'user_id' => $user->id,
            'number' => $this->snumber,
            'type_of_employee' => 'student',
            'name' => $this->name,
            'course' => $this->course,
            'year' => $this->grade_year,
            'gsuite' => $this->gsuite,
            'address' => $this->address,
            'contact' => $this->contact,
            'proof_path' => $this->files->store('proof_path', 'public'),
        ]);

        auth()->loginUsingId($user->id);

        sleep(2);

        return redirect()->route('dashboard');

    }

    public function createAlumni(){
        $this->validate([
            'name' =>'required',
            'email' =>'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',

        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'user_type' => 'alumni'
        ]);

        auth()->loginUsingId($user->id);

        sleep(2);

        return redirect()->route('dashboard');

    }

    public function createEmployer(){
        $this->validate([
            'name' =>'required',
            'email' =>'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'logo' =>'required',
            'company_name' =>'required',
            'address' =>'required',
            'contact' =>'required',
            'license' =>'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'user_type' => 'employer'
        ]);

        EmployerInformation::create([
            'user_id' => $user->id,
            'company_name' => $this->company_name,
            'address' => $this->address,
            'contact' => $this->contact,
            'license' => $this->license,
            'logo_path' => $this->logo->store('Logo', 'public'),
        ]);

        auth()->loginUsingId($user->id);

        sleep(2);

        return redirect()->route('dashboard');

    }

    public function student(){
        $this->reset('name', 'email', 'password','confirm_password');
        $this->student_modal = true;
    }

    public function alumni(){
        $this->reset('name', 'email', 'password','confirm_password');
        $this->alumni_modal = true;
    }

    public function employer(){
        $this->reset('name', 'email', 'password','confirm_password');
        $this->employer_modal = true;
    }

}
