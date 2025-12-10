<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to right, #587eb4, #1d3557);
    min-height: 100vh;
    padding: 2rem;
    color: #fff;
}

.main-card {
    background: linear-gradient(145deg, #4b6f95, #2b3e50);
    border-radius: 25px;
    padding: 2.4rem;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

h2 {
    text-align: center;
    color: #ffdf91;
    font-weight: 700;
    margin-bottom: 25px;
}

/* Tombol utama */
.btn-custom {
    background: linear-gradient(to right, #5fa8d3, #1d3557);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    transition: 0.3s;
}
.btn-custom:hover {
    background: linear-gradient(to right, #1d3557, #5fa8d3);
    transform: scale(1.05);
}

/* Input Search */
.search-input {
    background: #3b4c5c !important;
    border-radius: 12px;
    color: #fff !important;
    border: 1px solid #768a9c !important;
}
.search-input:focus {
    box-shadow: 0 0 10px rgba(255,255,255,0.4) !important;
}

/* Table */
.table {
    background: transparent !important;
    border-color: #324556 !important;
}

thead tr th {
    background: #23395d !important;
    color: #ffdf91 !important;
    border: 1px solid #324556 !important;
    padding: 12px !important;
}

tbody tr td {
    background: #3b4c5c !important;
    color: #f0f3f5 !important;
    border: 1px solid #324556 !important;
    padding: 12px !important;
}
tbody tr:hover td {
    background: #4f6275 !important;
    transition: 0.2s;
}

/* Tombol Aksi */
.table .btn-custom.btn-sm {
    background: linear-gradient(to right, #5fa8d3, #1d3557) !important;
    border: none;
    color: #fff !important;
    border-radius: 8px;
    padding: 5px 10px;
}
.table .btn-custom.btn-sm:hover {
    background: linear-gradient(to right, #1d3557, #5fa8d3) !important;
    transform: scale(1.07);
}

.table .btn-danger.btn-sm {
    background: #c0392b !important;
    border: none !important;
    border-radius: 8px;
    padding: 5px 10px;
}
.table .btn-danger.btn-sm:hover {
    background: #e74c3c !important;
    transform: scale(1.07);
}

/* Pagination */
.page-link {
    background: #3b4c5c !important;
    color: #fff !important;
    border: none !important;
}
.page-item.active .page-link {
    background: #ffdf91 !important;
    color: #000 !important;
    font-weight: bold !important;
}
</style>
</head>
<body>

<div class="container">
    <div class="main-card">

        <h2>Daftar Buku</h2>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ url('buku/add') }}" class="btn btn-custom">+ Tambah Buku</a>
            <form action="" method="GET" class="d-flex align-items-center">
                <input type="text" name="search" class="search-input form-control me-2" placeholder="Cari judul / pengarang">
                <button type="submit" class="btn btn-custom">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($query->currentPage() - 1) * $query->perPage();
                    @endphp
                    @foreach ($query as $row)
                        @php $no++; @endphp
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row['Judul'] }}</td>
                            <td>{{ $row['Pengarang'] }}</td>
                            <td>{{ $optkategori[$row['Kategori']] ?? '-' }}</td>
                            <td>
                                <a href="{{ url('buku/edit/'.$row['ID_Buku']) }}" class="btn btn-custom btn-sm">Edit</a>
                                <a href="{{ url('buku/delete/'.$row['ID_Buku']) }}"
                                   onclick="return confirm('Yakin hapus data?')"
                                   class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    @if($query->isEmpty())
                        <tr>
                            <td colspan="5">Data buku tidak tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <nav>
            <ul class="pagination justify-content-center mt-3">
                @if ($query->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $query->previousPageUrl() }}">&laquo;</a></li>
                @endif

                @for ($i = 1; $i <= $query->lastPage(); $i++)
                    <li class="page-item {{ $query->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($query->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $query->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </nav>

        <a href="{{ url('/perpus') }}" class="btn btn-light mt-3">Kembali</a>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
