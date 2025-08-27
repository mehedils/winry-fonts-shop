<?php

namespace App\Filament\Resources\FontResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ContributorsRelationManager extends RelationManager
{
    protected static string $relationship = 'contributors';

    protected static ?string $title = 'Contributors';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        'designer' => 'Designer',
                        'developer' => 'Developer',
                    ])
                    ->required()
                    ->rules(['required']),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable(),
                Tables\Columns\TextColumn::make('pivot.role')->label('Role')->badge(),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordTitleAttribute('name')
                    ->form([
                        Forms\Components\Select::make('role')
                            ->label('Role')
                            ->options([
                                'designer' => 'Designer',
                                'developer' => 'Developer',
                            ])
                            ->required()
                            ->rules(['required'])
                            ->afterStateUpdated(function ($state, $set, $get) {
                                // Validate that the selected contributor can have this role
                                $contributorId = $get('recordId');
                                if ($contributorId && $state) {
                                    $contributor = \App\Models\Contributor::find($contributorId);
                                    if ($contributor) {
                                        if ($state === 'designer' && !$contributor->is_designer) {
                                            $set('role', null);
                                            \Filament\Notifications\Notification::make()
                                                ->title('Invalid Role')
                                                ->body('This contributor is not marked as a designer.')
                                                ->danger()
                                                ->send();
                                        } elseif ($state === 'developer' && !$contributor->is_developer) {
                                            $set('role', null);
                                            \Filament\Notifications\Notification::make()
                                                ->title('Invalid Role')
                                                ->body('This contributor is not marked as a developer.')
                                                ->danger()
                                                ->send();
                                        }
                                    }
                                }
                            }),
                    ])
                    ->recordSelectOptionsQuery(function ($query) {
                        return $query->where(function ($q) {
                            $q->where('is_designer', true)
                              ->orWhere('is_developer', true);
                        });
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}


