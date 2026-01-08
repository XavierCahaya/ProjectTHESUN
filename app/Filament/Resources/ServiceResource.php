<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Layanan';

    protected static ?string $modelLabel = 'Layanan';

    protected static ?string $pluralModelLabel = 'Layanan';
    protected static ?string $navigationGroup = 'Paket';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->label('Nama layanan')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                // ->columnspan(2),
                Forms\Components\Hidden::make('icon')
                    ->default('heroicon-o-cog'),


                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->inline(false)
                    ->default(true),

                Forms\Components\Section::make('Terjemahan Indonesia')
                    ->schema([
                        Forms\Components\Hidden::make('translations.id.locale')
                            ->default('id'),
                        Forms\Components\TextInput::make('translations.id.name')
                            ->label('Nama (Indonesia)')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Terjemahan Inggris')
                    ->schema([
                        Forms\Components\Hidden::make('translations.en.locale')
                            ->default('en'),
                        Forms\Components\TextInput::make('translations.en.name')
                            ->label('Name (English)')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('translations.name')
                    ->label('Terjemahan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
