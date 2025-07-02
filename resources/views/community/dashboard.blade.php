@extends('layouts.app') {{-- Layout yang sudah ada dan berisi sidebar + topbar --}}

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container py-4">
    {{-- Menampilkan pesan sukses setelah update --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Kartu Header Profil --}}
    <div class="card mb-4 rounded-4 overflow-hidden border-0" style="position: relative;">
        <!-- Banner atas -->
        <div style="background-color: #232d65; height: 100px;"></div>
        <div class="col-auto">
            {{-- Ambil foto profil secara dinamis, dengan gambar default --}}
            <img src="{{ $mentor->profile_photo_path ? asset('storage/' . $mentor->profile_photo_path) : asset('images/agradi.jpg') }}"
                 class="rounded-circle border border-white shadow"
                 width="140" height="140"
                 style="object-fit: cover; position: absolute; top:10px; left:20px;"
                 alt="Profile Picture">
        </div>
        <div class="card-body position-relative pt-0">
            <div class="row">
                <!-- Info pengguna -->
                <div class="col ps-5 ms-5 mt-5">
                    {{-- Gunakan data dari objek $mentor --}}
                    <h2 class="fw-bold text-dark mb-1" style="color: #232d65 !important;">{{ $mentor->name }}</h2>
                    <h5 class="mb-1">{{ $mentor->job_title }}</h5>
                    <p class="text-muted mb-0">{{ $mentor->location }}</p>
                </div>

                <!-- Tombol Edit dan Institusi -->
                <div class="col-auto text-end mt-3">
                    {{-- Tombol ini akan membuka modal edit --}}
                    <button class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                            <i class="bi bi-buildings text-secondary"></i>
                        </div>
                        <div class="text-start small">
                            <div>{{ $mentor->institution }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kartu About --}}
    <div class="card rounded-4 border-0 shadow-sm mb-4 px-4 py-3">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <h2 class="fw-bold mb-0">About</h2>
             {{-- Tombol ini juga membuka modal yang sama --}}
            <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="bi bi-pencil me-1"></i> Edit
            </button>
        </div>
        <div class="text-muted" style="font-size: 16px; text-align: justify; line-height: 1.8;">
            {{ $mentor->about }}
        </div>
    </div>
    @include('community.addexperience')

