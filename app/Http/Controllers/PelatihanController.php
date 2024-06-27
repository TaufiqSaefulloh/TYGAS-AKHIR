<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index(){
        $categories = Category::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Pelatihan',
            'active' => 'pelatihan',
        ];
        return view('pelatihan', compact('categories','contacts'), $data);
    }
}
