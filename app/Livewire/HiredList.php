<?php

namespace App\Livewire;

use App\Models\Application;
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

class HiredList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Application::query()->where('employer_information_id', auth()->user()->employerInformation->id)->where('status', 'hired'))
            ->columns([
                TextColumn::make('user.name')->label('APPLICANT NAME')->searchable(),
                TextColumn::make('user.user_type')->label('USER TYPE')->searchable(),
                TextColumn::make('ojtJob.title')->label('JOB')->searchable(),
                TextColumn::make('status')->label('STATUS')->searchable()


            ])
            ->filters([
               SelectFilter::make('user.user_type')->options([
                'student' => 'Student',
                 'employer' => 'Employer',
                 'alumni' => 'Alumni',
               ]
               )
            ])
            ->actions([

            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.hired-list');
    }
}
