<?php

namespace App\Http\Controllers;

use App\Models\CvModel;
use App\Models\PengalamanOrganisasi;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPendidikan = CvModel::latest()->get();
        $dataOrganisasi = PengalamanOrganisasi::orderByDesc('id')->get();

        return view('uts.index', compact('dataPendidikan', 'dataOrganisasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CvModel::create($this->validatePendidikan($request));

        return redirect()->route('uts.index')->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('uts.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendidikan = CvModel::findOrFail($id);

        return view('uts.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendidikan = CvModel::findOrFail($id);
        $pendidikan->update($this->validatePendidikan($request));

        return redirect()->route('uts.index')->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CvModel::findOrFail($id)->delete();

        return redirect()->route('uts.index')->with('success', 'Data pendidikan berhasil dihapus.');
    }

    private function validatePendidikan(Request $request): array
    {
        return $request->validate([
            'tahun' => ['required', 'string', 'max:255'],
            'instansi' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);
    }
}
