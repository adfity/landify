
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">

</head>
<body class="bg-light">

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header p-3">

        <!-- Tombol untuk collapse -->
        <button class="btn" id="collapseSidebar">
    <img src="{{ asset('images/kiri.png') }}" alt="Collapse" style="width: 20px; height: 20px;">
</button>
    </div>
    <div class="list-group list-group-flush">
    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard2" class="me-2" style="width: 20px; height: 20px;"> Dashboard
    </a>
    <a href="{{ route('admin.user') }}" class="list-group-item list-group-item-action {{ request()->routeIs('templates') ? 'active' : '' }}">
        <img src="{{ asset('images/user.png') }}" alt="Templates" class="me-2" style="width: 20px; height: 20px;"> Acoount User
    </a>
    <a href="{{ route('admin.add-temp') }}" class="list-group-item list-group-item-action {{ request()->routeIs('editor') ? 'active' : '' }}">
        <img src="{{ asset('images/edit.png') }}" alt="Editor" class="me-2" style="width: 20px; height: 20px;"> Templates
    </a>

</div>
</div>

<!-- Tombol untuk membuka sidebar -->
<button class="toggle-button hidden" id="openSidebar">
    <i class="fas fa-chevron-right"></i>
</button>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
    <div class="container-fluid">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" style="height: 40px;">
        </a>

        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Notification Icon -->
                <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img src="{{ asset('images/notifikasi.png') }}" alt="Notifications" style="width: 20px; height: 20px;">
                        </a>
                    </li>

                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            
                            <span class="ms-2">{{ auth()->user()->name }}</span>
                            <!-- Gambar panah bawah -->
                            <img src="{{ asset('images/panah bawah.png') }}" alt="Dropdown" style="width: 12px; height: 12px;" class="ms-1">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <!-- Foto Profil dan Nama -->
                            <li class="dropdown-header text-center">
                                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                <small class="text-muted">{{ auth()->user()->email }}</small>
                            </li>
                            <hr class="dropdown-divider">

                            <!-- Menu dengan Ikon -->
                            
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('images/sigout.png') }}" alt="Logout Icon" style="width: 16px; height: 16px;" class="me-2">
                                    Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Content -->
<div class="content">

        <h2 class="mb-4">Welcome Back, {{ auth()->user()->name }}</h2>
    
    <hr class="custom-divider">
        <!-- Statistik Utama -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 ">
                    <div class="card-body" style="background : #739AE8;">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text fs-4">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body" style="background :rgb(115, 232, 140);">
                        <h5 class="card-title">Active Sessions</h5>
                        <p class="card-text fs-4">{{ $activeSessions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3" style="background :rgb(176, 115, 232);">
                    <div class="card-body" style="background :rgb(232, 115, 115);">
                        <h5 class="card-title">New Registrations</h5>
                        <p class="card-text fs-4">{{ $newRegistrations }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body" style="background :rgb(133, 115, 232);">
                        <h5 class="card-title">Pending Actions</h5>
                        <p class="card-text fs-4">{{ $pendingActions }}</p>
                    </div>
                </div>
            </div>
        </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($growthLabels),
                datasets: [{
                    label: 'User Growth',
                    data: @json($growthData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
    <script>
    document.querySelector('label[for="profile_picture"]').addEventListener('click', function() {
        document.getElementById('profile_picture').click();
    });
</script>
<script>
    const sidebar = document.getElementById('sidebar');
    const collapseSidebar = document.getElementById('collapseSidebar');
    const openSidebar = document.getElementById('openSidebar');

    // Tutup sidebar
    collapseSidebar.addEventListener('click', () => {
        sidebar.classList.add('collapsed');
        openSidebar.classList.remove('hidden');
    });

    // Buka sidebar
    openSidebar.addEventListener('click', () => {
        sidebar.classList.remove('collapsed');
        openSidebar.classList.add('hidden');
    });
</script>
</body>
</html>
