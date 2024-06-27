<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Event',
            'active' => 'event',
            'events' => $events,
            'contact' => $contacts
        ];
        return view('admin.event.index', $data);
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
            'contacts'=>$contacts
        ];
        return view('admin.event.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'judul'   => 'required|min:1',
            'tanggal'   => 'required|min:1',
            'waktu'   => 'required|min:1',
            'lokasi'   => 'required|min:1',
            'link_pendaftaran'   => 'required|min:1',
            'hal'   => 'required|min:1',
            'tentang'   => 'required|min:1',
            'narasumber'   => 'required|min:1',
            'syarat'   => 'required|min:1',
            'biaya'   => 'required|min:1',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/events', $image->hashName());

        Event::create([
            'image'     => $image->hashName(),
            'judul'   => $request->judul,
            'tanggal'   => $request->tanggal,
            'waktu'   => $request->waktu,
            'lokasi'   => $request->lokasi,
            'link_pendaftaran'   => $request->link_pendaftaran,
            'hal'   => $request->hal,
            'tentang'   => $request->tentang,
            'biaya'   => $request->biaya,
            'syarat'   => $request->syarat,
            'narasumber'   => $request->narasumber,
        ]);

        return redirect()->route('event.index')->with(['success' => 'Event Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'judul'   => 'required|min:1',
            'tanggal'   => 'required|min:1',
            'waktu'   => 'required|min:1',
            'lokasi'   => 'required|min:1',
            'link_pendaftaran'   => 'required|min:1',
            'hal'   => 'required|min:1',
            'tentang'   => 'required|min:1',
            'narasumber'   => 'required|min:1',
            'syarat'   => 'required|min:1',
            'biaya'   => 'required|min:1',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/events', $image->hashName());
            $event->image = $image->hashName();
        }

        $event->judul = $request->judul;
        $event->tanggal = $request->tanggal;
        $event->waktu = $request->waktu;
        $event->lokasi = $request->lokasi;
        $event->link_pendaftaran = $request->link_pendaftaran;
        $event->hal = $request->hal;
        $event->tentang = $request->tentang;
        $event->biaya = $request->biaya;
        $event->syarat = $request->syarat;
        $event->narasumber = $request->narasumber;
        
        $event->save();

        return redirect()->route('event.index')->with(['success' => 'Event berhasil diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
         // Hapus gambar dari penyimpanan
         Storage::delete('public/events/'.$event->image);
    
         // Hapus kategori dari database
         $event->delete();
     
         return redirect()->route('event.index')->with(['success' => 'Event berhasil dihapus!']);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }
}
