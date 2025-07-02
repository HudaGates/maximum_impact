<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Registration - Step 2</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
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

        input[type="text"] {
            margin: 30px 1;
            padding: 16px;
            width: 90%;
            margin-left: 50px;
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

        .login-link {
            font-size: 12px;
            margin-top: 270px;
            margin-right: 40px;
            color: #444;
            text-align: center;
        }

        .login-link a {
            color: #1C2465;
            font-weight: bold;
            text-decoration: none;
        }

        .decor {
            position: absolute;
            width: 130px;
            z-index: 0;
        }

        .decor-top {
            top: 0;
            right: 0;
        }

        .decor-bottom {
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

<div class="left">
    <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-top" alt="decor">
    <h1 class="title">What’s Your Business’s<br>Playground?</h1>
    <p class="subtitle">Select your industry so we can tailor tools to your world. Are you disrupting tech, crafting gourmet meals, or revolutionizing retail?</p>

    <form method="POST" action="{{ route(name: 'step2.submit') }}">
        @csrf
        <input type="text" name="industry" placeholder="Enter your business industry..." value="{{ old('industry', $business->industry ?? '') }}">

        @error('industry')
        <span class="error">{{ $message }}</span>
    @enderror

        <div class="buttons">
            <a href="{{ route('step1') }}" style="text-decoration: none" class="btn btn-prev">← Previous</a></button>
            <button type="submit" class="btn btn-next">Continue →</button>
        </div>
    </form>

    <div class="login-link">Already have an account? <a href="/login">Login</a></div>
    <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-bottom" alt="decor">
</div>

<div class="right">
    <div class="help-button">
        <img src="{{ asset(path: 'images/max.png') }}" alt="Help Icon">
        Need Help?
    </div>
</div>

</body>
</html>
