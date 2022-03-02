<?php

namespace App\Http\Controllers;

use App\DatabaseJson\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function saveContact(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email'
        ]);

        Contact::create($validatedData);

        return redirect('/');
    }
}