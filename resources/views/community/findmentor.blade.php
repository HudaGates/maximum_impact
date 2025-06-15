@extends('layouts.app-2')

<style>
    thead.custom-header {
        background-color: #001f3f !important;
        color: white !important;
        display: table-header-group;
    }

    thead.custom-header th {
        color: white !important;
        background-color: #232F65 !important;
    }
</style>


@section('content')
<div class="container-fluid px-4 mt-4">
<h3 class="fw-bold mb-4" style="color: #232F65;">Find Mentor</h3>


<div class="row mt-4">
    <div class="col-md-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="fw-bold mb-0">FILTER</h6>
            <img src="{{ asset('images/filter.png') }}" alt="Filter Icon" width="16" height="16">
        </div>

        <div class="border rounded-3 p-3">
            <p class="fw-semibold">Skill</p>
            @foreach (['Data Analytics', 'Enterprise - PLM', 'Enterprise - ERP', 'IT - Infrastructure'] as $skill)
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="{{ $skill }}">
                    <label class="form-check-label" for="{{ $skill }}">{{ $skill }}</label>
                </div>
            @endforeach

            <p class="mt-3 fw-semibold">Experience</p>
            @foreach (['Industrial and Warehousing', 'Retail', 'Hospitality', 'Entertainment and Recreation', 'Education'] as $exp)
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="{{ $exp }}">
                    <label class="form-check-label" for="{{ $exp }}">{{ $exp }}</label>
                </div>
            @endforeach

            <p class="mt-3 fw-semibold">INDUSTRIES</p>
        </div>

    </div>

    <div class="col-md-9">
        <div class="input-group mb-4" style="max-width: 1000px;">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0 border-end-0" placeholder="Search Data" value="{{ request('search') }}">
            <button class="btn text-white" style="background-color: #1F2A69;">Search</button>
        </div>

        <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="text-center align-middle costum header">
                    <tr>
                        <th scope="col" style="background-color: #1F2A69; color: white; border-top-left-radius: 12px "><input type="checkbox"></th>
                        <th scope="col" style="background-color: #1F2A69; color: white;">Full Name</th>
                        <th scope="col" style="background-color: #1F2A69; color: white;">Skills</th>
                        <th scope="col" style="background-color: #1F2A69; color: white;">Number of Contact</th>
                        <th scope="col" style="background-color: #1F2A69; color: white;">Location</th>
                        <th scope="col" style="background-color: #1F2A69; color: white;">Experience</th>
                        <th scope="col" style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Industries</th>
                    </tr>
                </thead>



                <tbody>
                    @foreach ([
                        ['name' => 'Jane Cooper', 'skill' => 'UX Design', 'contact' => '070 4531 9507'],
                        ['name' => 'Wade Warren', 'skill' => 'Analysis and Synthesis in Design', 'contact' => '077 6140 9077'],
                        ['name' => 'Esther Howard', 'skill' => 'Experience Mapping', 'contact' => '077 4252 4776'],
                        ['name' => 'Leslie Alexander', 'skill' => 'User Description', 'contact' => '078 6439 0024'],
                        ['name' => 'Leslie Alexander', 'skill' => 'Content Design', 'contact' => '078 6439 0024'],
                        ['name' => 'Jenny Wilson', 'skill' => 'Design Evaluation', 'contact' => '078 6439 0024'],
                        ['name' => 'Guy Hawkins', 'skill' => 'Design Evaluation', 'contact' => '078 6439 0024'],
                        ['name' => 'Jane Cooper', 'skill' => 'UX Design', 'contact' => '078 6439 0024'],
                        ['name' => 'Robert Fox', 'skill' => 'UX Design', 'contact' => '078 6439 0024'],
                    ] as $mentor)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>
                            <img src="{{ asset('images/mask-group.png') }}" class="rounded-circle me-2" alt="Foto Profil" width="25" height="25">
                            @if ($mentor['name'] === 'Jane Cooper')
                                <a href="{{ route('mentors.show', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                    {{ $mentor['name'] }}
                                </a>
                            @else
                                {{ $mentor['name'] }}
                            @endif
                        </td>
                        <td>
                            <i class="bi bi-search text-success"></i>
                            {{ $mentor['skill'] }}
                        </td>
                        <td>{{ $mentor['contact'] }}</td>
                        <td>New York</td>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td>Engineering, Finance, HR</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
