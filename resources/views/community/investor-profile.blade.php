@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-dark mb-4">Investor Profile</h2>

    <div class="d-flex align-items-center mb-5">
        <img src="{{ asset('images/lion.png') }}" alt="Investor Logo" width="150" class="me-4 rounded">
        <div>
            <h4 class="mb-1 fw-semibold">Lion Bird</h4>
            <p class="mb-0 text-muted">PT Sumber Alfaria Trijaya Tbk</p>
            <small class="text-muted">Previous Investment</small>
            <div class="fw-bold">$3 Million</div>
        </div>
    </div>

    <h5 class="fw-bold text-dark mb-4">Previous Investment</h5>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="text-center align-middle">
                <tr style="
                    background-color: #1F2A69;
                    color: white;
                    border-top-left-radius: 12px;
                    border-top-right-radius: 12px;
                ">
                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">
                        No
                    </th>
                    <th style="background-color: #1F2A69; color: white;">Company</th>
                    <th style="background-color: #1F2A69; color: white;">Industry</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Stage</th>
                    <th style="background-color: #1F2A69; color: white;">Invesment Amount</th>
                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Year</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $investments = [
                        ['Tech Innovations', 'Software', 'Series A', '$2 Million', 2021],
                        ['Green Energy Corp', 'Renewable Energy', 'Seed', '$1.5 Million', 2020],
                        ['Tech Innovations', 'Software', 'Series A', '$2 Million', 2021],
                        ['HealthTech Solutions', 'Health Care', 'Series B', '$3 Million', 2022],
                    ];
                @endphp
                @foreach ($investments as $index => $inv)
                <tr class="{{ $index % 2 != 0 ? 'bg-light' : '' }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $inv[0] }}</td>
                    <td>{{ $inv[1] }}</td>
                    <td>{{ $inv[2] }}</td>
                    <td>{{ $inv[3] }}</td>
                    <td class="text-center">{{ $inv[4] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex align-items-center justify-content-start mt-3 small">
        <span class="me-2">Row per page</span>
        <select class="form-select form-select-sm w-auto me-3" style="min-width: 60px;">
            <option selected>10</option>
            <option>25</option>
            <option>50</option>
        </select>
        <span>Total 1 - 10 of 200</span>
    </div>
</div>
@endsection
