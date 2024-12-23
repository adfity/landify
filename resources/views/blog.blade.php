<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Landing Page Blog</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
    }
    header {
      background: #fff;
    }
    .nav-link {
      font-size: 0.9rem;
      margin-right: 1rem;
    }
    .hero-section {
      background: #739AE8;
      color: #fff;
      padding: 4rem 0;
      margin-bottom: 2rem;
    }
    .hero-section h1 {
      font-size: 2.5rem;
      font-weight: 700;
    }
    .hero-section p {
      font-size: 1rem;
      margin-bottom: 1rem;
    }
    .btn-hero {
      background: #fff;
      color: #739AE8;
      font-size: 0.9rem;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
    }

    /* Blog Card */
    .blog-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem;
      max-width: 300px;
      margin: 1rem auto;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .blog-card img {
      border-radius: 10px;
      width: 100%;
      height: auto;
      margin-bottom: 0.5rem;
    }
    .blog-card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
    }
    .blog-card h5 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    .blog-card p {
      font-size: 0.9rem;
      color: #555;
      line-height: 1.6;
    }

    /* Footer */
    footer {
      background: #739AE8;
      color: #fff;
      padding: 2rem 0;
    }
    footer h6 {
      font-size: 1rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    footer a {
      color: #fff;
      text-decoration: none;
      font-size: 0.9rem;
    }
    footer .social-icons a {
      font-size: 1.2rem;
      margin-right: 0.7rem;
    }
    footer p {
      font-size: 0.85rem;
      margin-top: 1rem;
    }
  </style>
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

<!-- Hero Section -->
<section class="hero-section text-center">
  <div class="container">
    <h1>Welcome to Our Blog</h1>
    <p>Insights, tips, and stories to inspire your journey.</p>
    <a href="#" class="btn btn-hero">Get Started</a>
  </div>
</section>

<!-- Blog Articles -->
<<div class="container mb-5">
  <h2 class="text-center mb-4">Latest Articles</h2>
  <div class="row">
    <!-- Card 1 -->
    <div class="col-md-3 d-flex justify-content-center">
      <div class="blog-card">
        <img src="https://storage.googleapis.com/a1aa/image/fDFoEQnGxhTBTywhnIGetGbTUalDapuGLSO1CoK813YIDW7TA.jpg" alt="Visual Design">
        <h5>Engaging Visual Design</h5>
        <p>Make sure to use colors, white space, and typography effectively to enhance visitor experience.</p>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-md-3 d-flex justify-content-center">
      <div class="blog-card">
        <img src="https://storage.googleapis.com/a1aa/image/3z4Cyr9dpsq7EJ0KJDe88WSmJmjHO2tuIFoce9Pkrez8Fs2nA.jpg" alt="Loading Speed">
        <h5>Loading Speed Optimization</h5>
        <p>Ensure your landing page loads fast by optimizing images, caching, and choosing reliable hosting.</p>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="col-md-3 d-flex justify-content-center">
      <div class="blog-card">
        <img src="https://storage.googleapis.com/a1aa/image/6wsXPik5I37UDJOG5wCzXko6wVUnuxxdyEMPe8iwpQofCW7TA.jpg" alt="Content Strategy">
        <h5>Content Strategy</h5>
        <p>Focus on providing value through high-quality and relevant content for your audience.</p>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="col-md-3 d-flex justify-content-center">
      <div class="blog-card">
        <img src="https://storage.googleapis.com/a1aa/image/1ZG6dr1tnnZVC9v7ngc6DZev907szL4kBbgkRHE2dFnhBr9JA.jpg" alt="Mobile Optimization">
        <h5>Mobile Optimization</h5>
        <p>Ensure your website is responsive and delivers a great user experience on mobile devices.</p>
      </div>
    </div>
  </div>
</div>

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>