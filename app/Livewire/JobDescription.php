<?php

namespace App\Livewire;

use App\Models\Application;
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
        if ($data) {
            Application::create([
                'user_id' => auth()->user()->id,
                'employer_information_id' => $this->job_id,
            ]);
            sweetalert()->addSuccess('Application submitted.');
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
