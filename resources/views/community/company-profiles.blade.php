@extends('layouts.app-business')

@section('title', 'Profile Company')

@section('content')
<h2 class="fw-bold mb-4">Profile Company</h2>

<div class="card shadow-sm border-0 rounded-4 mb-4 p-4 d-flex flex-row align-items-start" style="max-width: 800px;">
    <!-- Logo Perusahaan -->
    <img src="{{ asset($company['logo']) }}" alt="Logo" class="me-4 rounded-3" style="width: 100px; height: 100px; object-fit: contain;">

    <!-- Detail Perusahaan -->
    <div class="flex-grow-1">
        <h4 class="fw-bold text-dark mb-1">{{ $company['name'] }}</h4>
        <div class="text-success fw-semibold mb-2">{{ $company['type'] }}</div>
        <p class="mb-3 text-muted" style="max-width: 100%;">
            {{ $company['description'] }}
        </p>
        <div class="d-flex flex-column gap-1 text-dark">
            <div class="text-primary fw-semibold">
                <i class="bi bi-telephone-fill me-2"></i>{{ $company['phone'] }}
            </div>
            <div class="text-primary fw-semibold">
                <i class="bi bi-geo-alt-fill me-2"></i>{{ $company['location'] }}
            </div>
        </div>
    </div>
</div>


<h4 class="fw-bold mb-4 text-center">Our Team</h4>
<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
  @foreach ($team as $member)
    <div class="col d-flex justify-content-center">
      <div class="card shadow-sm rounded-4 border-0" style="width: 200px;">
        <img src="{{ asset($member['image']) }}"
             alt="{{ $member['name'] }}"
             class="card-img-top rounded-top-4"
             style="height: 200px; object-fit: cover;">
        <div class="card-body text-center">
          <h6 class="fw-bold mb-0">{{ $member['name'] }}</h6>
          <small class="text-muted">{{ $member['position'] }}</small>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="container my-5">
    <h4 class="fw-bold text-primary mb-4">Previous Funding</h4>

    <div class="table-responsive shadow-sm rounded-4">
        <table class="table table-hover align-middle mb-0">
            <thead class="text-white" style="background-color: #5B3FE4;">
                <tr>
                    <th style="background-color: #1F2A69; color: white;">No</th>
                    <th style="background-color: #1F2A69; color: white;">Team</th>
                    <th style="background-color: #1F2A69; color: white;">Industry</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Stage</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Amount</th>
                    <th style="background-color: #1F2A69; color: white;">Year</th>
                    <th style="background-color: #1F2A69; color: white;">Invest</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fundings as $index => $fund)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-light' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $fund['team'] }}</td>
                    <td>{{ $fund['industry'] }}</td>
                    <td>{{ $fund['stage'] }}</td>
                    <td>{{ $fund['amount'] }}</td>
                    <td>{{ $fund['year'] }}</td>
                    <td>
                        <button class="btn btn-sm rounded-pill px-3" style="background-color: #1F2A69; color: white;">Invest</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
            <div>
                <label>Row per page</label>
                <select class="form-select form-select-sm d-inline w-auto ms-2">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            <small>Total {{ count($fundings) }} of 200</small>
        </div>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('investment.create') }}" class="btn px-4 rounded-pill" style="background-color: #1F2A69; color: white;">Invest</a></button>
    </div>
</div>
@endsection
