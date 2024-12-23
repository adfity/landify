<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates</title>
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
        <a href="{{ route('user.templates') }}" class="list-group-item list-group-item-action active">
            <img src="{{ asset('images/template2.png') }}" alt="Templates" class="me-2" style="width: 20px; height: 20px;"> Templates
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
        <!-- Page Title -->
        <h3 class="text-center">Pick the Website Template</h3>

        <!-- Search and Filter Bar -->
        <div class="d-flex justify-content-between align-items-center my-4">
    <div class="input-group" style="max-width: 650px; margin-left: 150px;">
        <span class="input-group-text" style="background-color: #ffff !important;">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search for Templates" id="searchInput">
    </div>
    <div class="dropdown" style="margin-right: 350px;">

        <img src="{{ asset('images/filter.png') }}" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false"  style="width: 20px; height: 20px;">
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item category-option" href="#" data-category="all">Show All</a></li>
        <li><a class="dropdown-item category-option" href="#" data-category="business">Business</a></li>
        <li><a class="dropdown-item category-option" href="#" data-category="portfolio">Portfolio</a></li>
        <li><a class="dropdown-item category-option" href="#" data-category="ecommerce">E-commerce</a></li>
        <li><a class="dropdown-item category-option" href="#" data-category="blog">Blog</a></li>
    </ul>
 
    </div>
</div>

         <!-- Search Result and Price Filter -->
         <div class="d-flex justify-content-between align-items-center my-4" style="margin-left: 150px; margin-right: 200px;">
    <h5 id="search-result">Results found for <span style="font-weight: bold;">‘Show All’</span></h5>
 <!-- Price Filter -->
<div class="dropdown" id="priceFilterDropdown" style="margin-right: 200px;">
    <img src="{{ asset('images/filter.png') }}" id="priceDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="width: 20px; height: 20px;">
    <ul class="dropdown-menu" aria-labelledby="priceDropdown">
        <li><a class="dropdown-item price" href="#" data-price="all">All Prices</a></li>
        <li><a class="dropdown-item price" href="#" data-price="free">Free</a></li>
        <li><a class="dropdown-item price" href="#" data-price="100">100</a></li>
        <li><a class="dropdown-item price" href="#" data-price="75">75</a></li>
        <li><a class="dropdown-item price" href="#" data-price="50">50</a></li>
        <li><a class="dropdown-item price" href="#" data-price="25">25</a></li>
    </ul>
</div>
</div>

<div class="row g-4" style="padding-left: 130px;">
    @foreach($template as $item)
    <div class="col-md-3 col-lg-3 template-card" 
         data-category="{{ strtolower($item->type) }}" 
         data-price="{{ strtolower($item->price === 'Free' ? 'free' : $item->price) }}">
        <div class="card p-3" style="object-fit: cover;
    height: 300px; 
    width: 100%; 
    border-radius: 5px;  outline: none !important; ">
            <!-- Gambar Template -->
            <img src="{{ asset($item->img1) }}" style="
    height: 300px; 
    width: 100%;" class="card-img-top" alt="{{ $item->title }}">

            <!-- Tombol View -->
            <a href="{{ url('/templates/' . $item->id) }}" class="view-button btn btn-primary mt-2">View</a>

            <!-- Detail Template -->
            <div class="card-body text-center">
                <!-- Judul -->
                <h6 class="card-title mb-2">{{ $item->title }}</h6>

                <!-- Tipe -->
                <p class="card-text text-muted">{{ ucfirst($item->type) }}</p>

                <!-- Harga -->
                <span class="{{ $item->price === 'Free' ? 'text-success' : 'text-primary' }}">
                    {{ $item->price }}
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>

    </div>
</div>
    </div>
