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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserRequestList extends Component  implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

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
                // ...
            ])
            ->actions([
                Action::make('approve')->color('success')->button()->icon('heroicon-s-hand-thumb-up')->action(
                    function($record){
                        $message = "Hello ". $record->name. ", Your account has been approved. You can now access the system.";
                        Mail::to($record->email)->send(new UserNotification($message));
                    }
                ),
                Action::make('reject')->color('danger')->button()->icon('heroicon-s-hand-thumb-down')->action(
                    function($record){
                        $message = "Hello ". $record->name. ", Your account has been rejected. Thank You!";
                        Mail::to($record->email)->send(new UserNotification($message));
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
