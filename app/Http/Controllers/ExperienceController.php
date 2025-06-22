<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'company_name' => 'required|string',
            'position' => 'required|string',
            // ... validasi lain ...
        ]);
        Experience::create($request->all());
        return back()->with('success', 'Experience added.');
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([ /* ... validasi ... */ ]);
        $experience->update($request->all());
        return back()->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience deleted.');
    }
}