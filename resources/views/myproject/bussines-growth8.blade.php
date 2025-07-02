@extends('layouts.app-growth')

@section('content')
<style>
  .decor-top-left {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 100px;
    z-index: 1;
  }

  .decor-bottom-right {
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 100px;
    z-index: 1;
  }

  .logo-m {
    position: absolute;
    width: 280px;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 1;
    z-index: 0;
  }

  .content-wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 2;
    width: 100%;
    max-width: 600px;
  }

  .message-text {
    font-size: 25px;
    color: #333;
    line-height: 1.6;
    margin-bottom: 50px; /* Jarak dengan tombol */
  }

  .btn {
    padding: 10px 0;
    background-color: #1f2d5e;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100px;
    text-align: center;
    display: inline-block;
    margin-left: -400px; /* Tombol lebih ke kiri dari tengah */
    margin-top: -100px; /* Menggeser tombol ke atas */
}

  .btn:hover {
    background-color: #18234b;
  }
</style>

<div class="position-relative">
  <img src="/images/decor-titik.png" class="decor-top-left" alt="Decor">
  <img src="/images/decor-titik.png" class="decor-bottom-right" alt="Decor">
</div>

<img src="/images/logo-m.png" class="logo-m" alt="Logo M">

<div class="content-wrapper">
  <p class="message-text">
   “You're amazing! You’ve made it through the first month successfully.
    Now, let's evaluate your achievements from last month<br><br>
    If  your business has no revenue yet, feel free to enter 0.”
  </p>

  <a href="{{ route('strategy') }}" class="btn text-decoration-none">Next</a>
</div>
@endsection
