<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | ImpactMate</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-panel {
            width: 60%;
            padding: 80px;
            position: relative;
            background-color: white;
        }

        .right-panel {
            width: 40%;
            background-color: #1d2653;
            position: relative;
        }

        h1 {
            color: #fbb03b;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .subheading {
            color: #6e6e6e;
            font-size: 16px;
            margin-bottom: 40px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #1d2653;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            margin-top: 8px;
            margin-bottom: 25px;
            border: none;
            border-radius: 6px;
            background-color: #f3e8c9;
            font-style: italic;
        }

        .btn {
            background-color: #1d2653;
            color: white;
            font-weight: 600;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 16px;
        }

        .btn:hover {
            opacity: 0.95;
        }

        .forgot-password {
            text-align: center;
            font-size: 12px;
            color: #6e6e6e;
        }

        .bottom-text {
            text-align: center;
            font-size: 14px;
            margin-top: 60px;
        }

        .bottom-text a {
            color: #1d2653;
            font-weight: 600;
            text-decoration: none;
        }

        .dots {
            position: absolute;
            top: 20px;
            right: 40px;
        }

        .dots svg {
            width: 120px;
            height: auto;
        }

        .dots-bottom {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .help-btn {
            position: absolute;
            right: 20px;
            bottom: 20px;
            background-color: #fbb03b;
            color: white;
            border-radius: 12px;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
        }

        .help-btn img {
            width: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left-panel">
        <div class="dots">
            <svg viewBox="0 0 100 100">
                <!-- Repeat dot pattern -->
                <circle cx="10" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="30" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="50" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="70" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="90" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="10" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="30" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="50" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="70" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="90" cy="30" r="4" fill="#f3e8c9"/>
            </svg>
        </div>

        <h1>Welcome Back,<br>Trailblazer!</h1>
        <p class="subheading">Ready to check your traction? Log in to track progress, crush goals, and keep growing.</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">What’s your work email?</label>
                <input type="email" name="email" placeholder="Your business’s command center awaits..." required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Shh… your secret key to growth" required>
            </div>
           <button type="submit" class="btn">Launch My Dashboard! ↗</button>
        </form>

        <p class="forgot-password">Forgot Your Password? 🔒</p>
        <p class="bottom-text">New to ImpactMate? <a href="{{ route('register.step1') }}">Join here</a> to turn your goals into glory!</p>

        <div class="dots-bottom">
            <!-- Reuse dots SVG -->
            <svg viewBox="0 0 100 100">
                <circle cx="10" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="30" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="50" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="70" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="90" cy="10" r="4" fill="#f3e8c9"/>
                <circle cx="10" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="30" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="50" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="70" cy="30" r="4" fill="#f3e8c9"/>
                <circle cx="90" cy="30" r="4" fill="#f3e8c9"/>
            </svg>
        </div>
    </div>

    <div class="right-panel">
        <div class="help-btn">
            <img src="{{ asset('assets/images/max.png') }}" alt="Help">
            Need Help?
        </div>
    </div>
</div>
</body>
</html>
