<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($organisasi) ? 'Edit' : 'Tambah' }} Pengalaman Organisasi</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body class="bg-gray-100">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <a href="{{ route('uts.index') }}" class="text-primary d-inline-block mb-3">&larr; Kembali ke CV</a>
                <section class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <p class="text-uppercase text-primary fw-bold small mb-1">Curriculum Vitae</p>
                        <h1 class="h3 mb-2">{{ isset($organisasi) ? 'Edit pengalaman organisasi' : 'Tambah pengalaman organisasi' }}</h1>
                        <p class="text-gray-600 mb-4">Isi informasi organisasi yang ingin ditampilkan pada CV.</p>

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

                        <form action="{{ isset($organisasi) ? route('pengalaman-organisasi.update', $organisasi->id) : route('pengalaman-organisasi.store') }}" method="POST">
                            @csrf
                            @isset($organisasi)
                                @method('PUT')
                            @endisset

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun / Periode</label>
                                <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $organisasi->tahun ?? '') }}" class="form-control @error('tahun') is-invalid @enderror" placeholder="Contoh: 2023 - 2024" required maxlength="255">
                                @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="organisasi" class="form-label">Nama organisasi</label>
                                <input type="text" name="organisasi" id="organisasi" value="{{ old('organisasi', $organisasi->organisasi ?? '') }}" class="form-control @error('organisasi') is-invalid @enderror" placeholder="Nama organisasi" required maxlength="255">
                                @error('organisasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan / peran</label>
                                <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $organisasi->jabatan ?? '') }}" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Contoh: Ketua" required maxlength="255">
                                @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan kegiatan atau tanggung jawab" required>{{ old('deskripsi', $organisasi->deskripsi ?? '') }}</textarea>
                                @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('uts.index') }}" class="btn btn-outline-gray">Batal</a>
                                <button type="submit" class="btn btn-primary">{{ isset($organisasi) ? 'Simpan perubahan' : 'Simpan organisasi' }}</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
