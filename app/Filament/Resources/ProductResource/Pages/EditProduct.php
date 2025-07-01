<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Product;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;
use Illuminate\Support\Facades\Log;


class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

protected function afterSave(): void
{
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
Log::info([
    'variant_id' => $variant->id,
    'sync_payload' => $syncData
]);

        // 🔥 This is the actual sync call
        $variant->attributeValues()->sync($syncData);
    }
}

}
