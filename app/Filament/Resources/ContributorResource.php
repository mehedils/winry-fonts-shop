<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContributorResource\Pages;
use App\Filament\Resources\ContributorResource\RelationManagers;
use App\Models\Contributor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContributorResource extends Resource
{
    protected static ?string $model = Contributor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contributor Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_designer')
                            ->label('Is Designer')
                            ->default(false),
                        Forms\Components\Toggle::make('is_developer')
                            ->label('Is Developer')
                            ->default(false),
                        Forms\Components\FileUpload::make('photo_path')
                            ->label('Photo')
                            ->image()
                            ->directory('contributors')
                            ->imageEditor(),
                        Forms\Components\TextInput::make('website')->url()->maxLength(255),
                        Forms\Components\TextInput::make('facebook')->url()->maxLength(255),
                        Forms\Components\TextInput::make('instagram')->url()->maxLength(255),
                        Forms\Components\TextInput::make('twitter')->url()->maxLength(255),
                        Forms\Components\TextInput::make('behance')->url()->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')->label('Photo')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_designer')->boolean()->label('Designer'),
                Tables\Columns\IconColumn::make('is_developer')->boolean()->label('Developer'),
                Tables\Columns\TextColumn::make('website')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('facebook')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('instagram')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('twitter')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('behance')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('whatsapp')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContributors::route('/'),
            'create' => Pages\CreateContributor::route('/create'),
            'edit' => Pages\EditContributor::route('/{record}/edit'),
        ];
    }
}
