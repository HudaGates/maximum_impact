<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ImpactMate - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn-custom {
            background-color: #F4E6AC;
            color: #1F2A69;
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 32px;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #e8da94;
        }
        .btn-outline-light {
            border-radius: 50px;
        }
        .navbar-brand img {
            height: 28px;
            margin-right: 8px;
        }
        .hero {
            background: url('/images/landing.jpg') no-repeat center center;
            background-size: cover;
            padding: 160px 20px 120px;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 2rem;
        }

        .hero p {
            max-width: 650px;
            margin: 20px auto;
            font-size: 1rem;
        }

        .btn-main {
            background-color: #FFD97B;
            color: black;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
        }

        .section-stats {
            padding: 80px 0;
            background: #fff;
            text-align: center;
        }

        .section-stats h2 {
            font-weight: 700;
            color: #1F2A69;
        }

        .section-stats p {
            color: #6c757d;
            max-width: 700px;
            margin: 10px auto;
        }

        .stat-grid {
            margin-top: 40px;
        }

        .stat-box {
            margin-bottom: 30px;
        }

        .stat-box h3 {
            color: #1F2A69;
            font-weight: 700;
        }

        .highlight {
            color: #FF9900;
        }

        .line-m {
            position: absolute;
            right: 30px;
            bottom: -40px;
            z-index: -1;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #000;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/imm-logo.png') }}" alt="Logo">
            <span class="fw-bold text-white">ImpactMate</span>
        </a>
        <div class="d-flex gap-2">
            <a href="#contact" class="btn btn-outline-light rounded-pill px-4">Contact Us</a>
            <a href="{{ route('login') }}" class="btn btn-custom">Get Started →</a>
        </div>
    </div>
</nav>

<section class="hero position-relative">
    <div class="container">
        <h1>Turn Profit into Purpose, and<br>Accelerate Your Business Growth</h1>
        <p>
            Track revenue, team performance, and social impact with certified metrics measurements from the United Nations to create a better future.
        </p>
        <a href="{{ route('login') }}" class="btn btn-main">Get Started For Free →</a>
        <div class="mt-2">
            <small>No Credit Card Required</small>
        </div>
    </div>
</section>

<section class="section-stats position-relative">
    <div class="container">
        <h2>Measure . Grow . Transform</h2>
        <p>
            Track real-time growth, align teams, and measure impact, <span class="highlight">all in one place</span>.
            Our tools and insights empower you to evaluate your impact, refine your strategies, and showcase your commitment to create a
            <a href="#" class="text-decoration-none text-primary">sustainable future</a> with confidence and precision.
        </p>
        <div class="row stat-grid justify-content-center">
            <div class="col-6 col-md-3 stat-box">
                <h3>55</h3>
                <p>Companies</p>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <h3>137</h3>
                <p>Investors & Mentors</p>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <h3>IDR 4.7M</h3>
                <p>Total Fundings</p>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <h3>82%</h3>
                <p>Company Growth</p>
            </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const animateValue = (obj, start, end, duration, prefix = '', suffix = '') => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            let currentValue = progress * (end - start) + start;
            if (Number.isInteger(end)) {
                obj.innerHTML = prefix + Math.floor(currentValue).toLocaleString() + suffix;
            } else {
                obj.innerHTML = prefix + currentValue.toFixed(1) + suffix;
            }
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                 obj.innerHTML = prefix + end.toLocaleString() + suffix;
            }
        };
        window.requestAnimationFrame(step);
    };

    const statSection = document.querySelector(".stat-grid");
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = statSection.querySelectorAll("h3");
                counters.forEach(counter => {
                    const originalText = counter.innerText;
                    const parts = originalText.match(/([^\d,.]*)([\d,.]+)(.*)/);
                    if (parts) {
                        const prefix = parts[1];
                        const value = parseFloat(parts[2].replace(/,/g, ''));
                        const suffix = parts[3];
                        animateValue(counter, 0, value, 2000, prefix, suffix);
                    }
                });
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    if (statSection) {
        observer.observe(statSection);
    }
});
</script>
        </div>
        <img src="{{ asset('images/bg-m.png') }}" class="line-m d-none d-md-block" alt="Line Shape">
    </div>
</section>

