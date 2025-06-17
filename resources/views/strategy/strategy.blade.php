@extends('layouts.app-4')

@section('title', 'Dashboard')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap JS (optional, untuk komponen JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container py-4">
  {{-- Header Section --}}
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
    <button class="btn btn-costum btn-sm shadow-sm" style="background-color: #1F2A69; color: white;">Month 1</button>
  </div>

<!-- Progress Cards -->
<div class="row g-4 mb-4">
      @foreach ($cards as $card)
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0">
          <div class="position-relative" style="background: repeating-conic-gradient(#ccc 0% 25%, transparent 0% 50%) center/20px 20px; height: 130px;">
            <div class="position-absolute top-0 end-0 m-2">
              <i class="bi bi-three-dots-vertical text-muted"></i>
            </div>
          </div>
          <div class="p-3">
            <h6 class="fw-bold mb-1" style="color: #1F2A69">{{ $card['title'] }}</h6>
            <p class="small text-muted mb-3">{{ $card['desc'] }}</p>
            <div class="d-flex justify-content-between small text-muted">
              <span><i class="bi bi-calendar-event me-1"></i>{{ $card['date'] }}</span>
              <span><i class="bi bi-geo-alt me-1"></i>{{ $card['location'] }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

<!-- Chart -->
<h5 class="fw-bold text-center mt-5 mb-4">Monthly Profit</h5>

<div class="d-flex justify-content-center">
  <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 600px;">
    <canvas id="profitChart" height="150"></canvas>
  </div>
</div>

<div class="d-flex justify-content-center mt-4">
  <button class="btn px-5 py-2" style="background-color: #263275; color: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    Setup Goals
  </button>
</div>
<script>
  const ctx = document.getElementById('profitChart').getContext('2d');
  const profitChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($months) !!},
      datasets: [{
        label: 'Profit (in million IDR)',
        data: {!! json_encode($profits) !!},
        backgroundColor: 'rgba(79, 108, 216, 0.5)',
        borderRadius: 12,
        barThickness: 40
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });
</script>


</div>


@endsection


