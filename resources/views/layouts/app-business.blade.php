<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ImpactMate</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            background-color: #fff;
            color: #1F2A69;
        }

        .sidebar {
            background-color: #1F2A69;
            color: white;
            height: 100vh;
            width: 220px;
            position: fixed;
            padding: 20px 10px;
        }
        .sidebar .logo { font-weight: bold; font-size: 18px; margin-bottom: 40px; }
        .sidebar a { color: #fff; display: block; padding: 12px 20px; margin: 6px 0; border-radius: 6px; text-decoration: none; }
        .sidebar a.active, .sidebar a:hover { background-color: #f4b63d; color: #000; }
        .sidebar li { list-style: none; }
        .dropdown-menu .dropdown-item { color: #000 !important; }
        .main-content { margin-left: 220px; background: #f6f6f6; min-height: 100vh; }
        .topbar { background-color: #fff; padding: 10px 25px; border-bottom: 1px solid #ddd; display: flex; align-items: center; justify-content: space-between; }
        .topbar .username { font-size: 14px; color: #1F2A69; }
        .icon-button { background: none; border: none; font-size: 20px; cursor: pointer; margin-right: 15px; position: relative; }
        .notif-dot { position: absolute; top: 0; right: -5px; height: 8px; width: 8px; background-color: red; border-radius: 50%; }

        /* ====================================================== */
        /* CSS UNTUK TAMPILAN QUEST PANEL */
        /* ====================================================== */
        .quest-panel {
            background-color: #1F2A69;
            color: white;
            border-radius: 16px;
            padding: 20px;
            width: 300px;
            display: none;
            z-index: 999;
            position: absolute;
            top: 70px;
            right: 100px;
        }
        .quest-panel h5 {
            background-color: #E9E9F7;
            color: #1F2A69;
            font-weight: 600;
            text-align: center;
            padding: 8px;
            border-radius: 20px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .quest-card {
            background-color: white;
            color: #1F2A69;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .quest-progress-text {
            font-size: 0.9em;
        }
        .quest-card .progress {
            height: 4px; /* Membuat progress bar sangat tipis */
            background-color: #e9ecef;
        }
        .quest-card .progress-bar {
            background-color: #1F2A69;
        }
        .quest-card .quest-btn {
            background-color: #1F2A69;
            color: white;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 6px;
        }

        /* ====================================================== */
        /* CSS UNTUK ANIMASI DAN TAMPILAN NOTIFIKASI */
        /* ====================================================== */
        #notifDropdown {
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
            max-height: 400px; /* Batas tinggi maksimal dropdown */
            overflow-y: auto; /* Tampilkan scrollbar jika konten lebih panjang */
        }
        #notifDropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        #notifDropdown::-webkit-scrollbar { width: 6px; }
        #notifDropdown::-webkit-scrollbar-track { background: #f1f1f1; }
        #notifDropdown::-webkit-scrollbar-thumb { background: #888; border-radius: 6px; }
        #notifDropdown::-webkit-scrollbar-thumb:hover { background: #555; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" width="40" class="me-2"> <span>ImpactMate</span>
    </div>
    <small class="text-uppercase text-white-50 px-3">Menu</small>
    <div class="menu mt-2">
        <a href="/dashboard"><i class="bi bi-grid me-2"></i> Dashboard</a>
        <a href="/strategy/strategy" class="{{ Request::is('strategy') ? 'active' : '' }}"><i class="bi bi-bar-chart-line me-2"></i> Strategize</a>
        <a href="/myproject" class="{{ Request::is('my-project') ? 'active' : '' }}"><i class="bi bi-clipboard me-2"></i> My Project</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <i class="bi bi-list fs-5 me-3" role="button"></i>
        </div>
        <div class="d-flex align-items-center">
            <button class="icon-button" onclick="toggleQuest()">⭐</button>

            <!-- ====================================================== -->
            <!-- LOGIKA DAN TAMPILAN NOTIFIKASI (LONCENG) -->
            <!-- ====================================================== -->
            @auth
            <div class="position-relative me-3">
                <button class="btn border-0 bg-transparent p-0" id="notifToggle">
                    🔔
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="notif-dot"></span>
                    @endif
                </button>

                <div id="notifDropdown" class="shadow-lg rounded-4 p-3 bg-white position-absolute end-0 mt-2" style="width: 350px; z-index: 1000;">
                    <h6 class="mb-3 border-bottom pb-2">Notifikasi</h6>
                    
                    @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                        {{-- Notifikasi untuk Admin --}}
                        @if($notification->type == 'App\Notifications\NewInvestmentReceived')
                            <div class="mb-3 border-bottom pb-2">
                                <p class="mb-1 small">Anda menerima tawaran <strong>investasi</strong> baru dari <strong>{{ $notification->data['investor_name'] }}</strong>.</p>
                                <div class="mt-2">
                                    <a href="{{ route('investment.accept', ['investment' => $notification->data['investment_id'], 'notification' => $notification->id]) }}" class="btn btn-sm btn-success">Accept</a>
                                    <a href="{{ route('investment.ignore', ['investment' => $notification->data['investment_id'], 'notification' => $notification->id]) }}" class="btn btn-sm btn-outline-danger">Ignore</a>
                                </div>
                                <small class="text-muted d-block mt-1">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        @endif

                        {{-- Notifikasi untuk User --}}
                        @if($notification->type == 'App\Notifications\InvestmentStatusUpdated')
                            <a href="{{ $notification->data['action_url'] ?? '#' }}" class="text-decoration-none text-dark">
                                <div class="mb-3 border-bottom pb-2">
                                    <p class="mb-1 small">{{ $notification->data['message'] }}</p>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        @endif
                    @empty
                        <div class="text-center text-muted py-3">Tidak ada notifikasi baru.</div>
                    @endforelse

                    @if(auth()->user()->notifications->count() > 0)
                        <div class="text-center mt-2">
                            <a href="#" class="text-decoration-none small">Lihat Semua Notifikasi</a>
                        </div>
                    @endif
                </div>
            </div>
            @endauth

            <div class="mx-3 dropdown">
    <div class="d-flex align-items-center gap-1 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
        <img src="{{ asset('images/user-circle.png') }}" alt="profile" width="24" height="24">
        <span class="username">Hi, {{ Auth::check() ? Auth::user()->first_name : 'Guest' }}</span>
    </div>
    
    <ul class="dropdown-menu">
        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none w-100 text-start px-3 py-2" style="color: #1F2A69">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</div>
        </div>
    </div>

    <!-- ====================================================== -->
    <!-- PANEL QUEST (BINTANG) YANG SUDAH DIPERBAIKI -->
    <!-- ====================================================== -->
    <div id="questPanel" class="quest-panel">
        <h5>Quest</h5>
        <div class="quest-card">
            <div class="d-flex justify-content-between align-items-center fw-semibold">
                <span>Start Your Business</span>
                <span class="quest-progress-text">0/5</span>
            </div>
            <div class="progress mt-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <small class="text-muted">+50 MaxPoint</small>
                <a href="{{ route('step1') }}" class="btn btn-sm quest-btn">Do It</a>
            </div>
        </div>
        <div class="quest-card">
            <div class="d-flex justify-content-between align-items-center fw-semibold">
                <span>Start Invest</span>
                <span class="quest-progress-text">0/5</span>
            </div>
            <div class="progress mt-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <small class="text-muted">+50 MaxPoint</small>
                <a href="{{ route('step-invest.step1-invest') }}" class="btn btn-sm quest-btn">Do It</a>
            </div>
        </div>
        <div class="quest-card">
            <div class="d-flex justify-content-between align-items-center fw-semibold">
                <span>Add Experience</span>
                <span class="quest-progress-text">0/5</span>
            </div>
            <div class="progress mt-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <small class="text-muted">+50 MaxPoint</small>
                <a href="{{ route('mentor.dashboard') }}" class="btn btn-sm quest-btn">Do It</a>
            </div>
        </div>
    </div>

    <div class="p-4">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ====================================================== -->
<!-- JAVASCRIPT UNTUK QUEST DAN NOTIFIKASI -->
<!-- ====================================================== -->
<script>
    // Script untuk Quest Panel (bintang)
    function toggleQuest() {
        const panel = document.getElementById('questPanel');
        panel.style.display = (panel.style.display === 'none' || panel.style.display === '') ? 'block' : 'none';
    }

    // Script untuk Dropdown Notifikasi (lonceng) dengan Animasi
    document.addEventListener('DOMContentLoaded', function() {
        const notifToggle = document.getElementById('notifToggle');
        const notifDropdown = document.getElementById('notifDropdown');

        if (notifToggle && notifDropdown) {
            notifToggle.addEventListener('click', function(event) {
                event.stopPropagation();
                notifDropdown.classList.toggle('show');
            });

            window.addEventListener('click', function(event) {
                if (notifDropdown.classList.contains('show')) {
                    if (!notifDropdown.contains(event.target) && !notifToggle.contains(event.target)) {
                        notifDropdown.classList.remove('show');
                    }
                }
            });
        }
    });
</script>

</body>
</html>