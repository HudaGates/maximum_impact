@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Aprove or Reject Investment</h2>

    <div class="mb-3 w-25">
        <select class="form-select">
            <option selected>Filter by Status</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="text-center align-middle">
                <tr>
                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">Investor</th>
                    <th style="background-color: #1F2A69; color: white;">Amount</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Date</th>
                    <th style="background-color: #1F2A69; color: white;">Funding Type</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Type</th>
                    <th style="background-color: #1F2A69; color: white;">Sender</th>
                    <th style="background-color: #1F2A69; color: white;">Origin Bank</th>
                    <th style="background-color: #1F2A69; color: white;">Destination Bank</th>
                    <th style="background-color: #1F2A69; color: white;">Status</th>
                    <th style="background-color: #1F2A69; color: white; border-bottom-right-radius: 12px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($investments as $item)
                <tr>
                    <td>{{ $item->investor }}</td>
                    <td>{{ number_format($item->amount, 0, ',', '.') }} IDR</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td>{{ $item->funding_type ?? 'Unknown' }}</td>
                    <td>{{ $item->investment_type ?? 'Unknown' }}</td>
                    <td>{{ $item->sender }}</td>
                    <td>{{ $item->origin_bank }}</td>
                    <td>{{ $item->destination_bank }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
    <a href="{{ route('investment.investment-report', ['status' => $item->status]) }}"
       class="{{ $item->status === 'approved' ? 'text-success' : 'text-danger' }}" style="text-decoration: none">
        {{ ucfirst($item->status) }}
    </a>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
