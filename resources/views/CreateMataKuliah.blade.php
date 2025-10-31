<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-4">Tambah Mata Kuliah</h2>

    <form action="/matakuliah" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="/matakuliah" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>