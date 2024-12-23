<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
     <link rel="stylesheet" href="css/dashboard.css"> 

</head>
<body>


<!-- Navbar -->
<header class=" shadow-sm" >
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="height: 40px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Centered Links -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="/template">Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="/blog">Blog</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="/contact">Contact</a>
                    </li>
                </ul>
                <!-- Right Side Icons -->
                <div class="d-flex align-items-center">
                    <!-- Language Dropdown -->
                    <div class="dropdown me-3">
                        <a id="languageDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="text-decoration-none fs-5">
                            🌐
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bahasa Indonesia</a></li>
                        </ul>
                    </div>
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Log In</a>
                </div>
            </div>
        </nav>
    </div>
</header>      


    <div class="container mt-5">
        <!-- Page Title -->
        <h3 class="text-center">Pick the Website Template</h3>

        <!-- Search and Filter Bar -->
        <div class="d-flex justify-content-between align-items-center my-4">
    <div class="input-group" style="max-width: 720px; margin-left: 170px;">
        <span class="input-group-text" style="background-color: #ffff !important;">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search for Templates" id="searchInput">
    </div>
    <div class="dropdown" style="margin-right: 360px;">

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
         

<div class="row g-4" style="padding-left: 170px;">
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
            <a href="{{ url('/template/' . $item->id) }}" class="view-button btn btn-primary mt-2">View</a>

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
<!-- Footer Section -->
<footer class=" text-white py-4 mt-5" style ="background: #739AE8;">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Landify</h5>
                <p class="small">
                    We are committed to helping your business grow through effective landing pages designed to drive conversions. Create the best pages easily!
                </p>
            </div>
            <!-- Product Section -->
            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">Product</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none small">Website Design</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">Website Template</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">Analytics</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">SEO Tools</a></li>
                </ul>
            </div>
            <!-- Template Section -->
            <div class="col-md-2 mb-3" >
                <h6 class="fw-bold">Template</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none small">E-Commerce</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">Portfolio</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">Business</a></li>
                    <li><a href="#" class="text-white text-decoration-none small">Blog</a></li>
                </ul>
            </div>
            <!-- Support Section -->
            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">Support</h6>
                <ul class="list-unstyled">
                    <li><a href="/ai" class="text-white text-decoration-none small">Help Center</a></li>
                </ul>
            </div>
            <!-- Contact Section -->
            <div class="col-md-2">
                <h6 class="fw-bold">Contact</h6>
                <ul class="list-unstyled">
                    <li class="small">support@landingpage.com</li>
                    <li class="small">+62 12345 7890</li>
                    <li class="small">Jl. Berman No. 123, Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
        <!-- Social Media Links -->
        <div class="row mt-4">
            <div class="col text-center">
                <a href="#" class="text-white text-decoration-none me-3" aria-label="Follow us on Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white text-decoration-none me-3" aria-label="Follow us on Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white text-decoration-none me-3" aria-label="Follow us on Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-white text-decoration-none" aria-label="Follow us on LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="text-center mt-3">
            <p class="mb-0 small">© 2024 Landing Page. All rights reserved.</p>
        </div>
    </div>
</footer>
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