<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function saved(): void
    {
        parent::saved();
        foreach ($this->record->variants as $variant) {
            $attributes = $variant->attribute_snapshot ?? [];

            $syncData = [];

            foreach ($attributes as $attr) {
                if (isset($attr['attribute_id'], $attr['attribute_value_id'])) {
                    $syncData[$attr['attribute_value_id']] = [
                        'attribute_id' => $attr['attribute_id'],
                    ];
                }
            }

            Log::info('Syncing attributes for variant ' . $variant->id, $syncData);

            $variant->attributeValues()->sync($syncData); // 🔥 This should now work!
        }
    }
}
