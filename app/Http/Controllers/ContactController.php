<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{

    public function index()
    {
        //$contact = Contact::all();
        //$contact = Contact::paginate(5);
        $contact = Contact::orderBy('id', 'desc')->get();

        return Inertia::render('Contact/Index', compact('contact'));
    }


    public function create()
    {
        return Inertia::render('Contact/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return Redirect::route('contact.index');
        //kalau route harus huruf kecil
    }


    public function show(contact $contact)
    {


        //$data = Contact::find('$contact')->get();
        return Inertia::render('Contact/Show', compact('contact'));
    }


    public function edit(contact $contact)
    {
        return Inertia::render('Contact/Edit', compact('contact'));
    }


    public function update(Request $request, contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return Redirect::route('contact.index');
    }


    public function destroy(contact $contact)
    {
        $contact->delete();
        return Redirect::route('contact.index');
    }
}
