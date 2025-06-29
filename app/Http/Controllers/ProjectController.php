<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    public function index()
    {
        return view('myproject.index');
    }
    public function create()
    {
        return view('myproject.create');
        
    return view('myproject.sdgs'); // Pastikan file view ini ada
}


    public function store(Request $request)
{
    // Pastikan pengguna sudah login


    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'goals' => 'nullable|string|max:255',
        'market' => 'nullable|string|max:255',
        'tag' => 'nullable|string|max:255',
        'start_day' => 'required|numeric|between:1,31', // Ubah integer menjadi numeric
        'start_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
        'start_year' => 'required|integer|between:2024,2030',
        'end_day' => 'required|numeric|between:1,31', // Ubah integer menjadi numeric
        'end_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
        'end_year' => 'required|integer|between:2024,2030',
        'pitch_deck' => 'nullable|mimes:pdf|max:2048',
        'video' => 'nullable|mimetypes:video/*|max:10240',
        'category' => 'nullable|in:New Business,Existing Business',
        'investment_needs' => 'nullable|string|max:255',
        'roadmap' => 'nullable|string',
    ]);

    // Konversi bulan teks ke angka
    $monthMap = [
        'January' => '01', 'February' => '02', 'March' => '03', 'April' => '04',
        'May' => '05', 'June' => '06', 'July' => '07', 'August' => '08',
        'September' => '09', 'October' => '10', 'November' => '11', 'December' => '12'
    ];

    // Konversi start_day dan end_day ke integer
    $start_day = (int) $request->start_day; // Konversi string "01" menjadi 1
    $end_day = (int) $request->end_day;

    // Format tanggal: DD-MM-YYYY
    $start_date = sprintf(
        '%02d-%s-%04d',
        $start_day,
        $monthMap[$request->start_month],
        $request->start_year
    );
    $end_date = sprintf(
        '%02d-%s-%04d',
        $end_day,
        $monthMap[$request->end_month],
        $request->end_year
    );

    // Validasi apakah tanggal valid
    try {
        \Carbon\Carbon::createFromFormat('d-m-Y', $start_date);
        \Carbon\Carbon::createFromFormat('d-m-Y', $end_date);
    } catch (\Exception $e) {
        return back()->withErrors(['date' => 'Invalid date format or combination.'])->withInput();
    }

    // Simpan file jika ada
    $pitchDeckPath = null;
    if ($request->hasFile('pitch_deck')) {
        $pitchDeckPath = $request->file('pitch_deck')->store('pitch_decks', 'public');
    }

    $videoPath = null;
    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('videos', 'public');
    }

    // Simpan data proyek
    Project::create([
        'name' => $request->name,
        'description' => $request->description,
        'goals' => $request->goals,
        'market' => $request->market,
        'tag' => $request->tag,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'pitch_deck' => $pitchDeckPath,
        'video' => $videoPath,
        'category' => $request->category,
        'investment_needs' => $request->investment_needs,
        'roadmap' => $request->roadmap,
        
    ]);

   return redirect()->route('projects.index')->with('success', 'Project submitted successfully!');
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