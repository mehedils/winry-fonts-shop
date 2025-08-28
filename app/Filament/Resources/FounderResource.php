<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FounderResource\Pages;
use App\Models\Founder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FounderResource extends Resource
{
    protected static ?string $model = Founder::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'Site Management';
    
    protected static ?string $navigationLabel = 'Founders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Founder Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('designation')
                            ->label('Designation')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('photo_path')
                            ->label('Photo')
                            ->image()
                            ->directory('founders')
                            ->imageEditor(),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])->columns(2),
                
                Forms\Components\Section::make('Social Links')
                    ->schema([
                        Forms\Components\TextInput::make('website')
                            ->label('Website URL')
                            ->url()
                            ->prefixIcon('heroicon-o-globe-alt'),
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->prefixIcon('heroicon-o-link'),
                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter URL')
                            ->url()
                            ->prefixIcon('heroicon-o-link'),
                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefixIcon('heroicon-o-link'),
                        Forms\Components\TextInput::make('behance')
                            ->label('Behance URL')
                            ->url()
                            ->prefixIcon('heroicon-o-link'),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp Number')
                            ->helperText('Include country code, e.g., +8801234567890')
                            ->prefixIcon('heroicon-o-phone'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('designation')
                    ->label('Designation')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sort Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListFounders::route('/'),
            'create' => Pages\CreateFounder::route('/create'),
            'edit' => Pages\EditFounder::route('/{record}/edit'),
        ];
    }
}
