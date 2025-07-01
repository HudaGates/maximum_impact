{{-- C:\Users\acerb\cadangan cp\maximum_impact\resources\views\myproject\indikator.blade.php --}}

@extends('layouts.app') {{-- Gunakan layout utama Anda --}}

@section('content')
<style>
    .sdg-box {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
    }
    .sdg-box input[type="checkbox"] {
        width: 16px;
        height: 16px;
    }
    .footer-sdgs {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .next-link {
        color: #1f2c56;
        font-weight: bold;
        text-decoration: none;
    }
</style>

@php
// 1. Ambil ID SDG yang dipilih dari URL, jika tidak ada, gunakan array kosong
$selectedSdgs = request('sdgs', []);

// 2. Siapkan data untuk semua SDG (nama dan indikator)
// Ini akan membuat accordion dinamis
$allSdgData = [
    1 => ['name' => 'No Poverty', 'indicators' => [
        ['id' => '1.1.1', 'label' => 'Proportion of population living in extreme poverty.', 'selected' => true],
        ['id' => '1.2.1', 'label' => 'Proportion of population living below the national poverty line, by sex and age group.', 'selected' => true],
        ['id' => '1.2.2', 'label' => 'Proportion of men, women, and children of all ages living in poverty in all its dimensions according to national definitions.', 'selected' => true],
        ['id' => '1.3.1', 'label' => 'Proportion of population covered by social protection programs, by gender, for all children, unemployed, elderly, persons with disabilities, pregnant women, victims of workplace accidents, the poor, and vulnerable groups.'],
        ['id' => '1.3.1(a)', 'label' => 'Proportion of health insurance participants through the National Social Security System for Health.'],
        ['id' => '1.3.1(b)', 'label' => 'Proportion of participants in the Social Security Employment Program.'],
        ['id' => '1.4.1', 'label' => 'Proportion of population/households with access to basic services.'],
        ['id' => '1.4.2', 'label' => 'Proportion of adult population with secure tenure rights to land, with legally recognized documentation, by sex and type of ownership.'],
        ['id' => '1.5.1', 'label' => 'Number of deaths, missing persons, and persons affected by disaster per 100,000 people.'],
        ['id' => '1.5.2', 'label' => 'Direct economic loss attributed to disasters in relation to global GDP.'],
        ['id' => '1.5.3', 'label' => 'Adoption and implementation of national disaster risk reduction strategies aligned with the Sendai Framework for Disaster Risk Reduction 2015.'],
        ['id' => '1.5.4', 'label' => 'Proportion of local governments that adopt and implement local disaster risk reduction strategies aligned with national strategies.'],
        ['id' => '1.a.1', 'label' => 'Proportion of resources allocated by the government directly to poverty reduction programs.'],
        ['id' => '1.a.2', 'label' => 'Proportion of government spending on essential services (education, health, and social protection).'],
    ]],
    2 => ['name' => 'Zero Hunger', 'indicators' => [ /* Anda bisa isi indikator untuk SDG 2 di sini */ ]],
    3 => ['name' => 'Good Health and Well-Being', 'indicators' => [ /* Indikator SDG 3 */ ]],
    4 => ['name' => 'Quality Education', 'indicators' => []],
    5 => ['name' => 'Gender Equality', 'indicators' => []],
    6 => ['name' => 'Clean Water and Sanitation', 'indicators' => []],
    7 => ['name' => 'Affordable and Clean Energy', 'indicators' => []],
    8 => ['name' => 'Decent Work and Economic Growth', 'indicators' => []],
    9 => ['name' => 'Industry, Innovation and Infrastructure', 'indicators' => []],
    10 => ['name' => 'Reduced Inequalities', 'indicators' => []],
    11 => ['name' => 'Sustainable Cities and Communities', 'indicators' => []],
    12 => ['name' => 'Responsible Consumption and Production', 'indicators' => []],
    13 => ['name' => 'Climate Action', 'indicators' => []],
    14 => ['name' => 'Life Below Water', 'indicators' => []],
    15 => ['name' => 'Life On Land', 'indicators' => []],
    16 => ['name' => 'Peace, Justice and Strong Institutions', 'indicators' => []],
    17 => ['name' => 'Partnerships for the Goals', 'indicators' => []],
];
@endphp

<div class="container my-4">
    <h2 class="fw-bold" style="color: #1F2A69">SDGs Categories</h2>
    <h5 class="fw-bold mt-3" style="color: ##1F2A69">SDGs Indicators</h5>

    <div class="search-container mt-3 mb-4 d-flex justify-content-between align-items-center">
        <div class="w-100 me-2">
            <input type="text" class="form-control" placeholder="Search Data">
        </div>
        <button class="btn px-4" style="background-color: #1F2A69; color: white;">Search</button>
    </div>

    {{-- 3. Loop ikon SDG berdasarkan $selectedSdgs --}}
    @if(!empty($selectedSdgs))
    <div class="row mb-4">
        @foreach ($selectedSdgs as $id)
        <div class="col-md-2 col-4 mb-3">
            <div class="sdg-box position-relative shadow-sm rounded-3 overflow-hidden">
                <img src="{{ asset('images/sdgs/' . $id . '.png') }}" alt="SDG {{ $id }}" class="img-fluid w-100 d-block">
                {{-- Checkbox ini bisa digunakan jika Anda ingin user bisa membatalkan pilihan di halaman ini --}}
                <div class="checkmark-box position-absolute bottom-0 end-0 m-2">
                    <div class="checkmark-inner bg-white border border-2 border-secondary rounded-circle p-1 d-flex justify-content-center align-items-center">
                        <input type="checkbox" class="sdg-checkbox" checked>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- 4. Loop Accordion berdasarkan $selectedSdgs --}}
    <div class="accordion" id="sdgAccordion">
        @foreach ($selectedSdgs as $id)
            @php
                // Ambil info SDG dari array $allSdgData
                $sdgInfo = $allSdgData[$id];
                $indicators = $sdgInfo['indicators'];
            @endphp
            <div class="accordion-item border rounded mb-2">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $id }}">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <span>{{ $id }}. {{ $sdgInfo['name'] }}</span>
                            <span class="fw-bold" style="color: #1F2A69;">
                                {{-- Hitung yang terpilih secara dinamis --}}
                                {{ collect($indicators)->where('selected', true)->count() }} Selected
                            </span>
                        </div>
                    </button>
                </h2>
                <div id="collapse{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#sdgAccordion">
                    <div class="accordion-body">
                        @forelse ($indicators as $indicator)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ind-{{ $indicator['id'] }}" {{ $indicator['selected'] ?? false ? 'checked' : '' }}>
                                <label class="form-check-label" for="ind-{{ $indicator['id'] }}">
                                    <strong>{{ $indicator['id'] }}*</strong> {{ $indicator['label'] }}
                                </label>
                            </div>
                        @empty
                            <p class="text-muted">Tidak ada daftar indikator untuk {{ $sdgInfo['name'] }}.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="footer-sdgs">
        {{-- Gunakan count() untuk mendapatkan jumlah kategori yang dipilih secara dinamis --}}
        <p>{{ count($selectedSdgs) }} Categories Selected</p>
        <a href="{{ route('myproject.metrics') }}" class="next-link" style="text-decoration: none">Next</a>
    </div>

</div>
@endsection