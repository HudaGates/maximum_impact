<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strategize Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins';
            font-size: 17px;
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
        .sidebar .nav-item {
    list-style-type: none;
}
        .sidebar .logo {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 40px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 20px;
            margin: 6px 0;
            border-radius: 6px;
            text-decoration: none;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #f4b63d;
            color: #000;
        }
        .dropdown-menu .dropdown-item {
    color: #000 !important; /* Warna hitam */
}
        .main-content {
            margin-left: 220px;
            background: #f6f6f6;
            min-height: 100vh;
        }
        .topbar {
            background-color: #fff;
            padding: 10px 25px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topbar .title {
            font-weight: 700;
            color: #1F2A69;
            font-size: 14px;
        }
        .topbar .right-icons i {
            margin-left: 20px;
            font-size: 18px;
            color: #555;
        }
        .topbar .username {
            font-size: 14px;
            color: #1F2A69;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo mb-5 d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" width="50" class="me-2"> <span>ImpactMate</span>
    </div>
    <small class="text-uppercase text-white-50 px-3">Menu</small>
    <div class="menu mt-2">
        <a href="/dashboard"><i class="bi bi-grid me-2"></i> Dashboard</a>
        <a href="/strategy" class="{{ Request::is('strategy') ? 'active' : '' }}"><i class="bi bi-bar-chart-line me-2"></i> Strategize</a>
        <li class="nav-item dropdown dropend">
    <a class="nav-link dropdown-toggle {{ Request::is('community*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi-people me-2"></i> Community
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item {{ Request::is('community/investor') ? 'active' : '' }}" href="/community/investor">Investor</a>
        </li>
        <li>
            <a class="dropdown-item {{ Request::is('community/mentor') ? 'active' : '' }}" href="/community/mentor">Mentor</a>
        </li>
        <li>
            <a class="dropdown-item {{ Request::is('community/company') ? 'active' : '' }}" href="/community/company">Company</a>
        </li>
    </ul>
</li>

        <a href="/myproject" class="{{ Request::is('my-project') ?'active' : '' }}"><i class="bi bi-clipboard me-2"></i> My Project</a>
        <a href="/investment" class="{{ Request::is('investment') ?'active' : '' }}"><i class="bi bi-clipboard-data-fill me-2"></i> Invest</a>
    </div>
</div>

<div class="main-content">
    <!-- Navbar Top -->
    <div class="topbar">
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <i class="bi bi-list fs-5 me-3 dropdown-toggle" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; display: list-it block;"></i>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Strategize</a></li>
                    <li><a class="dropdown-item" href="#">Community</a></li>
                    <li><a class="dropdown-item" href="#">My Project</a></li>
                </ul>
            </div>

        </div>
        <div class="d-flex align-items-center">
            <i class="bi bi-arrows-fullscreen" onclick="toggleFullScreen()" style="cursor: pointer;"></i>
            <div class="mx-3 d-flex align-items-center gap-1">
                <img src="{{ asset('images/user-circle.png') }}" alt="profile" width="24" height="24">
                <span class="username">Ww</span>
                <i class="bi bi-chevron-down small ms-1"></i>
            </div>
            <i class="bi bi-gear-fill"></i>
        </div>
    </div>

    <div class="p-4">
        @yield('content')
    </div>
</div>
<script>
    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch((err) => {
                alert(`Error attempting to enable full-screen mode: ${err.message}`);
            });
        } else {
            document.exitFullscreen();
        }
    }
</script>

</body>
</html>
