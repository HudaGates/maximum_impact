@extends('layouts.app-2')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h3 class="fw-bold mb-4" style="color: #1F2A69">Find Company</h3>
<div class="row">
    <div class="col-md-3">

            <h6 class="fw-bold mb-4 d-flex justify-content-between align-items-center">
                FILTER <i class="bi bi-sliders"></i>
            </h6>
            <div class="border rounded-3 p-3">
            <div class="mb-4">
                <strong class="d-block text-uppercase small mb-2">Location</strong>
                @foreach (['Jabodetabek', 'Bali', 'Yogyakarta', 'East Sumatra'] as $city)
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
                <strong class="d-block text-uppercase small mb-2">Development Stage</strong>
                @foreach (['Seed Stage', 'Series A', 'Series B'] as $stage)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="stage_{{ Str::slug($stage) }}">
                        <label class="form-check-label small" for="stage_{{ Str::slug($stage) }}">{{ $stage }}</label>
                    </div>
                @endforeach
            </div>

            <div>
                <strong class="d-block text-uppercase small mb-2">Industries</strong>
                <div class="d-flex flex-wrap gap-2">
                    @foreach (['Software', 'Health Care', 'IT', 'Education','Manufacture','Energy'] as $industry)
                        <span class="badge bg-light border text-dark px-3 py-2">{{ $industry }}</span>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-9">
        <div class="input-group mb-4" style="max-width: 1000px; flex: 1;">
    <span class="input-group-text bg-white border-end-0">
        <i class="bi bi-search text-muted"></i>
    </span>
    <input type="text" name="search" class="form-control border-start-0 border-end-0" placeholder="Search Data" value="{{ request('search') }}">
    <button class="btn text-white" style="background-color: #1F2A69;">Search</button>
</div>

<div class="d-flex justify-content-end mb-4" style="max-width: 1000px;">
    <button style="
        background: white;
        border: 1px solid green;
        color: green;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    ">
        + Add to Wishlist
    </button>
</div>




                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="text-center align-middle">
                                <tr style="
                                    background-color: #1F2A69;
                                    color: white;
                                    border-top-left-radius: 12px;
                                    border-top-right-radius: 12px;
                                ">
                                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">
                                        <input type="checkbox">
                                    </th>
                                    <th style="background-color: #1F2A69; color: white;">Organization Name</th>
                                    <th style="background-color: #1F2A69; color: white;">Founded Date</th>
                                    <th style="background-color: #1F2A69; color: white;">last Funding Date</th>
                                    <th style="background-color: #1F2A69; color: white;">Last Funding Type</th>
                                    <th style="background-color: #1F2A69; color: white;">Number of Employee</th>
                                    <th style="background-color: #1F2A69; color: white;">Industries</th>
                                    <th style="background-color: #1F2A69; color: white;">Description</th>
                                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Job Departments</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($companies as $company)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/mask-group.png') }}" class="rounded-circle me-2" alt="Foto Profil" width="25" height="25">
                             @if ($company['name'] === 'Lion Bird')
                                <a href="{{ route('company.profile', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                    {{ $company['name'] }}
                                </a>
                            @else
                                {{ $company['name'] }}
                            @endif
                        </div>
                    </td>
                            <td>{{ $company['founded'] }}</td>
                            <td>{{ $company['last_funding'] }}</td>
                            <td>{{ $company['type'] }}</td>
                            <td>{{ $company['employees'] }}</td>
                            <td>{{ $company['industries'] }}</td>
                            <td>{{ $company['description'] }}</td>
                            <td>{{ $company['departments'] }}</td>
                        </tr>
                    @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center justify-content-start mt-3 small">
                            <span class="me-2">Row per page</span>
                            <select class="form-select form-select-sm w-auto me-3" style="min-width: 60px;">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <span>Total 1 - 10 of 200</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
