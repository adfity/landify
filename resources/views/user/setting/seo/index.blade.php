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
    <h4 class="mb-4">Settings & Integration</h4>
    <ol class="breadcrumb">
  <a href="/setting/index" style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px; color:black;">
    Settings
    <img src="{{ asset('images/samping2.png') }}" alt="Settings Icon" style="width: 16px; height: 16px;">
  </a>
  <a href="#" style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px; color: black;">
    SEO Setting
    <img src="{{ asset('images/samping2.png') }}" alt="SEO Icon" style="width: 16px; height: 16px;">
  </a>
  <span style="display: flex; align-items: center; gap: 8px;">
    Edit Pages
  </span>
</ol>

    </nav>
    <hr class="custom-divider">
    <div class="card shadow-sm p-4">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="mb-1">Edit by Page</h1>
            <p class="text-muted">Customize the default page settings and meta tags across all page types.</p>
        </div>
        <!-- Search Bar -->
        <div>
                <input type="text" class="form-control search-bar" placeholder="Search Site" id="searchInput" style="width: 250px;">
            </div>
    </div>



    <!-- Table Container -->
    <div class="table-container shadow-sm">
      <table class="table table-hover align-middle" style="background-color: #739AE8;">
        <thead class="table-light" style="background-color: #739AE8;" >
          <tr>
            <th>Page Name</th>
            <th>Page URL</th>
            <th>Keyword</th>
            <th>Title Tag</th>
            <th>Meta Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tableBody">
    <tr>
        <td>Home</td>
        <td>/</td>
        <td>Keyword</td>
        <td>Title Tag</td>
        <td>Explore a diverse portfolio showcasing creative and innovative work</td>
        <td>
            <div class="btn-edit">
                <a href="/edit/home" style="text-decoration: none;">
                    <button class="btn btn-primary btn-sm" style="background-color: #739AE8; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        Edit
                        <img src="{{ asset('images/samping.png') }}" alt="Logo" style="height: 20px;">
                    </button>
                </a>
            </div>
        </td>
    </tr>
    <tr>
        <td>Portfolio</td>
        <td>/portfolio</td>
        <td>Keyword</td>
        <td>Title Tag</td>
        <td>Explore a diverse portfolio showcasing creative and innovative work</td>
        <td>
            <div class="btn-edit">
                <a href="/portfolio" style="text-decoration: none;">
                    <button class="btn btn-primary btn-sm" style="background-color: #739AE8; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        Edit
                        <img src="{{ asset('images/samping.png') }}" alt="Logo" style="height: 20px;">
                    </button>
                </a>
            </div>
        </td>
    </tr>
    <tr>
        <td>About</td>
        <td>/about</td>
        <td>Keyword</td>
        <td>Title Tag</td>
        <td>Explore a diverse portfolio showcasing creative and innovative work</td>
        <td>
            <div class="btn-edit">
                <a href="/edit/about" style="text-decoration: none;">
                    <button class="btn btn-primary btn-sm" style="background-color: #739AE8; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        Edit
                        <img src="{{ asset('images/samping.png') }}" alt="Logo" style="height: 20px;">
                    </button>
                </a>
            </div>
        </td>
    </tr>
</tbody>

      </table>
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
