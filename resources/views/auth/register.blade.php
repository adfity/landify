<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">

    <style>
           body {
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary-custom {
            background-color: #3498db; /* Biru utama */
            border-color: #2980b9;
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: #1d6fa5; /* Hover biru lebih gelap */
            border-color: #1d6fa5;
            color: white;
        }

        .text-primary-custom {
            color: #3498db; /* Warna teks biru */
        }
    </style>
</head>
<body>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
        <!-- Sign Up Form -->
        <div class="col-lg-6 bg-white p-5 d-flex flex-column form-container">
        <h1 class="mb-3 text-uppercase fw-bold text-primary-custom">Create Account</h1>
            <p class="text-muted mb-4">Ready to join? Let’s get you set up!</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary-custom w-100 mb-3">Sign Up</button>

                <div class="text-center mt-4">
                    <span>Already have an account? <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Sign In</a></span>
                </div>
            </form>
        </div>

        <!-- Side Content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
         <img src="{{ asset('images/expand.png') }}" alt="Side Image" class="img-fluid" sclass="img-fluid side-image" style="max-width: 100%; height: 70%;">
</div>

    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>