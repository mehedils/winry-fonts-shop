<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Rules\CurrentPassword;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $title = 'My Profile';
    protected static ?string $navigationLabel = 'My Profile';
    protected static ?int $navigationSort = 99;

    protected static string $view = 'filament.pages.my-profile';

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill(auth()->user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique('users', 'email', ignoreRecord: auth()->id())
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20),
                        
                        Forms\Components\Textarea::make('bio')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Profile Picture')
                    ->schema([
                        Forms\Components\FileUpload::make('avatar')
                            ->label('Avatar')
                            ->image()
                            ->disk('public')
                            ->directory('avatars')
                            ->imageEditor()
                            ->circleCropper()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Change Password')
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->password()
                            ->required()
                            ->rule(new CurrentPassword())
                            ->label('Current Password'),
                        
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->minLength(8)
                            ->same('password_confirmation')
                            ->label('New Password'),
                        
                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->minLength(8)
                            ->label('Confirm New Password'),
                    ])
                    ->columns(3)
                    ->collapsible()
                    ->collapsed(),
            ])
            ->statePath('data');
    }

    public function save()
    {
        $data = $this->form->getState();
        
        $user = auth()->user();
        
        // Handle password update separately
        if (isset($data['password']) && filled($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        
        // Remove password confirmation and current_password from data
        unset($data['password_confirmation'], $data['current_password']);
        
        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully!')
            ->success()
            ->send();
    }
}
