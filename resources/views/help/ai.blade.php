d<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Support Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
     <link rel="stylesheet" href="{{ asset('css/ai.css') }}"> 
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
                        <a class="nav-link text-dark fw-medium" href="/">Product</a>
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
  <!-- Header Section -->
  <section class="header">
    <h1>How can we help?</h1>
    <div class="search-bar">
      <input type="text"  id="searchInput" placeholder="Ask a question or pick a suggestion">
      <i><img src="{{ asset('images/search.png') }}" alt="Collapse" style="width: 20px; height: 20px;"></i>
    </div>
  </section>

  <!-- Quick Questions -->
   
  <!-- Quick Questions -->
<section class="quick-questions" id="searchResults">
  <button class="btn-link search-item">
    <a href="/domain" class="text-decoration-none">HOW DO I CONNECT A DOMAIN?</a>
  </button>
  <button class="btn-link search-item">
    <a href="/plan" class="text-decoration-none">HOW DO I CHOOSE A PREMIUM PLAN?</a>
  </button>
  <button class="btn-link search-item">
    <a href="/page" class="text-decoration-none">HOW DO I CREATE A DYNAMIC PAGE?</a>
  </button>
  <button class="btn-link search-item">
    <a href="/landfy" class="text-decoration-none">HOW DO I RUN GOOGLE ADS WITH LANDIFY?</a>
  </button>
  <button class="btn-link search-item">
    <a href="/email" class="text-decoration-none">HOW DO I CONNECT AN EXTERNAL EMAIL?</a>
  </button>
</section>


  <!-- Footer -->
  <footer class="footer">
    <div class="column">
      <h3>Landify</h3>
      <p>
        We are committed to helping your business grow through effective landing pages designed to drive conversions. Create the best pages easily!
      </p>
    </div>
    <div class="column">
      <h3>Product</h3>
      <a href="#">Website Design</a>
      <a href="#">Website Template</a>
      <a href="#">Analytics</a>
      <a href="#">SEO Tools</a>
    </div>
    <div class="column">
      <h3>Template</h3>
      <a href="#">E-commerce</a>
      <a href="#">Portfolio</a>
      <a href="#">Business</a>
      <a href="#">Blog</a>
    </div>
    <div class="column">
      <h3>Support</h3>
      <a href="#">Help center</a>
    </div>
    <div class="column">
      <h3>Contact</h3>
      <p>support@landingpage.com</p>
      <p>+62 123456 7890</p>
      <p>Jl. Bersama No. 123, Jakarta, Indonesia</p>
      <div class="social-icons">
        <a href="#">&#128247;</a>
        <a href="#">&#127908;</a>
        <a href="#">&#128187;</a>
      </div>
    </div>
  </footer>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchItems = document.querySelectorAll(".search-item");

    searchInput.addEventListener("input", function () {
      const query = searchInput.value.toLowerCase();

      // Loop through all search items
      searchItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(query)) {
          item.style.display = "block"; // Show matching items
        } else {
          item.style.display = "none"; // Hide non-matching items
        }
      });
    });
  });
</script>



</body>
</html>
