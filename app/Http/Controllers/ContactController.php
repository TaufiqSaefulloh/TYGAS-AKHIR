<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();

        $data = [
            'title' => 'Kontak',
            'active' => 'kontak',
            'contact' => $contact
        ];
        return view('admin.contact.index', $data);
    }
        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'instagram' => 'required',
            'facebook' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect()->route('admin.contact.index')->with('success', 'Contact created successfully.');
    }
    public function edit( $id)
    {
        $contact = Contact::find($id);
        $data = [
            'title' => 'Edit Kontak',
            'active' => 'edit contact',
            'contact' => $contact,
        ];
        return view('admin.contact.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'instagram' => 'required',
            'facebook' => 'required',
        ]);
    
        $contact->update($validatedData);
    
        return redirect()->route('admin.contact.index')->with('success', 'Contact updated successfully.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
