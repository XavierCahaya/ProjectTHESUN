<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Prepare translations array from the form data
        $translations = [];

        if (isset($data['translations'])) {
            foreach (['id', 'en'] as $locale) {
                if (isset($data['translations'][$locale])) {
                    $translations[] = [
                        'locale' => $locale,
                        'name' => $data['translations'][$locale]['name'] ?? '',
                    ];
                }
            }
            unset($data['translations']);
        }

        $data['translations_data'] = $translations;

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        // Create translations
        if (isset($this->data['translations_data'])) {
            foreach ($this->data['translations_data'] as $translation) {
                $record->translations()->create($translation);
            }
        }
    }
}
