<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Modul - Nusacart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar menampilkan Nama & Role (Syarat Screenshot No. 4) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Nusacart LMS</a>
        <div class="collapse navbar-collapse justify-content-end">
            <span class="navbar-text text-white me-3">
                {{ auth()->user()->name }} (<strong>{{ auth()->user()->role }}</strong>)
            </span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Daftar Modul Pembelajaran</h2>
        <hr>

        <!-- Tombol Tambah (Bisa diakses Admin & Staff) -->
        <a href="#" class="btn btn-primary mb-3">+ Tambah Modul</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Modul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Modul Pemrograman Laravel & RBAC</td>
                    <td>
                        <!-- Tombol Edit (Bisa dilihat Admin & Staff) -->
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Tombol Hapus HANYA MUNCUL JIKA ADMIN (Syarat No. 2 & 4) -->
                        @if(auth()->user()->role === 'admin')
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>