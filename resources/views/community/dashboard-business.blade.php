@extends('layouts.app-business')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<style>
canvas.donut {
  width: 100% !important;
  height: auto !important;
}
</style>

<div class="dashboard-banner">
    <div class="banner-text">
        <p class="small">DASHBOARD</p>
        <h1>My Business Dashboard</h1>
    </div>
</div>

<div class="row px-4 mt-4">

    <div class="col-md-4">
        <div class="card shadow-sm rounded overflow-hidden" style="max-width: 400px;">

  <div class="px-4 py-3" style="background-color: #F6E9B5;">
    <h6 class="fw-bold text-dark mb-1">Welcome Back!</h6>
    <p class="mb-0 text-muted small">ImpactMate Dashboard</p>
  </div>


  <div class="d-flex align-items-center gap-3 px-4 py-3 bg-white">
    <img src="{{ asset('images/lion.png') }}" alt="Logo" class="rounded-circle" width="64" height="64">
    <div>
      <h6 class="fw-bold mb-1 text-dark">Lion Bird</h6>
      <p class="mb-0 text-muted small">Smart Robotics for Construction Sites</p>
    </div>
  </div>
</div><br>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card mb-3 p-4 text-center shadow-sm">
  <canvas id="reportDonut" width="120" height="120" class="mx-auto mb-3"></canvas>
  <h5 class="fw-bold text-dark mb-1">Last Month’s<br>Completed Report</h5><br><br>


  <div onclick="toggleReport()" style="cursor: pointer;" class="mt-2">
    <i id="toggleArrow" class="bi bi-chevron-down fs-5 text-secondary"></i>
  </div>
</div>

<div id="reportSection" class="card p-3" style="background: #F6E9B5; display: none;">
  <ul class="list-unstyled mb-0">
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Business Development <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">25 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Revenue <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">17 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Net Profit <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">17 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold text-danger">Team Development <i class="bi bi-exclamation-circle-fill"></i></span>
      <span class="badge bg-danger">Report Now!</span>
    </li>
    <li class="d-flex justify-content-between align-items-center">
      <span class="fw-bold">Impact <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">04 March, 2025</small>
    </li>
  </ul>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    </div>


    <div class="col-md-8">
       <div class="goal-pathway mb-4">
    <h5 class="fw-bold mb-4">Your 6-Month Goal Pathway</h5>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="goal-card text-center p-3 shadow-sm rounded bg-white">
                <canvas id="revenueDonut" width="100" height="100"></canvas>
                <h6 class="fw-bold mt-3">Revenue</h6>
                <small>IDR 15.000.000 / IDR 20.000.000</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="goal-card text-center p-3 shadow-sm rounded bg-white">
                <canvas id="profitDonut" width="100" height="100"></canvas>
                <h6 class="fw-bold mt-3">Net Profit</h6>
                <small>IDR 12.400.000 / IDR 20.000.000</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="goal-card text-center p-3 shadow-sm rounded bg-white">
                <canvas id="impactDonut" width="100" height="100"></canvas>
                <h6 class="fw-bold mt-3">Impact</h6>
                <small>5.000.000 / 20.000.000</small>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mb-2">
        <button class="btn btn-outline-primary btn-sm" onclick="updateChart('revenue')">Revenue</button>
        <button class="btn btn-outline-dark btn-sm" onclick="updateChart('net_profit')">Net Profit</button>
        <button class="btn btn-outline-secondary btn-sm" onclick="updateChart('impact')">Impact</button>
        </div>

    <div style="height: 250px;">
        <canvas id="progressChart"></canvas>
    </div>
    </div>
</div>
    </div><br>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<div class="card mb-3 p-4 text-center shadow-sm">
  <canvas id="reportDonut" width="120" height="120" class="mx-auto mb-3"></canvas>
  <p class="mb-0 text-secondary">Last Month’s</p>
  <h5 class="fw-bold text-dark">Completed Report</h5>
</div>

<div class="card p-3" style="background: #F6E9B5;">
  <ul class="list-unstyled mb-0">
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Business Development <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">25 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Revenue <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">17 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold">Net Profit <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">17 March, 2025</small>
    </li>
    <li class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-bold text-danger">Team Development <i class="bi bi-exclamation-circle-fill"></i></span>
      <span class="badge bg-danger">Report Now!</span>
    </li>
    <li class="d-flex justify-content-between align-items-center">
      <span class="fw-bold">Impact <i class="text-warning ms-1 bi bi-check-circle-fill"></i></span>
      <small class="text-muted">04 March, 2025</small>
    </li>
  </ul>
</div><br><br><br>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">





