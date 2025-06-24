@extends('layouts.app-2') {{-- Sesuaikan dengan layout Anda --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #1F2A69;">
                    <h3>Edit Member: {{ $member->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- PENTING: untuk memberi tahu Laravel ini adalah request UPDATE --}}

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $member->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="job_title" class="form-label">Position/Title</label>
                                <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $member->job_title) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" name="department" value="{{ old('department', $member->department) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location', $member->location) }}" required>
                            </div>
                            <div class="col-12">
                                <label for="photo" class="form-label">Upload New Profile Picture</label>
                                <input type="file" class="form-control" name="photo">
                                @if ($member->photo)
                                    <div class="mt-2">
                                        <small>Current Picture:</small><br>
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="Current Photo" width="80">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('community.company-profiles') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn text-white" style="background-color: #1F2A69;">Update Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection