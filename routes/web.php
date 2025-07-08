<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\StepInvestController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StrategyController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CompanyReportController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BusinessGrowthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================================================================
//      AWAL DARI WEB MIDDLEWARE GROUP (INI ADALAH SOLUSINYA)
// =====================================================================
Route::middleware('web')->group(function () {

    // Rute utama (homepage) akan langsung diarahkan ke landing page
    Route::get('/', function () {
        return redirect()->route('landingpage');
    });

    Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage');


    // ALUR PENDAFTARAN BARU
    Route::get('/account/success', [AccountController::class, 'success'])->name('account.success');
    Route::get('/account/setup', [StepController::class, 'showAccountSetup'])->name('account.setup');

    Route::get('/step1', [StepController::class, 'showStep1'])->name('step1');
Route::middleware(['auth'])->group(function () {
Route::get('/step1', [StepController::class, 'showStep1'])->name('step1');
Route::post('/step1', [StepController::class, 'submitStep1'])->name('step1.submit');
Route::get('/step2', [StepController::class, 'showStep2'])->name('step2');
Route::post('/step2', [StepController::class, 'submitStep2'])->name('step2.submit');
Route::get('/step3', [StepController::class, 'showStep3'])->name('step3');
Route::post('/step3', [StepController::class, 'submitStep3'])->name('step3.submit');
Route::get('/step4', [StepController::class, 'showStep4'])->name('step4');
Route::post('/step4', [StepController::class, 'submitStep4'])->name('step4.submit');
Route::get('/step5', [StepController::class, 'showStep5'])->name('step5');
Route::post('/step5', [StepController::class, 'submitStep5'])->name('step5.submit');
Route::get('/step6', [StepController::class, 'showStep6'])->name('step6');
Route::post('/step6', [StepController::class, 'submitStep6'])->name('step6.submit');
Route::get('/step7', [StepController::class, 'showStep7'])->name('step7');
Route::post('/step7', [StepController::class, 'submitStep7'])->name('step7.submit');
Route::get('/step8', [StepController::class, 'showStep8'])->name('step8');
Route::post('/step8', [StepController::class, 'submitStep8'])->name('step8.submit');
Route::get('/step9', [StepController::class, 'showStep9'])->name('step9');
Route::post('/step9', [StepController::class, 'submitStep9'])->name('step9.submit');
});

    Route::get('/myproject', [ProjectController::class, 'index'])->name('myproject.index');
    Route::get('/myproject/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/myprojects/sdgs', [ProjectController::class, 'sdgs'])->name('myproject.sdgs');
    Route::get('/myproject/create/sdgs/indicators', [ProjectController::class, 'indicators'])->name('myproject.indikator');
    Route::get('/myproject/create/sdgs/metrics', [ProjectController::class, 'metrics'])->name('myproject.metrics');
    Route::post('/myproject/save-selection', [ProjectController::class, 'saveFinalSelectionAndReturn'])->name('projects.saveSelection');
    

    Route::get('/strategy', [StrategyController::class, 'index'])->name('strategy.index');
    Route::get('/strategy/strategy', [StrategyController::class, 'index1'])->name('strategy.strategy');


    Route::get('/community/investor', [InvestorController::class, 'index'])->name('investor.index');
    Route::get('/community/find-investor-2', [InvestorController::class, 'findInvestor'])->name('community.find-investor-2');
    Route::get('/community/investor/{id}', [InvestorController::class, 'show'])->name('investor.profile');

Route::get('/strategy', [StrategyController::class, 'index'])->name('strategy.index');
Route::get('/strategy/strategy', [StrategyController::class, 'index1'])->name('strategy.strategy');
Route::get('/strategy', [StrategyController::class, 'index'])->name('strategy');
Route::post('/strategy/strategy', [StrategyController::class, 'storeStrategy'])->name('strategy.store');


    Route::get('/invest', [InvestmentController::class, 'create'])->name('investment.create');
    Route::post('/invest', [InvestmentController::class, 'store'])->name('investment.store');
    Route::get('/investment/{investment}/status', [InvestmentController::class, 'showUserStatus'])->name('investment.show_status');
    Route::patch('/investment/{investment}/update-status', [InvestmentController::class, 'updateStatus'])->name('investment.updateStatus');
    Route::get('/investment', [InvestmentController::class, 'approve'])->name('investment.approve');
    Route::get('/investment/{id}/details', [InvestmentController::class, 'show'])->name('investment.details');
    Route::get('/investment/status', [InvestmentController::class, 'status'])->name('investment.status');
    Route::get('/invest/investment-status', [InvestmentController::class, 'index'])->name('investment.investment-status');
    Route::get('/investment/delete-rejected/{id}', [InvestmentController::class, 'deleteRejected'])->name('investment.deleteRejected');
    Route::get('/investment-report', [InvestmentController::class, 'report'])->name('investment.investment-report');
    Route::get('/investment-expense', [InvestmentController::class, 'expense'])->name('investment.investment-expense');
    Route::get('/investment/add-income', [InvestmentController::class, 'add'])->name('investment.add-income');
    Route::get('/investment/add-expense', [InvestmentController::class, 'addexpense'])->name('investment.add-expense');
    Route::post('/income/store', [InvestmentController::class, 'storeIncome'])->name('income.store');
    Route::post('/expense/store', [InvestmentController::class, 'storeExpense'])->name('expense.store');
    Route::get('/investment/{investment}/accept/{notification}', [InvestmentController::class, 'accept'])->name('investment.accept');
    Route::get('/investment/{investment}/ignore/{notification}', [InvestmentController::class, 'ignore'])->name('investment.ignore');

    Route::get('/report-overview', [ReportController::class, 'overview'])->name('reports.overview');

    Route::get('/register-step1', [RegisterController::class, 'showStep1'])->name('register.step1');
    Route::post('/register-step1', [RegisterController::class, 'handleStep1'])->name('register.step1.post');
    Route::get('/register-step2', [RegisterController::class, 'showStep2'])->name('register.step2');
    Route::post('/register-step2', [RegisterController::class, 'handleStep2'])->name('register.step2.post');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/community/mentor', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/community/mentor/{id}', [MentorController::class, 'show'])->name('mentors.show');

    // Memperbaiki sintaks yang error dan menggabungkannya
    Route::middleware('sudah_login')->group(function() {
        Route::get('/mentor', [MentorController::class, 'index1'])->name('mentor.dashboard');
        Route::put('/mentor/{mentor}', [MentorController::class, 'update'])->name('mentor.update');
        Route::post('/experience/store', [MentorController::class, 'store'])->name('experience.store');
        Route::post('/education/store', [MentorController::class, 'store1'])->name('education.store');
        Route::post('/skills', [MentorController::class, 'store2'])->name('skills.store');
    });

    Route::get('/community/company', [CompanyReportController::class, 'comp'])->name('company.comp');
    Route::get('/company-profile/{name}', [CompanyReportController::class, 'show'])->name('company.show');
    Route::get('/community/company/profile', [CompanyReportController::class, 'index1'])->name('company.profile');
    Route::post('/members/store', [CompanyReportController::class, 'store'])->name('members.store');
    Route::get('/company-profiles', [CompanyReportController::class, 'profile'])->name('community.company-profiles');

    Route::get('/step1-invest', [StepInvestController::class, 'showStep1'])->name('step-invest.step1-invest');
Route::post('/step1-invest', [StepInvestController::class, 'submitStep1'])->name('step1-invest.submit');
Route::get('/step2-invest', [StepInvestController::class, 'showStep2'])->name('step-invest.step2-invest');
Route::post('/step2-invest', [StepInvestController::class, 'submitStep2'])->name('step2-invest.submit');
Route::get('/step3-invest', [StepInvestController::class, 'showStep3'])->name('step-invest.step3-invest');
Route::post('/step3-invest', [StepInvestController::class, 'submitStep3'])->name('step3-invest.submit');
Route::get('/step4-invest', [StepInvestController::class, 'showStep4'])->name('step-invest.step4-invest');
Route::post('/step4-invest', [StepInvestController::class, 'submitStep4'])->name('step4-invest.submit');
Route::get('/step5-invest', [StepInvestController::class, 'showStep5'])->name('step-invest.step5-invest');
Route::post('/step5-invest', [StepInvestController::class, 'submitStep5'])->name('step5-invest.submit');
Route::get('/step6-invest', [StepInvestController::class, 'showStep6'])->name('step-invest.step6-invest');
Route::post('/step6-invest', [StepInvestController::class, 'submitStep6'])->name('step6-invest.submit');
Route::get('/step7-invest', [StepInvestController::class, 'showStep7'])->name('step-invest.step7-invest');
Route::post('/step7-invest', [StepInvestController::class, 'submitStep7'])->name('step7-invest.submit');
Route::get('/step8-invest', [StepInvestController::class, 'showStep8'])->name('step-invest.step8-invest');
Route::post('/step8-invest', [StepInvestController::class, 'submitStep8'])->name('step8-invest.submit');
Route::get('/step9-invest', [StepInvestController::class, 'showStep9'])->name('step-invest.step9-invest');
Route::post('/step9-invest', [StepInvestController::class, 'submitStep9'])->name('step9-invest.submit');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('community.dashboard-business');
        Route::get('/dashboard-invest', [DashboardController::class, 'indexInvest'])
        ->middleware('auth')
        ->name('community.dashboard-invest');
    
    // ... semua route bussines-growth ...
// Rute untuk menampilkan halaman (GET)
// Hapus semua route "bussines-growth" yang lama dan ganti dengan blok ini.

Route::prefix('business-growth')->name('business-growth.')->group(function () {
    
    // --- Langkah 1 ---
    Route::get('/step1', [BusinessGrowthController::class, 'showStep1'])->name('step1.show');
    Route::post('/step1', [BusinessGrowthController::class, 'storeStep1'])->name('step1.store');

    // --- Langkah 2 ---
    Route::get('/step2', [BusinessGrowthController::class, 'showStep2'])->name('step2.show');
    Route::post('/step2', [BusinessGrowthController::class, 'storeStep2'])->name('step2.store');

    // --- Langkah 3 ---
    Route::get('/step3', [BusinessGrowthController::class, 'showStep3'])->name('step3.show');
    Route::post('/step3', [BusinessGrowthController::class, 'storeStep3'])->name('step3.store');
    
    // --- Langkah 4 ---
    Route::get('/step4', [BusinessGrowthController::class, 'showStep4'])->name('step4.show');
    Route::post('/step4', [BusinessGrowthController::class, 'storeStep4'])->name('step4.store');

    // --- Langkah 5 ---
    Route::get('/step5', [BusinessGrowthController::class, 'showStep5'])->name('step5.show');
    Route::post('/step5', [BusinessGrowthController::class, 'storeStep5'])->name('step5.store');
    
    // --- Langkah 6 (Halaman Transisi) ---
    Route::get('/step6', [BusinessGrowthController::class, 'showStep6'])->name('step6.show');
    // Tidak ada route POST untuk step 6 karena itu hanya halaman perantara

    // --- Langkah 7 ---
    Route::get('/step7', [BusinessGrowthController::class, 'showStep7'])->name('step7.show');
    Route::post('/step7', [BusinessGrowthController::class, 'storeStep7'])->name('step7.store');

    // --- Langkah 8 (Halaman Selesai) ---
    Route::get('/step8', [BusinessGrowthController::class, 'showStep8'])->name('step8.show');
});

    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    
    Route::get('/myproject/metrics', [ProjectController::class, 'metrics'])->name('myproject.metrics');

    Route::put('/dashboard/profile', [MentorController::class, 'updateProfile'])->name('mentor.profile.update');

    // RUTE YANG ANDA PERBAIKI SEKARANG AKAN BERFUNGSI DENGAN BAIK


});
