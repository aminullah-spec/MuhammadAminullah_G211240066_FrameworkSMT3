<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #4b6cb7, #182848);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    /* Card Form */
    .form-card {
        background: linear-gradient(145deg, #3a6073, #16222a);
        border-radius: 25px;
        padding: 3rem 2.5rem;
        width: 100%;
        max-width: 650px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        color: #fff;
        transition: 0.3s;
    }
    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.5);
    }

    /* Judul */
    h2 {
        text-align: center;
        color: #ffd479;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    /* Input & Select */
    .form-control,
    .form-select {
        background: #2c3e50;
        border-radius: 12px;
        color: #ecf0f1;
        border: 1px solid #5c7d8b;
        padding-left: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        background: #34495e;
        color: #fff;
        box-shadow: 0 0 12px rgba(9,117,240,0.6);
    }

    .form-label {
        color: #ffd479;
        font-weight: 500;
    }

    /* Tombol */
    .btn-primary-custom {
        background: linear-gradient(to right, #4b6cb7, #182848);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        transition: 0.3s;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(to right, #182848, #4b6cb7);
        transform: scale(1.05);
    }

    .btn-secondary {
        border-radius: 12px;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        transform: scale(1.03);
    }

    /* Alert */
    .alert {
        border-radius: 12px;
    }
</style>

</head>
<body>

<div class="form-card">
    <h2>Tambah Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('buku/save') }}" method="POST" novalidate>
        @csrf

        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="is_update" value="{{ $is_update }}"/>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="Judul"
                value="{{ old('Judul') }}" maxlength="100" required>
        </div>

        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="Pengarang"
                value="{{ old('Pengarang') }}" maxlength="150" required>
        </div>

        <div class="mb-4">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="Kategori" required>
                @foreach ($optkategori as $key => $value)
                    <option value="{{ $key }}" {{ old('Kategori') == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-primary-custom">Simpan</button>
            <a href="{{ url('buku') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
