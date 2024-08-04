<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $gender = explode(',', $request->gender);
        $category = explode(',', $request->category);
         $products = Product::when(!empty($gender), function ($query) use ($gender) {
            if (in_array('all', $gender)) {
                return $query->where('gender', 'all');
            } elseif (count($gender) == 1) {
                return $query->where('gender', $gender[0]);
            } else {
                return $query->whereIn('gender', $gender);
            }
        })->when(!empty($category), function ($query) use ($category) {
            $categoryIds = Category::whereIn('name', $category)->pluck('id');
            return $query->whereIn('category_id', $categoryIds);
        })->get();


        // $display_style = $request->display_style; will work with products only for now

        return view('users.products', compact('products'));
    }
}