<!-- Sidebar Collapse Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const categoryOptions = document.querySelectorAll('.category-option'); // Kategori pilihan
    const priceOptions = document.querySelectorAll('.dropdown-item.price'); // Pilihan harga
    const searchResult = document.getElementById('search-result'); // Teks hasil pencarian
    const searchInput = document.getElementById('searchInput'); // Input pencarian
    const templateCards = document.querySelectorAll('.template-card'); // Semua kartu template
    const priceFilterDropdown = document.getElementById('priceFilterDropdown'); // Price Filter Dropdown

    let selectedCategory = 'all'; // Kategori default
    let selectedPrice = 'all'; // Harga default

    // Fungsi untuk memperbarui teks hasil pencarian
    const updateSearchResultText = () => {
        const categoryName = selectedCategory === 'all' ? 'Show All' : document.querySelector(.category-option[data-category="${selectedCategory}"])?.textContent.trim() || 'Show All';
        const priceText = selectedPrice === 'all' ? 'All Prices' : document.querySelector(.dropdown-item[data-price="${selectedPrice}"])?.textContent.trim() || 'Any Price';
        searchResult.innerHTML = Results found for <span style="font-weight: bold;">‘${categoryName}’</span> and <span style="font-weight: bold;">‘${priceText}’</span>;
    };

    // Event listener untuk kategori
    categoryOptions.forEach(option => {
        option.addEventListener('click', (e) => {
            e.preventDefault();
            selectedCategory = e.target.getAttribute('data-category'); // Perbarui kategori yang dipilih
            selectedPrice = 'all'; // Reset harga jika kategori berubah
            updateSearchResultText(); // Perbarui teks hasil pencarian
            updateTemplates(); // Update tampilan template
            
            // Tampilkan price filter hanya jika kategori dipilih selain 'all'
            if (selectedCategory !== 'all') {
                priceFilterDropdown.style.display = 'block'; // Tampilkan price filter
            } else {
                priceFilterDropdown.style.display = 'none'; // Sembunyikan price filter jika kategori 'all'
            }
        });
    });

    // Event listener untuk harga
    priceOptions.forEach(option => {
        option.addEventListener('click', (e) => {
            e.preventDefault();
            selectedPrice = e.target.getAttribute('data-price'); // Perbarui harga yang dipilih
            updateSearchResultText(); // Perbarui teks hasil pencarian
            updateTemplates(); // Update tampilan template
        });
    });

    // Fungsi untuk memperbarui tampilan template berdasarkan filter
    function updateTemplates() {
        templateCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            const cardPrice = card.getAttribute('data-price');

            // Filter logika berdasarkan kategori dan harga
            const matchCategory = (selectedCategory === 'all' || cardCategory === selectedCategory);
            const matchPrice = (selectedPrice === 'all' || cardPrice === selectedPrice);

            // Tampilkan atau sembunyikan kartu berdasarkan filter
            if (matchCategory && matchPrice) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Menangani input pencarian
    searchInput.addEventListener('input', () => {
        const searchText = searchInput.value.toLowerCase();
        let matchingTemplatesFound = false;

        // Cek apakah ada template yang cocok dengan pencarian
        templateCards.forEach(card => {
            const title = card.querySelector('.card-title')?.textContent.toLowerCase();

            // Jika pencarian ada, filter berdasarkan judul template
            if (title && title.includes(searchText)) {
                card.style.display = 'block'; // Tampilkan template yang sesuai
                matchingTemplatesFound = true;
            } else {
                card.style.display = 'none'; // Sembunyikan template yang tidak sesuai
            }
        });

        // Jika pencarian kosong, tampilkan semua template yang sesuai dengan kategori dan harga
        if (searchText === "") {
            updateTemplates(); // Tampilkan template sesuai kategori dan harga tanpa pencarian
        } else {
            // Update teks hasil pencarian berdasarkan input
            if (matchingTemplatesFound) {
                searchResult.style.display = 'block';
                searchResult.innerHTML = Results found for <span style="font-weight: bold;">‘${searchText}’</span>;
            } else {
                searchResult.style.display = 'block'; // Tampilkan pesan tidak ada template yang ditemukan
                searchResult.innerHTML = No results found for <span style="font-weight: bold;">‘${searchText}’</span>;
            }
        }
    });

    // Inisialisasi template berdasarkan filter yang diterapkan
    updateTemplates();
    updateSearchResultText();
});


</script>
<!-- Sidebar Collapse Script -->



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