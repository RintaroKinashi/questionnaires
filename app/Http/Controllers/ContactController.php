<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $inputs = request()->validate([
            'title' => 'required|max:255',
            'email' => 'required|max:255',
            'body' => 'required',
        ]);
        Contact::create($inputs);
        return back()->with('massage', 'メールを送信しました。ご確認ください。');
    }
}
