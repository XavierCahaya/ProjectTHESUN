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

    protected static ?string $navigationLabel = 'Paket Wisata';

    protected static ?string $modelLabel = 'Paket';

    protected static ?string $pluralModelLabel = 'Paket Wisata';
    protected static ?string $navigationGroup = 'Paket';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('package-thumbnails')
                            ->visibility('public')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('3:4')
                            ->imageResizeTargetWidth('1080')
                            ->imageResizeTargetHeight('1440')
                            ->maxSize(5120)
                            ->required()
                            ->columnSpan(3),

                        Forms\Components\Grid::make(4)
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'slug')
                                    ->required()
                                    ->columnSpan(4),

                                Forms\Components\TextInput::make('price')
                                    ->label('Harga')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0)
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('duration_days')
                                    ->label('Durasi (Hari)')
                                    ->numeric()
                                    ->suffix('hari')
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('duration_nights')
                                    ->label('Durasi (Malam)')
                                    ->numeric()
                                    ->suffix('malam')
                                    ->columnSpan(1),

                                Forms\Components\Grid::make(1)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Unggulan')
                                            ->default(false)
                                            ->helperText('Hanya 4 gambar yang harus unggulan')
                                            ->inline(false),
                                    ])
                                    ->extraAttributes(['class' => 'flex items-center justify-center'])
                                    ->columnSpan(1),

                                Forms\Components\Grid::make(1)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Aktif')
                                            ->default(true)
                                            ->inline(false),
                                    ])
                                    ->extraAttributes(['class' => 'flex items-center justify-center'])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(9),
                    ])
                    ->columns(12),

                Forms\Components\Section::make('Terjemahan Indonesia')
                    ->schema([
                        Forms\Components\TextInput::make('id_title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('id_description')
                            ->label('Deskripsi')
                            ->rows(3),
                        Forms\Components\RichEditor::make('id_itinerary')
                            ->label('Catatan'),
                        Forms\Components\RichEditor::make('id_terms_conditions')
                            ->label('Syarat & Ketentuan'),
                        // ->rows(3),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Terjemahan Inggris')
                    ->schema([
                        Forms\Components\TextInput::make('en_title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('en_description')
                            ->label('Deskripsi')
                            ->rows(3),
                        Forms\Components\RichEditor::make('en_itinerary')
                            ->label('Catatan'),
                        Forms\Components\RichEditor::make('en_terms_conditions')
                            ->label('Syarat & Ketentuan')
                        // ->rows(3),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Layanan')
                    ->schema([
                        Forms\Components\CheckboxList::make('services')
                            ->label('Pilih Layanan')
                            ->relationship('services', 'slug')
                            ->options(function () {
                                return \App\Models\Service::with('translations')
                                    ->get()
                                    ->mapWithKeys(fn($service) => [
                                        $service->id => $service->slug
                                    ]);
                            }),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->getStateUsing(fn($record) => str_starts_with($record->thumbnail, 'image/')
                        ? asset($record->thumbnail)
                        : asset('storage/' . $record->thumbnail))
                    ->url(fn($record) => str_starts_with($record->thumbnail, 'image/')
                        ? asset($record->thumbnail)
                        : asset('storage/' . $record->thumbnail)),
                Tables\Columns\TextColumn::make('translations.title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.slug')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration_days')
                    ->label('Durasi')
                    ->suffix('H')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
