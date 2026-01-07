<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'slug')
                            ->required(),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('thumbnail')
                            ->image()
                            ->directory('package-thumbnails')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('duration_days')
                            ->numeric()
                            ->suffix('days'),
                        Forms\Components\TextInput::make('duration_nights')
                            ->numeric()
                            ->suffix('nights'),
                        Forms\Components\Toggle::make('is_featured')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Forms\Components\Tabs::make('Content')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Translations')
                            ->schema([
                                Forms\Components\Repeater::make('translations')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('locale')
                                            ->options([
                                                'id' => 'Indonesian',
                                                'en' => 'English',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('title')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->rows(3),
                                        Forms\Components\RichEditor::make('itinerary'),
                                        Forms\Components\Textarea::make('terms_conditions')
                                            ->rows(3),
                                    ])
                                    ->columns(1)
                                    ->defaultItems(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\Repeater::make('images')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\FileUpload::make('image_path')
                                            ->image()
                                            ->directory('package-images')
                                            ->required(),
                                        Forms\Components\TextInput::make('order')
                                            ->numeric()
                                            ->default(0),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Services')
                            ->schema([
                                Forms\Components\CheckboxList::make('services')
                                    ->relationship('services', 'slug')
                                    ->options(function () {
                                        return \App\Models\Service::with('translations')
                                            ->get()
                                            ->mapWithKeys(fn($service) => [
                                                $service->id => $service->translate(app()->getLocale())['name'] ?? $service->slug
                                            ]);
                                    }),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->getStateUsing(fn($record) => str_starts_with($record->thumbnail, 'image/')
                        ? asset($record->thumbnail)
                        : asset('storage/' . $record->thumbnail))
                    ->url(fn($record) => str_starts_with($record->thumbnail, 'image/')
                        ? asset($record->thumbnail)
                        : asset('storage/' . $record->thumbnail)),
                Tables\Columns\TextColumn::make('translations.title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration_days')
                    ->suffix('D')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
