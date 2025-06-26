@extends('layouts.app-2')

@section('content')
<div class="container mt-5">
    <h3>Edit Profil</h3>
    <form method="POST" action="{{ route('dashboard.update') }}">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title', $user->job_title) }}">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $user->location) }}">
        </div>
        <div class="mb-3">
            <label>Institusi</label>
            <input type="text" name="institution" class="form-control" value="{{ old('institution', $user->institution) }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
