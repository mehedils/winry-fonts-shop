<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Filament\Resources\PaymentMethodResource\RelationManagers;
use App\Models\PaymentMethod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Payment Methods';
    protected static ?string $modelLabel = 'Payment Method';
    protected static ?string $pluralModelLabel = 'Payment Methods';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Internal Name')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Lowercase name (e.g., bkash, nagad)'),
                        
                        Forms\Components\TextInput::make('display_name')
                            ->label('Display Name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Name shown to users (e.g., bKash, Nagad)'),
                        
                        Forms\Components\TextInput::make('account_number')
                            ->label('Account Number')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Mobile number or account number'),
                    ])->columns(3),

                Forms\Components\Section::make('Account Details')
                    ->schema([
                        Forms\Components\Select::make('account_type')
                            ->label('Account Type')
                            ->options([
                                'personal' => 'Personal',
                                'merchant' => 'Merchant',
                                'agent' => 'Agent',
                            ])
                            ->required(),
                        
                        Forms\Components\TextInput::make('icon_class')
                            ->label('Icon Class')
                            ->maxLength(255)
                            ->helperText('FontAwesome class (e.g., fas fa-mobile-alt)'),
                        
                        Forms\Components\Select::make('color_class')
                            ->label('Color Class')
                            ->options([
                                'bg-pink-100' => 'Pink (bKash)',
                                'bg-orange-100' => 'Orange (Nagad)',
                                'bg-purple-100' => 'Purple (Rocket)',
                                'bg-green-100' => 'Green (Upay)',
                                'bg-blue-100' => 'Blue',
                                'bg-red-100' => 'Red',
                                'bg-yellow-100' => 'Yellow',
                                'bg-gray-100' => 'Gray',
                            ])
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Instructions & Status')
                    ->schema([
                        Forms\Components\Textarea::make('instructions')
                            ->label('Payment Instructions')
                            ->rows(3)
                            ->helperText('Special instructions for this payment method')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Show this payment method to users'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('account_number')
                    ->label('Account Number')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('account_type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'personal',
                        'success' => 'merchant',
                        'warning' => 'agent',
                    ]),
                
                Tables\Columns\TextColumn::make('color_class')
                    ->label('Color')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'bg-pink-100' => 'Pink',
                        'bg-orange-100' => 'Orange',
                        'bg-purple-100' => 'Purple',
                        'bg-green-100' => 'Green',
                        'bg-blue-100' => 'Blue',
                        'bg-red-100' => 'Red',
                        'bg-yellow-100' => 'Yellow',
                        'bg-gray-100' => 'Gray',
                        default => 'Unknown',
                    }),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All Methods')
                    ->trueLabel('Active Methods')
                    ->falseLabel('Inactive Methods'),
                
                Tables\Filters\SelectFilter::make('account_type')
                    ->options([
                        'personal' => 'Personal',
                        'merchant' => 'Merchant',
                        'agent' => 'Agent',
                    ]),
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
            'index' => Pages\ListPaymentMethods::route('/'),
            'create' => Pages\CreatePaymentMethod::route('/create'),
            'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
        ];
    }
}
