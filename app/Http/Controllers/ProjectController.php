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
    public function sdgs()
    {
        return view('myproject.sdgs');
    }
    public function indicators()
{
    return view('myproject.indikator');
}
public function metrics()
    {
        $metrics = [
            [
                'id' => 1,
                'title' => 'Client Individuals: Smallholder',
                'description' => 'Number of unique smallholder farmer individuals who were clients during the reporting period.'
            ],
            [
                'id' => 2,
                'title' => 'Supplier Individuals: Smallholder',
                'description' => 'Number of smallholder farmer individuals who sold to the organization during the reporting period.'
            ],
            [
                'id' => 3,
                'title' => 'Payments to Supplier Individuals: Smallholder',
                'description' => 'Value of payments made to smallholder farmer individuals who sold to the organization.'
            ],
            [
                'id' => 4,
                'title' => 'Percent Supplier Payments to Smallholders',
                'description' => 'Payments made to smallholder farmer suppliers as a percentage of total payments made to all suppliers.'
            ],
            // ...tambahkan sesuai kebutuhan
        ];

        return view('myproject.metrics', compact('metrics'));
    }
}
