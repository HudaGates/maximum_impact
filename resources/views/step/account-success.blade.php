<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bussiness Registration - Step 12</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        .decor {
            position: absolute;
            width: 120px;
            opacity: 0.5;
        }

        .decor-top-center {
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .decor-bottom-left {
            bottom: 10px;
            left: 10px;
        }

        .decor-bottom-right {
            bottom: 100px;
            right: 10px;
        }

        h1 {
            color: #f39c12;
            font-size: 32px;
            font-weight: bold;
            line-height: 1.3;
        }

        .dots {
            color: #fddc88;
            font-size: 30px;
            user-select: none;
            margin-bottom: 30px;
        }

        .check-icon {
            margin: 30px auto;
        }

        .description {
            font-size: 16px;
            color: #555;
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .description strong {
            color: #000;
        }

        .button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .button svg {
            margin-left: 8px;
            vertical-align: middle;
        }

    </style>
</head>
<body>

    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-top-center"/>
    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-bottom-left"/>
    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-bottom-right"/>

    <h1>Your Business Is Ready<br>for Liftoff!</h1>

    <div class="check-icon">
        <img src="{{asset(path: "images/checkmark.png") }}" alt="Checkmark" width="200" />
    </div>

    <div class="description">
        Welcome to Your Traction Tracker, <strong>{{ $firstName }}</strong>! 
        Your business is now live and primed to help you scale smarter. 
        The dashboard is yours, let’s turn those goals into reality!
    </div>

    <a class="button" href="/dashboard">
        Launch My Dashboard!
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="16" height="16" viewBox="0 0 24 24">
            <path d="M10 17l5-5-5-5v10z"/>
        </svg>
    </a>

</body>
</html>
