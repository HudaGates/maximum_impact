@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="fw-bold mb-4" style="color: #1F2A69">Add New Income Entry</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/income/store') }}">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="sender" class="form-label">Sender</label>
            <input type="text" class="form-control" id="sender" name="sender" placeholder="Mika Georgia">
        </div>

        <div class="mb-3">
            <label for="source_bank" class="form-label">Source Bank</label>
            <input type="text" class="form-control" id="source_bank" name="source_bank" placeholder="BRI">
        </div>

        <div class="mb-3">
            <label for="destination_bank" class="form-label">Destination Bank</label>
            <input type="text" class="form-control" id="destination_bank" name="destination_bank" placeholder="BNI">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="$3 Million">
        </div>

        <div class="mb-3">
            <label for="funding_type" class="form-label">Funding Type</label>
            <input type="text" class="form-control" id="funding_type" name="funding_type" placeholder="Series C Funding">
        </div>

        <div class="mb-3">
            <label for="investment_type" class="form-label">Investment Type</label>
            <select class="form-select" id="investment_type" name="investment_type">
                <option selected disabled>-- Select --</option>
                <option value="Equity">Equity</option>
                <option value="Loan">Loan</option>
                <option value="Grant">Grant</option>
            </select>
        </div>

        <button type="submit" class="btn" style="background-color: #1F2A69; color: white;">Submit</button>
    </form>
</div>
@endsection
