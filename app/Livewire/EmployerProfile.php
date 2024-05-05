<?php

namespace App\Livewire;

use App\Models\EmployerInformation;
use App\Models\OjtJob;
use App\Models\Shop\Product;
use App\Models\WorkEnvironment;
use Filament\Actions\EditAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
// use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Tables\Columns\Layout\View;

class EmployerProfile extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $course, $grade_year, $files;

    public $name, $email, $password, $confirm_password, $logo, $company_name,$address,$contact,$license, $snumber;
    public $picture, $age, $birthday, $status,$gsuite, $year_graduated, $date_of_registration, $logo_file;

    public $profile_modal = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(OjtJob::query())->headerActions([
                    CreateAction::make('create')->label('POST A JOB')->icon('heroicon-o-document-text')->color('danger')->action(
                        function($data){
                            OjtJob::create([
                                'employer_information_id' => auth()->user()->id,
                                'work_environment_id' => $data['work'],
                                'filter_for' => $data['for'],
                                'title' => $data['title'],
                                'description' => $data['description'],
                            ]);
                        }
                    )->form([
                        Select::make('work')->label('Work Environment')->options(
                            WorkEnvironment::all()->pluck('name', 'id'),
                        )->required(),
                        Radio::make('for')->columns(4)
                            ->options([
                                'Student' => 'Student',
                                'Alumni' => 'Alumni',

                            ]),
                            TextInput::make('title')->required(),
                            Textarea::make('description')->required(),
                    ])->modalSubmitActionLabel('Post Job')->modalHeading('CREATE A JOB')->modalWidth('xl')
                ])
            ->columns([
                // TextColumn::make('title')->searchable(),
                // TextColumn::make('description')->searchable(),
                // TextColumn::make('filter_for')->searchable(),
                Split::make([
                    View::make('job.details')
                ])
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make('view')->color('warning')->form([
                    Select::make('work_environment_id')->label('Work Environment')->options(
                        WorkEnvironment::all()->pluck('name', 'id'),
                    )->required(),
                    Radio::make('filter_for')->label('For')->columns(4)
                        ->options([
                            'Student' => 'Student',
                            'Alumni' => 'Alumni',

                        ]),
                        TextInput::make('title')->required(),
                        Textarea::make('description')->required(),
                ])->modalHeading('JOB DETAILS'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Jobs yet!')->emptyStateDescription('Once you write your first job, it will appear here.');
    }

    public function editProfile(){
        $record  = EmployerInformation::where('user_id', auth()->user()->id)->first();
        $this->name = $record->user->name;
        $this->company_name = $record->company_name;
        $this->email = $record->user->email;
        $this->address = $record->address;
        $this->contact = $record->contact;
        $this->license = $record->license;
        $this->logo = $record->logo_path;
        $this->profile_modal = true;
    }

    public function updateRecord(){
        EmployerInformation::where('user_id', auth()->user()->id)->first()->update([
            'company_name' => $this->company_name,
            'address' => $this->address,
            'contact' => $this->contact,
            'license' => $this->license,
            'logo_path' => $this->logo_file == null ? $this->logo->store('Logo', 'public') : $this->logo_file->store('Logo', 'public'),
        ]);

        auth()->user()->update([
            'email' => $this->email,
            'name' => $this->name,
        ]);
        sweetalert()->addSuccess('Profile updated.');
        return redirect()->route('employer.dashboard');
    }

    public function render()
    {
        return view('livewire.employer-profile');
    }
}
