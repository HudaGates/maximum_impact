@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h3 class="fw-bold mb-4" style="color: #232F65;">Mentor Profile</h3>

    <div class="card shadow-sm border-0 p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="{{ asset('images/mask-group.png') }}" alt="Profile Logo" class="img-fluid rounded mb-3" width="120" height="120">
                <div class="text-muted small">
                    <div><i class="bi bi-telephone me-2"></i><strong>070 4531 9507</strong></div>
                    <div><i class="bi bi-geo-alt me-2"></i><strong>New York</strong></div>

                </div>
            </div>

            <div class="col-md-9">
                <h4 class="fw-bold mb-1">Jane Cooper</h4>
                <p class="text-success mb-2">UI/UX Design</p>
                <div class="d-flex align-items-center mb-3">
                    <span class="fw-bold">4.5</span>
                    <div class="text-warning ms-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <span class="ms-2 text-muted">(120 Reviews)</span>
                </div>

                <div class="mb-3">
                    @foreach (['Utilities', 'Health Care', 'IT', 'Manufacturing', 'Education', 'Finance'] as $industry)
                        <span class="badge bg-light text-dark border me-1">{{ $industry }}</span>
                    @endforeach
                </div>

                <p class="text-muted small mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 text-center h-100 p-4">
                <h6 class="text-muted mb-3">Curriculum Vitae</h6>
                <div class="d-flex align-items-center justify-content-center mb-3" style="height: 120px;">
                    <img src="{{ asset('images/CV.png') }}" alt="CV Icon"
                         class="bg-white rounded"
                         style="width: 150px; height: 150px; object-fit: contain;">
                </div>
                <p class="fw-bold mb-0">Cv Jane Cooper.pdf</p>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 text-center h-100 p-4">
                <h6 class="text-muted mb-3">Portfolio</h6>
                <div class="d-flex align-items-center justify-content-center mb-3" style="height: 120px;">
                    <img src="{{ asset('images/portofolio.png') }}" alt="Portfolio Icon"
                         class="bg-white rounded"
                         style="width: 150px; height: 150px; object-fit: contain;">
                </div>
                <p class="fw-bold mb-0">Portfolio Jane Cooper.pdf</p>
            </div>
        </div>
    </div>

</div>
@endsection
