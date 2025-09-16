<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyLogoResource\Pages;
use App\Filament\Resources\CompanyLogoResource\RelationManagers;
use App\Models\CompanyLogo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyLogoResource extends Resource
{
    protected static ?string $model = CompanyLogo::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    
    protected static ?string $navigationLabel = 'Company Logos';
    
    protected static ?string $modelLabel = 'Company Logo';
    
    protected static ?string $pluralModelLabel = 'Company Logos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Company Name'),
                    
                Forms\Components\FileUpload::make('logo_path')
                    ->required()
                    ->image()
                    ->directory('company-logos')
                    ->visibility('public')
                    ->label('Logo Image'),
                    
                Forms\Components\TextInput::make('website_url')
                    ->url()
                    ->maxLength(255)
                    ->label('Website URL')
                    ->placeholder('https://example.com'),
                    
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->label('Sort Order'),
                    
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->label('Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->size(60),
                    
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Company Name'),
                    
                Tables\Columns\TextColumn::make('website_url')
                    ->searchable()
                    ->label('Website')
                    ->limit(30),
                    
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->label('Order'),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                    
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListCompanyLogos::route('/'),
            'create' => Pages\CreateCompanyLogo::route('/create'),
            'edit' => Pages\EditCompanyLogo::route('/{record}/edit'),
        ];
    }
}
