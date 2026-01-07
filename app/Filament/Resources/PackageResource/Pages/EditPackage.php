<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Filament\Resources\PackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditPackage extends EditRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load translations and populate flat fields for editing
        $idTranslation = $this->record->translations()->where('locale', 'id')->first();
        $enTranslation = $this->record->translations()->where('locale', 'en')->first();

        if ($idTranslation) {
            $data['id_title'] = $idTranslation->title;
            $data['id_description'] = $idTranslation->description;
            $data['id_itinerary'] = $idTranslation->itinerary;
            $data['id_terms_conditions'] = $idTranslation->terms_conditions;
        }

        if ($enTranslation) {
            $data['en_title'] = $enTranslation->title;
            $data['en_description'] = $enTranslation->description;
            $data['en_itinerary'] = $enTranslation->itinerary;
            $data['en_terms_conditions'] = $enTranslation->terms_conditions;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Auto-generate slug from Indonesian title
        if (!empty($data['id_title'])) {
            $data['slug'] = Str::slug($data['id_title']);
        }

        // Update Indonesian translation
        $this->record->translations()->updateOrCreate(
            ['locale' => 'id'],
            [
                'title' => $data['id_title'] ?? '',
                'description' => $data['id_description'] ?? null,
                'itinerary' => $data['id_itinerary'] ?? null,
                'terms_conditions' => $data['id_terms_conditions'] ?? null,
            ]
        );

        // Update English translation
        $this->record->translations()->updateOrCreate(
            ['locale' => 'en'],
            [
                'title' => $data['en_title'] ?? '',
                'description' => $data['en_description'] ?? null,
                'itinerary' => $data['en_itinerary'] ?? null,
                'terms_conditions' => $data['en_terms_conditions'] ?? null,
            ]
        );

        // Remove flat fields from data
        unset($data['id_title'], $data['id_description'], $data['id_itinerary'], $data['id_terms_conditions']);
        unset($data['en_title'], $data['en_description'], $data['en_itinerary'], $data['en_terms_conditions']);

        return $data;
    }
}
