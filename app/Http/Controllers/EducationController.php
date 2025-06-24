<?php

namespace App\Http\Controllers;

use App\Models\Education; // <-- DIUBAH: Gunakan model Education
use Illuminate\Http\Request;

class EducationController extends Controller // <-- DIUBAH: Nama class harus sesuai nama file
{
    public function store(Request $request)
    {
        // Validasi disesuaikan untuk Education
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'school_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4|gte:start_year',
        ]);

        // DIUBAH: Membuat record Education baru
        Education::create($request->all());
        return back()->with('success', 'Education added successfully.');
    }

    public function update(Request $request, Education $education) // <-- DIUBAH: Gunakan objek Education
    {
        // Validasi disesuaikan untuk Education
        $request->validate([
            'school_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'start_year' => 'required|digits:4',
            'end_year' => 'nullable|digits:4|gte:start_year',
        ]);

        // DIUBAH: Update objek education
        $education->update($request->all());
        return back()->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education) // <-- DIUBAH: Gunakan objek Education
    {
        $education->delete();
        return back()->with('success', 'Education deleted successfully.');
    }
}