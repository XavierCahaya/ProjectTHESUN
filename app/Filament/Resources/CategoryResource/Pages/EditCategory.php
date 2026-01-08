<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load translations for each language
        $translations = $this->record->translations->keyBy('locale');

        $data['translations'] = [];
        foreach (['id', 'en'] as $locale) {
            if (isset($translations[$locale])) {
                $data['translations'][$locale] = [
                    'locale' => $locale,
                    'name' => $translations[$locale]->name,
                    'description' => $translations[$locale]->description,
                ];
            }
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Prepare translations array from the form data
        $translations = [];

        if (isset($data['translations'])) {
            foreach (['id', 'en'] as $locale) {
                if (isset($data['translations'][$locale])) {
                    $translations[] = [
                        'locale' => $locale,
                        'name' => $data['translations'][$locale]['name'] ?? '',
                        'description' => $data['translations'][$locale]['description'] ?? null,
                    ];
                }
            }
            unset($data['translations']);
        }

        $data['translations_data'] = $translations;

        return $data;
    }

    protected function afterSave(): void
    {
        $record = $this->record;

        // Update or create translations
        if (isset($this->data['translations_data'])) {
            foreach ($this->data['translations_data'] as $translation) {
                $record->translations()->updateOrCreate(
                    ['locale' => $translation['locale']],
                    [
                        'name' => $translation['name'],
                        'description' => $translation['description'],
                    ]
                );
            }
        }
    }
}
