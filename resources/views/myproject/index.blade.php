@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Projects</li>
        </ol>
    </nav>

    {{-- Judul --}}
    <h2 class="fw-bold mt-3">My Projects</h2>

    {{-- Info dan Chart --}}
    <div class="row mt-4 align-items-center">
        <div class="col-md-4 d-flex flex-column">
            {{-- Avatar dan Info --}}
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('images/lion.png') }}" width="100" class="me-3" alt="avatar">
                <div>
                    {{-- Tampilkan nama user yang login --}}
                    <h5 class="mb-0 fw-bold">{{ Auth::user()->name ?? 'User Name' }}</h5>
                    <small class="text-muted">Project Owner</small>
                </div>
            </div>

            {{-- Badge Jumlah Proyek --}}
            <div class="shadow-sm rounded bg-white p-3 d-inline-flex align-items-center" style="width: fit-content; margin-top: 20px;">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Projects</div>
                    {{-- Hitung jumlah proyek secara dinamis --}}
                    <strong>{{ $projects->count() }} Projects</strong>
                </div>
            </div>

        </div>

        {{-- Chart --}}
        <div class="col-md-8">
            <div class="custom-chart" style="margin-top: 20px">
                <h6 class="text-center fw-bold">Projects Amount</h6>
                <div class="d-flex justify-content-center align-items-end">
                    <canvas id="projectsChart" width="100%" height="50px"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Proyek --}}
    <h4 class="fw-bold text-center my-5">Project lists</h4>
    <div class="row">
        {{-- Kondisi jika tidak ada proyek --}}
        @if($projects->isEmpty())
            <div class="col-12 text-center py-5">
                <i class="bi bi-folder-x" style="font-size: 4rem; color: #ccc;"></i>
                <h5 class="mt-3">No Projects Found</h5>
                <p class="text-muted">You haven't registered any projects yet.</p>
                <a href="{{ route('projects.create') }}" class="btn text-white px-4 py-2 mt-2" style="background-color: #222d66;">Register Your First Project</a>
            </div>
        @else
            {{-- Perulangan Dinamis untuk setiap proyek --}}
            @foreach($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    {{-- Gunakan gambar sampul yang diunggah, dengan placeholder sebagai cadangan --}}
                    <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/graf.png') }}" 
                         class="card-img-top" 
                         height="200px" 
                         alt="{{ $project->name }} cover"
                         style="object-fit: cover;">

                    <div class="card-body d-flex flex-column">
                        {{-- Tampilkan tag pertama sebagai badge --}}
                        @php
                            $firstTag = $project->tag ? explode(',', $project->tag)[0] : 'General';
                        @endphp
                        <span class="badge bg-light text-dark align-self-start mb-2 fw-normal">{{ $firstTag }}</span>
                        
                        {{-- Nama Proyek --}}
                        <h6 class="fw-bold card-title">{{ $project->name }}</h6>
                        
                        {{-- Deskripsi Proyek dengan batasan karakter --}}
                        <p class="small text-muted flex-grow-1">{{ Str::limit($project->description, 110) }}</p>
                        
                        <div class="d-flex justify-content-between text-muted small mt-auto pt-2">
                            {{-- Format tanggal menggunakan Carbon --}}
                            <span><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</span>
                            
                            {{-- Ambil nama pembuat dari relasi user --}}
                            <span><i class="bi bi-person me-1"></i>{{ $project->user->name ?? Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    {{-- Tombol (hanya tampil jika sudah ada proyek) --}}
    @if(!$projects->isEmpty())
    <div class="text-center mt-4">
        <a href="{{ route('projects.create') }}" class="btn text-white px-5 py-2" style="background-color: #222d66; text-decoration: none;">Register New Project</a>
    </div>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('projectsChart').getContext('2d');

        {{-- Ini adalah cara yang benar untuk menulis komentar di Blade. --}}
        {{-- Directive @json akan mengubah variabel PHP menjadi array JavaScript yang valid. --}}
        const chartLabels = @json($chartLabels);
        const chartData = @json($chartData);

        const projectsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Projects',
                    data: chartData,
                    backgroundColor: '#4da6ff',
                    borderColor: '#4da6ff',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let count = context.raw;
                                // Tambahkan 's' jika jumlahnya bukan 1
                                return ` ${count} project${count !== 1 ? 's' : ''}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Pastikan ticks (garis bantu y) hanya menampilkan angka bulat
                            precision: 0,
                            // Atur stepSize agar sesuai dengan data, bisa dimulai dari 1
                            stepSize: Math.ceil(Math.max(...chartData) / 5) || 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>

@endsection