<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $data = [
            'title' => 'Login User',
            'active' => 'login',
        ];
        return view('login.index', compact('contacts'), $data);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.index')->with('success', 'Login successful!');
            } elseif ($user->role === 'user') {
                return redirect()->route('beranda')->with('success', 'Login successful!');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized role.'])->withInput();
            }
        } else {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }


    public function profil()
    {
        $user = Auth::user();
        $contact = Contact::all();

        $data = [
            'title' => 'Profile User',
            'active' => 'profil',
            'users' => $user,
            'contacts' => $contact
        ];
        return view('pages.profil', $data);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }

    public function update_profil($id, Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/profiles'), $imageName);

            User::where('id', $id)->update([
                'profile_image' => 'uploads/profiles/' . $imageName,
            ]);
        }
        User::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'nama_usaha' => $request->nama_usaha,
            'tentang' => $request->tentang,
            'karyawan' => $request->karyawan,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function remove_profile_image()
    {
        if (Auth::user()->profile_image) {
            $path = public_path(Auth::user()->profile_image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        // Hapus jalur gambar profil dari database
        User::where('id', Auth::user()->id)->update([
            'profile_image' => null,
        ]);
        return redirect()->back();
    }

    public function ubah_password($id, Request $request)
    {
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        User::where('id', $id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}
