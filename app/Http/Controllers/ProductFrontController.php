<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ProductFrontController extends Controller
{
    public function product($slug)
    {
        $product = Product::with([
            'variants.attributeValues.attribute',
            'categories'
        ])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Base / min / max price logic
        $minPrice = $product->is_variant_based
            ? $product->variants->min('price')
            : $product->base_price;

        $maxPrice = $product->is_variant_based
            ? $product->variants->max('price')
            : null;

        // Extract unique attributes from variants
        $attributes = [];

        foreach ($product->variants as $variant) {
            if (!empty($variant->attributeValues)) {
                foreach ($variant->attributeValues as $av) {
                    if ($av?->attribute) {
                        $attrId = $av->attribute->id;
                        $valId = $av->id;

                        $attributes[$attrId]['id'] = $attrId;
                        $attributes[$attrId]['name'] = $av->attribute->name;
                        $attributes[$attrId]['values'][$valId] = [
                            'id' => $valId,
                            'value' => $av->value,
                        ];
                    }
                }
            }
        }

        // Format attributes for Blade
        $formattedAttributes = array_values(array_map(function ($attr) {
            $attr['values'] = array_values($attr['values']);
            return $attr;
        }, $attributes));

        // Variants formatted for frontend JS matching
        $formattedVariants = $product->variants->map(function ($v) {
            return [
                'id' => $v->id,
                'sku' => $v->sku,
                'price' => $v->price,
                'stock' => $v->stock,
                'image' => $v->image,
                'attributes' => $v->attributeValues->map(function ($av) {
                    return [
                        'attribute_id' => $av->attribute_id,
                        'attribute_value_id' => $av->id,
                    ];
                })->toArray(),
            ];
        })->toArray();

        $products = Product::with(['variants'])->with('categories')->where('status', 'published')->get();

        $products = Product::with('variants')
            ->where('status', 'published')
            ->get()
            ->take(20)
            ->map(function ($product) {
                $price = $product->is_variant_based
                    ? optional($product->variants->sortBy('price')->first())->price
                    : $product->base_price;

                $maxPrice = $product->is_variant_based
                    ? optional($product->variants->sortByDesc('price')->first())->price
                    : null;

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'thumbnail' => $product->thumbnail,
                    'price' => $price,
                    'max_price' => $maxPrice,
                    'is_variant_based' => $product->is_variant_based,
                    'categories' => $product->categories->pluck('slug')->toArray()
                ];
            });

        return view('themes.ruhama.pages.product', [
            'productView' => $product,
            'products' => $products,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'attributes' => $formattedAttributes,
            'variants' => $formattedVariants,
        ]);
    }

    public function cart(Request $request){
        dd($request->all());
    }

    public function cartShow(){

        $shippings = Shipping::where('status','active')->get();

        return view('themes.ruhama.pages.cart',['shippings' =>$shippings]);
    }
}
