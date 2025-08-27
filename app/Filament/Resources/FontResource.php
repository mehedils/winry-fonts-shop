<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FontResource\Pages;
use App\Filament\Resources\FontResource\RelationManagers;
use App\Models\Font;
use App\Models\Contributor;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FontResource extends Resource
{
    protected static ?string $model = Font::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Font Info')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()->maxLength(255),
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->options(Category::where('is_active', true)->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->placeholder('Select a category...'),
                        Forms\Components\Textarea::make('description')->rows(4),
                        Forms\Components\DatePicker::make('published_date'),
                        Forms\Components\TextInput::make('price')->numeric()->prefix('৳')->default(0),
                        Forms\Components\TextInput::make('glyphs')->numeric()->default(0),
                        Forms\Components\TextInput::make('supported_encodings')->helperText('Comma-separated e.g. Unicode, ASCII'),
                        Forms\Components\Toggle::make('is_variable')->label('Variable Font'),
                        Forms\Components\TagsInput::make('features')->separator(','),
                    ])->columns(2),

                Forms\Components\Section::make('Font Files')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Download Package (Zip)')
                            ->helperText('Zipped font files for users to download')
                            ->acceptedFileTypes([
                                'application/zip',
                                'application/x-zip-compressed',
                                'multipart/x-zip',
                                'application/octet-stream',
                            ])
                            ->rules(['mimes:zip'])
                            ->directory('fonts/downloads')
                            ->downloadable()
                            ->previewable(false)
                            ->preserveFilenames(),
                        
                        Forms\Components\FileUpload::make('font_file_path')
                            ->label('Font File (TTF/OTF)')
                            ->helperText('Single font file for frontend preview and testing')
                            ->directory('fonts/preview')
                            ->downloadable(false)
                            ->previewable(false)
                            ->preserveFilenames(),
                    ])->columns(2),

                Forms\Components\Section::make('Contributors')
                    ->schema([
                        Forms\Components\Select::make('designers')
                            ->label('Designers')
                            ->multiple()
                            ->options(
                                Contributor::where('is_designer', true)->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder('Select designers...'),
                        
                        Forms\Components\Select::make('developers')
                            ->label('Developers')
                            ->multiple()
                            ->options(
                                Contributor::where('is_developer', true)->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder('Select developers...'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('price')->formatStateUsing(fn ($state) => $state > 0 ? '৳'.number_format($state, 2) : 'ফ্রি'),
                Tables\Columns\TextColumn::make('glyphs')->sortable(),
                Tables\Columns\TextColumn::make('published_date')->date()->sortable(),
                Tables\Columns\IconColumn::make('is_variable')->boolean(),
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
            RelationManagers\ContributorsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFonts::route('/'),
            'create' => Pages\CreateFont::route('/create'),
            'edit' => Pages\EditFont::route('/{record}/edit'),
        ];
    }
}
