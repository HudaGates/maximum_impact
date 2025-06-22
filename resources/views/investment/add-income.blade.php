@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="fw-bold mb-4" style="color: #1F2A69">Add New Income Entry</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Gunakan named route untuk action --}}
    <form method="POST" action="{{ route('income.store') }}">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
            @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        {{-- Tambahkan penanganan error dan old() untuk setiap input --}}
        <div class="mb-3">
            <label for="sender" class="form-label">Sender</label>
            <input type="text" class="form-control @error('sender') is-invalid @enderror" id="sender" name="sender" value="{{ old('sender') }}" placeholder="Mika Georgia">
             @error('sender') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="source_bank" class="form-label">Source Bank</label>
            <input type="text" class="form-control @error('source_bank') is-invalid @enderror" id="source_bank" name="source_bank" value="{{ old('source_bank') }}" placeholder="BRI">
            @error('source_bank') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="destination_bank" class="form-label">Destination Bank</label>
            <input type="text" class="form-control @error('destination_bank') is-invalid @enderror" id="destination_bank" name="destination_bank" value="{{ old('destination_bank') }}" placeholder="BNI">
            @error('destination_bank') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" placeholder="3000000">
            @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="funding_type" class="form-label">Funding Type</label>
            <input type="text" class="form-control @error('funding_type') is-invalid @enderror" id="funding_type" name="funding_type" value="{{ old('funding_type') }}" placeholder="Series C Funding">
            @error('funding_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="investment_type" class="form-label">Investment Type</label>
            <select class="form-select @error('investment_type') is-invalid @enderror" id="investment_type" name="investment_type">
                <option value="" selected disabled>-- Select --</option>
                <option value="Equity" {{ old('investment_type') == 'Equity' ? 'selected' : '' }}>Equity</option>
                <option value="Loan" {{ old('investment_type') == 'Loan' ? 'selected' : '' }}>Loan</option>
                <option value="Grant" {{ old('investment_type') == 'Grant' ? 'selected' : '' }}>Grant</option>
            </select>
            @error('investment_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn" style="background-color: #1F2A69; color: white;">Submit</button>
    </form>
</div>
@endsection