@extends('layouts.app-growth')

@section('content')
<style>
  .growth-container {
    max-width: 550px;
    margin: 80px auto;
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    position: relative;
  }

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
    width: 250px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 1;
  }

  textarea {
    width: 100%;
    height: 120px;
    padding: 10px;
    font-size: 16px;
    resize: none;
    box-sizing: border-box;
    background-color:rgb(248, 248, 248);
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
  }

  .btn:hover {
    background-color: #18234b;
  }

  .btn-container {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
  }
</style>

<div class="position-relative">
    <img src="/images/decor-titik.png" class="decor-top-left" alt="Decor">
    <img src="/images/decor-titik.png" class="decor-bottom-right" alt="Decor">
</div>

<div class="growth-container">
    <form method="POST" action="{{ route('bussines-growth3') }}">
        @csrf
        <h4><strong>Write the monthly revenue target in the next 6 months?</strong></h4>
        <p><strong>Second Month:</strong> <span style="float: right;">2/6</span></p>
        <div style="position: relative;">
            {{-- NAMA INPUT DIUBAH AGAR UNIK --}}
            <textarea name="revenue_target_month_2" required></textarea>
            <img src="/images/logo-m.png" class="logo-m" alt="Logo M">
        </div>
        <div class="btn-container">
            <a href="{{ route('bussines-growth1') }}" class="btn text-decoration-none">Back</a>
            <button type="submit" class="btn">Send</button>
        </div>
    </form>
</div>
@endsection