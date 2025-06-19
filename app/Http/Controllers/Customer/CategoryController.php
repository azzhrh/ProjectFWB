<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Plant;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('customer.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $plants = Plant::where('category_id', $id)->get();
        return view('customer.categories.show', compact('category', 'plants'));
    }
}
