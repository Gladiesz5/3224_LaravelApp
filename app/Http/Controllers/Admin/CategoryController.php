<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #method index digunakan untuk menampilkan seluruh data dari database
    public function index(Request $request)
    {
        $query = Category::query();

        // SEARCH
        if ($request->search) {

            $query->where('name', 'LIKE', '%' . $request->search . '%');

        }

        $categories = $query->latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    #method create digunakan untuk menampilkan form input data baru
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    #method store digunakan untuk menyimpan data baru ke database setelah dilakukan validasi.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

       Category::create([

            'name' => $request->name,
            'slug' => Str::slug($request->name) 

        ]);

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    #method show digunakan untuk menampilkan detail data berdasarkan id yang dipilih
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    #method edit digunakan untuk menampilkan form edit data berdasarkan id yang dipilih
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    #method update digunakan untuk memperbarui data berdasarkan id yang dipilih
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    #method destroy digunakan untuk menghapus data berdasarkan id yang dipilih
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil dihapus');
    }
}