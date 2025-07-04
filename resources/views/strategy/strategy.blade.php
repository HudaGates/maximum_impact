@extends('layouts.app-business')

@section('title', 'Strategy Dashboard')

@section('content')
<!-- Link CSS & JS (tidak berubah) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container py-4">
  {{-- Header Section (tidak berubah) --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h5 class="fw-bold text-uppercase mb-3" style="color: #1F2A69">MY BUSINESS DASHBOARD</h5>
      <div class="d-flex align-items-center">
        <img src="{{ asset('images/lion.png') }}" class="rounded-circle me-3" alt="Logo" width="50" height="50">
        <div>
          <h5 class="fw-bold mb-0" style="color: #1F2A69">Lion Bird</h5>
          <small class="text-muted">Smart Robotics for Construction Sites</small>
        </div>
      </div>
    </div>
    <div>
      <a href="{{ route('community.dashboard-business') }}" class="btn btn-outline" style="color: #1F2A69">Dashboard</a>
    </div>
  </div>

  {{-- Title + Filter --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold" style="color: #1F2A69">See Your Progress</h3>
    
    <form id="month-filter-form" action="{{ route('strategy.strategy') }}" method="GET">
        <select name="month" id="month-selector" class="form-select form-select-sm shadow-sm" style="background-color: #1F2A69; color: white; border: none; width: 120px;" onchange="this.form.submit()">
            @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}" {{ $i == $selectedMonth ? 'selected' : '' }}>
                    Month {{ $i }}
                </option>
            @endfor
        </select>
    </form>
  </div>

<!-- Menampilkan Data Dinamis dari Database -->
<div class="row g-4 mb-4">
    @if($businessGrowthData)
        {{-- Tampilkan data jika ada untuk bulan yang dipilih --}}
        
        @if($businessGrowthData->goals)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Goals</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->goals }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($businessGrowthData->revenue_target)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Revenue Target</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->revenue_target }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($businessGrowthData->profit_target)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Profit Target</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->profit_target }}</p>
                </div>
            </div>
        </div>
        @endif
        
        {{-- === KARTU TAMBAHAN YANG HILANG === --}}
        @if($businessGrowthData->team_dev_target)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Team Development Target</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->team_dev_target }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($businessGrowthData->social_impact_target)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Social Impact Target</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->social_impact_target }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($businessGrowthData->strategy)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
              <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
          <div class="position-absolute top-0 end-0 m-2">
            <i class="bi bi-three-dots-vertical text-muted"></i>
          </div>
        </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="color: #1F2A69">Strategy</h6>
                    <p class="small text-muted mb-2">{{ $businessGrowthData->strategy }}</p>
                </div>
            </div>
        </div>
        @endif
        {{-- === AKHIR DARI KARTU TAMBAHAN === --}}

    @else
        {{-- Tampilkan pesan jika belum ada data untuk bulan ini --}}
        <div class="col-12">
            <div class="alert alert-info text-center">
                You have not set any business growth goals for Month {{ $selectedMonth }}.
                <a href="{{ route('business-growth.step1.show', ['month' => $selectedMonth]) }}" class="fw-bold text-decoration-none">Set them now!</a>
            </div>
        </div>
    @endif
</div>


<!-- Chart (tidak berubah) -->
<h5 class="fw-bold text-center mt-5 mb-4">Monthly Profit</h5>
<div class="d-flex justify-content-center">
  <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 600px;">
    <canvas id="profitChart" height="150"></canvas>
  </div>
</div>

<!-- Tombol Setup Goals (tidak berubah) -->
<div class="d-flex justify-content-center mt-4" id="setup-goals">
  <a href="{{ route('business-growth.step1.show', ['month' => $selectedMonth]) }}" class="btn px-5 py-2" style="background-color: #263275; color: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    @if($businessGrowthData)
        Edit Goals for Month {{ $selectedMonth }}
    @else
        Setup Goals for Month {{ $selectedMonth }}
    @endif
  </a>
</div>

{{-- Script (tidak berubah) --}}
<script>
  // Menghapus 'scroll-to-goals' karena tidak ada elemen dengan class itu di kartu dinamis
  // Jika Anda ingin fungsionalitas ini kembali, tambahkan class 'scroll-to-goals' pada kartu dinamis di atas
  /*
  document.querySelectorAll('.scroll-to-goals').forEach(link => {
    link.addEventListener('click', function(e) { e.preventDefault(); document.querySelector('#setup-goals').scrollIntoView({ behavior: 'smooth' }); });
  });
  */

  const ctx = document.getElementById('profitChart').getContext('2d');
  const profitChart = new Chart(ctx, {
    type: 'bar',
    data: { labels: {!! json_encode($months) !!}, datasets: [{ label: 'Profit (in million IDR)', data: {!! json_encode($profits) !!}, backgroundColor: 'rgba(79, 108, 216, 0.5)', borderRadius: 12, barThickness: 40 }] },
    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } }, plugins: { legend: { display: false } } }
  });
</script>

</div>
@endsection