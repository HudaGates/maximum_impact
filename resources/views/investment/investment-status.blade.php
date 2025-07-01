@extends('layouts.app')

@section('content')
@php
    // Daftar status
    $statuses = ['Processed', '', 'Approved'];

    // Status saat ini (dari controller)
    $currentStatus = $status ?? 'Processed';

    // Variabel $rejected akan dikirim dari controller (true/false)
    $isRejected = $rejected ?? false;

    // Mencari index dari status saat ini
    $currentIndex = array_search($currentStatus, $statuses);
    if ($currentIndex === false) {
        $currentIndex = -1; // Status tidak valid
    }
@endphp

{{-- CSS untuk Stepper --}}
<style>
    .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-bottom: 70px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        text-align: center;
    }

    .stepper-item::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 6px;
        background-color: #e0e0ff;
        top: 12px;
        transform: translateY(-50%);
        right: 50%;
        z-index: 1;
    }

    .stepper-item.completed::before {
        background-color: #1E266D;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .step-counter {
        height: 24px;
        width: 24px;
        border-radius: 50%;
        background-color: #e0e0ff;
        z-index: 2;
        position: relative;
        margin-bottom: 10px;
        transition: background-color 0.4s ease;
    }

    .stepper-item.completed .step-counter {
        background-color: #8fef9d;
    }

    .step-name {
        font-weight: 500;
        color: #6c757d;
    }

    .stepper-item.completed .step-name {
        color: #212529;
    }

    .stepper-item.rejected .step-counter {
        background-color: #dc3545; /* Warna merah */
    }

    .stepper-item.rejected .step-name {
        color: #dc3545; /* Teks label jadi merah */
    }

</style>

<div class="container py-5">
    <h3 class="fw-bold text-center mb-5">Investment Status</h3>

    <div class="stepper-wrapper">
        @foreach ($statuses as $index => $label)
            <div class="stepper-item {{ $index <= $currentIndex ? 'completed' : '' }} {{ ($index == $currentIndex && $isRejected) ? 'rejected' : '' }}">
                <div class="step-counter"></div>
                <div class="step-name">{{ $label }}</div>
            </div>
        @endforeach
    </div>

    {{-- BAGIAN BARU UNTUK GAMBAR DAN STATUS --}}
    @php
        $imageName = 'processed.png'; // Gambar default
        $titleText = $status;
        $titleColorClass = 'text-primary'; // Warna biru tua seperti di desain Anda

        if ($rejected) {
            $imageName = 'rejected.png';
            $titleText = 'Rejected';
            $titleColorClass = 'text-danger'; // Merah
        } else {
            switch (strtolower($status)) {
                case 'processed':
                    $imageName = 'processed.png';
                    break;
                case 'approved':
                    $imageName = 'approved.png';
                    $titleText = 'Approved';
                    $titleColorClass = 'text-success'; // Hijau
                    break;
                case 'processed':
                default:
                    $imageName = 'processed.png';
                    break;
            }
        }
    @endphp

    <!-- Container untuk Gambar -->
    <div class="text-center mb-4">
        <img src="{{ asset('images/' . $imageName) }}" alt="{{ $titleText }}" style="max-width: 300px; height: auto;">
    </div>

    <!-- Container untuk Judul dan Deskripsi -->
    <div class="text-center">
        <h4 class="fw-bold {{ $titleColorClass }}">{{ $titleText }}</h4>
        <p class="text-muted mx-auto" style="max-width: 700px;">
            @if ($rejected)
                We regret to inform you that your investment has been rejected. If you have any questions, please contact our support team.
            @else
                @switch(strtolower($status))
                    @case('processed')
                    @default
                        The investment is currently being handled by the processing team. This means that all necessary checks and evaluations are being conducted to ensure the investment meets the required criteria.
                        @break
                    @case('approved')
                        The Investment has passed all the necessary checks and has been formally accepted. At this stage, the investment is confirmed, and any relevant actions or follow-ups will proceed accordingly.
                        @break
                    @case('processed')
                        The investment is currently being handled by the processing team. This means that all necessary checks and evaluations are being conducted to ensure the investment meets the required criteria.
                        @break
                @endswitch
            @endif
        </p>
    </div>
</div>
@endsection