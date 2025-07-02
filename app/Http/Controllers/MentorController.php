<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\MentorEducation;
use App\Models\MentorExperience;
use App\Models\MentorSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// Carbon tidak digunakan di sini, jadi bisa dihapus untuk menjaga kebersihan kode
// use Carbon\Carbon;

class MentorController extends Controller
{
    /**
     * Menampilkan halaman pencarian mentor (findmentor).
     */
    public function index()
    {
        // Di sini Anda bisa menambahkan logika untuk mengambil semua mentor dari database
        $mentors = Mentor::latest()->paginate(10); // Contoh: ambil 10 mentor terbaru
        return view('community.findmentor', compact('mentors'));
    }

    /**
     * Menampilkan profil detail seorang mentor berdasarkan ID.
     * Kode sudah diperbaiki untuk mengambil data asli dari database.
     */
    public function show($id)
    {
        // Menggunakan findOrFail untuk otomatis menampilkan 404 jika ID tidak ditemukan.
        // Eager load relasi untuk performa yang lebih baik (menghindari N+1 problem).
        $mentor = Mentor::with(['experiences', 'educations', 'skills'])->findOrFail($id);

        return view('community.mentor-profile', compact('mentor'));
    }

    /**
     * Menampilkan halaman dashboard milik mentor yang sedang login.
     * Mengambil data asli dari database.
     */
    public function index1()
    {
        // Ambil data pengguna yang saat ini login
        $user = Auth::user();

        // Cari profil mentor berdasarkan user_id.
        // Jika tidak ada, buat profil baru dengan data default.
        $mentor = Mentor::firstOrCreate(
            ['user_id' => $user->id],
            [
                // FIX: Memberikan nilai default jika nama user null untuk mencegah error
                'name' => $user->name ?? 'Nama Belum Diisi',
                'job_title' => 'Jabatan Belum Diisi',
                'location' => 'Lokasi Belum Diisi',
                'institution' => 'Institusi Belum Diisi',
                'about' => 'Tuliskan deskripsi singkat tentang diri Anda di sini.'
            ]
        );

        // Ambil data relasi (experience, education, skills) milik mentor
        // Cara ini sudah benar karena $mentor adalah objek tunggal
        $experiences = $mentor->experiences()->get();
        $educations = $mentor->educations()->get();
        $skills = $mentor->skills()->get();

        // Kirim semua data yang diperlukan ke view
        return view('community.dashboard', compact('mentor', 'experiences', 'educations', 'skills'));
    }

    /**
     * Memproses pembaruan data profil dan 'About' dari mentor.
     */
    public function updateProfile(Request $request)
    {
        // Ambil profil mentor dari user yang sedang login
        $mentor = Auth::user()->mentor;

        // Validasi data yang masuk dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'about' => 'required|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Cek jika ada file foto profil yang di-upload
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada untuk menghemat ruang penyimpanan
            if ($mentor->profile_photo_path) {
                Storage::disk('public')->delete($mentor->profile_photo_path);
            }
            // Simpan foto baru di folder 'storage/app/public/profile-photos' dan dapatkan path-nya
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo_path'] = $path;
        }

        // Update data mentor dengan data yang sudah divalidasi
        $mentor->update($validated);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }


    /**
     * Menyimpan data experience baru ke database.
     * BEST PRACTICE: Disimpan melalui relasi mentor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'type' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        // Ambil mentor yang sedang login
        $mentor = Auth::user()->mentor;

        // Buat experience melalui relasi untuk otomatis mengisi mentor_id
        $mentor->experiences()->create($validated);

        return redirect()->back()->with('success', 'Experience berhasil ditambahkan!');
    }

    /**
     * Menyimpan data education baru ke database.
     * BEST PRACTICE: Disimpan melalui relasi mentor.
     */
    public function store1(Request $request)
    {
        $validated = $request->validate([
            'university' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'grade' => 'nullable|string|max:255',
            'activities' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Ambil mentor yang sedang login
        $mentor = Auth::user()->mentor;

        // Buat education melalui relasi untuk otomatis mengisi mentor_id
        $mentor->educations()->create($validated);

        return redirect()->back()->with('success', 'Edukasi berhasil ditambahkan!');
    }

    /**
     * Menyimpan data skill baru ke database.
     * BEST PRACTICE: Disimpan melalui relasi mentor.
     */
    public function store2(Request $request)
    {
        $validated = $request->validate([
            'skill_name' => 'required|string|max:255|unique:mentor_skills,skill_name,NULL,id,mentor_id,' . Auth::user()->mentor->id,
        ], [
            // Pesan error kustom jika skill sudah ada
            'skill_name.unique' => 'Skill ini sudah Anda tambahkan sebelumnya.'
        ]);

        // Ambil mentor yang sedang login
        $mentor = Auth::user()->mentor;

        // Buat skill melalui relasi untuk otomatis mengisi mentor_id
        $mentor->skills()->create([
            'skill_name' => $validated['skill_name'],
        ]);

        return redirect()->back()->with('success', 'Skill berhasil ditambahkan!');
    }
}