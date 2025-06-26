<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class CompanyReportController extends Controller
{
    public function comp(Request $request)
{
    $search = strtolower(request('search', ''));

$allCompanies = [
    [
        'name' => 'Lion Bird',
        'founded' => '17 Oct, 2020',
        'last_funding' => '17 Oct, 2020',
        'type' => 'Series A',
        'employees' => 429,
        'industries' => 'Lorem ipsum',
        'description' => 'Lorem ipsum dolor sit amet',
        'departments' => 'Engineering, Finance, HR'
    ],
    [
        'name' => 'Adidas',
        'founded' => '22 Oct, 2020',
        'last_funding' => '21 Sep, 2020',
        'type' => 'Series A',
        'employees' => 492,
        'industries' => 'Lorem ipsum',
        'description' => 'Lorem ipsum dolor sit amet',
        'departments' => 'Engineering, Finance, HR'
    ],
];

$companies = collect($allCompanies)->filter(function ($company) use ($search) {
    if ($search === '') return true;

    return str_contains(strtolower($company['name']), $search)
        || str_contains(strtolower($company['description']), $search)
        || str_contains(strtolower($company['departments']), $search)
        || str_contains(strtolower($company['industries']), $search);
})->values()->toArray();


    return view('community.find-company', [
        'companies' => $companies,
        'search' => $request->search
    ]);
}

    public function show($name)
    {
        // Dummy data bisa diganti nanti dengan database
        $companies = [
           1 => [
                'name' => 'Lion Bird',
                'founded' => '17 Oct, 2020',
                'last_funding' => '17 Oct, 2020',
                'type' => 'Series A',
                'employees' => 429,
                'industries' => 'Lorem ipsum',
                'description' => 'Lorem ipsum dolor sit amet',
                'departments' => 'Engineering, Finance, HR'
            ],
            [
                'name' => 'Adidas',
                'founded' => '22 Oct, 2020',
                'last_funding' => '21 Sep, 2020',
                'type' => 'Series A',
                'employees' => 492,
                'industries' => 'Lorem ipsum',
                'description' => 'Lorem ipsum dolor sit amet',
                'departments' => 'Engineering, Finance, HR'
            ],
            // Tambah data lainnya sesuai kebutuhan...
        ];

        return view('community.company-profile', compact('companies'));
    }

    /**
     * Menampilkan halaman laporan perusahaan.
     * Data yang ditampilkan di halaman ini diasumsikan diambil dari database atau sumber lain.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Di sini Anda akan mengambil data yang diperlukan untuk ditampilkan di laporan.
        // Contoh data (ini harusnya diambil dari database):

        // Data Perusahaan
        $company = [
            'name' => 'Lion Bird',
            'slogan' => 'Smart Robotics for Construction Sites',
            'logo' => asset('images/mask-group.png') // Asumsi logo disimpan di public/images
        ];

        // Data Progres (Misalnya, dari data bulanan)
        $progress = [
            'percentage' => 75, // Contoh persentase progres
            'label' => 'This Month’s Completed Report'
        ];

        // Data Status Pembaruan
        $statuses = [
            [
                'title' => 'Business Development',
                'last_update' => 'Update on April 10, 2025',
                'icon' => asset('images/logo-acc.png'),
                'needs_action' => false
            ],
            [
                'title' => 'Revenue',
                'last_update' => 'Update on April 10, 2025',
                'icon' => asset('images/logo-acc.png'),
                'needs_action' => false
            ],
            [
                'title' => 'Net Profit',
                'last_update' => 'Update on April 17, 2025',
                'icon' => asset('images/logo-acc.png'),
                'needs_action' => false
            ],
            [
                'title' => 'Team Development',
                'last_update' => 'Update Needed',
                'icon' => asset('images/logo-decline.png'),
                'needs_action' => true,
                'action_text' => 'Report Now!'
            ],
            [
                'title' => 'Impact',
                'last_update' => 'Update on April 22, 2025',
                'icon' => asset('images/logo-acc.png'),
                'needs_action' => false
            ]
        ];

        // Data untuk chart (seperti yang ada di blade Anda, tapi ini bisa dinamis)
        $chartData = [
            'revenue' => [
                'label' => "Revenue",
                'data' => [30, 50, 75, 40, 75],
                'color' => '#f59e0b',
            ],
            'profit' => [
                'label' => "Net Profit",
                'data' => [20, 40, 50, 60, 62],
                'color' => '#1c2d59',
            ],
            'impact' => [
                'label' => "Impact",
                'data' => [10, 25, 30, 32, 35],
                'color' => '#ef4444',
            ]
        ];

        // Data Proyek (ini bisa dari model ProjectFund atau sejenisnya)
        $projectFunds = [
            [
                'no' => 1,
                'project_name' => 'Mikarta',
                'time' => '02/10/2024',
                'sent_by' => 'Mikarto',
                'sender_bank_account' => '(BCA) 08855489267',
                'amount' => 'IDR 15.000.000',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding'
            ],
            [
                'no' => 2,
                'project_name' => 'Micarta',
                'time' => '02/10/2024',
                'sent_by' => 'Micarta',
                'sender_bank_account' => 'BCA',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding'
            ],
            [
                'no' => 3,
                'project_name' => 'Mikarta',
                'time' => '02/10/2024',
                'sent_by' => 'Mikarta',
                'sender_bank_account' => 'BCA',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding'
            ],
            [
                'no' => 4,
                'project_name' => 'Mikarta',
                'time' => '02/10/2024',
                'sent_by' => 'Mikarta',
                'sender_bank_account' => 'BCA',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding'
            ],
            [
                'no' => 5,
                'project_name' => 'Mikarta',
                'time' => '02/10/2024',
                'sent_by' => 'Mikarta',
                'sender_bank_account' => 'BCA',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding'
            ],
        ];

        // Meneruskan data ke view
        return view('community.companyreport', compact(
            'company',
            'progress',
            'statuses',
            'chartData',
            'projectFunds'
        ));
    }

    public function index1()
{
    // 1. Hapus semua data statis
    // 2. Ganti dengan satu baris ini untuk mengambil semua data dari database
    $members = Member::all();

    // 3. Kirim data $members yang sudah dari database ke view
    return view('community.company-profile', compact('members'));

    }

    // Menyimpan data profil perusahaan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'website' => 'nullable|url',
        ]);
        $members = [
        (object)[ 'name' => 'Jane Cooper', 'photo' => '/img/jane.jpg', 'job_title' => 'CEO', 'department' => 'Lorem ipsum dolor sit...', 'location' => 'Location 1' ],
        (object)[ 'name' => 'Wade Warren', 'photo' => '/img/wade.jpg', 'job_title' => 'CTO', 'department' => 'Lorem ipsum...', 'location' => 'Location 2' ],
        (object)[ 'name' => 'Esther Howard', 'photo' => '/img/esther.jpg', 'job_title' => 'Team Lead', 'department' => 'Lorem ipsum...', 'location' => 'Location 1' ],
        (object)[ 'name' => 'Cameron Williamson', 'photo' => '/img/cameron.jpg', 'job_title' => 'Team Lead', 'department' => 'Lorem ipsum...', 'location' => 'Location 2' ],
        (object)[ 'name' => 'Brooklyn Simmons', 'photo' => '/img/cameron.jpg', 'job_title' => 'Team Lead', 'department' => 'Lorem ipsum...', 'location' => 'Location 2' ],
    ];

    return view('company.profile', compact('members'));


        Company::create($validated);

        return redirect()->back()->with('success', 'Company profile saved successfully!');
    }
    public function store1(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'job_title' => 'required',
        'department' => 'required',
        'location' => 'required',
        'photo' => 'nullable|image|max:2048',
    ]);

    // Simpan file
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = '/storage/' . $path;
    } else {
        $validated['photo'] = '/img/default.jpg';
    }

    // Simpan ke DB (dummy / simulasi)
    session()->push('members', (object) $validated);

    return redirect()->route('community.company-profile', ['tab' => 'people'])->with('success', 'Member added!');
}
public function profile()
    {
        // Data statis untuk contoh (bisa diambil dari database jika dibutuhkan)
        $company = [
            'name' => 'Lion Bird',
            'type' => 'Software as a Service (SaaS)',
            'description' => 'To become a global leader in providing innovative, secure, and sustainable cloud-based software solutions, empowering businesses worldwide to operate more efficiently, flexibly, and competitively in the digital economy.',
            'phone' => '070 4531 9507',
            'location' => 'New York',
            'logo' => 'images/lion-bird.png',
        ];

        $team = [
    [
        'name' => 'Claire',
        'position' => 'Web Designer',
        'image' => 'images/team/claire.png',
    ],
    [
        'name' => 'Albert Flores',
        'position' => 'Marketing Coordinator',
        'image' => 'images/team/albert.png',
    ],
    // ... dan seterusnya
];
    $fundings = [
    ['team' => 'Dallas Cowboys', 'industry' => 'Software', 'stage' => 'Series A', 'amount' => '$2 Million', 'year' => '2021'],
    ['team' => 'Chicago Bears', 'industry' => 'Renewable Energy', 'stage' => 'Seed', 'amount' => '$1.5 Million', 'year' => '2020'],
    ['team' => 'Green Bay Packers', 'industry' => 'Software', 'stage' => 'Series A', 'amount' => '$2 Million', 'year' => '2021'],
    ['team' => 'Carolina Panthers', 'industry' => 'Health Care', 'stage' => 'Series B', 'amount' => '$3 Million', 'year' => '2022'],
];


        return view('community.company-profiles', compact('company', 'team', 'fundings'));
    }
}
