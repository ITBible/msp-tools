<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;

class PasteController extends Controller
{
    /**
     * Display a paste input form.
     */
    public function index()
    {
        return Inertia::render('Paste/Index');
    }

    /**
     * Store a newly created paste in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email_address' => 'required|email',
            'ticket_number' => config('paste.require_ticket') ? 'required' : '',
            'body' => 'required'
        ]);

        if($validated) {
            $paste = new Paste;
            $paste->email_address = $validated['email_address'];
            $paste->ticket_number = $validated['ticket_number'];;
            $paste->body = Crypt::encryptString($validated['body']);
            $paste->save();

            return redirect()->route('paste.index')
                ->banner('You\'ve successfully submitted your paste!');
        }

        return redirect()->route('paste.index')
            ->dangerBanner('There was an error submitting your paste!');
    }

}
