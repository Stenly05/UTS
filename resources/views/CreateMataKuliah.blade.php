<!DOCTYPE html>
<html>
<head>
    <title>{{ $mk->exists ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>{{ $mk->exists ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah' }}</h2>

    <form 
        action="{{ $mk->exists ? route('matakuliah.update', $mk->id) : route('matakuliah.store') }}" 
        method="POST">
        @csrf
        @if($mk->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input 
                type="text" 
                name="kode" 
                id="kode" 
                class="form-control" 
                value="{{ old('kode', $mk->kode) }}">
            @error('kode') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah</label>
            <input 
                type="text" 
                name="nama_matakuliah" 
                id="nama_matakuliah" 
                class="form-control" 
                value="{{ old('nama_matakuliah', $mk->nama_matakuliah) }}">
            @error('nama_matakuliah') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">
            {{ $mk->exists ? 'Update' : 'Simpan' }}
        </button>
    </form>
</div>
</body>
</html>