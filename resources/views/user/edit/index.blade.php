<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css"> 
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
            <a href="{{ route('user.setting.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('settings') ? 'active' : '' }}">
                <img src="{{ asset('images/setting.png') }}" alt="Settings" class="me-2" style="width: 20px; height: 20px;"> Setting & Integrations
            </a>
            <a href="{{ route('user.edit') }}" class="list-group-item list-group-item-action {{ request()->routeIs('users') ? 'active' : '' }}">
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

<!-- Konten -->
<div class="content">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h4>Welcome Back, {{ auth()->user()->name }}</h4>
        <div class="d-flex align-items-center gap-3">
            <div class="input-group" style="width: 300px;">
            <span class="input-group-text border-0" style ="background-color: #ffff !important;">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" id="searchInput" class="form-control border-0"  placeholder="Search Site">
            </div>
            <div class="dropdown">
    
        <button class="btn btn-light d-flex align-items-center gap-2" type="button" id="lastModifiedDropdown" data-bs-toggle="dropdown">
            <img src="images/time.png" alt="Clock" style="width: 20px;"> Last Modified
            <img src="images/bawah.png" alt="Arrow" style="width: 12px;">
        </button>
        <ul class="dropdown-menu">
        <li><button class="dropdown-item" type="button" onclick="resetFilter()">Show All</button></li>

        <li><button class="dropdown-item" type="button" onclick="applyFilter('today')">Today</button></li>
        <li><button class="dropdown-item" type="button" onclick="applyFilter('this-week')">This Week</button></li>
        <li><button class="dropdown-item" type="button" onclick="applyFilter('this-month')">This Month</button></li>
    </ul>
    <form method="GET" action="{{ route('pages.timeindex') }}">
    <select name="filter" style="display:none;">
        <option value="today">Today</option>
        <option value="this-week">This Week</option>
        <option value="this-month">This Month</option>
    </select>
</form>

