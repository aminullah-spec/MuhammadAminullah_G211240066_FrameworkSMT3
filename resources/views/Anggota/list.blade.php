<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Anggota - Perpustakaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 12px 35px rgba(0,0,0,0.35);
}

h2 {
    color: #ffdf91;
    font-weight: 700;
}

/* Button */
.btn-add {
    background: linear-gradient(to right, #5fa8d3, #1d3557);
    color: #fff !important;
    font-weight: 600;
    border-radius: 10px;
}
.btn-add:hover {
    background: linear-gradient(to right, #1d3557, #5fa8d3);
    transform: scale(1.05);
}

/* Table */
.table thead th {
    background: #23395d !important;
    color: #ffdf91;
    border: 1px solid #324556;
    text-align: center;
}

.table tbody td {
    background: #3c4d5e;
    color: #eaeaea;
    border: 1px solid #324556;
}
.table tbody tr:hover td {
    background: #506273 !important;
    transition: 0.25s;
}

/* Tombol aksi */
.btn-warning.btn-sm {
    background: #ffb703 !important;
    border: none !important;
    color: #000 !important;
    font-weight: bold;
    border-radius: 6px;
}
.btn-warning.btn-sm:hover {
    background: #ffaa00 !important;
    transform: scale(1.07);
}

.btn-danger.btn-sm {
    background: #d62828 !important;
    border-radius: 6px;
    border: none;
}
.btn-danger.btn-sm:hover {
    background: #ef3b3b !important;
    transform: scale(1.07);
}

/* Pagination */
.page-link {
    background: #3c4d5e !important;
    color: #fff !important;
    border: none !important;
}
.page-item.active .page-link {
    background: #ffdf91 !important;
    color: #000 !important;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="container">
    <div class="main-card mb-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Anggota</h2>
            <a href="{{ url('anggota/add') }}" class="btn btn-add">
                <i class="fa fa-plus"></i> Tambah Anggota
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Progdi</th>
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
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->progdi }}</td>
                            <td>
                                <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('anggota/delete/'.$row->ID_Anggota) }}"
                                onclick="return confirm('Yakin ingin menghapus anggota ini?')"
                                class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if($query->isEmpty())
                        <tr>
                            <td colspan="5">Data anggota tidak tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($query->lastPage() > 1)
            <nav class="d-flex justify-content-center mt-3">
                <ul class="pagination">
                    <li class="page-item {{ $query->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $query->previousPageUrl() }}">&laquo;</a>
                    </li>

                    @for ($i = 1; $i <= $query->lastPage(); $i++)
                        <li class="page-item {{ $query->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <li class="page-item {{ $query->currentPage() == $query->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $query->nextPageUrl() }}">&raquo;</a>
                    </li>
                </ul>
            </nav>
        @endif

        <a href="{{ url('/perpus') }}" class="btn btn-light mt-3">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

    </div>
</div>

</body>
</html>
