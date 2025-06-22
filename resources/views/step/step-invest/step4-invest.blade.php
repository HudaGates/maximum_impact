<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Registration - Step 4</title>
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
        .tip {
            font-style: italic;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 20px;
        }
        textarea {
            margin: 30px 1;
            padding: 16px;
            width: 80%;
            margin-left: 50px;
            height: 100px;
            max-width: 515px;
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
            <h1 class="title">Fuel Your<br>Ambition!</h1>
            <p class="subtitle">Let's talk numbers! What investment target return would make you proud in 6 months? Dream big—this is your runway to soar.</p>
            <p class="tip">(Pro tip: Aim 10% higher than “safe”!)</p>
            <form method="POST" action="{{ route(name: 'step4-invest.submit') }}">
                @csrf
                <textarea name="ambition_plan" placeholder="...">{{ old('ambition_plan', $profile->ambition_plan ?? '') }}</textarea>
                <div class="buttons">
                    <a href="{{ route(name: 'step-invest.step3-invest') }}" style="text-decoration: none" class="btn btn-prev">← Previous</a>
                    <button type="submit" class="btn btn-next">Continue →</button>
                </div>
            </form>
            <p class="bottom-text">Already have an account?<a href="/login">Login</a></p>
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
