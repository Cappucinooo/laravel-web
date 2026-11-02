<?php

namespace App\Http\Controllers;

use App\Models\PengalamanOrganisasi;
use Illuminate\Http\Request;

class PengalamanOrganisasiController extends Controller
{
    public function create()
    {
        return view('uts.pengalaman-organisasi-form');
    }

    public function store(Request $request)
    {
        PengalamanOrganisasi::create($this->validateOrganisasi($request));

        return redirect()->route('uts.index')->with('success', 'Pengalaman organisasi berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $organisasi = PengalamanOrganisasi::findOrFail($id);

        return view('uts.pengalaman-organisasi-form', compact('organisasi'));
    }

    public function update(Request $request, string $id)
    {
        $organisasi = PengalamanOrganisasi::findOrFail($id);
        $organisasi->update($this->validateOrganisasi($request));

        return redirect()->route('uts.index')->with('success', 'Pengalaman organisasi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        PengalamanOrganisasi::findOrFail($id)->delete();

        return redirect()->route('uts.index')->with('success', 'Pengalaman organisasi berhasil dihapus.');
    }

    private function validateOrganisasi(Request $request): array
    {
        return $request->validate([
            'tahun' => ['required', 'string', 'max:255'],
            'organisasi' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);
    }
}
