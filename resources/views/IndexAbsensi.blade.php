<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    <h3 class="mb-4 text-center">Daftar Absensi Mahasiswa</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="GET" class="row mb-4">
        <div class="col-md-5">
            <label for="tanggal_absensi" class="form-label">Tanggal</label>
            <input type="date" id="tanggal_absensi" name="tanggal_absensi" class="form-control" value="{{ $tanggal }}">
        </div>
        <div class="col-md-5">
            <label for="matakuliah_id" class="form-label">Mata Kuliah</label>
            <select name="matakuliah_id" id="matakuliah_id" class="form-select">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matakuliah as $mk)
                    <option value="{{ $mk->id }}" {{ $matakuliah_id == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama_matakuliah }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
        </div>
    </form>

    @if($matakuliah_id)
    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="tanggal_absensi" value="{{ $tanggal }}">
        <input type="hidden" name="matakuliah_id" value="{{ $matakuliah_id }}">

        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Status Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $index => $m)
                    @php $status = $absensi[$m->id]->status_absen ?? ''; @endphp
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            {{ $m->nama }}<br>
                            <small class="text-muted">{{ $m->nim }}</small>
                        </td>
                        <td class="text-center">
                            <select name="status_absen[{{ $m->id }}]" class="form-select">
                                <option value="">-</option>
                                <option value="H" {{ $status == 'H' ? 'selected' : '' }}>Hadir</option>
                                <option value="I" {{ $status == 'I' ? 'selected' : '' }}>Izin</option>
                                <option value="S" {{ $status == 'S' ? 'selected' : '' }}>Sakit</option>
                                <option value="A" {{ $status == 'A' ? 'selected' : '' }}>Alpa</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan Absensi</button>
        </div>
    </form>
    @endif
</div>

</body>
</html>