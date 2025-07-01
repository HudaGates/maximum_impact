<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Penting untuk mendapatkan user yang login
use Carbon\Carbon; // Penting untuk memanipulasi tanggal

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar proyek milik pengguna yang sedang login.
     */
     public function index()
    {
        // 1. Ambil semua proyek milik user yang login
        $projects = Project::where('user_id', Auth::id())->latest()->get();

        // 2. Siapkan data untuk chart
        // Buat label untuk 12 bulan
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        // Buat array data dengan nilai awal 0 untuk setiap bulan
        $chartData = array_fill(0, 12, 0);

        // 3. Loop setiap proyek dan hitung berdasarkan bulan pembuatannya
        foreach ($projects as $project) {
            // Ambil bulan dari tanggal 'created_at' (misal: 1 untuk Januari, 2 untuk Februari, dst.)
            $month = Carbon::parse($project->created_at)->month;
            
            // Tambahkan 1 ke bulan yang sesuai. Kurangi 1 karena array dimulai dari indeks 0.
            $chartData[$month - 1]++;
        }

        // 4. Kirim semua data yang diperlukan ke view
        return view('myproject.index', [
            'projects' => $projects,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData
        ]);
    }

    /**
     * Menampilkan formulir untuk membuat proyek baru.
     */
    public function create()
    {
        // Definisikan semua tag yang bisa dipilih di formulir
        $allTags = [
            'Agriculture', 'Air', 'Biodiversity and Ecosystems', 'Climate',
            'Diversity and Inclusion', 'Education', 'Employment', 'Energy',
            'Financial Services', 'Health', 'Infrastructure', 'Land',
            'Oceans and Coastal Zones', 'Pollution', 'Real Estate', 'Waste', 'Water',
            'Smallholder Agriculture', 'Sustainable Agriculture', 'Food Security', 'Clean Air',
            'Biodiversity and Ecosystem Conservation', 'Climate Change Mitigation',
            'Climate Resilience and Adaptation', 'Gender Lens', 'Racial Equity',
            'Access to Quality Education', 'Quality Jobs', 'Energy Access', 'Clean Energy',
            'Energy Efficiency', 'Financial Inclusion', 'Access to Quality Healthcare',
            'Nutrition', 'Resilient Infrastructure', 'Natural Resources Conservation',
            'Sustainable Land Management'
        ];

        // Kirim variabel $allTags ke view
        return view('myproject.create', ['allTags' => $allTags]);
    }

    /**
     * Menyimpan proyek yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'goals' => 'nullable|string|max:255',
            'market' => 'nullable|string|max:255',
            'tag' => 'nullable|string',
            'start_day' => 'required|numeric|between:1,31',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_day' => 'required|numeric|between:1,31',
            'end_month' => 'required|string',
            'end_year' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar sampul
            'pitch_deck' => 'nullable|mimes:pdf|max:10240', // PDF bisa lebih besar
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/x-ms-wmv,video/avi|max:51200', // Video bisa lebih besar
            'category' => 'nullable|in:New Business,Existing Business',
            'investment_needs' => 'nullable|string|max:255',
            'roadmap' => 'nullable|string',
        ]);
        
        // Gabungkan tanggal dari dropdown menjadi format yang bisa dibaca oleh Carbon
        $startDateString = $request->start_day . '-' . $request->start_month . '-' . $request->start_year;
        $endDateString = $request->end_day . '-' . $request->end_month . '-' . $request->end_year;
        
        // Proses upload file jika ada
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('project_covers', 'public');
        }

        $pitchDeckPath = null;
        if ($request->hasFile('pitch_deck')) {
            $pitchDeckPath = $request->file('pitch_deck')->store('pitch_decks', 'public');
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }
        
        // Buat entri baru di tabel 'projects'
        Project::create([
            'user_id' => Auth::id(), // Simpan ID pengguna yang membuat proyek
            'name' => $request->name,
            'description' => $request->description,
            'goals' => $request->goals,
            'market' => $request->market,
            'tag' => $request->tag, // Menyimpan string tag yang dipisahkan koma
            'start_date' => Carbon::createFromFormat('d-F-Y', $startDateString)->format('Y-m-d'), // Simpan sebagai format Y-m-d
            'end_date' => Carbon::createFromFormat('d-F-Y', $endDateString)->format('Y-m-d'), // Simpan sebagai format Y-m-d
            'cover_image' => $coverImagePath, // Simpan path gambar sampul
            'pitch_deck' => $pitchDeckPath,
            'video' => $videoPath,
            'category' => $request->category,
            'investment_needs' => $request->investment_needs,
            'roadmap' => $request->roadmap,
        ]);

        // Arahkan kembali ke halaman daftar proyek dengan pesan sukses
        return redirect()->route('myproject.index')->with('success', 'Project has been registered successfully!');
    }

    // METHOD DI BAWAH INI TIDAK DIUBAH AGAR FUNGSIONALITAS LAIN TETAP BERJALAN
    
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
        // Logika untuk method metrics
        return view('myproject.metrics', ['metrics' => []]); // Sesuaikan jika perlu
    }
}