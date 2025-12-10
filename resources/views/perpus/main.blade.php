<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #4b6cb7, #182848);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1.2rem;
    }

    .main-card {
        background: linear-gradient(145deg, #3a6073, #16222a);
        border-radius: 25px;
        box-shadow: 0 18px 50px rgba(0,0,0,0.45);
        width: 100%;
        max-width: 520px;
        transition: 0.35s;
        color: #fff;
        padding: 2.5rem;
    }
    .main-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 30px 65px rgba(0,0,0,0.7);
    }

    .card-title {
        font-size: 1.7rem;
        font-weight: 700;
        color: #ffd479;
        text-align: center;
        margin-bottom: 2rem;
    }

    .menu-item {
        display: block;
        background: #2c3e50;
        margin-bottom: 1rem;
        padding: 1rem 1.5rem;
        border-radius: 15px;
        font-weight: 600;
        text-decoration: none;
        color: #ffd479;
        transition: 0.35s;
        border: 1px solid #5c7d8b;
    }
    .menu-item:hover {
        background: #34495e;
        color: #fff;
        transform: translateX(8px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.45);
    }

    .logout-btn {
        border-radius: 12px;
        background: #c0392b;
        border: none;
        padding: .7rem 2rem;
        color: #fff;
        transition: 0.35s;
        font-weight: 600;
    }
    .logout-btn:hover {
        background: #e74c3c;
        transform: scale(1.08);
    }

</style>
<script src="https://kit.fontawesome.com/a2e0e1c2f0.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="main-card">
    <h2 class="card-title">📚 Perpustakaan FTIK</h2>

    <a href="{{ url('buku') }}" class="menu-item">
        <i class="fas fa-book me-2"></i> Kelola Data Buku
    </a>

    <a href="{{ url('anggota') }}" class="menu-item">
        <i class="fas fa-users me-2"></i> Kelola Data Anggota
    </a>

    <a href="{{ url('pinjam') }}" class="menu-item">
        <i class="fas fa-box me-2"></i> Kelola Peminjaman
    </a>

    <div class="text-center mt-4">
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
