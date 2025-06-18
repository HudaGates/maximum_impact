@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-2" style="color: #1F2A69;">SDGs Categories</h2>
    <li><a class="nav-link" href="{{ route('myproject.metrics') }}">SDGs Metrics</a></li>


    {{-- Search bar --}}
    <div class="input-group mb-4">
        <input type="text" class="form-control bi-search" placeholder=" Search SDG Data" id="searchInput">
        <button class="btn px-4" type="button" style="background-color: #1F2A69; color: white;">Search</button>
    </div>

    {{-- SDGs Checklist --}}
    <div class="list-group">
        @foreach ($metrics as $index => $metric)
        <label class="list-group-item d-flex align-items-start py-3">
            <input class="form-check-input mt-1 me-3" type="checkbox" value="{{ $metric['id'] }}">
            <div class="flex-grow-1">
                <div class="fw-semibold">
                    {{ $index + 1 }} &nbsp; {{ $metric['title'] }}
                </div>
                <small class="text-muted">
                    {{ $metric['description'] }}
                </small>
            </div>
        </label>
        @endforeach
    </div>

    {{-- Footer --}}
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="fw-semibold">3 Categories Selected</div>
        <div class="text-muted small">Next</div>
    </div>
</div>
@endsection
