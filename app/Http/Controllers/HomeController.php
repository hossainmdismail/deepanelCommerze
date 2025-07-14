<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{

    public function home()
    {
        $products = Product::with(['variants'])->where('status', 'published')->get();

        $products = Product::with('variants')
            ->where('status', 'published')
            ->get()
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
                ];
            });


        return view('themes.ruhama.pages.home', compact('products'));
    }


    public function about()
    {
        return view('themes.ruhama.pages.about');
    }

    public function contact()
    {
        return view('themes.ruhama.pages.contact');
    }

    public function shop()
    {
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

        $category = Category::select('name','slug')->get();


        return view('themes.ruhama.pages.shop', [
            'products' => $products,
            'category' => $category,
        ]);
    }
}
