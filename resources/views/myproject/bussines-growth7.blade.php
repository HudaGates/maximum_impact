@extends('layouts.app-growth')

@section('content')
<style>
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

{{-- 1. ACTION FORM DIARAHKAN KE ROUTE YANG BENAR --}}
<form method="POST" action="{{ route('business-growth.step7.store') }}">
    @csrf
    <div class="growth-container">
        <h4><strong>Write your strategy to achieve your business development target.</strong></h4>
        
        {{-- Menampilkan bulan yang sedang diisi secara dinamis --}}
        <p><strong>Month {{ $month }}:</strong> <span style="float: right;">6/6</span></p>

        <div style="position: relative;">
            {{-- 2. NAMA INPUT DIUBAH MENJADI 'strategy' --}}
            {{-- 3. NILAI TEXTAREA DIISI DENGAN DATA YANG SUDAH ADA --}}
            <textarea name="strategy" required>{{ old('strategy', $data->strategy ?? '') }}</textarea>
            <img src="/images/logo-m.png" class="logo-m" alt="Logo M">
        </div>

        {{-- 4. MENAMBAHKAN INPUT TERSEMBUNYI UNTUK BULAN --}}
        <input type="hidden" name="month" value="{{ $month }}">

        <div class="btn-container">
            {{-- 5. Tombol back mengarah ke halaman transisi sebelumnya dengan menyertakan bulan --}}
            <a href="{{ route('business-growth.step6.show', ['month' => $month]) }}" class="btn">Back</a>
            <button type="submit" class="btn">Finish</button>
        </div>
    </div>
</form>
@endsection