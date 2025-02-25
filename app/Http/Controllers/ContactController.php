<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        

        Mail::to('admin@admin.com')->send(new ContactMailable($data));

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
