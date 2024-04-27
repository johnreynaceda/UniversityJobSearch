<?php

namespace App\Livewire;

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

    public function table(Table $table): Table
    {
        return $table
            ->query(OjtJob::query())->headerActions([
                    CreateAction::make('create')->label('POST A JOB')->icon('heroicon-o-document-text')->color('danger')->action(
                        function($data){
                            OjtJob::create([
                                'employer_information_id' => auth()->user()->employerInformation->id,
                                'work_environment_id' => $data['work'],
                                'filter_for' => $data['for'],
                                'title' => $data['title'],
                                'description' => $data['description'],
                            ]);
                        }
                    )->form([
                        Select::make('work')->label('Work Environment')->options(
                            WorkEnvironment::all()->pluck('name', 'id'),
                        ),
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
                Action::make('view'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Jobs yet!')->emptyStateDescription('Once you write your first job, it will appear here.');
    }

    public function render()
    {
        return view('livewire.employer-profile');
    }
}
