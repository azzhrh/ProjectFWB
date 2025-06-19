<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plant; // <-- Tambahkan ini
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('customer.categories.index', compact('categories'));
    }

    public function byCategory(Category $category)
    {
        $plants = Plant::where('category_id', $category->id)->get();
        return view('customer.catalog.bycategory', compact('plants', 'category'));
    }
}
