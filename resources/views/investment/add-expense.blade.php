@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="fw-bold mb-4" style="color: #1F2A69">Add New Expense Entry</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/expense/store') }}">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="$3 Million">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category">
                <option value="Internal">Internal</option>
                <option value="External">External</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="2"
                placeholder='e.g., "Robotic Arm Design" is a project focused on...'></textarea>
        </div>

        <div class="mb-3">
            <label for="proof" class="form-label">Proof of Purchase</label>
            <input type="text" class="form-control" id="proof" name="proof" placeholder="Receipt #001">
        </div>

        <button type="submit" class="btn" style="background-color: #1F2A69; color: white;">Add Expense</button>
    </form>
</div>
@endsection
