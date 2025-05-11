<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('plants.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Plant::create($data);
        return redirect()->route('plants.index')->with('success', 'Plant created successfully.');
    }

    public function edit(Plant $plant)
    {
        $categories = Category::all();
        return view('plants.edit', compact('plant', 'categories'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $plant->update($data);
        return redirect()->route('plants.index')->with('success', 'Plant updated successfully.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plants.index')->with('success', 'Plant deleted.');
    }
}
