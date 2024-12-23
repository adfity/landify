<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
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
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/dashboard2.png') }}" alt="Dashboard" class="me-2" style="width: 20px; height: 20px;"> Dashboard
    </a>
    <a href="{{ route('user.templates') }}" class="list-group-item list-group-item-action {{ request()->routeIs('templates') ? 'active' : '' }}">
        <img src="{{ asset('images/template.png') }}" alt="Templates" class="me-2" style="width: 20px; height: 20px;"> Templates
    </a>
    <a href="{{ route('user.editor') }}" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/edit2.png') }}" alt="Editor" class="me-2" style="width: 20px; height: 20px;"> Editor
    </a>
    <a href="{{ route('user.setting.index') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/setting.png') }}" alt="Settings" class="me-2" style="width: 20px; height: 20px;"> Setting & Integrations
    </a>
    <a href="/user/edit" class="list-group-item list-group-item-action {{ request()->routeIs('users') ? 'active' : '' }}">
        <img src="{{ asset('images/user.png') }}" alt="User Management" class="me-2" style="width: 20px; height: 20px;"> User Management
    </a>
    <a href="{{ route('user.helpcenter.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('help') ? 'active' : '' }}">
        <img src="{{ asset('images/help.png') }}" alt="Help & Support" class="me-2" style="width: 20px; height: 20px;"> Help & Support
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
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
                             class="rounded-circle" alt="Profile" style="width: 40px; height: 40px;">
                        <span class="ms-2">{{ auth()->user()->name }}</span>
                        <!-- Gambar panah bawah -->
                        <img src="{{ asset('images/panah bawah.png') }}" alt="Dropdown" style="width: 12px; height: 12px;" class="ms-1">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <!-- Foto Profil dan Nama -->
                        <li class="dropdown-header text-center">
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/60' }}" 
                                 class="rounded-circle mb-2" alt="Profile" style="width: 60px; height: 60px;">
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                            <small class="text-muted">{{ auth()->user()->email }}</small>
                        </li>
                        <hr class="dropdown-divider">

                        <!-- Menu dengan Ikon -->
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/user/edit">
                                <img src="{{ asset('images/setting.png') }}" alt="Settings Icon" style="width: 16px; height: 16px;" class="me-2">
                                Account Settings
                            </a>
                        </li>
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
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Page Builder - Drag & Drop</h2>
                <p>Simplify Website Creation - Drag, Drop, Done!</p>
            </div>
            <a href="{{ route('pages.create') }}" style ="background: #739AE8;" class="btn btn-primary" > New Site <i class="fas fa-plus"></i></a>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Create New Page</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('pages.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title" style="font-weight: bold;">Title</label>
                        <input type="text" class="form-control mt-3" id="title" name="title" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="short_description" style="font-weight: bold;">Short Description</label>
                        <textarea class="form-control mt-3" id="short_description" name="short_description" rows="3" required></textarea>
                    </div>

                    <!-- Tombol Back diganti dengan link -->
                    <button type="button" onclick="window.location.href='/editor'" class="btn btn-outline-dark mt-3">Back</button>
                    <button type="submit" class="btn btn-primary mt-3" style ="background: #739AE8;">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
