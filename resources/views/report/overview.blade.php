@extends('layouts.app')

@section('content')
<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div class="bg-primary text-white p-3" style="width: 240px;">
        <div class="mb-4">
            <img src="/logo.png" alt="ImpactMate" class="img-fluid mb-3">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-house me-2"></i> Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-people me-2"></i> Community</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-journal-text me-2"></i> My Project</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-person-lines-fill me-2"></i> Mentor</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-warning fw-bold"><i class="bi bi-bar-chart-line-fill me-2"></i> Invest</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Company Report Overview</h2>
            <div class="d-flex align-items-center">
                <i class="bi bi-bell me-3"></i>
                <span class="fw-semibold">Hi, Adam</span>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="bg-white p-3 rounded shadow-sm d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-semibold mb-1">Lion Bird</h5>
                        <p class="text-muted mb-0">Smart Robotics for Construction Sites</p>
                    </div>
                    <img src="/lionbird-logo.png" alt="Logo" width="50">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-3 rounded shadow-sm text-center">
                    <span class="text-success fw-semibold d-block">⬆️ Tovend</span>
                    <select class="form-select mt-2">
                        <option>April</option>
                        <option>March</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <div class="bg-white text-center rounded p-2 flex-fill shadow-sm">
                    <div class="text-warning fw-bold">75%</div>
                    <small class="d-block">Revenue</small>
                </div>
                <div class="bg-white text-center rounded p-2 flex-fill shadow-sm">
                    <div class="text-warning fw-bold">62%</div>
                    <small class="d-block">Net Profit</small>
                </div>
                <div class="bg-white text-center rounded p-2 flex-fill shadow-sm">
                    <div class="text-danger fw-bold">25%</div>
                    <small class="d-block">Impact</small>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="bg-white text-center p-4 rounded shadow-sm">
                    <div class="mb-2">
                        <canvas id="completionChart" width="100" height="100"></canvas>
                    </div>
                    <p class="fw-semibold mb-0">This Month’s Completed Report</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-semibold">Recent Progress</h6>
                        <div>
                            <button class="btn btn-sm btn-outline-primary">Revenue</button>
                            <button class="btn btn-sm btn-outline-primary">Net Profit</button>
                            <button class="btn btn-sm btn-outline-primary">Impact</button>
                        </div>
                    </div>
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div>

        <div class="bg-primary text-white p-3 rounded shadow-sm">
            <i class="bi bi-briefcase-fill me-2 text-warning"></i>
            <span class="fw-semibold">Business Development</span>
            <span class="d-block">Update on April 10, 2025</span>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Donut Chart
    const completionCtx = document.getElementById('completionChart').getContext('2d');
    new Chart(completionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Remaining'],
            datasets: [{
                data: [75, 25],
                backgroundColor: ['#F9A826', '#f2f2f2'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '70%',
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Bar Chart
    const progressCtx = document.getElementById('progressChart').getContext('2d');
    new Chart(progressCtx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            datasets: [{
                label: 'Progress',
                data: [60, 100, 80, 50, 75],
                backgroundColor: '#1b2254'
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
