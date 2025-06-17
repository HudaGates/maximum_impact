@extends('layouts.app-3')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (placed before </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/investor.css') }}">

<div class="investor-banner">
    <div class="banner-text">
        <p class="small">INVESTOR</p>
        <h1>Agraditya Putra <span>👋</span></h1>
    </div>
    <img src="{{ asset('images/agradi.jpg') }}" alt="Profile" class="profile-pic">
</div>

<div class="stats">
    <div class="stat-box">
        <p class="icon">🔗</p>
        <p class="label">Project Funded</p>
        <p class="value">312 Projects</p>
    </div>
    <div class="stat-box">
        <p class="icon">🏢</p>
        <p class="label">Companies Backed</p>
        <p class="value">50 Companies</p>
    </div>
    <div class="stat-box">
        <p class="icon">💼</p>
        <p class="label">Total Invested</p>
        <p class="value">$20M+</p>
    </div>
</div>

<div class="section-row">
    <div class="funding-graph">
    <h4>Funding</h4>
    <canvas id="fundingChart" width="400" height="250"></canvas>
</div>

    <div id="companyCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center">
        <div class="carousel-card mx-2">
          <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
          <h4>Companies</h4>
          <p>Lorem ipsum is simply dummy text of the printing industry...</p>
        </div>
        <div class="carousel-card mx-2">
          <img src="{{ asset('images/card1.jpg') }}" class="d-block w-100" alt="Company">
          <h4>Companies</h4>
          <p>Lorem ipsum is simply dummy text of the printing industry...</p>
        </div>
      </div>
    </div>
    <!-- Tambah slide baru jika perlu -->
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

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
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

</div>
@endsection
