<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help Center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/domain.css') }}"> 
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">  
  
</head>
<body>
  <!-- Header -->
  <header class="header shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h4 mb-0 fw-bold">Help Center</h1>
      <div class="search-bar d-flex align-items-center bg-white rounded-pill px-3 py-1 w-50 shadow-sm">
        <input type="text" id="searchInput" class="form-control border-0" placeholder="What do you need help with?">
      </div>
    </div>
  </header>

  <!-- Breadcrumbs -->
  <div class="breadcrumbs container mt-3">
    Help Center > <strong>Search Results</strong>
  </div>

  <!-- Search Results -->
  <section class="container my-4">
    <h2 class="fw-bold">Results for <em id="searchQuery">"All Results"</em></h2>
    <div id="searchResults">
      <!-- Static Results as Initial Data -->
      <div class="result-item">
        <h3 class="h6 fw-bold">Connecting a Domain to the Wix Name Servers</h3>
        <p>You can create a website with Wix, and then connect a domain you already own to it by changing its name servers. With this connection method, Wix hosts your DNS, while your domain remains registered with its current host.</p>
        <hr class="custom-divider">
      </div>
      <div class="result-item">
        <h3 class="h6 fw-bold">Connecting Your Domain to Squarespace</h3>
        <p>Steps to connect your domain to Squarespace using the DNS method.</p>
        <hr class="custom-divider">
      </div>
      <div class="result-item">
        <h3 class="h6 fw-bold">Setting Up Email Hosting</h3>
        <p>Instructions to set up email hosting with your custom domain.</p>
        <hr class="custom-divider">
      </div>
      <div class="result-item">
        <h3 class="h6 fw-bold">Troubleshooting Domain Issues</h3>
        <p>Learn how to troubleshoot issues when connecting a domain.</p>
        <hr class="custom-divider">
      </div>
    </div>
  </section>

  <!-- Footer -->
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

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript Search Logic -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const searchResults = document.getElementById("searchResults");
      const searchQuery = document.getElementById("searchQuery");

      const data = [
        { title: "Connecting a Domain to Wix", content: "Learn how to connect your domain to Wix by changing its name servers." },
        { title: "Connecting Your Domain to Squarespace", content: "Steps to connect your domain to Squarespace using the DNS method." },
        { title: "Setting Up Email Hosting", content: "Instructions to set up email hosting with your custom domain." },
        { title: "Troubleshooting Domain Issues", content: "Learn how to troubleshoot issues when connecting a domain." }
      ];

      searchInput.addEventListener("input", function () {
        const query = searchInput.value.toLowerCase();
        searchQuery.textContent = query ? `"${query}"` : `"All Results"`;
        searchResults.innerHTML = "";

        const filteredResults = data.filter(item =>
          item.title.toLowerCase().includes(query) || item.content.toLowerCase().includes(query)
        );

        if (filteredResults.length > 0) {
          filteredResults.forEach(result => {
            const resultDiv = document.createElement("div");
            resultDiv.classList.add("result-item");
            resultDiv.innerHTML = `
              <h3 class="h6 fw-bold">${result.title}</h3>
              <p>${result.content}</p>
            `;
            searchResults.appendChild(resultDiv);
          });
        } else {
          searchResults.innerHTML = `<p class="text-muted">No results found for "${query}".</p>`;
        }
      });
    });
  </script>
</body>
</html>
