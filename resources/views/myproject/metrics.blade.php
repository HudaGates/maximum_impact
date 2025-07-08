@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="fw-bold mb-2" style="color: #1F2A69;">SDGs Categories, Indicators, and Metrics</h2>
    <p class="text-muted">Select the metrics that your project will track.</p>
    
    {{-- Search bar --}}
    <div class="input-group my-4">
        <input type="text" class="form-control" placeholder="Search SDG Data" id="searchInput">
        <button class="btn px-4" type="button" style="background-color: #1F2A69; color: white;">Search</button>
    </div>

    {{-- START: Form to capture selections --}}
    <form action="{{ route('projects.saveSelection') }}" method="POST">
        @csrf
        <div class="list-group">
            @foreach ($metrics as $index => $metric)
            <label class="list-group-item d-flex align-items-start py-3">
                {{-- Give the checkbox a name and set its value to the metric title --}}
                <input class="form-check-input mt-1 me-3" type="checkbox" name="selected_metrics[]" value="{{ $metric['title'] }}" id="metric-{{ $metric['id'] }}">
                <div class="flex-grow-1">
                    <div class="fw-semibold">
                        {{ $index + 1 }}. {{ $metric['title'] }}
                    </div>
                    <small class="text-muted">
                        {{ $metric['description'] }}
                    </small>
                </div>
            </label>
            @endforeach
        </div>

        {{-- Footer with a submit button --}}
        <div class="d-flex justify-content-end align-items-center mt-4">
            {{-- Change the link to a submit button --}}
            <button type="submit" class="btn btn-primary">Save and Return to Project Form</button>
        </div>
    </form>
    {{-- END: Form --}}
</div>
@endsection