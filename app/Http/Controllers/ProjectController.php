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
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $chartData = array_fill(0, 12, 0);

        foreach ($projects as $project) {
            $month = Carbon::parse($project->created_at)->month;
            if (isset($chartData[$month - 1])) {
                $chartData[$month - 1]++;
            }
        }

        return view('myproject.index', [
            'projects' => $projects,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData
        ]);
    }

    /**
     * Menampilkan formulir untuk membuat proyek baru.
     */
    public function create(Request $request)
    {
        $selectedSdgs = $request->input('selected_sdgs', []);
        
        // Mengambil data form yang tersimpan dari session
        $formData = $request->session()->get('project_form_data', []);

    // 3. Definisikan allTags
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

    // 4. Kirim data yang sudah benar ke view
    return view('myproject.create', [
            'allTags' => $allTags,
            'selectedSdgs' => $selectedSdgs,
            'formData' => $formData
        ]);
    }

    /**
     * Menyimpan proyek yang baru dibuat ke database.
     */
    public function store(Request $request)
    {

        if ($request->input('action') == 'save_and_select_sdgs') {
            
            // Simpan semua input KECUALI token, action, dan semua input file
            $request->session()->put('project_form_data', $request->except([
                '_token', 'action', 'cover_image', 'pitch_deck', 'video'
            ]));

            // Arahkan ke halaman pemilihan SDG (sesuai alur terakhir)
            return redirect()->route('sdgs.step1');
        }


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

        $coverImagePath = $request->hasFile('cover_image') ? $request->file('cover_image')->store('project_covers', 'public') : null;
        $pitchDeckPath = $request->hasFile('pitch_deck') ? $request->file('pitch_deck')->store('pitch_decks', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('videos', 'public') : null;
        
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
            'sdgs_data' => $request->sdgs_data,
        ]);

        // Arahkan kembali ke halaman daftar proyek dengan pesan sukses
        $request->session()->forget(['project_form_data', 'selected_sdgs']);

        return redirect()->route('myproject.index')->with('success', 'Project has been registered successfully!');
    }
    // METHOD DI BAWAH INI TIDAK DIUBAH AGAR FUNGSIONALITAS LAIN TETAP BERJALAN
    
    public function sdgs()
    {
        $allSdgs = [ /* ... data lengkap SDG Anda (dengan id, name, image) ... */ ];
        $previouslySelected = session('selected_sdgs', []);
        return view('myproject.sdgs', compact('allSdgs', 'previouslySelected'));
    }

    public function saveSdgsAndGoToIndicators(Request $request)
    {
        $request->validate(['sdgs' => 'nullable|array']);
        $request->session()->put('selected_sdgs', $request->input('sdgs', []));
        return redirect()->route('myproject.indikator'); // Lanjut ke halaman selanjutnya
    }

    public function indicators()
    {
        return view('myproject.indikator');
    }

   public function metrics(Request $request)
    {
        $metrics = [
            // Your metric data here...
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

    /**
     * Ini method KUNCI. Dipanggil di akhir untuk kembali ke form utama.
     */
    public function saveFinalSelectionAndReturn(Request $request)
    {
        // 1. Validasi input untuk memastikan tipenya array (meskipun kosong)
        $request->validate([
            'selected_metrics' => 'nullable|array'
        ]);
        
        // 2. Ambil array berisi judul metrik yang dipilih dari form
        $selectedData = $request->input('selected_metrics', []);

        // 3. Hapus data lama dari session untuk menghindari konflik
        $request->session()->forget(['selected_sdgs', 'selected_metrics']);

        // 4. Arahkan kembali ke halaman create, sambil membawa data pilihan di URL
        // URL akan terlihat seperti: /projects/create?selected_sdgs[]=Judul+Metrik+1&selected_sdgs[]=Judul+Metrik+2
        return redirect()->route('projects.create', [
            'selected_sdgs' => $selectedData
        ]);
    }
}