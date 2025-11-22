<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::query()->latest()->get();

        return view('contact-messages', [
            'messages' => $messages,
        ]);
    }

    public function create(): View
    {
        return view('contact');
    }

    public function store(ContactFormRequest $request): RedirectResponse
    {
        ContactMessage::create([
            ...$request->validated(),
            'consent' => $request->boolean('consent'),
        ]);

        return back()->with('status', 'Votre message a bien été envoyé.');
    }
}
