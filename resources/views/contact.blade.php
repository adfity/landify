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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
     <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
     <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
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
  <!-- Contact Section -->
  <section class="py-5">
   <div class="container">
    <div class="row">
     <div class="col-md-6">
      <h2>
       Contact Us
      </h2>
      <p>
       If you have any questions, feel free to reach out to us. We're here to help!
      </p>
      <form>
       <div class="mb-3">
        <label class="form-label" for="name">
         Name
        </label>
        <input class="form-control" id="name" placeholder="Your Name" type="text"/>
       </div>
       <div class="mb-3">
        <label class="form-label" for="email">
         Email
        </label>
        <input class="form-control" id="email" placeholder="Your Email" type="email"/>
       </div>
       <div class="mb-3">
        <label class="form-label" for="message">
         Message
        </label>
        <textarea class="form-control" id="message" placeholder="Your Message" rows="5"></textarea>
       </div>
       <button class="btn btn-primary" type="submit">
        Send Message
       </button>
      </form>
     </div>
     <div class="col-md-6">
      <h2>
       Our Office
      </h2>
      <p>
       Visit us at our office for a face-to-face consultation.
      </p>
      <ul class="list-unstyled">
       <li>
        <strong>
         Address:
        </strong>
        Jl. Berman No. 123, Jakarta, Indonesia
       </li>
       <li>
        <strong>
         Email:
        </strong>
        support@landingpage.com
       </li>
       <li>
        <strong>
         Phone:
        </strong>
        +62 12345 7890
       </li>
      </ul>
      <img alt="Office building with modern architecture" class="img-fluid rounded" height="400" src="https://storage.googleapis.com/a1aa/image/ZIz7HZJrz2otEtR6ZcSHMOCP37xTKXToduUbiVu7XCzJk1eJA.jpg" width="600"/>
     </div>
    </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
  </script>
 </body>
</html>