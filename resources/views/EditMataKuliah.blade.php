<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-4">Edit Mata Kuliah</h2>

    <form action="/matakuliah/{{ $mk->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $mk->kode }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" class="form-control" value="{{ $mk->nama_matakuliah }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/matakuliah" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>