<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bussiness Registration - Step 9</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .left-section {
            flex: 1;
            padding: 60px 80px;
            position: relative;
            background-color: #fff;
        }

        .right-section {
            flex: 1;
            background-color: #1C2465;
            position: relative;
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

        .decor-bottom-left {
            bottom: 0px;
            left: 0px;
        }

        h1 {
            color: #F7931E;
            font-size: 2rem;
            font-weight: 700;
        }

        p.description {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
            max-width: 500px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 6px;
            margin-left: 100px;
        }

        input {
            width: 70%;
            padding: 15px;
            border-radius: 8px;
            border: none;
            background-color: #EFE2BA;
            font-size: 14px;
            margin-left: 80px;
            margin-right: 100px;
        }

        .submit-button {
            background-color: #1C2465;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 8px;
            margin-top: 30px;
            margin-left: 80px;
            font-weight: bold;
            width: 75%;
            cursor: pointer;
        }

        .terms {
            font-size: 12px;
            text-align: center;
            color: #333;
            margin-top: 10px;
            margin-left: 13px
        }

        .terms a {
            text-align: center;
            color: #1C2465;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link {
            margin-top: 120px;
            font-size: 14px;
            text-align: center;
        }

        .login-link a {
            color: #1C2465;
            font-weight: bold;
            text-decoration: none;
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

    <div class="left-section">
        <img src="{{ asset(path: 'images/decor.png') }}" width="150" class="decor decor-top">
        <img src="{{ asset(path: 'images/decor.png') }}" width="150" class="decor decor-bottom-left">

        <h1>Your Business Blueprint<br>is Completed!</h1>
        <p class="description">
            You’ve built an incredible roadmap! Before we continue, how should we remember the genius behind this awesome roadmap?
        </p>

        <form method="POST" action="{{ route(name: 'step9.submit') }}">
    @csrf
    <label>What should we call you?</label>
    {{-- TAMBAHKAN name="user_name" --}}
    <input type="text" name="user_name" placeholder="Your name, please! We’ll use it to cheer you on in updates!" required>

    <label>Where should we send your wins?</label>
    {{-- TAMBAHKAN name="user_email" --}}
    <input type="email" name="user_email" placeholder="Your email—so we can celebrate milestones, share tips, and more..." required>

    <button class="submit-button" type="submit">Start The Journey!</button>

            <p class="terms">
                By proceeding, you agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
            </p>
        </form>

            <p class="login-link">
                Already have an account? <a href="#">Login</a>
            </p>

    </div>

    <div class="right-section">
        <div class="help-button">
            <img src="{{ asset(path: 'images/max.png') }}" alt="Max">
            Need Help?
        </div>
    </div>

</body>
</html>
