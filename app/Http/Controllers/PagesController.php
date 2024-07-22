<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Kategoridetail;
use App\Models\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function beranda()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Beranda',
            'active' => 'beranda',
        ];
        return view('pages.beranda', compact('categories', 'contacts'), $data);
    }
    public function pelatihan()
    {
        $categories = Category::all();
        $category_detail = Kategoridetail::all()->random(0);
        $contacts = Contact::all();
        $data = [
            'title' => 'Pelatihan',
            'active' => 'pelatihan',
            'categories' => $categories,
            'contacts' => $contacts,
            'category_detail' => $category_detail,
        ];
        return view('pages.pelatihan', $data);
    }
    public function tentang()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $teams = Team::all();
        $data = [
            'title' => 'Tentang Kami',
            'active' => 'tentangkami',
            'categories' => $categories,
            'contacts' => $contacts,
            'teams' => $teams,
        ];
        return view('pages.tentangkami', $data);
    }
    public function bantuan()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Bantuan',
            'active' => 'bantuan',
        ];
        return view('pages.bantuan', compact('categories', 'contacts'), $data);
    }
    public function event()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $events = Event::all();

        $data = [
            'title' => 'Event',
            'active' => 'event',
            'events' => $events,

        ];
        return view('pages.event', compact('categories', 'contacts'), $data);
    }
    public function detailpelatihan($id)
    {
        $category = Category::where('id', $id)->first();    
        $category_detail = Kategoridetail::find($id);
        $category_details = Kategoridetail::where('id_kategori', $category_detail->id_kategori)->get();
        $contacts = Contact::all();
        $data = [
            'category' => $category,
            'title' => 'Detail Pelatihan',
            'active' => 'detailpelatihan',
            'contacts' => $contacts,
            'category_detail' => $category_detail,
            'category_details' => $category_details,
        ];
        return view('pages.detailpelatihan', $data);
    }
    public function detailkategori($id)
    {
        // return $id;
        $category = Category::where('id', $id)->first();
        $category_detail = Kategoridetail::where('id_kategori', $category->id)->get();
        $data = [
            'category' => $category,
            'category_detail' => $category_detail,
            'title' => 'Detail Kategori',
            'active' => 'detailkategori',
            'contacts' => Contact::all(),
        ];
        return view('pages.detailkategori', $data);
    }
    public function detailevent($id)
    {
        $events = Event::where('id', $id)->first();
        $categories = Category::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Detail Event',
            'active' => 'detailevent',
            'event' => $events,
        ];
        return view('pages.detailevent', compact('categories', 'contacts'), $data);
    }
    public function materi($id, $materi)
    {
        $category_detail = Kategoridetail::findOrFail($id);
        $category_details = Kategoridetail::where('id_kategori', $category_detail->id_kategori)->get();

        $category = Category::where('id', $id)->first();    
        $contacts = Contact::all();
        $data = [
            'active' => 'Materi Pelatihan',
            'title' => 'materipelatihan',
            'category' => $category,
            'category_detail' => $category_detail,
            'category_details' => $category_details,
            'contacts' => $contacts,
        ];
        // Determine which video to display based on the materi number
        switch ($materi) {
            case 1:
                $video_url = $category_detail->video;
                break;
            case 2:
                $video_url = $category_detail->video1;
                break;
            case 3:
                $video_url = $category_detail->video2;
                break;
            case 4:
                $video_url = $category_detail->video3;
                break;
            default:
                abort(404);
        }

        return view('pages.materipelatihan',$data, compact('video_url'));
    }
    public function eror(){
        $data = [
            'active' => '404',
            'title' => '404'
        ];
        return view('pages.404', $data);
    }
    public function pendaftaran(){
        $contacts = Contact::all();

        $data = [
            'title'=>'pedaftaran',
            'active'=>'pendaftaran',
            'contacts'=>$contacts,
        ];
        return view('pages.pendaftaran',$data);
    }
}
