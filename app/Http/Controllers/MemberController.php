<?php

// app/Http/Controllers/MemberController.php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- PASTIKAN BARIS INI ADA

class MemberController extends Controller
{
    /**
     * Menyimpan member baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // 2. Handle upload foto jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('member_photos', 'public');
            $validatedData['photo'] = $path;
        }

        // 3. Simpan data ke database
        Member::create($validatedData);

        // 4. Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'New member has been added successfully!');
    }


    // ==========================================================
    // FUNGSI-FUNGSI BARU DITAMBAHKAN DI SINI
    // ==========================================================

    /**
     * Tampilkan form untuk mengedit member.
     * Ini akan memperbaiki error "undefined method edit".
     */
    public function edit(Member $member)
    {
        // Laravel otomatis menemukan member berdasarkan ID dari URL.
        // Kita kirim data member tersebut ke view 'community.edit-member'
        return view('community.edit-member', compact('member'));
    }

    /**
     * Perbarui data member yang sudah ada di database.
     */
    public function update(Request $request, Member $member)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Cek jika ada file foto baru yang di-upload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada, untuk menghindari file sampah
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            // Simpan foto baru dan update path-nya
            $path = $request->file('photo')->store('member_photos', 'public');
            $validatedData['photo'] = $path;
        }

        // Update data member di database
        $member->update($validatedData);

        // Redirect ke halaman profil utama dengan pesan sukses
        return redirect()->route('community.company-profiles')->with('success', 'Member updated successfully!');
    }

    /**
     * Hapus member dari database.
     */
    public function destroy(Member $member)
    {
        // Hapus foto dari storage jika ada
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        // Hapus data dari database
        $member->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Member deleted successfully!');
    }
}