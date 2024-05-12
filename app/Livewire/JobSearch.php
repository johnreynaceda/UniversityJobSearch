<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\OjtJob;
use Livewire\Component;
use WireUi\Traits\Actions;
class JobSearch extends Component
{
    use Actions;
    public $is_student = false;
    public $display_result = false;
    public $results = [];
    public $search_input;

    public function mount(){
        if (auth()->user()->user_status == 'student') {
          $this->is_student = true;
        }
    }

    public function apply($id){
        sleep(1);
        if (auth()->user()->userInformation->resume_path == null) {
            $this->dialog()->error(
                $title = 'Resume Required',
                $description = 'Please upload your resume before applying again.'
            );
        }else{
           Application::create([
            'user_id' => auth()->user()->id,
            'employer_information_id' => $id,
           ]);
        }
    }

    public function search(){
        $this->results = OjtJob::where('title', 'like', '%'. $this->search_input.'%')->where('filter_for', auth()->user()->user_type)->get();

        $this->display_result = true;
    }
    public function render()
    {
        return view('livewire.job-search');
    }
}
