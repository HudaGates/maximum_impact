@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">

    {{-- Breadcrumb --}}
    <nav>
        <small><a href="/">Home</a> / My Projects</small>
    </nav>

    {{-- Title --}}
    <h2 class="fw-bold mt-3">My Projects</h2>

    {{-- Info dan Chart --}}
    <div class="row mt-4">
        <div class="col-md-4 d-flex flex-column">
            {{-- Avatar dan Info --}}
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('images/lion.png') }}" width="100" class="me-3" alt="avatar">
                <div>
                    <h6 class="mb-0 fw-semibold">Lion Bird</h6>
                    <small class="text-muted">Smart Robotics for Construction Sites</small>
                </div>
            </div>

            {{-- Badge --}}
            <div class="shadow rounded bg-white p-3 d-inline-flex align-items-center"
     style="width: fit-content; margin-top: {{ $mt ?? '100px' }}; margin-left: {{ $ml ?? '30px' }};">
    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
         style="width: 40px; height: 40px;">
        <i class="bi bi-diagram-3"></i>
    </div>
    <div>
        <div class="text-muted small">{{ $label ?? 'Project Amount' }}</div>
        <strong>{{ $amount ?? '312 Projects' }}</strong>
    </div>
</div>

        </div>

        {{-- Chart --}}
        <div class="col-md-8">
            <div class="custom-chart" style="margin-top: 100px">
                <h6 class="text-center fw-bold">Projects Amount</h6>
                <div class="d-flex justify-content-center align-items-end">
                    <canvas id="projectsChart" width="100%" height="50px"></canvas>
                </div>
            </div>
        </div>
        
    </div>

    {{-- Project Lists --}}
    <h4 class="fw-bold text-center my-5">Project lists</h4>
    <div class="row">
        @for($i = 0; $i < 6; $i++)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/graf.png') }}" class="card-img-top" width="50px" height="200px" alt="cover">
                <div class="card-body">
                    <span class="badge bg-light text-muted mb-2">Building Economy</span>
                    <h6 class="fw-bold">Women Empowerment</h6>
                    <p class="small text-muted">Bringing together stakeholders and support systems so that we can empower them down the line.</p>
                    <div class="d-flex justify-content-between text-muted small">
                        <span><i class="bi bi-calendar3 me-1"></i>27 Oct</span>
                        <span><i class="bi bi-person me-1"></i>John Afahrie</span>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

    {{-- Button --}}
    <div class="text-center mt-4">
        <button class="btn text-white px-5 py-2" style="background-color: #222d66;">Register New Project</button>
    </div>
</div>
<script>
    const ctx = document.getElementById('projectsChart').getContext('2d');

    const projectsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Projects',
                data: [45, 25, 30, 28, 75],
                backgroundColor: '#4da6ff',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 20
                    }
                }
            }
        }
    });
</script>

@endsection
