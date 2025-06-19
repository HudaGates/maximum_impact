@extends('layouts.app')

@section('title', 'Investment Report')

@section('content')
<style>
    .tab-wrapper {
    border-bottom: 1px solid #E5E7EB;
    display: flex;
    gap: 8px;
}

.tab-btn {
    border: 1px solid #E5E7EB;
    border-bottom: none;
    background-color: transparent;
    padding: 6px 16px;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    font-weight: 500;
    color: #6B7280;
}

.tab-btn.active-tab {
    background-color: white;
    font-weight: 600;
    color: #1C2C5B;
}

    </style>
<div class="container-fluid px-4 py-4">
    <h2 class="fw-bold mb-3">Investment Report</h2>

    <div class="tab-wrapper mb-3">
    <a href="{{ route('investment.investment-report') }}" class="tab-btn" style="text-decoration: none">Income</a></button>
    <button class="tab-btn active-tab">Expense</button>
</div>

    <div class="bg-white p-4 rounded shadow-sm">
        <h5 class="fw-bold mb-4">Expense Tracker</h5>

        <div class="d-flex justify-content-end align-items-center gap-2 mb-3">

    <div class="position-relative" style="width: 260px;">
        <input type="text" class="form-control ps-5 py-2 rounded" placeholder="Search Data"
               style="background-color: #F9FAFB; border: 1px solid #E5E7EB;">
        <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0
                1.415-1.414l-3.85-3.85zm-5.242.656a5.5 5.5
                0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
            </svg>
        </span>
    </div>
            <a href="{{ route('investment.add-expense') }}" class="btn btn-costum" style="background-color: #1F2A69; color: white;">Add New</a></button>
        </div>

        <div class="table-responsive shadow-sm rounded-4">
            <table class="table table-hover align-middle rounded overflow-hidden">
        <thead class="text-white" style="background-color: #1C2C5B;">
            <tr>
                <th style="background-color: #1F2A69; color: white;"><input type="checkbox"></th>
                <th style="background-color: #1F2A69; color: white;">No.</th>
                <th style="background-color: #1F2A69; color: white;">Date</th>
                <th style="background-color: #1F2A69; color: white;">Category</th>
                <th style="background-color: #1F2A69; color: white;">Description</th>
                <th style="background-color: #1F2A69; color: white;">Amount</th>
                <th style="background-color: #1F2A69; color: white;">Proof of Purchase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
            <tr class="{{ $i % 2 === 1 ? 'bg-light' : '' }}">
                <td><input type="checkbox"></td>
                <td>{{ $i + 1 }}.</td>
                <td>{{ $item['date'] }}</td>
                <td>{{ $item['category'] }}</td>
                <td>{{ $item['desc'] }}</td>
                <td>{{ $item['amount'] }}</td>
                <td><i class="bi bi-file-earmark-text me-1"></i>{{ $item['proof'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot style="background-color: #F1F1FB;">
            <tr>
                <td colspan="5" class="text-end fw-bold">TOTAL</td>
                <td colspan="2" class="fw-bold text-dark">$15 Million</td>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-between align-items-center mt-2">
        <div>
            <label>Row per page</label>
            <select class="form-select d-inline-block w-auto ms-2">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
            </select>
            <span class="ms-2">Total 1 - 10 of 200</span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item disabled"><a class="page-link">...</a></li>
                <li class="page-item"><a class="page-link">12</a></li>
                <li class="page-item"><a class="page-link">13</a></li>
                <li class="page-item"><a class="page-link">Next</a></li>
            </ul>
        </nav>
    </div>

</div>
@endsection
