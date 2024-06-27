<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        $categories = Category::all();
        $data = [
            'title' => 'Category',
            'active' => 'category',
        ];
        return view('admin.category.index', compact('contacts','categories'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::all();
        $data = [
            'title' => 'Category_create',
            'active' => 'category_create',
        ];
        return view('admin.category.create', compact('contacts'), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'deskripsi'   => 'required|min:1',
            'judul'   => 'required|min:1'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        Category::create([
            'image'     => $image->hashName(),
            'deskripsi'   => $request->deskripsi,
            'judul'   => $request->judul
        ]);

        return redirect()->route('category.index')->with(['success' => 'Gambar Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'deskripsi'   => 'required|min:1',
            'judul'   => 'required|min:1'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());
            $category->image = $image->hashName();
        }

        $category->deskripsi = $request->deskripsi;
        $category->judul = $request->judul;
        $category->save();

        return redirect()->route('category.index')->with(['success' => 'Kategori berhasil diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus gambar dari penyimpanan
        Storage::delete('public/categories/'.$category->image);
    
        // Hapus kategori dari database
        $category->delete();
    
        return redirect()->route('category.index')->with(['success' => 'Kategori berhasil dihapus!']);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

}
