<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function afterCreate(): void
    {
        // Create the SEO if filled
        if (isset($this->data['seo'])) {
            $this->record->seo()->create($this->data['seo']);
        }
    }
}