</div>

            <a href="{{ route('pages.create') }}" style ="background: #739AE8;" class="btn btn-primary" > New Site <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <hr class="custom-divider">
    <div id="pagesContainer">
    @if($pages->isEmpty())
        <p class="text-muted">No pages found for the selected time filter.</p>
    @else
        @foreach ($pages as $item)
            <div class="card shadow-sm mb-3 page-item" data-date="{{ $item->updated_at }}" data-title="{{ strtolower($item->title) }}">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        @empty($item->img1)
                            <img src="{{ asset('images/logo.png') }}" 
                                class="img-fluid rounded-start" 
                                alt="Default Thumbnail" style="max-width: 100px; height: auto;">
                        @else
                            <img src="{{ Storage::url($item->img1) }}" 
                                class="img-fluid rounded-start" 
                                alt="{{ $item->title }} Thumbnail">
                        @endempty
                    </div>
                    
                    
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <span class="badge {{ $item->status == 'unpublish' ? 'bg-secondary' : 'bg-success' }}">
                                    {{ strtoupper($item->status) }}
                                </span>
                                <p>
                                    @if ($item->status == 'publish')
                                        <a href="{{ route('page.publish', ['id' => $item->id, 'slug' => $item->slug]) }}" 
                                            class="text-muted mb-1" 
                                            target="_blank">https://landify/{{ $item->id }}/{{ $item->slug }}</a>
                                    @else
                                        <a href="javascript:void(0)" 
                                            class="text-muted mb-1" 
                                            onclick="handleUnpublish('{{ route('user.edit_site', $item->id) }}')">
                                            https://landify/{{ $item->id }}/{{ $item->slug }}
                                        </a>
                                    @endif
                                </p>
                            </div>
                            
                            
                            <!-- Edit Site -->
                            <div class="d-flex justify-content-start" style="margin-top: 30px;">
                            <!-- Edit Site -->
                            <a href="{{ route('user.edit_site', $item->id) }}" class="btn btn-primary me-2 d-flex align-items-center" style="background: #739AE8;">
                                <img src="{{ asset('images/edit3.png') }}" alt="Edit Icon" style="width: 20px; height: 20px; margin-right: 8px;">
                                Edit Site
                            </a>

                            <!-- Edit Page -->
                            <a href="{{ route('user.edit_page', $item->id) }}" class="btn btn-outline-dark me-2 d-flex align-items-center">
                                <img src="{{ asset('images/gerigi-removebg-preview.png') }}" alt="Preview Icon" style="width: 20px; height: 20px; margin-right: 8px;">
                                Edit Page
                            </a>

                            <a href="{{ route('page.preview', $item->id) }}" class="btn btn-outline-dark me-2 d-flex align-items-center" target="_blank">
                                <img src="{{ asset('images/mata-removebg-preview (1).png') }}" alt="Preview Icon" style="width: 20px; height: 20px; margin-right: 8px;">
                                Preview
                            </a> 
                            <!-- Delete Site -->
                            <form action="{{ route('pages.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-dark d-flex align-items-center" onclick="return confirm('Are you sure you want to delete this page?')">
                                    <img src="{{ asset('images/delete.png') }}" alt="Delete Icon" style="width: 20px; height: 20px; margin-right: 8px;">
                                    Delete
                                </button>
                            </form>
                        </div>

                            <small class="text-muted mt-3">
                                Last updated : {{ $item->updated_at ? \Carbon\Carbon::parse($item->updated_at)->diffForHumans() : 'No updates yet' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>


 <!-- Tambahkan CDN SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
    function handleUnpublish(editRoute) {
        Swal.fire({
            title: 'Halaman Belum Dipublish',
            text: 'Anda harus mempublish halaman Anda untuk melanjutkan.',
            icon: 'warning',
            showCancelButton: true, // Menampilkan tombol Batal
            showCloseButton: true, // Menampilkan logo "X" untuk close di pojok kanan atas
            confirmButtonText: 'OK',
            cancelButtonText: 'Batal', // Label untuk tombol Batal
            reverseButtons: true, // Membalik posisi tombol OK dan Batal
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman edit jika OK ditekan
                window.location.href = editRoute;
            } else if (result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.close) {
                // Jika Batal atau tombol X ditekan
                console.log('Aksi dibatalkan oleh pengguna');
            }
        });
    }
</script>


<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Get all filter buttons
    const filterButtons = document.querySelectorAll('.dropdown-item');
    // Listen for filter button click
    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filterValue = this.textContent.toLowerCase();
            applyFilter(filterValue);
        });
    });

    // Function to apply the filter
    function applyFilter(filter) {
        const pageItems = document.querySelectorAll('.page-item');

        pageItems.forEach(item => {
            const updatedAt = item.getAttribute('data-date');
            const title = item.getAttribute('data-title');
            
            // Get the current date and compare
            const currentDate = new Date();
            const updatedDate = new Date(updatedAt);

            let showItem = false;

            if (filter === 'today') {
                // Filter for today
                showItem = isToday(updatedDate, currentDate);
            } else if (filter === 'this-week') {
                // Filter for this week
                showItem = isThisWeek(updatedDate, currentDate);
            } else if (filter === 'this-month') {
                // Filter for this month
                showItem = isThisMonth(updatedDate, currentDate);
            } else if (filter === 'show all') {
                // Show all pages
                showItem = true;
            }

            if (showItem) {
                item.style.display = 'block'; // Show item
            } else {
                item.style.display = 'none'; // Hide item
            }
        });
    }

    // Check if the date is today
    function isToday(date1, date2) {
        return date1.toDateString() === date2.toDateString();
    }

    // Check if the date is in the current week
    function isThisWeek(date1, date2) {
        const startOfWeek = date2.getDate() - date2.getDay();
        const endOfWeek = startOfWeek + 6;
        const weekStart = new Date(date2.setDate(startOfWeek));
        const weekEnd = new Date(date2.setDate(endOfWeek));
        
        return date1 >= weekStart && date1 <= weekEnd;
    }

    // Check if the date is in the current month
    function isThisMonth(date1, date2) {
        return date1.getMonth() === date2.getMonth() && date1.getFullYear() === date2.getFullYear();
    }
});


</script>

<script>
    function resetFilter() {
        const pages = document.querySelectorAll('.page-item');
        pages.forEach(page => {
            page.style.display = 'block';
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    document.querySelector('label[for="profile_picture"]').addEventListener('click', function() {
        document.getElementById('profile_picture').click();
    });
</script>
</script>
<!-- Pesan jika hasil pencarian kosong -->
<div id="noResultsMessage" class="text-center mt-4" style="display: none;">
    <p class="text-muted">No results found for the searched title.</p>
</div>
</script>
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase(); // Ambil nilai input pencarian dan ubah ke huruf kecil
        const pages = document.querySelectorAll('.page-item'); // Semua elemen page-item
        let hasResults = false; // Flag untuk mengecek apakah ada hasil

        pages.forEach(page => {
            const title = page.getAttribute('data-title'); // Ambil atribut data-title
            if (title.includes(query)) {
                page.style.display = 'block'; // Tampilkan jika cocok
                hasResults = true;
            } else {
                page.style.display = 'none'; // Sembunyikan jika tidak cocok
            }
        });

        // Tampilkan atau sembunyikan pesan "No Results"
        const noResultsMessage = document.getElementById('noResultsMessage');
        noResultsMessage.style.display = hasResults ? 'none' : 'block';
    });
</script>

</body>
</html>