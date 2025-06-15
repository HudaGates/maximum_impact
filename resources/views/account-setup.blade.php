<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bussiness Registration - Step 11</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            color: #FBB041;
            font-size: 28px;
            font-weight: bold;
        }

        .gears {
            margin: 30px auto;
        }


        .description {
            font-family: 'Poppins';
            font-size: 14px;
            color: #333;
            margin-top: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .highlight {
            font-style: italic;
            color: #FBB041;
            font-weight: bold;
            margin-top: 10px;
        }

        .button {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #fff;
            border: 1px solid #000000;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .help-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #FBB041;
            padding: 10px 15px;
            border-radius: 20px;
            color: #fff;
            font-weight: bold;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .help-button img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            border-radius: 50%;
        }

    </style>
</head>
<body>


    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-top-center"/>
    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-bottom-left"/>
    <img src="{{asset(path: "images/decor.png") }}" alt="Decor" width="100"  class="decor decor-bottom-right"/>


    <h1>We’re Putting the Final<br>Touches on Your Account!</h1>

    <div class="gears" style="margin-bottom: 20px;">
        <a href="success"><img src="{{asset(path: "images/gears.png") }}" alt="Gears" width="250" />
        </a></div>

    <div class="description">
        Thanks for trusting us with your business journey! Our team is double-checking your details to ensure everything is set up perfectly. We’ll notify you via email as soon as you’re approved (usually within 24 hours).
    </div>

    <div class="highlight">
        Great things take a little time, but we promise it’ll be worth the wait!
    </div>

    <a class="button" href="/">← Return to Home</a>

    <a class="help-button" href="*" style="text-decoration: none">
    <img src="{{asset(path: "images/max.png") }}" alt="Max" width="200" />
    Need Help?</a>
</body>
</html>
