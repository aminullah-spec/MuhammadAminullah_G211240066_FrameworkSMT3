<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #4b6cb7, #182848);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }

    .login-card {
        background: linear-gradient(145deg, #3a6073, #16222a);
        border-radius: 25px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        padding: 3rem 2.5rem;
        width: 100%;
        max-width: 420px;
        color: #fff;
        transition: 0.3s;
    }
    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 55px rgba(0,0,0,0.6);
    }

    h3 {
        text-align: center;
        font-weight: 700;
        color: #ffd479;
        margin-bottom: 2rem;
    }

    .form-control {
        background: #2c3e50;
        border-radius: 12px;
        color: #ecf0f1;
        border: 1px solid #5c7d8b;
        padding-left: 1rem;
        transition: 0.3s;
    }

    .form-control:focus {
        background: #34495e;
        color: #fff;
        box-shadow: 0 0 12px rgba(9,117,240,0.6);
        outline: none;
    }

    .form-label {
        color: #ffd479;
        font-weight: 500;
    }

    .btn-login {
        background: linear-gradient(to right, #4b6cb7, #182848);
        border: none;
        border-radius: 12px;
        color: #fff;
        font-weight: 600;
        padding: 0.7rem;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: linear-gradient(to right, #182848, #4b6cb7);
        transform: scale(1.06);
    }

    .alert {
        border-radius: 12px;
        font-size: 0.9rem;
    }
</style>
</head>
<body>

<div class="login-card">
    <h3>🔐 Login Admin</h3>

    {{-- Pesan error jika login gagal --}}
    @if(session('loginError'))
        <div class="alert alert-danger text-center">
            {{ session('loginError') }}
        </div>
    @endif

    {{-- Pesan sukses jika logout --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('login') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username"
                class="form-control" placeholder="Masukkan username"
                required autofocus>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                class="form-control" placeholder="Masukkan password"
                required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>

    </form>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
