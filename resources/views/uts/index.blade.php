<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Juliana Silva</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
    <style>
        body {
            background: #eef0f1;
            color: #252525;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .cv-toolbar {
            max-width: 860px;
            margin: 0 auto;
        }

        .cv-sheet {
            max-width: 860px;
            margin: 0 auto;
            padding: clamp(24px, 5vw, 56px);
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 8px 28px rgba(30, 41, 59, .08);
        }

        .cv-header {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 22px;
            border-bottom: 1px solid #d5d5d5;
        }

        .cv-photo {
            width: 82px;
            height: 82px;
            flex: 0 0 82px;
            border-radius: 50%;
            object-fit: cover;
        }

        .cv-name {
            margin: 0 0 6px;
            font-size: 25px;
            font-weight: 700;
        }

        .cv-contact {
            color: #575757;
            font-size: 13px;
        }

        .cv-section {
            margin-top: 24px;
        }

        .cv-section h2 {
            margin: 0 0 12px;
            padding-bottom: 6px;
            border-bottom: 2px solid #292929;
            font-size: 16px;
            font-weight: 700;
        }

        .cv-section p {
            margin-bottom: 0;
            font-size: 14px;
            line-height: 1.55;
        }

        .education-item {
            display: grid;
            grid-template-columns: minmax(110px, 25%) 1fr;
            gap: 14px;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .education-year {
            color: #555;
            font-weight: 700;
        }

        .education-title {
            margin: 0 0 4px;
            font-size: 14px;
            font-weight: 700;
        }

        .education-description {
            white-space: pre-line;
        }

        .education-actions {
            display: flex;
            gap: 12px;
            margin-top: 7px;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .education-actions form {
            display: inline;
        }

        .education-actions button {
            padding: 0;
            border: 0;
            background: transparent;
            color: #a32727;
            font: inherit;
            text-decoration: underline;
        }

        @media (max-width: 520px) {
            .cv-header {
                align-items: flex-start;
                gap: 14px;
            }

            .cv-photo {
                width: 64px;
                height: 64px;
                flex-basis: 64px;
            }

            .cv-name {
                font-size: 21px;
            }

            .education-item {
                grid-template-columns: 1fr;
                gap: 3px;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .screen-only {
                display: none !important;
            }

            .cv-sheet {
                max-width: none;
                padding: 0;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <main class="container py-4 py-md-5">
        <div class="cv-toolbar d-flex justify-content-end gap-2 mb-3 screen-only">
            <button type="button" onclick="window.print()" class="btn btn-outline-gray">Cetak CV</button>
            <a href="{{ route('uts.create') }}" class="btn btn-primary">+ Tambah pendidikan</a>
            <a href="{{ route('pengalaman-organisasi.create') }}" class="btn btn-primary">+ Tambah organisasi</a>
        </div>

        @if (session('success'))
            <div class="cv-toolbar alert alert-success screen-only" role="status">{{ session('success') }}</div>
        @endif

        <article class="cv-sheet">
            <header class="cv-header">
                <img src="{{ asset('assets-admin/img/team/kyy.jpg') }}" class="cv-photo" alt="Rizky Fathurrahman">
                <div>
                    <h1 class="cv-name">Rizky Fathurrahman</h1>
                    <div class="cv-contact">+62 812-3456-7890 <span aria-hidden="true">|</span> rizkyfthrahman@gmail.com</div>
                </div>
            </header>

            <section class="cv-section">
                <h2>Tentang Saya</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi illo doloribus, maxime expedita fugiat voluptates quos esse corporis amet, odio pariatur. Illum, voluptatibus tenetur numquam dicta reiciendis atque veniam quisquam? lorem ipsum dolor sit amet.</p>
            </section>

            <section class="cv-section">
                <h2>Pendidikan</h2>
                @forelse ($dataPendidikan as $pendidikan)
                    <div class="education-item">
                        <div class="education-year">{{ $pendidikan->tahun }}</div>
                        <div>
                            <h3 class="education-title">{{ $pendidikan->instansi }} | {{ $pendidikan->jurusan }}</h3>
                            <p class="education-description">{{ $pendidikan->deskripsi }}</p>
                            <div class="education-actions screen-only">
                                <a href="{{ route('uts.edit', $pendidikan->id) }}">Edit</a>
                                <form action="{{ route('uts.destroy', $pendidikan->id) }}" method="POST" onsubmit="return confirm('Hapus data pendidikan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data pendidikan.</p>
                @endforelse
            </section>

            <section class="cv-section">
                <h2>Pengalaman Organisasi</h2>
                @forelse ($dataOrganisasi as $organisasi)
                    <div class="education-item">
                        <div class="education-year">{{ $organisasi->tahun }}</div>
                        <div>
                            <h3 class="education-title">{{ $organisasi->organisasi }} | {{ $organisasi->jabatan }}</h3>
                            <p class="education-description">{{ $organisasi->deskripsi }}</p>
                            <div class="education-actions screen-only">
                                <a href="{{ route('pengalaman-organisasi.edit', $organisasi->id) }}">Edit</a>
                                <form action="{{ route('pengalaman-organisasi.destroy', $organisasi->id) }}" method="POST" onsubmit="return confirm('Hapus pengalaman organisasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada pengalaman organisasi.</p>
                @endforelse
            </section>

            <section class="cv-section">
                <h2>Kemampuan</h2>
                <p>Software Administrasi Perkantoran | Kepemimpinan | Bertanggung jawab</p>
            </section>
        </article>
    </main>
</body>
</html>
