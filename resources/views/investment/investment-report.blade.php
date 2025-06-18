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
    color: #6B7280; /* abu */
}

.tab-btn.active-tab {
    background-color: white;
    font-weight: 600;
    color: #1C2C5B;
}

    </style>
<div class="container-fluid px-4 py-4">
    <h2 class="fw-bold mb-3">Investment Report</h2>

    <!-- Tab Navigation -->
    <div class="tab-wrapper mb-3">
    <button class="tab-btn active-tab">Income</button>
    <a href="{{ route('investment.investment-expense') }}" class="tab-btn" style="text-decoration: none">Expense</a></button>
</div>


    <!-- Income Overview -->
    <div class="bg-white p-4 rounded shadow-sm">
        <h5 class="fw-bold mb-4">Income Overview</h5>

        <div class="d-flex justify-content-end align-items-center gap-2 mb-3">
    <!-- Search Box -->
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
            <a href="{{ route('investment.add-income') }}" class="btn btn-costum" style="background-color: #1F2A69; color: white;">Add New</a></button>
        </div>

        <div class="table-responsive shadow-sm rounded-4">
            <table class="table table-hover align-middle text-center">
                <thead class="table">
                    <tr>
                        <th style="background-color: #1F2A69; color: white;"><input type="checkbox" /></th>
                        <th style="background-color: #1F2A69; color: white;">No.</th>
                        <th style="background-color: #1F2A69; color: white;">Date</th>
                        <th style="background-color: #1F2A69; color: white;">Sender</th>
                        <th style="background-color: #1F2A69; color: white;">Source Bank</th>
                        <th style="background-color: #1F2A69; color: white;">Destination Bank</th>
                        <th style="background-color: #1F2A69; color: white;">Amount</th>
                        <th style="background-color: #1F2A69; color: white;">Funding Type</th>
                        <th style="background-color: #1F2A69; color: white;">Investment Type</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['sender'] }}</td>
                        <td>{{ $item['source_bank'] }}</td>
                        <td>{{ $item['destination_bank'] }}</td>
                        <td>{{ $item['amount'] }}</td>
                        <td>{{ $item['funding_type'] }}</td>
                        <td>{{ $item['investment_type'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer Info & Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="d-flex align-items-center gap-2">
                <label for="rows">Row per page</label>
                <select id="rows" class="form-select form-select-sm" style="width: auto;">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span>Total 1 - 10 of 200</span>
            </div>

            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    <li class="page-item"><a class="page-link" href="#">13</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
