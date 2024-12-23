<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
    <a href="{{ route('user.editor') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/edit.png') }}" alt="Editor" class="me-2" style="width: 20px; height: 20px;"> Editor
    </a>
    <a href="{{ route('user.setting.index') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/setting.png') }}" alt="Settings" class="me-2" style="width: 20px; height: 20px;"> Setting & Integrations
    </a>
    <a href="/user/edit" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/user2.png') }}" alt="User Management" class="me-2" style="width: 20px; height: 20px;"> User Management
    </a>
    <a href="{{ route('user.helpcenter.index') }}" class="list-group-item list-group-item-action">
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

<!-- Content -->
<div class="content">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2>Account Settings</h2>
                @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
                <form class="mt-4">
                    <div class="text-center mb-4">
<div class="text-center position-relative" style="width: 150px; height: 150px; margin: 0 auto;">
    <!-- Foto Profil -->
    <img id="profilePicturePreview" 
         src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/150' }}" 
         class="rounded-circle border img-thumbnail shadow-sm" 
         style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #6D6D6D !important;" alt="Profile Picture">

    <!-- Tombol Kamera -->
    <label for="profile_picture" 
           class="btn btn-light btn-sm rounded-circle shadow position-absolute"
           style="bottom: 5px; right: 5px; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; background:#6D6D6D;">
           <img src="{{ asset('images/camera.png') }}" alt="Camera Icon" style="width: 20px; height: 20px;">
    </label>

    <!-- Input File (disembunyikan) -->
    <input type="file" id="profile_picture" class="form-control d-none" name="profile_picture" accept="image/*">
</div>
                    </div>
             <!-- Form Fields -->
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Name</label>
                    <input type="text" style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Last Name</label>
                    <input type="last_name" style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required>
                </div>
            </div>
            <div class="row g-3 mt-2">
            <div class="col-md-6">
                    <label for="email" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Email</label>
                    <input type="email" style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Phone</label>
                    <input type="text" style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col-md-6">
                <label for="address" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Address</label>
                <textarea style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-control" id="address" name="address" rows="4">{{ old('address', auth()->user()->address) }}</textarea>
                </div>
                <div class="col-md-6">
            <label for="gender" class="form-label" style = "color: #6D6D6D;  font-weight: bold;">Gender</label>
                <select style = "border: 3px solid #6D6D6D !important; color: #7D7070 font-weight: bold;" class="form-select" id="gender" name="gender">
                    <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', auth()->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" style= "background: #739AE8; margin-left: 800px; top: 60px;" class="btn btn-primary w-30 mb-10">Save Changes</button>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
<script>
    // Seleksi elemen input file
    const profilePictureInput = document.getElementById('profile_picture');
    const profilePicturePreview = document.querySelector('.profile-picture-preview');

    // Event listener untuk input file
    profilePictureInput.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Ambil file yang dipilih
        if (file) {
            const reader = new FileReader(); // Membaca file secara asinkron

            reader.onload = function(e) {
                // Mengubah sumber gambar pratinjau
                profilePicturePreview.src = e.target.result;
            };

            reader.readAsDataURL(file); // Konversi file ke DataURL
        }
    });
</script>
</body>
</html>
