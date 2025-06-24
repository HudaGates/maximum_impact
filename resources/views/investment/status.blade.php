@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Aprove or Reject Investment</h2>

    {{-- =================== BAGIAN YANG DIUBAH =================== --}}
    {{-- Dropdown sekarang ada di dalam form agar bisa mengirim data filter --}}
    <form method="GET" action="{{ route('investment.status') }}" class="mb-3 w-25">
        <select name="status_filter" class="form-select" onchange="this.form.submit()">
            {{-- Opsi default untuk menampilkan semua status --}}
            <option value="" {{ request('status_filter') == '' ? 'selected' : '' }}>Filter by Status (All)</option>
            
            {{-- Opsi untuk status yang bisa difilter --}}
            <option value="pending" {{ request('status_filter') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status_filter') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ request('status_filter') == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </form>
    {{-- ========================================================== --}}

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
                @forelse($investments as $item)
                <tr>
                    {{-- Sisa kode Anda tidak diubah --}}
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
                           class="{{ $item->status === 'approved' ? 'text-success' : ($item->status === 'rejected' ? 'text-danger' : '') }}" style="text-decoration: none">
                            {{ ucfirst($item->status) }}
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-4">No investments found for the selected filter.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection