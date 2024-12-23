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

    <style>
        /* Custom Button Styles */
        .btn-primary-custom {
            background-color: #3498db; /* Biru cerah */
            border-color: #2980b9;
            color: #fff;
        }

        .btn-primary-custom:hover {
            background-color: #1d6fa5; /* Biru lebih gelap */
            border-color: #1d6fa5;
            color: #fff;
        }

        /* Consistent Font Styling */
        body {
            font-family: 'Poppins', sans-serif;
        }

        .heading-text {
            font-size: 2.5rem;
            font-weight: 700;
            color: #3498db; /* Warna biru cerah */
        }

        /* Link Styling */
        .text-primary-link {
            color: #3498db;
            text-decoration: none;
        }

        .text-primary-link:hover {
            color: #1d6fa5; /* Biru lebih gelap */
        }
    </style>
</head>
<body>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
        <!-- Reset Password Form -->
        <div class="col-lg-6 bg-white p-5 d-flex flex-column form-container">
            <h2 class="mb-3 heading-text">Reset Password</h2>
            <p class="text-muted mb-4">Please enter your email to receive a password reset link.</p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <button type="submit" class="btn btn-primary-custom w-100 mb-3">Send Reset Link</button>

                <div class="text-center mt-4">
                    <span>Back to <a href="{{ route('login') }}" class="fw-bold text-primary-link">Sign In</a></span>
                </div>
            </form>
        </div>

        <!-- Side Content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
         <img src="{{ asset('images/expand.png') }}" alt="Side Image" class="img-fluid" sclass="img-fluid side-image" style="max-width: 100%; height: 100%;">
</div>

</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
