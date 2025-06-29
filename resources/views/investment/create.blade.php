@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="text-center fw-bold mb-4" style="color: #1F2A69;">Investment Form</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('investment.store') }}">
        @csrf
        {{-- =================== SEMUA FIELD KITA MASUKKAN DALAM SATU ROW BESAR =================== --}}
        <div class="row justify-content-center">
            
            {{-- Baris 1: Investor & Type of Funding --}}
            <div class="col-md-5 mb-3">
                {{-- KONFLIK DISELESAIKAN: Menggunakan label "Investor" dan menambahkan pesan error di bawahnya --}}
                <label for="investor_name" class="form-label fw-semibold">Investor</label>
                <input type="text" name="investor_name" id="investor_name" class="form-control border border-2 @error('investor_name') is-invalid @enderror"
                       placeholder="Investor" value="{{ old('investor_name', Auth::user()->name) }}" required>
                @error('investor_name')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="funding_type" class="form-label fw-semibold">Type of Funding</label>
                <select name="funding_type" id="funding_type" class="form-select border border-2 @error('funding_type') is-invalid @enderror" required>
                    <option value="" disabled {{ old('funding_type') ? '' : 'selected' }}>Select Funding Type</option>
                    @foreach($fundingTypes as $type)
                        <option value="{{ $type }}" {{ old('funding_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @error('funding_type')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            {{-- Baris 2: Investment Amount & Project to Fund --}}
            <div class="col-md-5 mb-3">
                <label for="amount" class="form-label fw-semibold">Investment Amount</label>
                <input type="number" name="amount" id="amount" class="form-control border border-2 @error('amount') is-invalid @enderror"
                       placeholder="Enter the amount you wish to invest" value="{{ old('amount') }}" required>
                @error('amount')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="project" class="form-label fw-semibold">Project to Fund</label>
                <select name="project" id="project" class="form-select border border-2 @error('project') is-invalid @enderror" required>
                    <option value="" disabled {{ old('project') ? '' : 'selected' }}>Select Project to Fund</option>
                    @foreach($projects as $project)
                        <option value="{{ $project }}" {{ old('project') == $project ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @error('project')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kita lanjutkan layout 2 kolom untuk informasi pembayaran --}}

            {{-- Baris 3: Payment Method & Sender --}}
            <div class="col-md-5 mb-3">
                <label for="payment_method" class="form-label fw-semibold">Payment Information</label>
                <select name="payment_method" id="payment_method" class="form-select border border-2 @error('payment_method') is-invalid @enderror" required>
                    <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>Choose Payment Method</option>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method }}" {{ old('payment_method') == $method ? 'selected' : '' }}>{{ $method }}</option>
                    @endforeach
                </select>
                @error('payment_method')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="sender" class="form-label fw-semibold">Sender</label>
                <input type="text" name="sender" id="sender" class="form-control border border-2 @error('sender') is-invalid @enderror"
                       placeholder="Enter sender's full name" value="{{ old('sender') }}" required>
                @error('sender')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            {{-- Baris 4: Origin Bank & Destination Bank --}}
            <div class="col-md-5 mb-3">
                <label for="origin_bank" class="form-label fw-semibold">Origin Bank</label>
                <input type="text" name="origin_bank" id="origin_bank" class="form-control border border-2 @error('origin_bank') is-invalid @enderror"
                       placeholder="e.g., Bank Central Asia (BCA)" value="{{ old('origin_bank') }}" required>
                @error('origin_bank')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="destination_bank" class="form-label fw-semibold">Destination Bank</label>
                <input type="text" name="destination_bank" id="destination_bank" class="form-control border border-2 @error('destination_bank') is-invalid @enderror"
                       placeholder="e.g., Bank Mandiri" value="{{ old('destination_bank') }}" required>
                @error('destination_bank')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div> {{-- Penutup untuk <div class="row justify-content-center"> --}}
        
        {{-- Bagian Tombol Submit --}}
        <div class="row justify-content-center">
            <div class="col-md-10 text-center mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark me-2">Cancel</a>
                <button type="submit" class="btn btn-primary px-4" style="background-color: #1F2A69;">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection