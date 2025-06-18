<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        return view('community.findmentor');
    }

    public function show($id)
    {
        // Dummy data - bisa diganti nanti pakai database
        $mentors = [
            1 => [
                'name' => 'Jane Cooper',
                'skill' => 'UX Design',
                'rating' => 4.5,
                'reviews' => 120,
                'contact' => '070 4531 9507',
                'location' => 'New York',
                'industries' => ['Utilities', 'Health Care', 'IT', 'Manufacturing', 'Education', 'Finance'],
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
                'cv' => 'Cv Jane Cooper.pdf',
                'portfolio' => 'Portfolio Jane Cooper.pdf',
            ],
            // Kamu bisa tambahkan mentor lain
        ];

        if (!isset($mentors[$id])) {
            abort(404);
        }

        $mentor = $mentors[$id];

        return view('community.mentor-profile', compact('mentors'));
    }
    public function showDashboard()
{
    $mentor = [
        'name' => 'Agraditya Putra',
        'title' => 'UI/UX Designer',
        'location' => 'Jakarta Selatan, DKI Jakarta, Indonesia',
        'university' => 'Universitas Trisakti Jakarta Barat',
        'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
        'image' => asset('images/agraditya.jpg') // ganti sesuai lokasi file gambar mentor
    ];

    return view('community.dashboard', compact('mentor'));
}

 public function storeEducation(Request $request)
    {
        $request->validate([
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Simpan ke DB (model Education diasumsikan sudah ada)
        \App\Models\Education::create($request->all());

        return redirect()->back()->with('success', 'Education added successfully.');
    }

    public function storeExperience(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        \App\Models\Experience::create($request->all());

        return redirect()->back()->with('success', 'Experience added successfully.');
    }

    public function storeSkills(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
        ]);

        \App\Models\Skill::create($request->all());

        return redirect()->back()->with('success', 'Skill added successfully.');
    }

}
