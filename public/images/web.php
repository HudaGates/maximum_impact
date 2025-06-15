<?php

use Illuminate\Support\Facades\Route;

Route::get('/invesment-review', function () {
    return view('community.invesment-review');
});



Route::get('/', function () {
    return view('community.findmentor');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/community', function () {
    return view('community.index');
})->name('community.index');

Route::get('/project', function () {
    return view('project.index');
})->name('project.index');

Route::get('/mentor', function () {
    return view('community.mentor');
})->name('mentor.index');


Route::get('/invest', function () {
    return view('community.invesment');
})->name('invest.index');

Route::get('/community', function () {
    return view('community.findmentor');
})->name('community.index');

Route::get('/companyreport', function () {
    return view('community.companyreport');
});

Route::get('/investment-report', function () {
    return view('community.investment-report');
});



Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');

Route::post('/education', [EducationController::class, 'modal'])->name('education.modal');

Route::post('/skills', [EducationController::class, 'modull'])->name('skills.modul');

use App\Http\Controllers\MentorController;

Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');
