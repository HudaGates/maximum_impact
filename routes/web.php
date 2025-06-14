<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
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

Route::get('/', function () {
    return redirect('landingpage');
});

Route::get('/account/setup', [AccountController::class, 'setup']);

Route::get('/account/success', [AccountController::class, 'success']);

Route::get('/step8', [StepController::class, 'showStep8'])->name('step8');
Route::post('/step8', [StepController::class, 'submitStep8'])->name('step8.submit');
Route::get('/step9', [StepController::class, 'showStep9'])->name('step9');

Route::post('/step9', [StepController::class, 'submitStep9'])->name('step9.submit');
Route::get('/account/setup', [StepController::class, 'showAccountSetup'])->name('account.setup');

Route::get('/step1', [StepController::class, 'showStep1'])->name('step1');
Route::post('/step1', [StepController::class, 'submitStep1'])->name('step1.submit');
Route::get('/step2', [StepController::class, 'showStep2'])->name('step2');

Route::get('/step2', [StepController::class, 'showStep2'])->name('step2');
Route::post('/step2', [StepController::class, 'submitStep2'])->name('step2.submit');
Route::get('/step3', [StepController::class, 'showStep3'])->name('step3');

Route::get('/step3', [StepController::class, 'showStep3'])->name('step3');
Route::post('/step3', [StepController::class, 'submitStep3'])->name('step3.submit');
Route::get('/step4', [StepController::class, 'showStep4'])->name('step4');

Route::get('/step4', [StepController::class, 'showStep4'])->name('step4');
Route::post('/step4', [StepController::class, 'submitStep4'])->name('step4.submit');
Route::get('/step5', [StepController::class, 'showStep5'])->name('step5');

Route::get('/step5', [StepController::class, 'showStep5'])->name('step5');
Route::post('/step5', [StepController::class, 'submitStep5'])->name('step5.submit');
Route::get('/step6', [StepController::class, 'showStep6'])->name('step6');

Route::get('/step6', [StepController::class, 'showStep6'])->name('step6');
Route::post('/step6', [StepController::class, 'submitStep6'])->name('step6.submit');
Route::get('/step7', [StepController::class, 'showStep7'])->name('step7');

Route::get('/step7', [StepController::class, 'showStep7'])->name('step7');
Route::post('/step7', [StepController::class, 'submitStep7'])->name('step7.submit');
Route::get('/step8', [StepController::class, 'showStep8'])->name('step8');

Route::get('/myproject', [ProjectController::class, 'index'])->name('myproject.index');

Route::get('/strategy', [StrategyController::class, 'index'])->name('strategy.index');

Route::get('/community/investor', [InvestorController::class, 'index'])->name('investor.index');
Route::get('/community/find-investor-2', [InvestorController::class, 'findInvestor'])->name('community.find-investor-2');
Route::get('/community/investor/{id}', [InvestorController::class, 'show'])->name('investor.profile');
Route::get('/dashboard', [InvestorController::class, 'indexInvest'])->name('community.dashboard-invest');

Route::get('/investment', [InvestmentController::class, 'approve'])->name('investment.approve');
Route::get('/investment/{id}/details', [InvestmentController::class, 'show'])->name('investment.details');
Route::get('/investment/status', [InvestmentController::class, 'status'])->name('investment.status');


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
Route::get('/mentor', [MentorController::class, 'showDashboard'])->name('mentor.dashboard');



Route::get('/community/company', [CompanyReportController::class, 'comp'])->name('company.comp');
Route::get('/company-profile/{name}', [CompanyReportController::class, 'show'])->name('company.show');
Route::get('/community/company/profile', [CompanyReportController::class, 'index1'])->name('company.profile');
Route::post('/members/store', [CompanyReportController::class, 'store'])->name('members.store');

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/step1-invest', [StepInvestController::class, 'showStep1'])->name('step-invest.step1-invest');
Route::post('/step1-invest', [StepInvestController::class, 'submitStep1'])->name('step1-invest.submit');
Route::get('/step2-invest', [StepInvestController::class, 'showStep2'])->name('step-invest.step2-invest');

Route::get('/step2-invest', [StepInvestController::class, 'showStep2'])->name('step-invest.step2-invest');
Route::post('/step2-invest', [StepInvestController::class, 'submitStep2'])->name('step2-invest.submit');
Route::get('/step3-invest', [StepInvestController::class, 'showStep3'])->name('step-invest.step3-invest');

Route::get('/step3-invest', [StepInvestController::class, 'showStep3'])->name('step-invest.step3-invest');
Route::post('/step3-invest', [StepInvestController::class, 'submitStep3'])->name('step3-invest.submit');
Route::get('/step4-invest', [StepInvestController::class, 'showStep4'])->name('step-invest.step4-invest');

Route::get('/step4-invest', [StepInvestController::class, 'showStep4'])->name('step-invest.step4-invest');
Route::post('/step4-invest', [StepInvestController::class, 'submitStep4'])->name('step4-invest.submit');
Route::get('/step5-invest', [StepInvestController::class, 'showStep5'])->name('step-invest.step5-invest');

Route::get('/step5-invest', [StepInvestController::class, 'showStep5'])->name('step-invest.step5-invest');
Route::post('/step5-invest', [StepInvestController::class, 'submitStep5'])->name('step5-invest.submit');
Route::get('/step6-invest', [StepInvestController::class, 'showStep6'])->name('step-invest.step6-invest');

Route::get('/step6-invest', [StepInvestController::class, 'showStep6'])->name('step-invest.step6-invest');
Route::post('/step6-invest', [StepInvestController::class, 'submitStep6'])->name('step6-invest.submit');
Route::get('/step7-invest', [StepInvestController::class, 'showStep7'])->name('step-invest.step7-invest');

Route::get('/step7-invest', [StepInvestController::class, 'showStep7'])->name('step-invest.step7-invest');
Route::post('/step7-invest', [StepInvestController::class, 'submitStep7'])->name('step7-invest.submit');
Route::get('/step8-invest', [StepInvestController::class, 'showStep8'])->name('step-invest.step8-invest');

Route::get('/step8-invest', [StepInvestController::class, 'showStep8'])->name('step-invest.step8-invest');
Route::post('/step8-invest', [StepInvestController::class, 'submitStep8'])->name('step8-invest.submit');
Route::get('/step9-invest', [StepInvestController::class, 'showStep9'])->name('step-invest.step9-invest');

Route::post('/step9-invest', [StepInvestController::class, 'submitStep9'])->name('step9-invest.submit');
Route::get('/dashboard-invest', [StepInvestController::class, 'showDashboard'])->name('community.dashboard-invest');
