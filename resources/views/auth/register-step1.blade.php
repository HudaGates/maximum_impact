<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Register' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
        }
        .bg-right {
            background-color: #19235A;
        }
        .form-control.custom {
            background-color: #F6EFD8;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
        }
        .form-control::placeholder {
            color: #888;
        }
        .btn-dark-blue {
            background-color: #19235A;
            color: white;
            padding: 10px 40px;
            border-radius: 8px;
            font-weight: bold;
        }
        .help-bubble {
            background-color: #FDBA3B;
            color: white;
            font-weight: 500;
            border-radius: 12px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
        }
        .dot-pattern {
            display: grid;
            grid-template-columns: repeat(5, 10px);
            gap: 10px;
        }
        .dot-pattern span {
            width: 8px;
            height: 8px;
            background-color: #F6EFD8;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Left -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5">
            <div class="dot-pattern mb-4 ms-auto me-3">
                @for ($i = 0; $i < 25; $i++)
                    <span></span>
                @endfor
            </div>

            <h2 class="fw-bold text-warning">Welcome to<br><span class="text-dark">Maximum Impact</span></h2>
            <p class="text-muted mb-4">Lets Make an Account first!</p>

            <form class="w-75" method="POST" action="{{ route('register.step1.post') }}">
                <div class="mb-3">
                    <input type="text" name="first_name" class="form-control custom" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="last_name" class="form-control custom" placeholder="Last Name" required>
                </div>
                <div class="mb-4">
                    <input type="tel" name="phone" class="form-control custom" placeholder="Phone Number" required>
                </div>
                <a href="{{ route('register.step2') }}" type="submit" class="btn btn-dark-blue w-100 mb-3"> Continue <i class="bi bi-arrow-right ms-2"></i></a></button>
                <p class="text-center">Already have an account? <a href="/login" class="text-primary" style="text-decoration: none">Login</a></p>
            </form>

            <div class="dot-pattern mt-4 ms-3">
                @for ($i = 0; $i < 25; $i++)
                    <span></span>
                @endfor
            </div>
        </div>

        <!-- Right -->
        <div class="col-md-6 bg-right position-relative">
            <div class="position-absolute bottom-0 end-0 m-4">
                <div class="help-bubble shadow">
                    <img src="{{ asset('images/max.png') }}" alt="help" width="24" class="me-2">
                    Need Help?
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
