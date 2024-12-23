<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">

</head>
<style>
        #noResultsMessage {
            display: none;
            font-size: 1.2rem;
            color: #6c757d;
        }

        .list-group-item {
            transition: all 0.3s ease-in-out;
        }

        .list-group-item[style*="display: none"] {
            opacity: 0;
            transform: scale(0.9);
        }
    </style>
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
    <a href="{{ route('user.editor') }}" class="list-group-item list-group-item-action {{ request()->routeIs('editor') ? 'active' : '' }}">
        <img src="{{ asset('images/edit.png') }}" alt="Editor" class="me-2" style="width: 20px; height: 20px;"> Editor
    </a>
    <a href="{{ route('user.setting.index') }}" class="list-group-item list-group-item-action">
        <img src="{{ asset('images/setting.png') }}" alt="Settings" class="me-2" style="width: 20px; height: 20px;"> Setting & Integrations
    </a>
    <a href="/user/edit" class="list-group-item list-group-item-action {{ request()->routeIs('users') ? 'active' : '' }}">
        <img src="{{ asset('images/user.png') }}" alt="User Management" class="me-2" style="width: 20px; height: 20px;"> User Management
    </a>
    <a href="{{ route('user.helpcenter.index') }}" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/help2.png') }}" alt="Help & Support" class="me-2" style="width: 20px; height: 20px;"> Help & Support
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
<div class="content d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white" style="background-color: #4A6CB1 !important;">
                        <h5 class="mb-3">How can we help?</h5>
                        <div class="input-group mb-4">
                            <!-- Search Input -->
                            <span class="input-group-text border-0" style="background-color: #fff !important;">
                                <i class="fas fa-search"></i>
                            </span>
                            <input id="search-input" type="text" class="form-control" placeholder="Search by topic, product and more">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card shadow-sm border-0">
                        <div class="card-body" style="max-height: 135px; overflow-y: auto;">
                            <h5 style="font-weight: bold;">Your recommended articles</h5>
                            <ul class="list-group scrollable-list" id="articleList">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/managing.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Getting Started</span>
                                <a href="/getting/index" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/managing.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Changing Your Premium or Studio Plan</span>
                                <a href="/page1" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/managing.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Managing Your Payment Methods</span>
                                <a href="/page2" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/managing.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Setting Up Your Profile</span>
                                <a href="/page3" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/managing.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Understanding Your Subscription</span>
                                <a href="/page4" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                            <!-- Pesan jika hasil pencarian kosong -->

                       
                    </div>
                    <div class="mt-3">
                    <div class="card-body" style="max-height: 100px; overflow-y: auto;">
                    <h5 style="font-weight: bold;">Browse all help topics</h5>
                            <ul class="list-group scrollable-list" id="articleList">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/folder.png') }}" style="width: 20px; height: 20px; margin-right: 10px;"> 
                                <span style="margin-right: auto;">Find what you're looking for in our articles</span>
                                <a href="/page1" class="text-decoration-none">
                                    <i class="fas fa-chevron-right" style="color: black;"></i>
                                </a>
                            </li>
                           
                            <!-- Pesan jika hasil pencarian kosong -->

                       
                    </div>
                  
                               
                                <div id="noResultsMessage" class="text-center mt-4" style="display: none;">
                    <p class="text-muted">No results found for the searched title.</p>
</div> </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function (element) {
    element.addEventListener('click', function () {
        const icon = this.querySelector('img');
        const collapse = document.querySelector(this.getAttribute('href'));
        collapse.addEventListener('show.bs.collapse', () => icon.style.transform = 'rotate(180deg)');
        collapse.addEventListener('hide.bs.collapse', () => icon.style.transform = 'rotate(0deg)');
    });
});
</script>

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
    document.querySelector('label[for="profile_picture"]').addEventListener('click', function() {
        document.getElementById('profile_picture').click();
    });
</script>
<script>
  document.getElementById('search-input').addEventListener('input', function () {
    const query = this.value.toLowerCase(); // Ambil input pencarian dalam huruf kecil
    const items = document.querySelectorAll('#articleList .list-group-item'); // Semua artikel
    const noResultsMessage = document.getElementById('noResultsMessage'); // Pesan jika tidak ada hasil

    let hasResults = false; // Tandai jika ada hasil
    let firstMatch = null; // Elemen pertama yang cocok

    items.forEach(item => {
        // Ambil teks dari elemen span
        const spanText = item.querySelector('span')?.textContent.toLowerCase() || '';

        // Reset display setiap elemen
        item.style.display = 'none';

        // Periksa apakah query cocok
        if (spanText.includes(query)) {
            item.style.display = 'flex'; // Tampilkan jika cocok
            hasResults = true; // Tandai hasil ditemukan

            // Simpan elemen pertama yang cocok
            if (!firstMatch) {
                firstMatch = item;
            }
        }
    });

    // Tampilkan atau sembunyikan pesan "No results found"
    noResultsMessage.style.display = hasResults ? 'none' : 'block';

    // Scroll ke elemen pertama yang cocok
    if (firstMatch) {
        firstMatch.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});

</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
