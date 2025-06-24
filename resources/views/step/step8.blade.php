<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bussiness Registration - Step 8</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
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
            font-size: 32px;
            font-weight: 700;
            color: #f59e0b;
            margin-bottom: 20px;
        }

        .desc {
            color: #555;
            max-width: 450px;
            line-height: 1.5;
            font-size: 15px;
        }

        .desc strong {
            font-weight: bold;
        }

        .desc em {
            font-style: italic;
            color: #999;
        }

        .form-group {
            margin: 20px 0;
            margin-left: 50px;
        }

        textarea {
            margin: 30px 1;
            padding: 33px;
            width: 80%;
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
            margin-left: 150px;
            width: 30%;
        }

        .note {
            color: #f59e0b;
            font-size: 13px;
            margin-top: 5px;
            margin-left: 470px;
            font-style: italic;
            font-weight: bold;
        }

        .bottom-login {
            font-size: 12px;
            margin-top: 130px;
            margin-right: 40px;
            color: #444;
            text-align: center;
        }

        .bottom-login a {
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
        <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-top">
        <h1 class="title">Plot Your Winning Move!</h1>
        <p class="desc">
            How will you smash these goals? Share your <strong>battle plan</strong>.
            We’ll turn your ideas into <strong>actionable steps</strong>—no pressure, just progress!
            <br><em>(or skip if you're still strategizing)</em>
        </p>

        <form method="POST" action="{{ route(name: 'step8.submit') }}">
            @csrf

            <div class="form-group">
                <textarea name="battle_plan" placeholder="Boost marketing budget by 20%, Partner with influencers in Q3, ...">{{ old('battle_plan', $business->battle_plan ?? '') }}</textarea>
            </div>

            <div class="buttons">
                <a href="{{ route('step7') }}" style="text-decoration: none" class="btn btn-prev">← Previous</a>
                <button type="submit" class="btn btn-next">Continue →</button>
            </div>

            <div class="note">Let’s start your journey!</div>
        </form>

        <div class="bottom-login">
            Already have an account?
            <a href="#">Login</a>
        </div>

        <img src="{{ asset(path: 'images/decor.png') }}" class="decor decor-bottom">
    </div>

    <div class="right">
        <div class="help-button">
            <img src="{{ asset(path: 'images/max.png') }}" alt="Max">
            Need Help?
        </div>
    </div>
</body>
</html>
