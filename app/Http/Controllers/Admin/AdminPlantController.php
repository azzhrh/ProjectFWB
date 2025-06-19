<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Category;

class AdminPlantController extends Controller
{
    // Tampilkan daftar tanaman
    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('admin.plants.index', compact('plants'));
    }

    // Form tambah tanaman
    public function create()
    {
        $categories = Category::all();
        return view('admin.plants.create', compact('categories'));
    }

    // Simpan tanaman baru
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('name', 'description', 'price', 'category_id', 'stock');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('plants', 'public');
    }

    Plant::create($data);

    return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil ditambahkan.');
}



    // Form edit tanaman
    public function edit(Plant $plant)
    {
        $categories = Category::all();
        return view('admin.plants.edit', compact('plant', 'categories'));
    }

    // Update data tanaman
   public function update(Request $request, Plant $plant)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('name', 'description', 'price', 'category_id', 'stock');

    if ($request->hasFile('image')) {
        if ($plant->image && file_exists(storage_path('app/public/' . $plant->image))) {
            unlink(storage_path('app/public/' . $plant->image));
        }
        $data['image'] = $request->file('image')->store('plants', 'public');
    }

    $plant->update($data);

    return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil diperbarui.');
}


    // Hapus tanaman
   public function destroy(Plant $plant)
{
    $plant->delete();
    return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil dihapus.');
}

}
