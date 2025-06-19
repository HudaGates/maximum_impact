@extends('layouts.app') {{-- Ganti dengan layout yang Anda gunakan --}}

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Investment</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="text-center align-middle">
                <tr>
                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">Company Name</th>
                    <th style="background-color: #1F2A69; color: white;">Amount</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Date</th>
                    <th style="background-color: #1F2A69; color: white;">Investment Type</th>
                    <th style="background-color: #1F2A69; color: white;">Status</th>
                    <th style="background-color: #1F2A69; color: white;">Action</th>
                    <th style="background-color: #1F2A69; color: white;">Report Financial</th>
                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Report Project</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investment as $item)
                <tr>
                    <td>{{ $item->company_name }}</td>
                    <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->investment_date)->format('j M Y') }}</td>
                    <td>{{ $item->investment_type }}</td>
                    <td class="text-success fw-semibold">Approved</td>
                    <td><a href="{{ route('investment.details', $item->id) }}" class="text-decoration-none" style="color: #1F2A69">View Details</a></td>
                    <td><button class="btn btn-sm" style="background-color: #1F2A69; color: white;">Report Financial</button></td>
                    <td><button class="btn btn-sm" style="background-color: #1F2A69; color: white;">Report Project</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
