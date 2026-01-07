<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Filament\Resources\PackageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-generate slug from Indonesian title
        if (!empty($data['id_title'])) {
            $data['slug'] = Str::slug($data['id_title']);
        }

        // Remove flat translation fields from package data (will be saved separately)
        unset($data['id_title'], $data['id_description'], $data['id_itinerary'], $data['id_terms_conditions']);
        unset($data['en_title'], $data['en_description'], $data['en_itinerary'], $data['en_terms_conditions']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $data = $this->form->getState();

        // Create Indonesian translation
        $this->record->translations()->create([
            'locale' => 'id',
            'title' => $data['id_title'] ?? '',
            'description' => $data['id_description'] ?? null,
            'itinerary' => $data['id_itinerary'] ?? null,
            'terms_conditions' => $data['id_terms_conditions'] ?? null,
        ]);

        // Create English translation
        $this->record->translations()->create([
            'locale' => 'en',
            'title' => $data['en_title'] ?? '',
            'description' => $data['en_description'] ?? null,
            'itinerary' => $data['en_itinerary'] ?? null,
            'terms_conditions' => $data['en_terms_conditions'] ?? null,
        ]);
    }
}
