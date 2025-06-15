@extends('layouts.app-2')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .tab-button {
            flex: 1;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            font-weight: bold;
            color: #666;
        }

        .tab-button.active {
            border-bottom: 3px solid #1f2a69;
            color: #1f2a69;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .form-section {
            max-width: 800px;
            margin: auto;
        }

        .form-control {
            border-radius: 6px;
        }

        .save-button {
            background-color: #1F2A69;
            color: white;
            padding: 8px 30px;
            border-radius: 6px;
            border: none;
        }
.btn-custom {
    background-color: white;
    color: #1F2A69;
    border: 3px solid;
}
.btn-custom:hover {
    background-color: #172254;
    color: white;
}

    </style>
</head>

<div class="container-fluid px-4 mt-4">

    <h3 class="mb-4 fw-bold" style="color:#1F2A69">Profile Company</h3>

    {{-- Tabs --}}
    <div class="container-fluid p-4" style="border: 3px solid #ccc; border-radius: 12px;">

    <div class="d-flex border-bottom mb-4">
        <div class="tab-button active" onclick="showTab('profile')">Profile</div>
        <div class="tab-button" onclick="showTab('people')">People</div>
    </div>

    {{-- Tab Content --}}
    <div id="profile" class="tab-content active">
        <div class="text-center mb-4">
            <img src="{{ asset('images/wolf.png') }}" alt="Logo" class="profile-image mb-2">
            <h5 class="fw-bold mb-1">Lion Bird</h5>
            <button class="btn btn-outline-secondary btn-sm">Upload photo</button>
        </div>

        <form action="{{ route('company.profile') }}" method="POST">
            @csrf
            <div class="row form-section g-3">
                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Input your company name">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Industry</label>
                    <input type="text" name="industry" class="form-control" placeholder="Input your industry">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Input your location company">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" placeholder="Input your website address">
                </div>
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="save-button">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div id="people" class="tab-content">
        <!-- resources/views/company/partials/people.blade.php -->

<div class="mb-3 d-flex align-items-center">
    <div class="input-group" style="max-width: 1000px; margin-left: 100px;">
        <span class="input-group-text bg-white border-end-0">
            <i class="bi bi-search text-muted"></i>
        </span>
        <input type="text" class="form-control border-start-0 border-end-0" placeholder="Search Data">
        <button class="btn text-white" style="background-color: #1F2A69;">Search</button>
    </div>
</div>

<table class="table table-hover align-middle">
    <thead class="text-white text-align-center" style="background-color: #1F2A69;">
        <tr>
            <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">Full Name</th>
            <th style="background-color: #1F2A69; color: white;">Primary Job Title</th>
            <th style="background-color: #1F2A69; color: white;">Departement</th>
            <th style="background-color: #1F2A69; color: white;">Location</th>
            <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr class="{{ $loop->odd ? 'bg-light' : '' }}">
            <td>
                <img src="{{ $member->photo }}" class="rounded-circle me-2" width="30" height="30">
                {{ $member->name }}
            </td>
            <td>{{ $member->job_title }}</td>
            <td>{{ $member->department }}</td>
            <td>{{ $member->location }}</td>
            <td>
                <a href="#" class="text-primary me-2"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="text-danger"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    <button class="btn btn-custom rounded" data-bs-toggle="modal" data-bs-target="#addMemberModal">
    + Add Members
</button>

    <!-- Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 rounded-3 overflow-hidden">
      <div class="modal-header text-white" style="background-color: #1F2A69;">
        <h5 class="modal-title" id="addMemberModalLabel">Add Members</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body px-4 py-3">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="Input your company name" required>
            </div>
            <div class="col-md-6">
              <label for="job_title" class="form-label">Position/Title</label>
              <input type="text" class="form-control" name="job_title" placeholder="Input your industry" required>
            </div>
            <div class="col-md-6">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control" name="department" placeholder="Input your location company" required>
            </div>
            <div class="col-md-6">
              <label for="location" class="form-label">Location</label>
              <input type="text" class="form-control" name="location" placeholder="Input your website address" required>
            </div>
            <div class="col-12">
              <label for="photo" class="form-label">Upload Profile Picture</label>
              <input type="file" class="form-control" name="photo">
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between px-4 py-3">
          <button type="button" class="btn btn-costum" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn text-white" style="background-color: #1F2A69;">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>

    </div>

</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
        document.getElementById(tabId).classList.add('active');
    }
</script>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</html>


<!-- Optional: Bootstrap Icons -->

@endsection
