@extends('layouts.app-growth')

@section('content')
<style>
  .decor-top-left { position: absolute; top: 20px; left: 20px; width: 100px; z-index: 1; }
  .decor-bottom-right { position: absolute; bottom: 20px; right: 20px; width: 100px; z-index: 1; }

  .logo-m {
    position: absolute;
    width: 280px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.1; /* Opacity dikurangi agar lebih soft */
    z-index: 0;
  }

  .content-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    z-index: 2;
    padding: 20px;
  }

  .message-text {
    font-size: 25px;
    color: #333;
    line-height: 1.6;
    margin-bottom: 40px; /* Jarak dengan tombol */
    max-width: 600px;
  }

  .btn {
    padding: 10px 0;
    background-color: #1f2d5e;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 120px; /* Lebar ditambah sedikit */
    text-align: center;
    display: inline-block;
    text-decoration: none;
  }

  .btn:hover {
    background-color: #18234b;
    color: white;
  }
</style>

<div class="position-relative">
  <img src="/images/decor-titik.png" class="decor-top-left" alt="Decor">
  <img src="/images/decor-titik.png" class="decor-bottom-right" alt="Decor">
</div>

<img src="/images/logo-m.png" class="logo-m" alt="Logo M">

<div class="content-wrapper">
  <p class="message-text">
    “Awesome! You’ve set your targets for the next 6 months.”<br><br>
    Now, create a plan with key steps to achieve each of the goals above.”
  </p>

  {{-- INTI PERBAIKANNYA ADA DI SINI --}}
  {{-- Mengarahkan ke halaman step 7 dengan menyertakan bulan yang didapat dari URL --}}
  <a href="{{ route('business-growth.step7.show', ['month' => request('month')]) }}" class="btn">Next</a>
</div>
@endsection