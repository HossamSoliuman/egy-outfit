<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $gender = $request->input('gender', []);
        $category = $request->input('category', []);
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $minRating = $request->input('min_rating');
        $size = $request->input('size', []);
        $color = $request->input('color', []);
        $material = $request->input('material', []);
        $brand = $request->input('brand', []);

        $products = Product::when($gender, function ($query) use ($gender) {
            if (is_array($gender)) {
                return $query->whereIn('gender', $gender);
            }
        })
            ->when($category, function ($query) use ($category) {
                if (is_array($category)) {
                    $categoryIds = Category::whereIn('name', $category)->pluck('id');
                    return $query->whereIn('category_id', $categoryIds);
                }
            })
            ->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->when($minRating, function ($query) use ($minRating) {
                return $query->where('rating', '>=', $minRating);
            })
            ->when($size, function ($query) use ($size) {
                if (is_array($size)) {
                    return $query->whereIn('size', $size);
                }
            })
            ->when($color, function ($query) use ($color) {
                if (is_array($color)) {
                    return $query->whereIn('color', $color);
                }
            })
            ->when($material, function ($query) use ($material) {
                if (is_array($material)) {
                    return $query->whereIn('material', $material);
                }
            })
            ->when($brand, function ($query) use ($brand) {
                if (is_array($brand)) {
                    return $query->whereIn('brand_id', $brand);
                }
            })
            ->get();

        return view('users.products', compact('products'));
    }
}