<div class="card rounded-4 border-0 shadow-sm mb-4 px-4 py-3">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h2 class="fw-bold mb-0">Experience</h2>
        <div>
            <!-- Tombol Add -->
            <button class="btn btn-link text-dark me-1 p-0" data-bs-toggle="modal" data-bs-target="#addExperienceModal" title="Add">
                <i class="bi bi-plus-lg fs-5"></i>
            </button>

            <!-- Tombol Edit -->
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
                <i class="bi bi-pencil me-1"></i> Edit
            </button>
        </div>
    </div>

    @php use Carbon\Carbon; @endphp
    @php $grouped = $experiences->groupBy('company'); @endphp

    @foreach($grouped as $company => $items)
        <div class="mb-4">
            <!-- Header Perusahaan -->
            <div class="d-flex align-items-start mb-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/26/Maxy_Logo.png" alt="{{ $company }}" class="me-3" style="width: 40px; height: 40px;">
                <div>
                    <h5 class="mb-0 fw-semibold">{{ $company }}</h5>
                    <small class="text-muted">1 year</small><br>
                    <small class="text-muted">On Site</small>
                </div>
            </div>

            <!-- Timeline -->
            <div class="border-start border-2 ps-3 ms-2">
                @foreach($items as $exp)
                    @php
                        $start = $exp->start_date ? Carbon::parse($exp->start_date) : null;
                        $end = $exp->end_date ? Carbon::parse($exp->end_date) : now();
                        $duration = $start ? $start->diffForHumans($end, ['parts' => 2, 'syntax' => Carbon::DIFF_ABSOLUTE]) : '';
                    @endphp

                    <div class="mb-4 position-relative ps-3">
                        <span class="position-absolute top-0 start-0 translate-middle bg-dark rounded-circle" style="width: 10px; height: 10px;"></span>
                        <h6 class="fw-bold mb-1">{{ $exp->position }}</h6>
                        <small class="text-muted d-block">{{ $exp->type }}</small>
                        <small class="text-muted d-block">
                            {{ $start ? $start->format('M Y') : '' }} - {{ $exp->end_date ? $end->format('M Y') : 'Present' }}
                            • {{ $duration }}
                        </small>
                        <small class="text-muted d-block">{{ $exp->location }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

{{-- Education Section --}}
 @include('community.addeducation')
<div class="card rounded-4 border-0 shadow-sm mb-4 px-4 py-3">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h2 class="fw-bold mb-0">Education</h2>
        <div>
            <button class="btn btn-link text-dark me-1 p-0" data-bs-toggle="modal" data-bs-target="#addEducationModal" title="Add">
                <i class="bi bi-plus-lg fs-5"></i>
            </button>

            <!-- Tombol Edit -->
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addEducationModal">
                <i class="bi bi-pencil me-1"></i> Edit
            </button>
        </div>
    </div>

     @forelse($educations as $edu)
        <div class="d-flex align-items-start mb-4">
            {{-- Icon --}}
            <div class="me-3">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; background-color: #e9d8fd;">
                    <i class="bi bi-buildings text-primary fs-4"></i>
                </div>
            </div>

            {{-- Content --}}
            <div>
                <h5 class="fw-bold mb-1">{{ $edu->university }}</h5>
                <p class="text-muted mb-1">
                    {{ optional($edu->start_date)->format('Y') }} - 
                    {{ optional($edu->end_date)->format('Y') ?? 'Present' }}
                </p>

                @if($edu->title)
                    <p class="mb-1"><strong>Title:</strong> {{ $edu->title }}</p>
                @endif

                @if($edu->field_of_study)
                    <p class="mb-1"><strong>Field of Study:</strong> {{ $edu->field_of_study }}</p>
                @endif

                @if($edu->grade)
                    <p class="mb-1"><strong>Grade:</strong> {{ $edu->grade }}</p>
                @endif

                @if($edu->activities)
                    <p class="mb-1"><strong>Activities:</strong> {{ $edu->activities }}</p>
                @endif

                @if($edu->description)
                    <p class="mb-0"><strong>Description:</strong> {{ $edu->description }}</p>
                @endif
            </div>
        </div>
    @empty
        <p class="text-muted">No education records available.</p>
    @endforelse
</div>
@include('community.addskills')
<div class="card rounded-4 border-0 shadow-sm mb-4 px-4 py-3">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h2 class="fw-bold mb-0">Skills</h2>
        <div>
            <button class="btn btn-link text-dark me-1 p-0" data-bs-toggle="modal" data-bs-target="#addSkillModal" title="Add">
                <i class="bi bi-plus-lg fs-5"></i>
            </button>

            <!-- Tombol Edit -->
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addSkillModal">
                <i class="bi bi-pencil me-1"></i> Edit
            </button>
        </div>
    </div>
    
    @forelse($skills as $skill)
    <div class="mb-4">
      <div class="fw-semibold">
        {{ $skill->skill_name }}
      </div>
      <div class="text-muted small">
        UI Designer at SUPIRIN
      </div>
      <hr>
    </div>
  @empty
    <p class="text-muted">No skills added yet.</p>
  @endforelse
</div>
</div>
</div>
{{-- Skills Section --}}


{{-- Modal untuk Edit Profil --}}
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Form untuk mengirim data yang sudah diperbarui --}}
            <form action="{{ route('mentor.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">Foto Profil</label>
                        <input class="form-control" type="file" id="profile_photo" name="profile_photo" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mentor->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title', $mentor->job_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $mentor->location) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="institution" class="form-label">Institusi</label>
                        <input type="text" class="form-control" id="institution" name="institution" value="{{ old('institution', $mentor->institution) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="about" class="form-label">Tentang Saya</label>
                        <textarea class="form-control" id="about" name="about" rows="5" required>{{ old('about', $mentor->about) }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection