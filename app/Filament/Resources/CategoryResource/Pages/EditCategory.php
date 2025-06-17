<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // If the record has related seo, merge it into the form
        if ($this->record->seo) {
            $data['seo'] = $this->record->seo->toArray();
        }

        return $data;
    }

    protected function afterSave(): void
    {
        if (isset($this->data['seo'])) {
            $this->record->seo()->updateOrCreate(
                [], // find by category_id (auto from relation)
                $this->data['seo']
            );
        }
    }
}
