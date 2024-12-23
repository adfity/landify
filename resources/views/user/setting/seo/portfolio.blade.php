<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting-SEO</title>
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
    <a href="{{ route('user.editor') }}" class="list-group-item list-group-item-action {{ request()->routeIs('editor') ? 'active' : '' }}">
        <img src="{{ asset('images/edit.png') }}" alt="Editor" class="me-2" style="width: 20px; height: 20px;"> Editor
    </a>
    <a href="{{ route('user.setting.index') }}" class="list-group-item list-group-item-action active">
        <img src="{{ asset('images/setting2.png') }}" alt="Settings" class="me-2" style="width: 20px; height: 20px;"> Setting & Integrations
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

<!-- Content -->
<div class="content">
<<div class="modal-content shadow">
        <div class="modal-header">
            <h5 class="modal-title">Portfolio</h5>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-4">
                <label class="form-label">Preview on Google</label>
                <div class="border rounded p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                        <div>
                            <p class="mb-1 text-primary fw-bold" style="font-size: 14px;">Portfolio | Nayaruzqa</p>
                            <p class="mb-0 text-muted" style="font-size: 12px;">Explore a diverse portfolio showcasing creative and innovative designs</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="keyword" class="form-label">Keyword</label>
                <input type="text" id="keyword" class="form-control" placeholder="Portfolio" value="Portfolio">
            </div>

            <div class="mb-3">
                <label for="titleTag" class="form-label">Title Tag</label>
                <input type="text" id="titleTag" class="form-control" placeholder="Portfolio | Nayaruzqa" value="Portfolio | Nayaruzqa">
            </div>

            <div class="mb-3">
                <label for="metaDescription" class="form-label">Meta Description</label>
                <textarea id="metaDescription" class="form-control" rows="3" placeholder="Explore a diverse portfolio showcasing creative and innovative designs">Explore a diverse portfolio showcasing creative and innovative designs</textarea>
            </div>

            <div class="mb-3">
                <label for="urlSlug" class="form-label">URL Slug</label>
                <div class="input-group">
                    <span class="input-group-text">/</span>
                    <input type="text" id="urlSlug" class="form-control" placeholder="portfolio" value="portfolio">
                </div>
            </div>

            <div class="mb-3">
                <label for="parentPage" class="form-label">Parent Page</label>
                <select id="parentPage" class="form-select">
                    <option selected>Home</option>
                    <option>About</option>
                    <option>Services</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-cancel">Cancel</button>
            <button type="button" class="btn btn-publish">Publish</button>
        </div>
    </div>
</div>
  <script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#tableBody tr');

        tableRows.forEach(row => {
            const pageName = row.cells[0].textContent.toLowerCase();
            if (pageName.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
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
</body>
</html>
