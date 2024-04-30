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

class UserApplication extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Application::query()->where('user_id', auth()->user()->id))
            ->columns([

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
                Action::make('view')->label('OPEN APPLICATION')->color('success')->icon('heroicon-m-arrow-uturn-right')->action(
                    function($record){
                        return redirect()->route('user.application-open', ['id' => $record->id]);
                    }
                )

            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user-application');
    }
}
