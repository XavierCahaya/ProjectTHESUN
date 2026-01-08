<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kategori';

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $pluralModelLabel = 'Kategori';
    protected static ?string $navigationGroup = 'Paket';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->label('Nama')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->label('Ikon')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Forms\Components\TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),

                Forms\Components\Section::make('Terjemahan Indonesia')
                    ->schema([
                        Forms\Components\Hidden::make('translations.id.locale')
                            ->default('id'),
                        Forms\Components\TextInput::make('translations.id.name')
                            ->label('Nama (Indonesia)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('translations.id.description')
                            ->label('Deskripsi (Indonesia)')
                            ->rows(3),
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
                        Forms\Components\Textarea::make('translations.en.description')
                            ->label('Description (English)')
                            ->rows(3),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Gambar Latar Belakang')
                    ->schema([
                        Forms\Components\Repeater::make('backgrounds')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Gambar')
                                    ->image()
                                    ->disk('public')
                                    ->directory('category-backgrounds')
                                    ->visibility('public')
                                    ->maxSize(5120)
                                    ->required(),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(3),
                    ]),
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
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('backgrounds_count')
                    ->counts('backgrounds')
                    ->label('Jumlah Background'),
                Tables\Columns\TextColumn::make('packages_count')
                    ->counts('packages')
                    ->label('Jumlah Paket'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
