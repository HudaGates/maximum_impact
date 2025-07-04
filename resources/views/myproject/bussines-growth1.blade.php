@extends('layouts.app-growth')

@section('content')
<style>
  /* ... (CSS Anda tidak perlu diubah, tapi saya akan tambahkan sedikit perbaikan) ... */
  .growth-container { max-width: 550px; margin: 80px auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); position: relative; }
  .decor-top-left { position: absolute; top: 20px; left: 20px; width: 100px; z-index: 1; }
  .decor-bottom-right { position: absolute; bottom: 20px; right: 20px; width: 100px; z-index: 1; }
  .logo-m { position: absolute; width: 250px; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; }
  textarea { width: 100%; height: 120px; padding: 10px; font-size: 16px; resize: none; box-sizing: border-box; background-color:rgb(248, 248, 248); position: relative; z-index: 2; border: 1px solid #ddd; border-radius: 5px; }
  .btn { padding: 10px 0; background-color: #1f2d5e; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100px; text-align: center; text-decoration: none; }
  .btn:hover { background-color: #18234b; color: white; }
  .btn-container { display: flex; justify-content: space-between; margin-top: 30px; }
</style>

<div class="position-relative">
    <img src="/images/decor-titik.png" class="decor-top-left" alt="Decor">
    <img src="/images/decor-titik.png" class="decor-bottom-right" alt="Decor">
</div>

{{-- INTI PERBAIKAN PADA VIEW --}}
{{-- 1. Gunakan nama route yang sudah diperbaiki --}}
<form method="POST" action="{{ route('business-growth.step1.store') }}">
    @csrf
    <div class="growth-container">
        <h4><strong>What goals does your company aim to achieve in the next 6 months?</strong></h4>
        
        {{-- Teks bulan sekarang dinamis berdasarkan variabel $month dari controller --}}
        <p><strong>Month {{ $month }}:</strong> <span style="float: right;">1/6</span></p>

        <div style="position: relative;">
            {{-- 2. Nama input diubah menjadi generik 'goals' --}}
            {{-- 3. Textarea diisi dengan data yang sudah ada jika sedang mengedit --}}
            <textarea name="goals" required>{{ old('goals', $data->goals ?? '') }}</textarea>
            <img src="/images/logo-m.png" class="logo-m" alt="Logo M">
        </div>

        {{-- 4. Input tersembunyi untuk mengirim nomor bulan yang sedang diisi --}}
        <input type="hidden" name="month" value="{{ $month }}">

        <div class="btn-container">
            {{-- Tombol back kembali ke dasbor dengan filter bulan yang sama --}}
            <a href="{{ route('community.dashboard-business', ['month' => $month]) }}" class="btn">Back</a>
            <button type="submit" class="btn">Save & Next</button>
        </div>
    </div>
</form>
@endsection