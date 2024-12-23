
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
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
    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/dashboard2.png') }}" alt="Dashboard2" class="me-2" style="width: 20px; height: 20px;"> Dashboard
    </a>
    <a href="{{ route('admin.user') }}" class="list-group-item list-group-item-action ">
        <img src="{{ asset('images/user.png') }}" alt="Templates" class="me-2" style="width: 20px; height: 20px;"> Acoount User
    </a>
    <a href="{{ route('admin.add-temp') }}" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/edit2.png') }}" alt="Editor2" class="me-2" style="width: 20px; height: 20px;"> Templates
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
    <div class="content">
    <h2 class="mb-4">Page Builder - Drag & Drop</h2>
    <p class="text-secondary">Simplify Website Creation - Drag, Drop, Done!</p>
    <hr class="custom-divider">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div></div>
            <a href="{{ route('temp.create') }}" class="btn btn-success">+ Add</a>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Create New Page</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('temp.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-4">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="3" required></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="/add-temp" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary"  style="background : #007bff">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
