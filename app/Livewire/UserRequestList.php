<?php

namespace App\Livewire;

use App\Mail\UserNotification;
use App\Models\User;
use App\Models\WorkEnvironment;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserRequestList extends Component  implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $student_modal = false;
    public $alumni_modal = false;
    public $employer_modal = false;


    public $course, $grade_year, $files;

    public $name, $email, $password, $confirm_password, $logo, $company_name,$address,$contact,$license, $snumber;
    public $picture, $age, $birthday, $status,$gsuite, $year_graduated, $date_of_registration;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('user_type', '!=', 'admin')->where('status', 'pending'))->headerActions([
                Action::make('new_environment')->label('New Environment')->color('danger')->action(
                    function($record, $data){
                        WorkEnvironment::create([
                            'name' => $data['name'],

                        ]);
                    }
                )->form([
                    TextInput::make('name')->required(),

                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('user_type')->label('USER TYPE')->searchable(),

            ])
            ->filters([
               SelectFilter::make('user_type')->options([
                'student' => 'Student',
                 'employer' => 'Employer',
                 'alumni' => 'Alumni',
               ]
               )
            ])
            ->actions([
                Action::make('view')->action(
                    function($record){
                        switch ($record->user_type) {
                            case 'student':
                                $this->student_modal = true;
                                break;
                            case 'alumni':
                                    # code...
                            break;

                            default:
                            $this->name = $record->name;
                            $this->company_name = $record->employerInformation->company_name;
                            $this->email = $record->email;
                            $this->address = $record->employerInformation->address;
                            $this->contact = $record->employerInformation->contact;
                            $this->license = $record->employerInformation->license;
                            $this->logo = $record->employerInformation->logo_path;
                              $this->employer_modal = true;
                                break;
                        }
                    }
                ),
                Action::make('approve')->color('success')->button()->icon('heroicon-s-hand-thumb-up')->action(
                    function($record){
                        $message = "Hello ". $record->name. ", Your account has been approved. You can now access the system.";
                        Mail::to($record->email)->send(new UserNotification($message));

                        $record->update([
                            'status' => 'accepted',
                        ]);
                    }
                ),
                Action::make('reject')->color('danger')->button()->icon('heroicon-s-hand-thumb-down')->action(
                    function($record){
                        $message = "Hello ". $record->name. ", Your account has been rejected. Thank You!";
                        Mail::to($record->email)->send(new UserNotification($message));

                        $record->update([
                            'status' => 'declined',
                        ]);
                    }
                ),

            ])
            ->bulkActions([
                // ...
            ]);
    }


    public function render()
    {
        return view('livewire.user-request-list');
    }
}