<!-- 2. Chart.js & Donut Code -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const centerTextPlugin = {
  id: 'centerText',
  beforeDraw(chart) {
    const { ctx, chartArea, config } = chart;
    const { left, top, right, bottom } = chartArea;
    const width = right - left;
    const height = bottom - top;

    const value = config.options.customValue || config.options.customText || '';
    const color = config.options.customColor || '#333';
    const fontFamily = config.options.customFont || 'Poppins, Arial, sans-serif';

    const fontSize = Math.min(width, height) / 4;

    ctx.save();
    ctx.font = `bold ${fontSize}px ${fontFamily}`;
    ctx.fillStyle = color;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(value, (left + right) / 2, (top + bottom) / 2);
    ctx.restore();
  }
};

Chart.register(centerTextPlugin);
new Chart(document.getElementById("reportDonut"), {
  type: "doughnut",
  data: {
    datasets: [{
      data: [4, 1],
      backgroundColor: ["#FFA726", "#FDEBD0"],
      borderWidth: 0
    }]
  },
  options: {
    responsive: false,
    cutout: "70%",
    plugins: {
      legend: { display: false }
    },
    customValue: "4/5",
    customColor: "#F57C00"
  }
});

function createDonutChart(canvasId, percent, color, text) {
  new Chart(document.getElementById(canvasId), {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [percent, 100 - percent],
        backgroundColor: [color, '#f0f0f0'],
        borderWidth: 0
      }]
    },
    options: {
      responsive: false,
      cutout: '70%',
      plugins: {
        legend: { display: false }
      },
      customText: text,
      customColor: color
    }
  });
}

document.addEventListener('DOMContentLoaded', function () {
  createDonutChart('revenueDonut', 75, '#FFA726', '75%');
  createDonutChart('profitDonut', 62, '#FFB74D', '62%');
  createDonutChart('impactDonut', 25, '#F44336', '25%');
});
</script>
<script>
function toggleReport() {
  const section = document.getElementById("reportSection");
  const arrow = document.getElementById("toggleArrow");

  if (section.style.display === "none") {
    section.style.display = "block";
    arrow.classList.remove("bi-chevron-down");
    arrow.classList.add("bi-chevron-up");
  } else {
    section.style.display = "none";
    arrow.classList.remove("bi-chevron-up");
    arrow.classList.add("bi-chevron-down");
  }
}
</script>
<div class="px-4">
    <div class="table-responsive">
        <h5>Latest Project Funds</h5>
        <table class="table table-hover align-middle">
            <thead class="text-center align-middle">
                <tr>
                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">No.</th>
                    <th style="background-color: #1F2A69; color: white">Project Name</th>
                    <th style="background-color: #1F2A69; color: white">Time</th>
                    <th style="background-color: #1F2A69; color: white">Sent By</th>
                    <th style="background-color: #1F2A69; color: white">Sender Bank Account</th>
                    <th style="background-color: #1F2A69; color: white">Amount</th>
                    <th style="background-color: #1F2A69; color: white">Funding Type</th>
                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px">Investment Type</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 1; $i <= 10; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Mikarta</td>
                    <td>02/10/2024</td>
                    <td>Mikarta</td>
                    <td>(BCA) 08855649267</td>
                    <td>IDR 15.000.000</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
<script>
const chartDataSets = {
    revenue: [
        {
            label: 'Series A',
            data: [50, 60, 55, 65, 40, 45, 50, 60, 40, 35, 45, 50],
            backgroundColor: '#4B6FFF'
        },
        {
            label: 'Series B',
            data: [15, 20, 18, 22, 10, 12, 13, 18, 10, 12, 15, 14],
            backgroundColor: '#F4BE37'
        },
        {
            label: 'Series C',
            data: [10, 15, 14, 16, 8, 10, 12, 15, 9, 8, 10, 11],
            backgroundColor: '#2ECC71'
        }
    ],
    net_profit: [
        {
            label: 'Net Profit A',
            data: [20, 30, 25, 35, 28, 26, 30, 32, 20, 18, 24, 26],
            backgroundColor: '#FF8C42'
        },
        {
            label: 'Net Profit B',
            data: [10, 12, 11, 13, 9, 10, 11, 12, 8, 7, 9, 10],
            backgroundColor: '#FFA500'
        }
    ],
    impact: [
        {
            label: 'Social Impact',
            data: [5, 10, 8, 12, 6, 9, 7, 10, 6, 4, 6, 8],
            backgroundColor: '#DC3545'
        }
    ]
};

const ctx = document.getElementById('progressChart').getContext('2d');
let progressChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: chartDataSets.revenue
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        aspectRatio: 2.5,
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        },
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

function updateChart(type) {
    progressChart.data.datasets = chartDataSets[type];
    progressChart.update();
}
</script><br>

@endsection
