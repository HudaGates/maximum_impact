@extends('layouts.app-2')

@section('content')
<div class="container-fluid">
    <h3 class="fw-bold text-dark mb-4">Find Investor</h3>
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
        <div class="input-group mb-4" style="max-width: 800px;">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0 border-end-0" placeholder="Search Data" value="{{ request('search') }}">
            <button class="btn text-white" style="background-color: #1F2A69;">Search</button>
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
                                    <th style="background-color: #1F2A69; color: white;">Number of Contacts</th>
                                    <th style="background-color: #1F2A69; color: white;">Number of Investment</th>
                                    <th style="background-color: #1F2A69; color: white;">Location</th>
                                    <th style="background-color: #1F2A69; color: white;">Description</th>
                                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Departments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investors as $i => $inv)
                                    <tr class="{{ $i % 2 == 0 ? 'bg-light' : '' }}">
                                        <td><input type="checkbox"></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('images/lion.png') }}" width="24" class="me-2">
                                                {{ $inv['name'] }}
                                            </div>
                                        </td>
                                        <td class="text-center text-success">{{ $inv['contacts'] }} <i class="bi bi-search ms-2"></i></td>
                                        <td class="text-center">{{ number_format($inv['investments']) }}</td>
                                        <td>{{ $inv['location'] }}</td>
                                        <td>Lorem ipsum dolor sit amet</td>
                                        <td>{{ implode(', ', $inv['departments']) }}</td>
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
