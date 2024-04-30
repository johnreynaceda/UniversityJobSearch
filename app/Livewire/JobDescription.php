<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\EmployerInformation;
use App\Models\Notification;
use App\Models\OjtJob;
use Livewire\Component;
use WireUi\Traits\Actions;
class JobDescription extends Component
{

    use Actions;
    public $job_id;

    public function mount(){
        $this->job_id = request('id');
    }

    public function applyNow(){
        sleep(2);
        $data = auth()->user()->userInformation->resume_path;
        $employer_id = OjtJob::where('id', $this->job_id)->first()->employerInformation;
        if ($data) {
          $app =   Application::create([
                'ojt_job_id' => $this->job_id,
                'user_id' => auth()->user()->id,
                'employer_information_id' => $employer_id->id,
            ]);
            sweetalert()->addSuccess('Application submitted.');
            Notification::create([
                'user_id' => auth()->user()->id,
                'receiver_id' => $employer_id->user->id,
                'description' => auth()->user()->name. ' sent a application. click here to open.',
                'application_id' => $app->id,
            ]);
            return redirect()->route('welcome');

        }else{
            $this->dialog()->error(
                $title = 'Resume Required',
                $description = 'Please upload your resume before applying again.'
            );
        }

    }

    public function render()
    {
        return view('livewire.job-description',[
            'job' => OjtJob::where('id', $this->job_id)->first(),
        ]);
    }
}
