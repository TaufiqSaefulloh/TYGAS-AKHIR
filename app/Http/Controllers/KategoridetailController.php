<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Kategoridetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KategoridetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoridetails = Kategoridetail::all();
        $category = Category::all()->pluck('judul', 'id');
        $data = [
            'title' => 'Detail Kategori',
            'active' => 'kategoridetail',
            'category' => $category,
        ];
        return view('admin.kategoridetail.index', compact('kategoridetails'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Detail Kategori',
            'active' => 'kategoridetail] create',
            'category' => Category::all(),
        ];
        return view('admin.kategoridetail.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'video' => 'required|min:1',
            'video1' => 'required|min:1',
            'video2' => 'required|min:1',
            'video3' => 'required|min:1',
            'deskripsi' => 'required|min:1',
            'judul' => 'required|min:1',
            'file_pdf' => 'required|file|mimes:pdf|max:5000', // Maximum 5MB
        ]);

        $file_path = $request->file('file_pdf')->store('public/pdf_files');

        Kategoridetail::create([
            'id_kategori' => $request->id_kategori,
            'video' => $request->video,
            'video1' => $request->video1,
            'video2' => $request->video2,
            'video3' => $request->video3,
            'deskripsi' => $request->deskripsi,
            'judul' => $request->judul,
            'file_pdf' => $file_path,
        ]);

        return redirect()->route('kategoridetail.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoridetail = Kategoridetail::findOrFail($id);
        $categories = Category::all();

        return view('admin.kategoridetail.edit', compact('kategoridetail', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoridetail = Kategoridetail::findOrFail($id);

        $request->validate([
            'id_kategori' => 'required',
            'video' => 'required|min:1',
            'video1' => 'required|min:1',
            'video2' => 'required|min:1',
            'video3' => 'required|min:1',
            'deskripsi' => 'required|min:1',
            'judul' => 'required|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:2048', // Maximum 2MB
        ]);

        // If there's a new PDF file uploaded
        if ($request->hasFile('file_pdf')) {
            // Delete old PDF file if exists
            if (Storage::exists('public/pdf_files/' . $kategoridetail->file_pdf)) {
                Storage::delete('public/pdf_files/' . $kategoridetail->file_pdf);
            }

            // Upload new PDF file with the original name to the public directory
            $file_path = $request->file('file_pdf')->store('public/pdf_files');

            // Update the file path in database
            $kategoridetail->file_pdf = $file_path;
        }

        // Update other fields
        $kategoridetail->id_kategori = $request->id_kategori;
        $kategoridetail->video = $request->video;
        $kategoridetail->video1 = $request->video1;
        $kategoridetail->video2 = $request->video2;
        $kategoridetail->video3 = $request->video3;
        $kategoridetail->deskripsi = $request->deskripsi;
        $kategoridetail->judul = $request->judul;
        $kategoridetail->save();

        return redirect()->route('kategoridetail.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $kategoridetail = Kategoridetail::findOrFail($id);
        if (Storage::exists('public/pdf_files/' . $kategoridetail->file_pdf)) {
            Storage::delete('public/pdf_files/' . $kategoridetail->file_pdf);
        }
        $kategoridetail->delete();

        return redirect()->route('kategoridetail.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
