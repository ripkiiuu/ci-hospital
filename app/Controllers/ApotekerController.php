<?php

namespace App\Controllers;

class ApotekerController extends BaseController
{
    public function index(): string
    {
        return view('apoteker_home');
    }

    public function stok()
    {
        $obatModel = new \App\Models\Obat();
        $obats = $obatModel->findAll();
        return view('apoteker_stok', ['obats' => $obats]);
    }

    public function resep()
    {
        $kunjunganModel = new \App\Models\Kunjungan();
        $pasienModel = new \App\Models\Pasien();
        $obatModel = new \App\Models\Obat();

        $kunjungans = $kunjunganModel->findAll();
        $reseps = [];

        foreach ($kunjungans as $k) {
            if (!empty($k['preskripsi'])) {
                $pasien = $pasienModel->find($k['id_pasien']);
                $k['nama_pasien'] = $pasien ? $pasien['nama'] : 'Unknown';
                
                // Decode preskripsi JSON
                $preskripsiArr = json_decode($k['preskripsi'], true);
                $nama_obat = [];
                if (is_array($preskripsiArr)) {
                    foreach ($preskripsiArr as $po) {
                        $obatData = $obatModel->find($po['id_obat']);
                        if ($obatData) {
                            $nama_obat[] = $obatData['nama'];
                        }
                    }
                }
                $k['daftar_obat'] = implode(', ', $nama_obat);
                $reseps[] = $k;
            }
        }

        return view('apoteker_resep', ['reseps' => $reseps]);
    }
}
