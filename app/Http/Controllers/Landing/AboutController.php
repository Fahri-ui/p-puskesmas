<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\VisiMisi;
use App\Models\Certificate;
use App\Models\Staf;

class AboutController extends Controller
{
    public function index()
    {
        $profil       = Profil::first();
        $visi         = VisiMisi::where('type', 'visi')->first();
        $misis        = VisiMisi::where('type', 'misi')->get();
        $certificates = Certificate::latest()->get();

        // Kepala Puskesmas
        $kepala = Staf::where('klaster', 'kepala')
            ->where('peran_klaster', 'pj')
            ->first();

        // Metadata label & nama tiap klaster (tampil sesuai array ini)
        $klasterMeta = [
            'klaster_1'      => ['label' => 'Klaster 1',      'nama_klaster' => 'Manajemen'],
            'klaster_2'      => ['label' => 'Klaster 2',      'nama_klaster' => 'Ibu dan Anak'],
            'klaster_3'      => ['label' => 'Klaster 3',      'nama_klaster' => 'Dewasa dan Lansia'],
            'klaster_4'      => ['label' => 'Klaster 4',      'nama_klaster' => 'Penanggulangan Penyakit Menular'],
            'lintas_klaster' => ['label' => 'Lintas Klaster', 'nama_klaster' => 'Layanan Penunjang'],
        ];

        // Ambil semua staf non-kepala, group per klaster
        $grouped = Staf::whereIn('klaster', array_keys($klasterMeta))
            ->orderBy('nama')
            ->get()
            ->groupBy('klaster');

        $klasters = [];
        foreach ($klasterMeta as $key => $meta) {
            $anggota      = $grouped->get($key, collect());
            $klasters[]   = [
                'label'        => $meta['label'],
                'nama_klaster' => $meta['nama_klaster'],
                'pj'           => $anggota->firstWhere('peran_klaster', 'pj'),
                'anggota'      => $anggota->where('peran_klaster', 'anggota')->values(),
            ];
        }

        // $stafs tetap tersedia jika dipakai di bagian lain view (misal tabel/list staf)
        $stafs = Staf::orderBy('nama')->get();

        return view('pages.landing.about.index', compact(
            'profil',
            'visi',
            'misis',
            'certificates',
            'stafs',
            'kepala',
            'klasters'
        ));
    }
}
