<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Category;

class PetugasPlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('petugas.plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('petugas.plants.create', compact('categories'));
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'price' => 'required|integer|min:0',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('plants', 'public');

    } else {
        $data['image'] = 'default.jpg';
    }

    Plant::create($data);

    return redirect()->route('petugas.plants.index')->with('success', 'Tanaman berhasil ditambahkan!');
}



    public function edit(Plant $plant)
    {
        $categories = Category::all();
        return view('petugas.plants.edit', compact('plant', 'categories'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);

        $plant->update($request->all());

        return redirect()->route('petugas.plants.index')->with('success', 'Tanaman berhasil diperbarui!');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect()->route('petugas.plants.index')->with('success', 'Tanaman berhasil dihapus!');
    }
}
