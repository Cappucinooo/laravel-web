<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($pendidikan) ? 'Edit' : 'Tambah' }} Pendidikan | CV</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body class="bg-gray-100">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <a href="{{ route('uts.index') }}" class="text-primary d-inline-block mb-3">&larr; Kembali ke data pendidikan</a>
                <section class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <p class="text-uppercase text-primary fw-bold small mb-1">Curriculum Vitae</p>
                        <h1 class="h3 mb-2">{{ isset($pendidikan) ? 'Edit pendidikan' : 'Tambah pendidikan' }}</h1>
                        <p class="text-gray-600 mb-4">Lengkapi informasi pendidikan di bawah ini.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <p class="fw-bold mb-1">Periksa kembali data yang diisi.</p>
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ isset($pendidikan) ? route('uts.update', $pendidikan->id) : route('uts.store') }}" method="POST">
                            @csrf
                            @isset($pendidikan)
                                @method('PUT')
                            @endisset

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun / Periode</label>
                                <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $pendidikan->tahun ?? '') }}" class="form-control @error('tahun') is-invalid @enderror" placeholder="Contoh: 2020 - 2024" required maxlength="255">
                                @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="instansi" class="form-label">Instansi pendidikan</label>
                                <input type="text" name="instansi" id="instansi" value="{{ old('instansi', $pendidikan->instansi ?? '') }}" class="form-control @error('instansi') is-invalid @enderror" placeholder="Nama sekolah atau perguruan tinggi" required maxlength="255">
                                @error('instansi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $pendidikan->jurusan ?? '') }}" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan atau program studi" required maxlength="255">
                                @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Ceritakan fokus studi, pencapaian, atau informasi terkait" required>{{ old('deskripsi', $pendidikan->deskripsi ?? '') }}</textarea>
                                @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <a href="{{ route('uts.index') }}" class="btn btn-outline-gray">Batal</a>
                                <button type="submit" class="btn btn-primary">{{ isset($pendidikan) ? 'Simpan perubahan' : 'Simpan pendidikan' }}</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
