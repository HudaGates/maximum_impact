<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function approve()
    {
        $investment = [
            (object)[
                'id' => 1,
                'company_name' => 'Tech Innovations',
                'amount' => 100000,
                'investment_date' => '2019-10-17',
                'investment_type' => 'Real Estate',
            ],
            (object)[
                'id' => 2,
                'company_name' => 'Green Energy Corp',
                'amount' => 90000000,
                'investment_date' => '2019-10-22',
                'investment_type' => 'Venture Capital',
            ],
            (object)[
                'id' => 3,
                'company_name' => 'Tech Innovations',
                'amount' => 1000000,
                'investment_date' => '2020-09-08',
                'investment_type' => 'Venture Capital',
            ],
            (object)[
                'id' => 4,
                'company_name' => 'HealthTech Solutions',
                'amount' => 80000,
                'investment_date' => '2020-02-01',
                'investment_type' => 'Venture Capital',
            ],
        ];

        return view('investment.approve', compact('investment'));
    }

    public function show($id)
    {
        // Placeholder for detail page
        return "Detail for investment ID: $id";
    }
    public function status()
    {
        $investments = [
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Seed',
                'investment_type' => 'Real Estate',
                'sender' => 'Claire',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'approved',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Unknown',
                'investment_type' => 'Venture Capital',
                'sender' => 'Audrey',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'approved',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Seed',
                'investment_type' => 'Venture Capital',
                'sender' => 'Claire',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'rejected',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Unknown',
                'investment_type' => 'Venture Capital',
                'sender' => 'Audrey',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'rejected',
            ],
        ];

        return view('investment.status', compact('investments'));
}
public function create()
    {
        return view('investment.create', [
            'projects' => ['Project A- Housing Development', 'Project B - Application Development', 'Project C - Renewable Energy Factory'],
            'fundingTypes' => ['Equity', 'Debt', 'Grant'],
            'paymentMethods' => ['Bank Transfer', 'Credit Card', 'E-Wallet']
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'funding_type' => 'required',
            'project' => 'required',
            'payment_method' => 'required',
        ]);

        // Simpan ke database atau proses lainnya di sini...

        return redirect()->route('investment.create')->with('success', 'Investment registered successfully.');
    }
     public function index()
    {
        // Kamu bisa kirim data jika perlu
        return view('investment.investment-status');
    }
    public function show1()
    {
        $investment = Investment::where('user_id', auth()->id())->first();

        if (!$investment) {
            abort(404, 'Investment not found');
        }

        // Auto update dari 'Processed' ke 'Approved' jika lebih dari 1 menit
        if ($investment->status === 'Processed' && $investment->status_updated_at) {
            $elapsed = Carbon::now()->diffInMinutes($investment->status_updated_at);

            if ($elapsed >= 1) { // kamu bisa ganti waktunya (misalnya 10)
                $investment->status = 'Approved';
                $investment->status_updated_at = Carbon::now();
                $investment->save();
            }
        }

        return view('investment.investment-status', [
            'status' => $investment->status
        ]);
    }

public function report()
    {
        // Dummy data to simulate database records
        $data = [
            [
                'date' => '02/10/2024',
                'sender' => 'Mikarta',
                'source_bank' => 'BCA',
                'destination_bank' => 'BNI',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding',
            ],
            [
                'date' => '02/10/2024',
                'sender' => 'Micarta',
                'source_bank' => 'BCA',
                'destination_bank' => 'BNI',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding',
            ],
            [
                'no' => 3,
                'date' => '02/10/2024',
                'sender' => 'Mikarta',
                'source_bank' => 'BCA',
                'destination_bank' => 'BNI',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding',
            ],
            [
                'no' => 4,
                'date' => '02/10/2024',
                'sender' => 'Mikarta',
                'source_bank' => 'BCA',
                'destination_bank' => 'BNI',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding',
            ],
            [
                'no' => 5,
                'date' => '02/10/2024',
                'sender' => 'Mikarta',
                'source_bank' => 'BCA',
                'destination_bank' => 'BNI',
                'amount' => '$3 Million',
                'funding_type' => 'Series C Funding',
                'investment_type' => 'Crowdfunding',
            ],
            // You can add more dummy data here up to 10 for the first page
        ];

        return view('investment.investment-report', compact('data'));
    }
    public function expense(Request $request)
    {
        // Data dummy (biasanya ini dari database)
        $data = collect([
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #001'],
            ['date' => '02/10/2024', 'category' => 'External', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #002'],
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #003'],
            ['date' => '02/10/2024', 'category' => 'External', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #004'],
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #005'],
            ['date' => '02/10/2024', 'category' => 'External', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #006'],
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #007'],
            ['date' => '02/10/2024', 'category' => 'External', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #008'],
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #009'],
            ['date' => '02/10/2024', 'category' => 'External', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #010'],
            ['date' => '02/10/2024', 'category' => 'Internal', 'desc' => 'Lorem ipsum dolor sit amet', 'amount' => '$3 Million', 'proof' => 'Receipt #011'],
        ]);

        // Pagination manual (karena data dari array)


        return view('investment.investment-expense', compact('data'));
    }
    public function add()
    {
        return view('investment.add-income');
    }

    public function store1(Request $request)
    {
        // Validasi & simpan data di sini
        return redirect()->back()->with('success', 'Income added successfully!');
    }
     public function addexpense()
    {
        return view('investment.add-expense');
    }

    public function store2(Request $request)
    {
        // Validasi dan proses simpan (jika diperlukan)
        return redirect()->back()->with('success', 'Expense added successfully!');
    }
}
