@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="fw-bold mb-4" style="color: #1F2A69">Add New Expense Entry</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Gunakan named route untuk action --}}
    <form method="POST" action="{{ route('expense.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
            @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" placeholder="3000000">
            @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                <option value="Internal" {{ old('category') == 'Internal' ? 'selected' : '' }}>Internal</option>
                <option value="External" {{ old('category') == 'External' ? 'selected' : '' }}>External</option>
            </select>
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2"
                placeholder='e.g., "Robotic Arm Design" is a project focused on...'>{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

<div class="mb-3">
    <label for="proof" class="form-label">Proof of Purchase</label>

    <input 
        type="file" 
        class="form-control @error('proof') is-invalid @enderror" 
        id="proof" 
        name="proof" 
        accept=".pdf,.jpg,.jpeg,.png"
    >
    @error('proof') 
        <div class="invalid-feedback">{{ $message }}</div> 
    @enderror
    @if(!empty($expense->proof_path))
    <div class="mb-3">
        <label class="form-label">Uploaded Proof</label>
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-file-earmark"></i>
            </span>
            <a 
                href="{{ asset('storage/' . $expense->proof_path) }}" 
                target="_blank" 
                class="form-control text-decoration-none text-primary border-start-0"
                style="background-color: #f8f9fa;"
            >
                {{ basename($expense->proof_path) }}
            </a>
        </div>
    </div>
@endif

</div>




        <button type="submit" class="btn" style="background-color: #1F2A69; color: white;">Add Expense</button>
    </form>
</div>
@endsection