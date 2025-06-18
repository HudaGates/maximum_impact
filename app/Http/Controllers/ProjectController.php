<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('myproject.index');
    }
    public function create()
    {
        return view('myproject.create');
    }

    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'name' => 'required|string|max:255',
            'pitch_deck' => 'nullable|file|mimes:pdf',
            'video' => 'nullable|file|mimes:mp4,mov,avi',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('pitch_deck')) {
            $pitchDeckPath = $request->file('pitch_deck')->store('pitch_decks', 'public');
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        // Simpan data ke database (contoh)
        // Project::create([...]);

        return redirect()->route('myprojects.create')->with('success', 'Project submitted successfully!');
    }
}
