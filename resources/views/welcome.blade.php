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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                            <li><a class="dropdown-item" href="#">Indonesia</a></li>
                        </ul>
                    </div>
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Log In</a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="text-center py-5" style="background : #739AE8;">
    <div class="container">
        <h1 class="display-4 fw-bold" style="color : #ffff;">Create Professional Landing Pages in Minutes</h1>
        <p style="color : #ffff;" >No coding skills required. Build high-converting pages for your business effortlessly.</p>
        <a href="#" class="btn btn-primary btn-lg" style ="background: #ffff; color : #739AE8;">Get Started</a>
    </div>


<!-- Info Section -->

    <div class="container mt-3">
        <div class="row g-4 mt-50">
            
        <div class="col-md-4" style="background: #CAE4ED; width: 100%; max-width: 200px; margin: 0 auto;">
                <div class="card border-0 shadow-sm" style="background: #CAE4ED; height: 250px;">
                    
                     <div class="card-body text-center" >
                        <h1 class="card-title mt-4" style="font-weight: bold;">2+</h1>
                        <h5> Years of</h5>
                        <h5> Dedicated </h5>
                        <h5> Service</h5> 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mt-5 ">
                  
                    <div class="card-body text-center" style="background: #D2D6EF; height: 180px;">
                    <h1 class="card-title mt-4" style="font-weight: bold;">100+</h1>
                        <h5 class="card-title"> Customizable Templates</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style=" width: 100%; max-width: 200px; margin: 0 auto;">
                <div class="card border-0 shadow-sm" style="height: 250px;">
                <img src="{{ asset('images/image 9.png') }}" class="card-img-top" alt="Data Aman">
                     <div class="card-body text-center" >

                    
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="background: #F2EF8D width: 100%; max-width: 200px; margin: 0 auto;">
                <div class="card border-0 shadow-sm" style="background: #F2EF8D; height: 250px;">
                    
                     <div class="card-body text-center" >
                        <h1 class="card-title mt-4" style="font-weight: bold;">5+</h1>
                        <h5> Years of Crafting </h5>
                        <h5>  Unique Websites</h5>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section with Text on the Left and Image on the Right -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold">Create Your First Page With Our <span style ="color: #739AE8;">Smart Builder</span></h2>
                <p class="text-muted">Experience a seamless process to create a landing page that perfectly reflects your brand's identity and style.</p>
                <a href="#" class="btn btn-primary" style ="background: #739AE8;">Get Started</a>
            </div>
            <div class="col-md-6 text-center">
            <img src="{{ asset('images/create.png') }}" alt="create">
            </div>
        </div>
    </div>
</section>
<!-- Additional Section -->
<section class="py-5">
    <div class="container">
        <div class="row gy-4">
            <!-- Top Section: Pick a Template -->
            <div class="col-lg-12">
                <h3 class="fw-bold">Pick a <span style ="color: #739AE8;">Standout Template</span> for Your Website</h3>
                <p class="text-muted">Choose from 100+ free website templates, customizable for any industry and designed to captivate your audience.</p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="position-relative">
                        <img src="{{ asset('images/portfolio.png') }}" alt="Portfolio Template" class="img-fluid rounded shadow-sm">
                            <p class="text-center mt-2 fw-medium">Portfolio</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative">
                        <img src="{{ asset('images/business.png') }}" alt="Business Template" class="img-fluid rounded shadow-sm">
                            <p class="text-center mt-2 fw-medium">Business</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

 <!-- Additional Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-md-6">
            <img src="{{ asset('images/expand.png') }}" alt="Campaign Preview" class="img-fluid rounded shadow-sm">
            </div>
            <!-- Right Side: Campaign Channels -->
            <div class="col-md-6">
                <h3 class="fw-bold">Expand Your Reach with Our <span style ="color: #739AE8;" >Campaign Channels</span></h3>
                <ul class="list-unstyled mt-4">
                    <li class="mb-3">
                        <span class="text-primary">→</span> Google Ads
                    </li>
                    <li class="mb-3">
                        <span class="text-primary">→</span> Facebook & Instagram Ads
                    </li>
                    <li class="mb-3">
                        <span class="text-primary">→</span> LinkedIn Ads
                    </li>
                    <li class="mb-3">
                        <span class="text-primary">→</span> Content Marketing (Blog/SEO)
                    </li>
                    <li class="mb-3">
                        <span class="text-primary">→</span> Email Marketing
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h3 class="fw-bold mb-4">Frequently Asked Questions (FAQ)</h3>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                        Do I need coding skills to use the platform?
                    </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        No, you don’t need any coding skills. Our platform is designed for ease of use, with a drag-and-drop editor that allows anyone to build and customize a landing page effortlessly.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        Can I integrate the platform with other tools?
                    </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, our platform integrates seamlessly with popular tools like Google Analytics, CRM systems, and email marketing platforms.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        How secure is the platform?
                    </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Our platform is built with top-notch security features to protect your data, including SSL encryption and regular backups.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-center py-5 bg-light">
        <div class="container">
            <h1 class="fw-bold " style ="color: #739AE8;">Elevate Your Marketing Campaigns</h1>
            <p class="lead">With Professional Landing Pages</p>
            <a href="#" class="btn btn-primary btn-lg" style ="background: #739AE8;">Get Started</a>
        </div>
    </section>

<!-- Footer Section -->
<footer class=" text-white py-4" style ="background: #739AE8;">
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

<!-- Font Awesome Script -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
