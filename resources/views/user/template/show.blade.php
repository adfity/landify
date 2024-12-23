<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Details - View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
</head>
<body>
    
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
                        <a href="/templates" class="nav-link">
                            <img src="{{ asset('images/kiri2.png') }}" alt="Notifications" style="width: 20px; height: 20px;">
                        </a>
                    </li>
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

    <!-- Main Content -->
    <div class="container mt-5">
    <ol class="breadcrumb ">
    <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/setting/index" 
               style="display: flex; align-items: center; gap: 8px; text-decoration: none; margin-right: 12px;   color:  #739AE8;">
                All Templates
                <img src="{{ asset('images/samping2.png') }}" alt="Settings Icon" style="width: 16px; height: 16px;">
            </a>
        </li>
        <li>
            <a href="#" 
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