<section style="background-color: #FAE6C8; padding: 80px 0; position: relative;">
    <div class="container text-center">
        <h2 class="fw-bold" style="color: #1F2A69;">Lead with Purpose, <br>Create Sustainable Future</h2>
        <p class="mt-3">
            <strong style="color: #1F2A69;">Did you know?</strong> 83% of consumers choose brands aligned with global sustainability.
            Prove your commitment to the SDGs and turn ethical practices into competitive advantages.
        </p>
        <h6 class="mt-4 fw-bold" style="color: #1F2A69;">All 17 SDGs That You Should Know</h6>

        <div class="row justify-content-center mt-4 g-3">
            @for ($i = 1; $i <= 17; $i++)
                <div class="col-4 col-sm-2">
                    <img src="{{ asset('images/bg-m/sdg ' . $i . '.png') }}" alt="SDG {{ $i }}" class="img-fluid rounded shadow-sm">
                </div>
            @endfor
        </div>

        <a href="#" class="btn btn-main mt-5">Grow Your Impact →</a>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold" style="color: #1F2A69;">Grow Your Business within 6 Months!</h2>
        <p class="mt-3">
            <strong class="text-primary">Explore your untapped potential!</strong> With ImpactMate, you'll transform vague ambitions
            into measurable wins. Our platform is designed to help you define actionable goals, craft winning strategies,
            and monitor progress in real time, so you can grow faster, smarter, and with confidence.
        </p>

        <div class="mx-auto mt-4 p-3 rounded shadow" style="max-width: 600px; background-color: #fff3e0;">
            <p class="mb-0" style="font-style: italic; color: #1F2A69;">
                “ImpactMate helped us double our quarterly revenue in just 5 months! The goal-setting tools kept our team focused,
                and the analytics gave us the confidence to pivot when needed.”
            </p>
            <small class="d-block mt-2 text-muted">– William Christopher, CEO of XYZ Company</small>
        </div>

        <a href="#" class="btn btn-main mt-4">Get Our 6 Month Success Framework →</a>
    </div>
</section>

<section style="background-color: #FAE6C8; padding: 60px 0;">
    <div class="container text-center">
        <h2 class="fw-bold" style="color: #1F2A69;">Elevate Your Business with ImpactMate</h2>
        <a href="#" class="btn btn-main mt-4">Get Started →</a>
        <p class="mt-2 text-muted small">Lifetime Access. No Credit Card.</p>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold" style="color: #1F2A69;">Take Action Towards a<br>Sustainable Future</h2>
        <p class="text-muted mb-4">
            From startups to scale-ups and SMEs, we empower businesses that chase growth,
            efficiency, and results that matter — all united by a commitment to create a brighter
            tomorrow with measurable success.
        </p>

        <div class="row justify-content-center align-items-center flex-wrap g-4">
            @php
                $logos = ['bri 2.png', 'maxy 2.png', 'spay 2.png', 'mandiri 2.png', 'bca 2.png', 'bni.png'];
            @endphp
            @foreach (range(1, 2) as $row)
                <div class="d-flex justify-content-center flex-wrap gap-4 mb-3">
                    @foreach ($logos as $logo)
                        <img src="{{ asset('images/partners/' . $logo) }}" alt="{{ $logo }}" height="40">
                    @endforeach
                </div>
            @endforeach
        </div>

        <a href="#" class="btn btn-main mt-4">Be One of Us →</a>
    </div>
</section>

<footer class="text-white py-5" style="background-color: #1F2A69;">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-start">
        <div class="mb-4 mb-md-0">
            <h4 class="fw-bold">ImpactMate</h4>
            <p style="max-width: 300px;">
                Turn ambition into action with ImpactMate — your data-driven tracker for setting goals,
                building strategies, and accelerating growth.
            </p>
            <div class="d-flex gap-3 mt-3">
                <a href="#"><img src="{{ asset('images/icons/Vector-3.png') }}" height="20" alt="Instagram"></a>
                <a href="#"><img src="{{ asset('images/icons/Vector-4.png') }}" height="20" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('images/icons/Vector-5.png') }}" height="20" alt="Email"></a>
                <a href="#"><img src="{{ asset('images/icons/Vector-1.png') }}" height="20" alt="Youtube"></a>
                <a href="#"><img src="{{ asset('images/icons/Vector-2.png') }}" height="20" alt="WhatsApp"></a>
                <a href="#"><img src="{{ asset('images/icons/Vector.png') }}" height="20" alt="LinkedIn"></a>
            </div>
        </div>

        <div>
            <h6 class="fw-bold">Menu</h6>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Get Started</a></li>
                <li><a href="#" class="text-white text-decoration-none">Our Purpose</a></li>
                <li><a href="#" class="text-white text-decoration-none">6 Month Success Framework</a></li>
                <li><a href="#" class="text-white text-decoration-none">Business Partners</a></li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-4 text-light border-top pt-3 small">
        © Copyright 2025 by <span style="color: #FFA500;">MAXY Academy</span> |
        <a href="#" class="text-white text-decoration-none">Privacy Policy</a> |
        <a href="#" class="text-white text-decoration-none">Terms & Condition</a> |
        <a href="#" class="text-white text-decoration-none">About Us</a>
    </div>
</footer>

</body>
</html>