@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="text-center fw-bold mb-4" style="color: #1F2A69;">Investment Form</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('investment.store') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5 mb-3">
                <label for="amount" class="form-label fw-semibold">Investment Amount</label>
                <input type="number" name="amount" id="amount" class="form-control border border-2"
                       placeholder="Enter the amount you wish to invest" value="{{ old('amount') }}">
            </div>
            <div class="col-md-5 mb-3">
                <label for="funding_type" class="form-label fw-semibold">Type of Funding</label>
                <select name="funding_type" id="funding_type" class="form-select border border-2">
                    <option value="" disabled selected>Select Funding Type</option>
                    @foreach($fundingTypes as $type)
                        <option value="{{ $type }}" {{ old('funding_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 mb-3">
                <label for="project" class="form-label fw-semibold">Project to Fund</label>
                <select name="project" id="project" class="form-select border border-2">
                    <option value="" disabled selected>Select Project to Fund</option>
                    @foreach($projects as $project)
                        <option value="{{ $project }}" {{ old('project') == $project ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5 mb-3">
                <label for="payment_method" class="form-label fw-semibold">Payment Information</label>
                <select name="payment_method" id="payment_method" class="form-select border border-2">
                    <option value="" disabled selected>Choose Payment Method</option>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method }}" {{ old('payment_method') == $method ? 'selected' : '' }}>{{ $method }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-10 text-center mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark me-2">Cancel</a>
                <a href="{{ route('investment.investment-status') }}" type="submit" class="btn btn-primary px-4" style="background-color: #1F2A69;">Register</a></button>
            </div>
        </div>
    </form>
</div>
@endsection
