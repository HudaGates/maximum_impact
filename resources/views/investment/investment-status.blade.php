@extends('layouts.app')

@section('content')
@php
    $statuses = ['Submitted', 'Processed', 'Approved'];
    $currentStatus = $status ?? 'Submitted'; // nilai default
    $currentIndex = array_search($currentStatus, $statuses);
@endphp

<div class="container py-5">
    <!-- Section Title -->
    <h3 class="fw-bold text-center mb-4">Investment Status</h3>

    <!-- Progress Bar -->
    <div class="position-relative mb-4" style="height: 40px;">
        <!-- Line background -->
        <div style="position:absolute; top: 50%; left: 10%; right: 10%; height:6px; background-color:#e0e0ff; transform: translateY(-50%); z-index:0;"></div>

        <!-- Line progress -->
        <div style="
            position:absolute;
            top: 50%;
            left: 10%;
            width: {{ $currentIndex * 45 / 2 }}%;
            height:6px;
            background-color:#1E266D;
            transform: translateY(-50%);
            z-index:1;
        "></div>

        <!-- Step Circles -->
        <div class="d-flex justify-content-between px-5 position-relative" style="z-index:2;">
            @foreach ($statuses as $index => $label)
                <div class="{{ $index <= $currentIndex ? 'bg-success' : 'bg-secondary' }} rounded-circle border border-white" style="width:20px; height:20px;"></div>
            @endforeach
        </div>
    </div>

    <!-- Step Labels -->
    <div class="d-flex justify-content-between px-5 mb-5">
        @foreach ($statuses as $index => $label)
            <div class="text-center fw-medium {{ $index <= $currentIndex ? 'text-dark' : 'text-muted' }}">
                {{ $label }}
            </div>
        @endforeach
    </div>

    <!-- Illustration Image -->
    <div class="text-center mb-4">
        <img src="{{ asset('images/' . strtolower($currentStatus) . '.png') }}" alt="{{ $currentStatus }}" width="300">
    </div>

    <!-- Description -->
    <div class="text-center">
        <h4 class="fw-bold text-primary">{{ $currentStatus }}</h4>
        <p class="text-muted mx-auto" style="max-width: 700px;">
            @switch($currentStatus)
                @case('Submitted')
                    Your investment has been submitted and is awaiting processing.
                    @break
                @case('Processed')
                    The investment is currently being handled by the processing team. This means that all necessary checks and evaluations are being conducted to ensure the investment meets the required criteria.
                    @break
                @case('Approved')
                    Congratulations! Your investment has been approved and successfully passed all verification checks.
                    @break
            @endswitch
        </p>
    </div>
</div>
@endsection
