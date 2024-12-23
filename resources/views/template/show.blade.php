<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
</head>
<body>

<!-- Navbar -->
<header class="shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-dark fw-medium" href="/">Product</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-medium" href="/template">Template</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-medium" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-medium" href="/contact">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3">
                        <a id="languageDropdown" href="#" role="button" data-bs-toggle="dropdown" class="text-decoration-none fs-5">🌐</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bahasa Indonesia</a></li>
                        </ul>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Log In</a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Main Content -->
 <!-- Main Content -->
 <div class="container mt-5">
    <ol class="breadcrumb ">
    <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/template" 
               style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px;   color:  #739AE8;">
                All Templates
                <img src="{{ asset('images/samping2.png') }}" alt="Settings Icon" style="width: 16px; height: 16px;">
            </a>
        </li>
        <li>
            <a href="/template" 
               style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px; color:  #739AE8;">
               {{ $template->type }} Template
                <img src="{{ asset('images/samping2.png') }}" alt="Settings Icon" style="width: 16px; height: 16px;">
            </a>
        </li>
        <li>
            <a href="#" 
               style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px; color:  #739AE8;">
               {{ $template->price }}
            </a>
        </li>
    </ol>
        <div class="row">
            <!-- Template Details with Buttons -->
            <div class="col-lg-12 d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">{{ $template->title }}</h2>
  
    <div class="d-inline-flex gap-3">
    <!-- Form for submitting the template edit action -->
    <form id="start-editing-form-/template-preview/{id}" 
                                action="{{ route('temp-use.create', $template->id) }}" 
                                method="POST" 
                                enctype="multipart/form-data" 
                                onsubmit="return checkPrice(event, '{{ $template->price }}')">
                            @csrf
                            <button type="submit" class="btn btn-custom" style="background: #739AE8;">Start Editing</button>
                        </form>

    <!-- Preview Button -->
    <a href="{{ url('/template-preview/' . $template->id) }}" class="btn btn-outline-dark">Preview in Browser</a>
</div>

    
</div>


        <!-- Template Preview Carousel -->
        <div class="row">
    <div class="col-12">
        <div id="templateCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset($template->img1) }}" class="d-block" alt="Template Preview 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset($template->img2) }}" class="d-block" alt="Template Preview 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset($template->img3) }}" class="d-block" alt="Template Preview 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#templateCarousel" data-bs-slide="prev">
                <img src="{{ asset('images/kiri2.png') }}" style="width: 60px; height: 60px;"></span>
    
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#templateCarousel" data-bs-slide="next">
                <img src="{{ asset('images/kanan2.png') }}"  style="width: 60px; height: 60px;"></span>
               
            </button>
        </div>
    </div>
</div>


       <!-- Features Section -->
<div class="mt-5">
    <h4>{{ $template->title }}</h4>
    <ul class="list-unstyled">
        <li class="mb-2">
            <i class="fas fa-check text-success me-2"></i>{{ $template->short_description }}
        </li>
    </ul>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script>
        function checkPrice(event, price) {
            if (price !== 'Free') {
                event.preventDefault(); // Membatalkan pengiriman form
                alert('Silahkan lakukan pembayaran untuk menggunakan template ini.');
                return false;
            }
            return true; // Lanjutkan jika harga "Free"
        }
    </script>
    

</body>

</html>