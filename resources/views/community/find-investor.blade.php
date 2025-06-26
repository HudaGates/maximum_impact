@extends('layouts.app-2')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container-fluid px-4 mt-4">
    <h3 class="fw-bold mb-4" style="color: #1F2A69">Find Investor</h3>
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold mb-4 d-flex justify-content-between align-items-center">
                FILTER <i class="bi bi-sliders"></i>
            </h6>
            <div class="border rounded-3 p-3">
                <div class="mb-4">
                    <strong class="d-block text-uppercase small mb-2">Location</strong>
                    @foreach (['DKI Jakarta', 'Medan', 'Bandung', 'Surabaya'] as $city)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="loc_{{ $city }}">
                            <label class="form-check-label small" for="loc_{{ $city }}">{{ $city }}</label>
                        </div>
                    @endforeach
                    <a href="#" class="small text-decoration-none d-block mt-1">
                        Others <i class="bi bi-chevron-down small"></i>
                    </a>
                </div>

                <div class="mb-4">
                    <strong class="d-block text-uppercase small mb-2">Investment Stage</strong>
                    @foreach (['Seed Stage', 'Early Stage Venture', 'Late Stage Venture', 'Private Equity', 'Debt Financing'] as $stage)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="stage_{{ Str::slug($stage) }}">
                            <label class="form-check-label small" for="stage_{{ Str::slug($stage) }}">{{ $stage }}</label>
                        </div>
                    @endforeach
                </div>

                <div>
                    <strong class="d-block text-uppercase small mb-2">Industries</strong>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach (['Software', 'Health Care', 'IT'] as $industry)
                            <span class="badge bg-light border text-dark px-3 py-2">{{ $industry }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            <!-- FORM SEARCH -->
            <form method="GET">
                <div class="input-group mb-4" style="max-width: 1000px;">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0 border-end-0" placeholder="Search Data" value="{{ request('search') }}">
                    <button type="submit" class="btn text-white" style="background-color: #1F2A69;">Search</button>
                </div>
            </form>

            @php
                $search = request('search');
                $allCompanies = [
                    ['name' => 'Lion Bird', 'contacts' => 179, 'investment' => 1176, 'logo' => 'lion.png'],
                    ['name' => 'Adidas', 'contacts' => 179, 'investment' => 1176, 'logo' => 'lion.png'],
                    ['name' => 'Tesla Motor', 'contacts' => 179, 'investment' => 1176, 'logo' => 'lion.png'],
                    ['name' => 'Sberbank Rusia', 'contacts' => 179, 'investment' => 1176, 'logo' => 'lion.png'],
                    ['name' => 'Microsoft', 'contacts' => 184, 'investment' => 1132, 'logo' => 'lion.png'],
                    ['name' => 'Sberbank Rusia', 'contacts' => 544, 'investment' => 1095, 'logo' => 'lion.png'],
                ];

                $companies = collect($allCompanies)->filter(function ($company) use ($search) {
                    return !$search || stripos($company['name'], $search) !== false;
                })->values();
            @endphp

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="text-center align-middle">
                        <tr style="background-color: #1F2A69; color: white;">
                            <th style="border-top-left-radius: 12px;"><input type="checkbox"></th>
                            <th>Organization Name</th>
                            <th>Number of Contacts</th>
                            <th>Number of Investment</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th style="border-top-right-radius: 12px;">Departments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $index => $company)
                            <tr class="{{ $index % 2 === 0 ? '' : 'bg-light' }}">
                                <td class="align-middle text-center"><input type="checkbox"></td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/mask-group.png') }}" class="rounded-circle me-2" alt="Foto Profil" width="25" height="25">
                                        @if ($company['name'] === 'Lion Bird')
                                            <a href="{{ route('investor.profile', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                                {{ $company['name'] }}
                                            </a>
                                        @else
                                            {{ $company['name'] }}
                                        @endif
                                    </div>
                                </td>
                                <td class="align-middle text-center text-success">
                                    <i class="bi bi-search ms-2"></i> {{ $company['contacts'] }}
                                </td>
                                <td class="align-middle text-center">{{ number_format($company['investment']) }}</td>
                                <td class="align-middle">New York</td>
                                <td class="align-middle">Lorem ipsum dolor sit amet</td>
                                <td class="align-middle">Engineering, Finance, HR</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No results found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection