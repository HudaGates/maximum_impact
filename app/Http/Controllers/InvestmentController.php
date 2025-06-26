<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Investment; // Pastikan model Investment di-import
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewInvestmentReceived;
use App\Notifications\InvestmentStatusUpdated;

class InvestmentController extends Controller
{
    // =========================================================================
    // Method yang diubah dan ditambahkan untuk alur baru
    // =========================================================================

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
            'funding_type' => 'required|string',
            'project' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $investment = Investment::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'funding_type' => $request->funding_type,
            'project' => $request->project,
            'payment_method' => $request->payment_method,
            'status' => 'pending', // Menggunakan 'pending' agar sesuai dengan filter di view
        ]);

        $admins = User::where('role', 'admin')->get();

        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewInvestmentReceived($investment));
        }

        return redirect()->route('investment.show_status', ['investment' => $investment->id]);
    }

    // === METHOD YANG DIMODIFIKASI ===
    // Method ini sekarang menerima Request untuk menangani filter status.
    public function status(Request $request)
    {
        // Mulai query builder untuk model Investment
        $query = Investment::with('user'); // Eager load data user untuk efisiensi

        // Terapkan filter jika parameter 'status_filter' ada di URL dan tidak kosong
        if ($request->filled('status_filter')) {
            $query->where('status', $request->status_filter);
        }

        // Ambil data investasi, diurutkan dari yang terbaru
        $investments = $query->latest()->get();
        
        // Asumsi: di model Investment, ada relasi `user` seperti ini:
        // public function user() { return $this->belongsTo(User::class); }
        // Dan di model User, ada kolom `name` atau `investor_name`
        // Jika nama investor ada di tabel 'investments', sesuaikan blade menjadi $item->investor_name
        
        // Kirim data ke view 'investment.status'
        return view('investment.status', compact('investments'));
    }
    
    // === METHOD BARU ===
    // Method ini menangani form submission dari tombol Approve/Reject
    public function updateStatus(Request $request, Investment $investment)
    {
        // Validasi input, pastikan status yang dikirim adalah 'approved' atau 'rejected'
        $request->validate([
            'status' => 'required|string|in:approved,rejected',
        ]);
        
        // Update status investasi
        $investment->update(['status' => $request->status]);

        // Kirim notifikasi ke pengguna bahwa status investasinya telah diperbarui
        $investment->user->notify(new InvestmentStatusUpdated($investment));
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Investment status has been updated to ' . $request->status . '.');
    }

    public function showUserStatus(Investment $investment)
    {
        if (Auth::id() !== $investment->user_id && !Auth::user()->isAdmin()) {
             abort(403, 'Unauthorized Access');
        }

        return view('investment.investment-status', [
            'status' => $investment->status
        ]);
    }

    public function accept(Investment $investment, $notificationId)
    {
        $investment->update(['status' => 'approved']); // diubah ke lowercase

        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }
        
        $investment->user->notify(new InvestmentStatusUpdated($investment));

        return redirect()->back()->with('success', 'Investment has been approved.');
    }

    public function ignore(Investment $investment, $notificationId)
    {
        $investment->update(['status' => 'rejected']); // diubah ke lowercase

        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        $investment->user->notify(new InvestmentStatusUpdated($investment));

        return redirect()->back()->with('success', 'Investment has been rejected.');
    }
    
    // =========================================================================
    // Method lain yang tidak diubah dan dibiarkan seperti aslinya
    // =========================================================================

    public function approve()
    {
        $investment = [
            (object)['id' => 1, 'company_name' => 'Tech Innovations', 'amount' => 100000, 'investment_date' => '2019-10-17', 'investment_type' => 'Real Estate'],
            (object)['id' => 2, 'company_name' => 'Green Energy Corp', 'amount' => 90000000, 'investment_date' => '2019-10-22', 'investment_type' => 'Venture Capital'],
            (object)['id' => 3, 'company_name' => 'Tech Innovations', 'amount' => 1000000, 'investment_date' => '2020-09-08', 'investment_type' => 'Venture Capital'],
            (object)['id' => 4, 'company_name' => 'HealthTech Solutions', 'amount' => 80000, 'investment_date' => '2020-02-01', 'investment_type' => 'Venture Capital'],
        ];
        return view('investment.approve', compact('investment'));
    }

    public function show($id)
    {
        return "Detail for investment ID: $id";
    }

    public function index()
    {
        return view('investment.investment-status');
    }

    public function show1()
    {
        $investment = Investment::where('user_id', auth()->id())->first();
        if (!$investment) { abort(404, 'Investment not found'); }
        if ($investment->status === 'Processed' && $investment->status_updated_at) {
            $elapsed = Carbon::now()->diffInMinutes($investment->status_updated_at);
            if ($elapsed >= 1) {
                $investment->status = 'Approved';
                $investment->status_updated_at = Carbon::now();
                $investment->save();
            }
        }
        return view('investment.investment-status', ['status' => $investment->status]);
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
        $request->validate(['date' => 'required|date', 'sender' => 'required|string|max:255', 'source_bank' => 'required|string|max:255', 'destination_bank' => 'required|string|max:255', 'amount' => 'required|numeric|min:0', 'funding_type' => 'required|string|max:255', 'investment_type' => 'required|string|max:255']);
        Income::create($request->all());
        return redirect()->route('investment.investment-report')->with('success', 'Income added successfully!');
    }

    public function addexpense()
    {
        $proofName = 'Receipt #001';
        $proofUrl = asset('storage/proofs/receipt_001.pdf');
        return view('investment.add-expense',compact('proofName', 'proofUrl'));
    }

    public function storeExpense(Request $request)
    {
        $validatedData = $request->validate(['date' => 'required|date', 'amount' => 'required|numeric|min:0', 'category' => 'required|string|max:255', 'description' => 'required|string', 'proof' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048']);
        $proofPath = null;
        if ($request->hasFile('proof')) { $proofPath = $request->file('proof')->store('proofs', 'public'); }
        Expense::create(['date' => $request->date, 'amount' => $request->amount, 'category' => $request->category, 'description' => $request->description, 'proof_path' => $proofPath]);
        return redirect()->route('investment.investment-expense')->with('success', 'Expense added successfully!');
    }
}