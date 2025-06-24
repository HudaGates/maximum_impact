<?php

namespace App\Http\Controllers;

use App\Models\Skill; // <-- DIUBAH: Gunakan model Skill
use Illuminate\Http\Request;

class SkillController extends Controller // <-- DIUBAH: Nama class harus sesuai nama file
{
    public function store(Request $request)
    {
        // Validasi disesuaikan untuk Skill
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'name' => 'required|string|max:255',
        ]);
        
        // Cek duplikat untuk menghindari skill yang sama ditambahkan berulang kali
        $existing = Skill::where('mentor_id', $request->mentor_id)
                         ->where('name', $request->name)
                         ->exists();
                         
        if (!$existing) {
            // DIUBAH: Membuat record Skill baru
            Skill::create($request->all());
        }

        return back()->with('success', 'Skill added successfully.');
    }

    // UPDATE untuk Skill biasanya tidak diperlukan, karena skill biasanya hanya ditambah/dihapus.
    // Namun jika Anda butuh, ini kodenya:
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $skill->update($request->all());
        return back()->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill) // <-- DIUBAH: Gunakan objek Skill
    {
        $skill->delete();
        return back()->with('success', 'Skill removed successfully.');
    }
}