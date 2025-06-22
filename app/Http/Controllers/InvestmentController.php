<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Investment; // Import model Investment
use Carbon\Carbon;          // Import Carbon untuk manipulasi tanggal

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

        return redirect()->route('investment.create')->with('success', 'Investment registered successfully.');
    }

    public function index()
    {
        return view('investment.investment-status');
    }

    public function show1()
    {
        $investment = Investment::where('user_id', auth()->id())->first();

        if (!$investment) {
            abort(404, 'Investment not found');
        }

        if ($investment->status === 'Processed' && $investment->status_updated_at) {
            $elapsed = Carbon::now()->diffInMinutes($investment->status_updated_at);

            if ($elapsed >= 1) {
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
        $data = Income::latest()->get();
        return view('investment.investment-report', compact('data'));
    }

    public function expense(Request $request)
    {
        $data = Expense::latest()->get();
        $total_expense = Expense::sum('amount');
        
        return view('investment.investment-expense', compact('data', 'total_expense'));
    }

    public function add()
    {
        return view('investment.add-income');
    }

    public function storeIncome(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'sender' => 'required|string|max:255',
            'source_bank' => 'required|string|max:255',
            'destination_bank' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'funding_type' => 'required|string|max:255',
            'investment_type' => 'required|string|max:255',
        ]);
        
        Income::create($request->all());

        return redirect()->route('investment.investment-report')->with('success', 'Income added successfully!');
    }

    public function addexpense()
    {
        return view('investment.add-expense');
    }

    public function storeExpense(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'proof' => 'nullable|string|max:255',
        ]);

        Expense::create($request->all());
        
        return redirect()->route('investment.investment-expense')->with('success', 'Expense added successfully!');
    }
}