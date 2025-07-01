<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Login' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
             /* Prevent scrolling */
        }
        .bg-right {
            background-color: #19235A; /* A slightly softer dark blue */
        }
        .form-control.custom {
            background-color: #F6EFD8;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
        }
        .form-control::placeholder {
            color: #B0A88B; /* Softer placeholder color */
        }
        .btn-dark-blue {
            background-color: #19235A;
            color: white;
            padding: 12px 40px;
            border-radius: 8px;
            font-weight: bold;
        }
        .help-bubble {
            background-color: #FDBA3B;
            color: #2C3E50; /* Dark text for better contrast */
            font-weight: 500;
            border-radius: 12px;
            padding: 10px 18px;
            display: inline-flex; /* Use inline-flex */
            align-items: center;
            gap: 8px; /* Space between icon and text */
        }
        .dot-pattern {
            display: grid;
            grid-template-columns: repeat(5, 12px); /* Slightly larger dots */
            gap: 15px; /* More space between dots */
            position: absolute;
            opacity: 0.5;
        }
        .dot-pattern.top-right {
            top: 50px;
            right: 50px;
        }
        .dot-pattern.bottom-left {
            bottom: 50px;
            left: 50px;
        }
        .dot-pattern span {
            width: 8px;
            height: 8px;
            background-color: #F6EFD8;
            border-radius: 50%;
        }
        .login-container {
            max-width: 450px;
            margin-right: 200px; /* Constrain the form width */
        }
        .main-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #FDBA3B;
            line-height: 1.2;
        }
        .label-text {
            font-weight: 600;
            color: #19235A;
        }
    </style>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Left Side - Form -->
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center p-5 position-relative">
            
            <div class="dot-pattern top-right">
                @for ($i = 0; $i < 25; $i++)
                    <span></span>
                @endfor
            </div>

            <div class="login-container w-100">
                <h1 class="main-title mb-3">Welcome Back, <br>Trailblazer!</h1>
                <p class="text-muted mb-5">Ready to check your traction? Log in to track progress, crush goals, and keep growing.</p>

                {{-- Assuming you have a login route --}}
                <form class="w-100" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label label-text">What's your work email?</label>
                        <input type="email" name="email" id="email" class="form-control custom @error('email') is-invalid @enderror" placeholder="Your business's command center awaits..." value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label label-text">Password</label>
                        <input type="password" name="password" id="password" class="form-control custom @error('password') is-invalid @enderror" placeholder="Shh... your secret key to growth" required>
                        @error('password')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-dark-blue w-100 mt-4">
                        Launch My Dashboard! <i class="bi bi-arrow-right-short"></i>
                    </button>

                    <div class="text-center mt-3">
                        <a href="#" class="text-muted small">Forgot Your Password? <i class="bi bi-lock"></i></a>
                    </div>
                </form>

                <p class="text-center text-muted mt-5">
                    New to ImpactMate? <a href="{{ route('register.step1') }}" class="fw-bold" style="color: #19235A;">Join here</a> to turn your goals into glory!
                </p>
            </div>

            <div class="dot-pattern bottom-left">
                 @for ($i = 0; $i < 25; $i++)
                    <span></span>
                @endfor
            </div>
        </div>

        <!-- Right Side - Blue Panel -->
        <div class="col-md-5 bg-right position-relative d-flex justify-content-center align-items-end">
            <div class="position-absolute bottom-0 end-0 m-4">
                <div class="help-bubble shadow">
                    {{-- Make sure the path to your image is correct --}}
                    <img src="{{ asset('images/max.png') }}" alt="help icon" width="30">
                    <span>Need Help?</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>