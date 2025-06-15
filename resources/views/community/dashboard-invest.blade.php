@extends('layouts.app-3')

@section('content')
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
}

/* === Header Banner === */
.banner-header {
    background-color: #29387a;
    color: white;
    padding: 2rem;
    border-radius: 20px;
    position: relative;
}

.banner-header h2 {
    font-weight: 700;
    font-size: 2rem;
}

.banner-header .badge-emoji {
    font-size: 1.8rem;
}

.banner-header .profile-img {
    position: absolute;
    right: 2rem;
    bottom: -2.5rem;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
}

/* === Stat Cards === */
.stat-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    text-align: center;
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.stat-card i {
    font-size: 1.8rem;
    color: #4d5bbf;
    margin-bottom: 0.5rem;
}

.stat-card strong {
    font-size: 1.2rem;
    color: #1d1d1f;
}

/* === Chart Section === */
.chart-container {
    background: white;
    border-radius: 15px;
    padding: 1rem;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
}

/* === Project Cards (Carousel-like) === */
.project-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: 0.3s;
    width: 18rem;
}

.project-card:hover {
    transform: scale(1.02);
}

.project-card img {
    height: 140px;
    object-fit: cover;
    width: 100%;
}

.project-card .card-body {
    padding: 1rem;
}

.project-card .card-title {
    font-weight: bold;
    color: #4d5bbf;
}

/* === Responsive Fixes === */
@media (max-width: 768px) {
    .banner-header {
        text-align: center;
    }

    .banner-header .profile-img {
        position: static;
        margin-top: 1rem;
        margin-bottom: -2rem;
    }
}
</style>
<div class="container-fluid">
    {{-- Profile Header --}}
    <div class="profile-card mt-3 mx-4">
        <h6>INVESTOR</h6>
        <h2 class="fw-bold">Agraditya Putra 👋</h2>
        <img src="https://i.pravatar.cc/100" class="profile-img" alt="Profile">
    </div>

    {{-- Stats Cards --}}
    <div class="row mt-4 px-4">
        <div class="col-md-4">
            <div class="stat-card">
                <p class="text-muted mb-0">Project Funded</p>
                <h5 class="fw-bold">312 Projects</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <p class="text-muted mb-0">Companies Backed</p>
                <h5 class="fw-bold">50 Companies</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <p class="text-muted mb-0">Total Invested</p>
                <h5 class="fw-bold">$20M+</h5>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="row px-4 mt-4">
        <div class="col-md-6">
            <div class="bg-white p-3 rounded shadow-sm">
                <h6 class="fw-bold">Funding</h6>
                <img src="https://quickchart.io/chart?c={type:'line',data:{labels:['2015','2017','2019','2021','2023','2024'],datasets:[{label:'A',data:[5,10,15,25,40,20]},{label:'B',data:[3,8,12,20,35,18]},{label:'C',data:[2,6,10,18,30,15]}]}}" alt="chart" class="img-fluid">
            </div>
        </div>

        {{-- Company Cards Carousel --}}
        <div class="col-md-6">
            <div class="bg-white p-3 rounded shadow-sm d-flex align-items-center">
                <div class="me-3">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Company">
                </div>
                <div>
                    <h6 class="text-primary fw-bold">Companies</h6>
                    <p class="small text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, eveniet?</p>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-light me-1"><i class="bi bi-chevron-left"></i></button>
                    <button class="btn btn-primary"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
