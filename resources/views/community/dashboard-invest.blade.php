@extends('layouts.app-3')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/investor.css') }}">

<style>
    .table td, .table th {
        vertical-align: middle;
    }
    .card {
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .card h5 {
        font-weight: bold;
        color: #1F2A69;
    }
    .btn-link {
        font-weight: 600;
        color: #1F2A69;
        text-decoration: none;
    }
    .btn-link:hover {
        text-decoration: underline;
    }
</style>

<div class="investor-banner mb-5">
    <div class="banner-text">
        <p class="small">INVESTOR</p>
        <h1>Agraditya Putra <span>👋</span></h1>
    </div>
    <img src="{{ asset('images/agradi.jpg') }}" alt="Profile" class="profile-pic">
</div>

<div class="stats mb-5">
    <div class="stat-box">
        <p class="icon">🔗</p>
        <p class="label">Project Funded</p>
        <p class="value">{{ $stats['projects'] }} Projects</p>
    </div>
    <div class="stat-box">
        <p class="icon">🏢</p>
        <p class="label">Companies Backed</p>
        <p class="value">{{ $stats['companies'] }} Companies</p>
    </div>
    <div class="stat-box">
        <p class="icon">💼</p>
        <p class="label">Total Invested</p>
        <p class="value">{{ $stats['investment'] }}</p>
    </div>
</div>

<!-- Funding Chart & Carousel Side by Side -->
<div class="row mb-5">
    <!-- Funding Chart -->
    <div class="col-md-6 mb-4">
        <div class="card p-3">
            <h5>Funding</h5>
            <canvas id="fundingChart" width="100%" height="50"></canvas>
        </div>
    </div>

    <!-- Carousel -->
    <div class="col-md-6 mb-4">

            <div id="companyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                            <div class="carousel-card mx-2">
                                <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
                                <h6>Companies</h6>
                                <p>Contoh konten carousel.</p>
                            </div>
                            <div class="carousel-card mx-2">
                                <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
                                <h6>Companies</h6>
                                <p>Contoh konten carousel lainnya.</p>
                            </div>
                        </div>
                    </div>
                     <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <div class="carousel-card mx-2">
          <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
          <h4>Companies</h4>
          <p>More card content...</p>
        </div>
        <div class="carousel-card mx-2">
          <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
          <h4>Companies</h4>
          <p>More card content...</p>
        </div>
      </div>
    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Invested Company List & Recent Transaction Side by Side -->
<div class="row mb-5">
    <!-- Invested Company List -->
    <div class="col-md-6 mb-4">
        <div class="card p-3">
            <h5>Invested Company List</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Report</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company as $c)
                        <tr>
                            <td>{{ $c['name'] }}</td>
                            <td>{{ $c['status'] }}</td>
                            <td><a href="#">View Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-link" style="text-decoration: none">SHOW ALL FUNDING ROUNDS &gt;</a>
        </div>
    </div>

    <!-- Recent Transaction -->
    <div class="col-md-6 mb-4">
        <div class="card p-3">
            <h5>Recent Transaction</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Company</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($txn as $t)
                        <tr>
                            <td>{{ $t['date'] }}</td>
                            <td>{{ $t['company'] }}</td>
                            <td>{{ $t['amount'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-link" style="text-decoration: none">SHOW ALL TRANSACTIONS &gt;</a>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{route('investment.approve') }}" class="btn text-white px-5 py-2" style="background-color: #222d66; text-decoration: none;">Report</a></button>
    </div>
</div>

<script>
    const ctx = document.getElementById('fundingChart').getContext('2d');
    const fundingChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2015', '2017', '2019', '2021', '2023', '2024'],
            datasets: [{
                label: 'Funding ($B)',
                data: [5, 10, 15, 30, 45, 20],
                borderColor: '#4B6FFF',
                backgroundColor: 'rgba(75, 111, 255, 0.1)',
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#4B6FFF',
                pointBorderColor: '#fff',
                pointRadius: 4,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value + 'B';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
