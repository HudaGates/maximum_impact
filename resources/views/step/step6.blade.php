<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Business Registration - Step 6</title>
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
        .title {
            font-size: 30px;
            font-weight: 900;
            color: #F89C1C;
        }
        .subtitle {
            font-size: 14px;
            color: #3a3a3a;
            line-height: 1.6;
            margin-top: 10px;
            max-width: 480px;
        }
    textarea {
      margin: 30px 1;
            padding: 16px;
            width: 80%;
            margin-left: 50px;
            height: 100px;
            max-width: 560px;
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
            width: 150px;
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-prev {
            background-color: white;
            margin-left: 50px;
            border: 1px solid #ccc;
            color: #232F65;
            width: 22%;
            text-align: center;
        }

        .btn-next {
            background-color: #1c2660;
            color: white;
            margin-left: 118px;
            width: 30%;
        }
    .bottom-text {
      font-size: 12px;
            margin-top: 140px;
            margin-right: 40px;
            color: #444;
            text-align: center;
    }
    .bottom-text a {
      color: #1C2465;
            font-weight: bold;
            text-decoration: none;
    }
    .note {
            color: #f59e0b;
            font-size: 13px;
            margin-top: 5px;
            margin-left: 430px;
            font-style: italic;
            font-weight: bold;
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
    <!-- LEFT -->
    <div class="left">
      <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-top-right" alt="decor">
      <h1 class="title">Build Your<br>A-Team!</h1>
      <p class="subtitle">
        Businesses grow when teams grow. How will you <strong>level up your squad</strong> in 6 months? Hiring? Training? New roles?<br>Let’s turn your team into superhumans.
      </p>
      <form method="POST" action="{{ route(name: 'step6.submit') }}">
        @csrf
        <textarea name="team_plan" placeholder="Hire 2 senior developers, Launch leadership training, ...">{{ old('team_plan', $business->team_plan ?? '') }}</textarea>
        <div class="buttons">
          <a href="{{ route('step5') }}" style="text-decoration: none" class="btn btn-prev">← Previous</a>
          <button type="submit" class="btn btn-next">Continue →</button>
        </div>
        <div class="note">Almost there...</div>
      </form>
      <p class="bottom-text">Already have an account? <a href="/login">Login</a></p>
      <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-bottom-left" alt="decor">
    </div>

    <!-- RIGHT -->
    <div class="right">
      <div class="help-button">
        <img src="{{ asset(path: 'images/max.png') }}" alt="Help Icon">
        Need Help?
      </div>
    </div>
  </div>
</body>
</html>
