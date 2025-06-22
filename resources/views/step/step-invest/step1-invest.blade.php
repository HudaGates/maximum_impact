<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Business Registration - Step 1</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .left {
            flex: 1;
            padding: 60px 80px;
            position: relative;
            background-color: #fff;
        }

        .right {
            flex: 1;
            background-color: #1c2660;
            position: relative;
        }
    h1 {
      font-size: 2.5rem;
      color: #f59e0b;
      font-weight: bold;
      margin-bottom: 20px;
    }
    p {
      color: #333;
      margin-bottom: 30px;
      max-width: 500px;
    }
    input[type="text"] {
            margin: 30px 0;
            margin-left: 50px;
            padding: 16px;
            width: 180%;
            max-width: 480px;
            background: #EFE2BA;
            border: none;
            border-radius: 6px;
            font-size: 14px;
    }
    .buttons {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }
    .btn {
        width: 100px;
        padding: 12px 24px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        }
    .btn-next {
        background-color: #1c2660;
        color: white;
        width: 74%;
        margin-left: 50px
    }
    .login {
      margin-top: 190px;
      margin-right: 40px;
      font-size: 14px;
      text-align: center;
    }
    .login a {
      color: #1C2465;
            font-weight: bold;
            text-decoration: none;
    }
    .decor {
            position: absolute;
            width: 130px;
            z-index: 0;
        }

        .decor-top-right {
            top: 0;
            right: 0;
        }

        .decor-bottom-left {
            bottom: 0;
            left: 0;
        }

        .help-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #F7931E;
            padding: 10px 16px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            font-weight: bold;
            color: #fff;
            font-size: 14px;
        }

        .help-button img {
            width: 24px;
            margin-right: 8px;
        }
  </style>
</head>
<body>
  <div class="container">
    <!-- LEFT SIDE -->
    <div class="left">
      <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-top-right" alt="decor">
      <h1>Welcome to Your <br> Invest Journey!</h1>
      <p>Let’s get your invest officially set up. This is where the magic begins! Share your investment name—the one that’ll light up billboards, websites, and hearts. Dream big!</p>

      <form method="POST" action="{{ route('step1-invest.submit') }}">
        @csrf
        <input type="text" name="investment_name" placeholder="Enter your investment name..." required value="{{ old('investment_name', $profile->investment_name ?? '') }}">
        <button type="submit" class="btn btn-next">Continue →</button>
      </form>

      <div class="login">Already have an account? <a href="/login">Login</a></div>
      <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-bottom-left" alt="decor">
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">
        <div class="help-button">
            <img src="{{ asset(path: 'images/max.png') }}" alt="Help Icon">
            Need Help?
        </div>
    </div>
  </div>
</body>
</html>
