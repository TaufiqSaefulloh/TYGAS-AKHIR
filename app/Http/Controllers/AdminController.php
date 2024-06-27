<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Form;
use App\Models\Kategoridetail;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        $form = Form::all();
        $categories = Category::all();
        $event = Event::all();
        $team = Team::all();
        $category_detail = Kategoridetail::all();
        $contacts = Contact::all();
        $totalUsers = User::count();
        $umumUsers = User::where('pengguna', 'Umum')->count();
        $umkmUsers = User::where('pengguna', 'Pelaku UMKM')->count();
        $data = [
            'title' => 'Admin Dashboard',
            'active' => 'dashboard',
            'user' => $user,
            'form' => $form,
            'categories' => $categories,
            'event' => $event,
            'team' => $team,
            'category_detail' => $category_detail,
            'contacts' => $contacts,
            'totalUsers' => $totalUsers,
            'umumUsers' => $umumUsers,
            'umkmUsers' => $umkmUsers,
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboard()
    {
        $totalUsers = User::count();
        $umumUsers = User::where('pengguna', 'Umum')->count();
        $umkmUsers = User::where('pengguna', 'Pelaku UMKM')->count();
        $user = User::all();
        $form = Form::all();
        $categories = Category::all();
        $event = Event::all();
        $team = Team::all();
        $category_detail = Kategoridetail::all();
        $contacts = Contact::all();
        $data = [
            'title' => 'Admin Dashboard',
            'active' => 'dashboard',
            'user' => $user,
            'form' => $form,
            'categories' => $categories,
            'event' => $event,
            'team' => $team,
            'category_detail' => $category_detail,
            'contacts' => $contacts,
            'totalUsers' => $totalUsers,
            'umumUsers' => $umumUsers,
            'umkmUsers' => $umkmUsers,
        ];
        return view('admin.dashboard', $data);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda'); // Redirect to the admin login page
    }
}
