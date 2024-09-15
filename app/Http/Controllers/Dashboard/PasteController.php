<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;

class PasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Paste/Index', [
            'pastes' => fn () => Paste::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paste = Paste::find($id);

        return Inertia::render('Admin/Paste/Show', [
            'paste' => [
                'id' => $paste->id,
                'email_address' => $paste->email_address,
                'ticket_number' => $paste->ticket_number,
                'body' => Crypt::decrypt($paste->body, false),
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paste = Paste::find($id);
        $paste->delete();
        return redirect()->route('admin.pastes.index')
            ->with('success', 'Paste has been deleted.');
    }
}
