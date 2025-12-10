<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $is_update ? 'Edit Data Pinjaman' : 'Form Pinjam Buku' }}</title>

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
    padding: 2rem;
}

/* Card utama */
.form-card {
    background: linear-gradient(145deg, #3a6073, #16222a);
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    padding: 3rem 2.5rem;
    width: 100%;
    max-width: 650px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
}

/* Judul */
.form-card h2 {
    text-align: center;
    font-weight: 700;
    color: #ffd479; /* teks krem/oranye lembut */
    margin-bottom: 2rem;
}

/* Input & Select */
.form-select, .form-control {
    border-radius: 12px;
    padding-left: 2.5rem;
    transition: all 0.3s ease;
    background: linear-gradient(to right, #2c3e50, #34495e); /* background gelap */
    color: #ecf0f1; /* teks terang netral */
    border: 1px solid #5c7d8b;
}

.form-select:focus, .form-control:focus {
    background: linear-gradient(to right, #34495e, #2c3e50);
    box-shadow: 0 0 12px rgba(9, 117, 240, 0.6); /* glow netral */
    color: #010d1bff;
}

/* Label */
.form-label {
    color: #ffd479; /* oranye lembut */
}

/* Icon di input */
.position-relative .form-control,
.position-relative .form-select {
    position: relative;
}
.position-relative::before {
    content: "📖";
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1rem;
    pointer-events: none;
    color: #ecf0f1; /* sama dengan teks input */
}

/* Tombol */
.btn-primary {
    background: linear-gradient(to right, #4b6cb7, #182848);
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
    color: #0c0013ff;
}
.btn-primary:hover {
    background: linear-gradient(to right, #182848, #4b6cb7);
    transform: scale(1.05);
}
.btn-secondary, .btn-light {
    border-radius: 12px;
    transition: all 0.3s ease;
}
.btn-secondary:hover, .btn-light:hover {
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
    <h2>{{ $is_update ? 'Edit Data Pinjaman' : 'Form Pinjam Buku' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $is_update ? url('pinjam/update/'.$record->ID_Pinjam) : url('pinjam/save') }}" method="POST">
        @csrf
        @if ($is_update)
            @method('PUT')
        @endif

        <div class="mb-3 position-relative">
            <label for="anggota" class="form-label">Anggota</label>
            <select class="form-select ps-4" id="anggota" name="ID_Anggota" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($optanggota as $id => $nama)
                    <option value="{{ $id }}" {{ old('ID_Anggota', $is_update ? $record->ID_Anggota : '') == $id ? 'selected' : '' }}>
                        {{ $nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 position-relative">
            <label for="buku" class="form-label">Buku</label>
            <select class="form-select ps-4" id="buku" name="ID_Buku" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($optbuku as $id => $judul)
                    <option value="{{ $id }}" {{ old('ID_Buku', $is_update ? $record->ID_Buku : '') == $id ? 'selected' : '' }}>
                        {{ $judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 position-relative">
                <label for="tgl_pinjam" class="form-label">Tgl Pinjam</label>
                <input type="date" class="form-control ps-4" id="tgl_pinjam" name="tgl_pinjam"
                       value="{{ old('tgl_pinjam', $is_update ? $record->tgl_pinjam : '') }}" required>
            </div>
            <div class="col-md-6 position-relative">
                <label for="tgl_kembali" class="form-label">Tgl Kembali</label>
                <input type="date" class="form-control ps-4" id="tgl_kembali" name="tgl_kembali"
                       value="{{ old('tgl_kembali', $is_update ? $record->tgl_kembali : '') }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-primary"> {{ $is_update ? 'Update' : 'Simpan' }} </button>
            <button type="reset" class="btn btn-secondary">Batal</button>
            <a href="{{ url('pinjam') }}" class="btn btn-light">Kembali</a>
        </div>
    </form>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
