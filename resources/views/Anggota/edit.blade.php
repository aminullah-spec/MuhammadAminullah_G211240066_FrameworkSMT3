<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota - Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Anggota</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('anggota/update/'.$record->ID_Anggota) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text"
                   name="nim"
                   id="nim"
                   value="{{ old('nim', $record->nim) }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text"
                   name="nama"
                   id="nama"
                   value="{{ old('nama', $record->nama) }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group">
            <label for="progdi">Program Studi</label>
            <select name="progdi" id="progdi" class="form-control" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="TI" {{ $record->progdi == 'TI' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="SI" {{ $record->progdi == 'SI' ? 'selected' : '' }}>Sistem Informasi</option>
                <option value="MI" {{ $record->progdi == 'MI' ? 'selected' : '' }}>Manajemen Informatika</option>
                <option value="KA" {{ $record->progdi == 'KA' ? 'selected' : '' }}>Komputer Akuntansi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('anggota') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
