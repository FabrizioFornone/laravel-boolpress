<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSiteContactMail;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "nullable|string",
            "email" => "required|email",
            "message" => "required|string",
        ]);

        $newContact = new Contact();

        $newContact->fill($data);

        $newContact->save();

        Mail::to("admin@gmail.com")->send(new NewSiteContactMail($newContact));

        return response()->json($newContact);
    }
}
