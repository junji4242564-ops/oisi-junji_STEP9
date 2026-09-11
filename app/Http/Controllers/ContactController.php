<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to(config('mail.admin_address', 'admin@example.com'))
            ->send(new ContactMail($validated));

        return redirect()->route('contact.complete');
    }

    public function complete()
    {
        return view('contact.complete');
    }
}