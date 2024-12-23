<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        <!-- Login Form -->
        <div class="col-lg-6 bg-white p-5 d-flex flex-column">
            <h2 class="mb-3 text-uppercase fw-bold text-primary-custom">Welcome</h2>
            <h2 class="mb-3 text-uppercase fw-bold text-primary-custom">Back!</h2>
            <p class="text-muted mb-4">Welcome Back! Glad to See You Again!</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary-custom w-100 mb-3">Sign In</button>

                <div class="d-flex align-items-center text-muted mb-3">
                    <hr class="flex-grow-1">
                    <span class="mx-3">or login with</span>
                    <hr class="flex-grow-1">
                </div>

                <!-- Social Media Icons -->
                <div class="d-flex justify-content-center gap-3">
                    <a href="auth/google" class="text-decoration-none">
                        <img src="{{ asset('images/google.png') }}" alt="Google Icon" width="30" height="30">
                    </a>
                    <a href="#" class="text-decoration-none">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook Icon" width="30" height="30">
                    </a>
                </div>

                <div class="text-center mt-4">
                    <span>Don’t have an account? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Sign Up</a></span>
                </div>
            </form>
        </div>

        <!-- Side content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
         <img src="{{ asset('images/expand.png') }}" alt="Side Image" class="img-fluid" sclass="img-fluid side-image" style="max-width: 100%; height: 70%;">
</div>

    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
