<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #4b6cb7, #182848);
        min-height: 100vh;
        padding: 2rem;
    }

    .main-card {
        background: linear-gradient(145deg, #3a6073, #16222a);
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        color: #fff;
    }

    h2 {
        color: #ffd479;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-custom {
        background: linear-gradient(to right, #4b6cb7, #182848);
        color: #fff;
        border: none;
        transition: .3s;
    }
    .btn-custom:hover {
        background: linear-gradient(to right, #182848, #4b6cb7);
        transform: scale(1.05);
    }

    /* Table */
    table {
        color: #fff;
    }
    thead {
        background: #16222a;
    }
    tbody tr {
        background: rgba(255,255,255,0.05);
    }
    tbody tr:hover {
        background: rgba(255,255,255,0.12);
    }

</style>
</head>
<body>

<div class="container">
    <div class="main-card">

        <h2>Data Peminjaman Buku</h2>

        <div class="text-end mb-3">
            <a href="{{ url('pinjam/add') }}" class="btn btn-custom">+ Tambah Data Pinjam</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $p)
                    <tr>
                        <td>{{ $p->ID_Pinjam }}</td>
                        <td>{{ $p->Nama }}</td>
                        <td>{{ $p->Judul }}</td>
                        <td>{{ $p->tgl_pinjam }}</td>
                        <td>{{ $p->tgl_kembali }}</td>
                        <td>
                            <a href="{{ url('pinjam/edit/'.$p->ID_Pinjam) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('pinjam/delete/'.$p->ID_Pinjam) }}"
                               onclick="return confirm('Yakin hapus data?')"
                               class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ url('/') }}" class="btn btn-light mt-3">Kembali ke Home</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
