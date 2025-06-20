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
        .sidebar li {
    list-style: none;
}
.nav-link {
    cursor: pointer;
}
#sidebar .nav-link .nav-item{
    color:#000 !important;
}

/* Submenu link default: putih */
#sidebar .collapse .nav-link {
    font-size: 0.9rem;
    padding-left: 1.5rem;
    color: white;
    transition: all 0.2s ease;
}

/* Saat hover: ubah jadi hitam dan beri background terang */
#sidebar .collapse .nav-link:hover {
    color: black;
    border-radius: 5px;
}
#sidebar .collapse .nav-link.active {
    color: black;
    font-weight: 600;
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

        .topbar .username {
            font-size: 14px;
            color: #1F2A69;
        }

        .icon-button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            margin-right: 15px;
            position: relative;
        }

        .notif-dot {
            position: absolute;
            top: 0;
            right: 5px;
            height: 8px;
            width: 8px;
            background-color: red;
            border-radius: 50%;
        }

        .quest-panel {
            position: absolute;
            top: 70px;
            right: 100px;
            background-color: #1F2A69;
            color: white;
            border-radius: 16px;
            padding: 20px;
            width: 300px;
            display: none;
            z-index: 999;
        }

        .quest-panel h5 {
            background-color: #dcdcdc;
            color: #1F2A69;
            font-weight: 600;
            text-align: center;
            padding: 8px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .quest-card {
            background-color: #f1f1f1;
            color: black;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .quest-card .progress {
            height: 6px;
            margin-bottom: 8px;
        }

        .quest-card .btn {
            background-color: #1F2A69;
            color: white;
            font-size: 12px;
            padding: 4px 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" width="40" class="me-2"> <span>ImpactMate</span>
    </div>
    <small class="text-uppercase text-white-50 px-3">Menu</small>
    <div class="menu mt-2">
        <a href="/dashboard"><i class="bi bi-grid me-2"></i> Home</a>

      <li class="nav-item">
    <a class="nav-link d-flex align-items-center justify-content-between text-white" data-bs-toggle="collapse" href="#communitySubmenu" role="button" aria-expanded="false" aria-controls="communitySubmenu">
        <span><i class="bi bi-people-fill me-2"></i> Community</span>
        <i class="bi bi-chevron-down"></i>
    </a>
    <div class="collapse ps-4" id="communitySubmenu">
        <ul class="nav flex-column mt-2">
            <li class="nav-item">
                <a class="nav-link text-white" href="/community/investor">
                    <i class="bi bi-people me-2"></i> Investor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/community/company">
                    <i class="bi bi-people me-2"></i> Business Owner
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/community/mentor">
                    <i class="bi bi-people me-2"></i> Mentor
                </a>
            </li>
        </ul>
    </div>
</li>


        <a href="/myproject" class="{{ Request::is('my-project') ? 'active' : '' }}"><i class="bi bi-clipboard me-2"></i> My Project</a>
       <a href="/mentor" class="{{ Request::is('community.find-company') ?'active' : '' }}"><i class="bi bi-clipboard-data-fill me-2"></i> Mentor</a>
        <a href="/dashboard-invest" class="{{ Request::is('invest') ?'active' : '' }}"><i class="bi bi-clipboard-data-fill me-2"></i> Invest</a>
    </div>
</div>

<div class="main-content">
    <!-- Navbar -->
    <div class="topbar">
        <div>
            <i class="bi bi-list fs-5 me-3" role="button"></i>
        </div>
        <div class="d-flex align-items-center">
            <button class="icon-button" onclick="toggleQuest()">⭐</button>
            <!-- Notification Button -->
<div class="position-relative me-3">
    <button class="btn border-0 bg-transparent p-0" id="notifToggle">
        🔔
        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle notif-dot"></span>
    </button>

    <!-- Notification Dropdown -->
    <div id="notifDropdown" class="shadow-lg rounded-4 p-3 bg-white position-absolute end-0 mt-2" style="width: 350px; display: none; z-index: 1000;">
        <div class="d-flex align-items-start mb-3">
            <img src="/images/john.jpg" class="rounded-circle me-2" width="45" height="45">
            <div>
                <p class="mb-1"><strong>Jhon Lenon</strong> <span class="text-primary">invite</span> to join <strong>collab</strong> with <br> PT Jaya Sentosa</p>
                <small class="text-muted">5 minutes ago</small>
                <div class="mt-1">
                    <a href="{{ route('investment.status') }}" class="btn btn-sm" style="background-color:#1F2A69; color: white; text-decoration: none;;">accept</a></button>
                    <a href="{{ route('investment.status') }}" class="btn btn-sm" style="background-color: red; color: white; text-decoration: none;">Ignore</a></button>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-start mb-3">
            <img src="/images/absar.jpg" class="rounded-circle me-2" width="45" height="45">
            <div>
                <p class="mb-1">Your company <strong class="text-primary">has received</strong> a new <strong>investment</strong> offer from Absar Hamid.</p>
                <small class="text-muted">20 minutes ago</small>
                <div class="mt-1">
                    <button class="btn btn-sm btn-primary">accept</button>
                    <button class="btn btn-sm btn-danger">Ignore</button>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-start">
            <img src="/images/thom.jpg" class="rounded-circle me-2" width="45" height="45">
            <div>
                <p class="mb-1"><strong>Thom Yorke</strong> <span class="text-primary">invite</span> to join <strong>collab</strong> with <br> PT Radio Makmur</p>
                <small class="text-muted">5 minutes ago</small>
                <div class="mt-1">
                    <button class="btn btn-sm btn-primary">accept</button>
                    <button class="btn btn-sm btn-danger">Ignore</button>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="mx-3 d-flex align-items-center gap-1">
                <img src="{{ asset('images/user-circle.png') }}" alt="profile" width="24" height="24">
                <span class="username">Hi, Adam</span>
                <i class="bi bi-chevron-down small ms-1"></i>
            </div>
        </div>
    </div>

    <!-- Quest Panel -->
    <div id="questPanel" class="quest-panel">
        <h5>Quest</h5>
        <div class="quest-card">
            <div class="d-flex justify-content-between fw-semibold">
                <span>Start Your Bussines</span>
                <span>0/5</span>
            </div>
            <div class="progress bg-white">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <small class="text-muted d-block mb-1">+50 MaxPoint</small>
            <a href="{{ route('step1') }}" class="btn btn-sm">Do It</a> </button>
        </div>
        <div class="quest-card">
            <div class="d-flex justify-content-between fw-semibold">
                <span>Start Invest</span>
                <span>0/5</span>
            </div>
            <div class="progress bg-white">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <small class="text-muted d-block mb-1">+50 MaxPoint</small>
            <a href="{{ route('step-invest.step1-invest') }}" class="btn btn-sm">Do It</a></button>
        </div>
        <div class="quest-card">
            <div class="d-flex justify-content-between fw-semibold">
                <span>Add Experience</span>
                <span>0/5</span>
            </div>
            <div class="progress bg-white">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <small class="text-muted d-block mb-1">+50 MaxPoint</small>
            <a href="{{ route('mentor.dashboard') }}" class="btn btn-sm">Do It</a></button>
        </div>
    </div>

    <!-- Page content -->
    <div class="p-4">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleQuest() {
        const panel = document.getElementById('questPanel');
        panel.style.display = (panel.style.display === 'none' || panel.style.display === '') ? 'block' : 'none';
    }
</script>
<script>
    document.getElementById('notifToggle').addEventListener('click', function (e) {
        const dropdown = document.getElementById('notifDropdown');
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    });

    // Optional: Hide dropdown when clicking outside
    document.addEventListener('click', function (e) {
        const toggle = document.getElementById('notifToggle');
        const dropdown = document.getElementById('notifDropdown');
        if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>

</body>
</html>
