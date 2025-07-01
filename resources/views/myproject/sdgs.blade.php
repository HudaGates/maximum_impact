{{-- C:\Users\acerb\cadangan cp\maximum_impact\resources\views\myproject\sdgs.blade.php --}}

@extends('layouts.app')

@section('content')
<style>
/* ... (CSS Anda tidak berubah, jadi saya singkat) ... */
.sdgs-wrapper {
    display: flex;
    padding: 20px;
    gap: 20px;
    font-family: 'Poppins', sans-serif;
}

.sdgs-sidebar {
    width: 240px;
    padding-top: 10px;
}

.sdgs-sidebar h5 {
    font-size: 14px;
    font-weight: 700;
    color: #2b2b2b;
    margin-bottom: 10px;
}

.filter-box {
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
}

.filter-box h6 {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 10px;
}

.category-list {
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.category-list li {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 13px;
    color: #333;
}

.category-list input {
    margin-right: 6px;
}

.sdgs-main {
    flex: 1;
}

.search-bar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
    padding: 20px;
}

.search-input {
    padding: 8px 10px;
    width: 280px;
    border: 1px solid #ccc;
    border-radius: 6px 0 0 6px;
    font-size: 14px;
}

.search-button {
    padding: 8px 16px;
    background-color: #1f2c56;
    color: white;
    border: none;
    border-radius: 0 6px 6px 0;
    font-weight: 600;
    cursor: pointer;
}

.sdgs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 20px;
}

.sdg-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.2s ease;
}

.sdg-card:hover {
    transform: scale(1.015);
}

.sdg-card img {
    width: 100%;
    display: block;
    border-radius: 16px;
}


.sdg-checkbox {
    position: absolute;
    bottom: 10px;
    right: 10px;
    transform: scale(1.4);
    cursor: pointer;
}
.footer-sdgs {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.next-link {
    color: #1f2c56;
    font-weight: bold;
    text-decoration: none;
    /* Menambahkan style agar button terlihat seperti link */
    background: none;
    border: none;
    padding: 0;
    font-size: inherit;
    cursor: pointer;
}


@media (max-width: 768px) {
    .sdgs-wrapper {
        flex-direction: column;
    }

    .sdgs-sidebar {
        width: 100%;
    }

    .search-bar {
        justify-content: center;
    }

    .search-input {
        width: 100%;
    }
}
</style>
<div class="sdgs-wrapper">

    <div class="sdgs-sidebar">
        <h6>FILTER</h6>
        <div class="filter-box">
            <h6>CATEGORIES</h6>
            <ul class="category-list">
                <li><input type="checkbox" checked> <label>Social Impact</label></li>
                <li><input type="checkbox" checked> <label>Environmental Impact</label></li>
                <li><input type="checkbox"> <label>Economic Impact</label></li>
                <li><input type="checkbox"> <label>Institutional and Collaborative</label></li>
                <li><input type="checkbox"> <label>Urban and Community Development</label></li>
            </ul>
        </div>
    </div>

    <div class="sdgs-main">
        <div class="input-group mb-4" style="max-width: 1000px;">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0 border-end-0" placeholder="Search Data" value="{{ request('search') }}">
            <button class="btn text-white" style="background-color: #1F2A69;">Search</button>
        </div>

        <!-- MULAI FORM -->
        <form id="sdg-form" method="GET" action="{{ route('myproject.indikator') }}">
            <div class="sdgs-grid">
                @for ($i = 1; $i <= 17; $i++)
                    <div class="sdg-card">
                        <img src="{{ asset('images/sdgs/' . $i . '.png') }}" alt="SDG {{ $i }}">
                        {{-- Tambahkan name="sdgs[]" dan value="{{ $i }}" --}}
                        <input type="checkbox" name="sdgs[]" value="{{ $i }}" class="sdg-checkbox">
                    </div>
                @endfor
            </div>
            
            <div class="footer-sdgs">
                {{-- Beri ID pada span agar mudah diupdate oleh JS --}}
                <p><span id="selected-count">0</span> Categories Selected</p>
                {{-- Ubah <a> menjadi <button type="submit"> --}}
                <button type="submit" class="next-link">Next</button>
            </div>
        </form>
        <!-- SELESAI FORM -->

    </div>

</div>

{{-- Tambahkan script di akhir section --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.sdg-checkbox');
    const countElement = document.getElementById('selected-count');

    function updateCount() {
        // Hitung jumlah checkbox yang dicentang
        const selectedCount = document.querySelectorAll('.sdg-checkbox:checked').length;
        // Update teks
        countElement.textContent = selectedCount;
    }

    // Tambahkan event listener untuk setiap checkbox
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', updateCount);
    });

    // Panggil sekali saat halaman dimuat untuk inisialisasi
    updateCount();
});
</script>
@endsection