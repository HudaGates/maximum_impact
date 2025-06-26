<?php

namespace App\Http\Controllers;
use App\Models\MentorEducation;
use App\Models\MentorExperience;
use App\Models\MentorSkill;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
    public function index1()
    {
        // Dummy data sementara
        $user = [
            'name' => 'Agraditya Putra',
            'job_title' => 'UI/UX Designer',
            'location' => 'Jakarta Selatan, DKI Jakarta, Indonesia',
            'institution' => 'Universitas Trisakti Jakarta Barat',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt...'
        ];
        $experiences = MentorExperience::all();
        $educations = MentorEducation::all();
        $skills = MentorSkill::all();

        return view('community.dashboard', compact('user', 'experiences','educations','skills'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'position' => 'required|string|max:255',
        'type' => 'required|string',
        'company' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'description' => 'nullable|string',
    ]);
    

    MentorExperience::create($validated);

    return redirect()->back()->with('success', 'Experience added successfully!');
}
public function store1(Request $request)
{
    $validated = $request->validate([
            'university' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date_month' => 'nullable|string',
            'start_date_year' => 'nullable|numeric',
            'end_date_month' => 'nullable|string',
            'end_date_year' => 'nullable|numeric',
            'grade' => 'nullable|string|max:255',
            'activities' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Gabungkan bulan dan tahun menjadi tanggal yang valid
        $start_date = null;
        if ($request->start_date_month && $request->start_date_year) {
            $start_date = Carbon::createFromFormat('F Y', $request->start_date_month . ' ' . $request->start_date_year);
        }

        $end_date = null;
        if ($request->end_date_month && $request->end_date_year) {
            $end_date = Carbon::createFromFormat('F Y', $request->end_date_month . ' ' . $request->end_date_year);
        }
         MentorEducation::create($validated);

        return redirect()->back()->with('success', 'Education added successfully!');
    }
    public function store2(Request $request)
{
    $validated = $request->validate([
            'skill_name' => 'required|string|max:255',
        ]);
         MentorSkill::create(['skill_name' => $validated['skill_name'],
    ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
}

}