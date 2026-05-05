<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataTransaksi;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use DateTime;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class KunjunganController extends BaseController
{
    protected $kunjungan;
    protected $pasiens;
    protected $dokters;
    protected $transaksis;
    protected $obats;

    function __construct() {
        $this->kunjungan = new Kunjungan();
        $this->pasiens = new Pasien();
        $this->dokters = new Dokter();
        $this->transaksis = new DataTransaksi();
        $this->obats = new \App\Models\Obat();
    }

    public function index()
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            try {
                $key = getenv('JWT_SECRET');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $username = $decoded->username;

                $dokter = $this->dokters->where('username', $username)->first();
            } catch (\Exception $e) {
                $dokter = null;
            }
        }

        if ($dokter) {
            $id = $dokter['id'];
            $res = $this->getKunjungan();
    
            $kunjunganArray = [];
            foreach ($res as $r) {
                if ($r['id_dokter'] == $id) {
                    $kunjunganArray[] = $r;
                }
            }
    
            $visits = [];
    
            foreach ($kunjunganArray as $visit) {
                $id_pasien = $visit['id_pasien'];
    
                $pasien = $this->pasiens->find($id_pasien);
                $visit['nama_pasien'] = $pasien['nama'];
    
                $visits[] = $visit;
            }
            return view('d_visits', compact('visits'));
        } else {
            $this->response->deleteCookie('token');
            session()->setFlashdata('success', 'Please Login with the Correct Account');
            return redirect()->to('/')->withCookies('token', null);
        }
    }

    public function showNewVisits()
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            try {
                $key = getenv('JWT_SECRET');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $username = $decoded->username;

                $user = $this->dokters->where('username', $username)->first();

                if ($user) {
                    $pasien = $this->pasiens->findAll();
                    $dokter = $this->dokters->findAll();
                    $kunjungan = $this->getKunjungan();
                    $kunjunganLastId = empty($kunjungan) ? 0 : end($kunjungan)['id'];
                    $obat = $this->obats->findAll();

                    return view('d_visit_a', compact('pasien', 'dokter', 'user', 'obat', 'kunjunganLastId'));
                }
            } catch (\Exception $e) {
                // Token invalid
            }
        }
        
        $this->response->deleteCookie('token');
        session()->setFlashdata('success', 'Please Login with the Correct Account');
        return redirect()->to('/')->withCookies('token', null);
    }

    public function getKunjungan()
    {
        try {
            $data = $this->kunjungan->findAll();
            return $data;
        }
        catch (\Exception $e) {
            return null;
        }
    }

    public function getKunjunganById($id)
    {
        $data = $this->kunjungan->find($id);
        if (empty($data)) {
            return null;
        }
        else {
            return $data;
        }
    }

    public function update($id) {
        $body = (array) $this->request->getJSON();

        try {
            $data = $this->kunjungan->update($id, [
                'tanggal'       => new DateTime($body['tanggal'] . ' ' . $body['waktu']),
                'id_pasien'     => $body['id_pasien'],
                'id_dokter'     => $body['id_dokter'],
                'keluhan'       => $body['keluhan'],
                'diagnosa'      => $body['diagnosa'],
                'preskripsi'    => $body['preskripsi'],
            ]);
    
            return redirect()->to('/doctor/visits');
        }
        catch (\Exception $e) {
            return redirect()->to('/doctor/visitsForm');
        }
    }

    public function getPreskripsi($id)
    {
        try {
            $data = $this->getKunjunganById($id);
            $preskripsi = json_decode($data['preskripsi'], true);
            $array_id_obat = array_column($preskripsi, 'id_obat');
            $array_id_obat = array_map('intval', $array_id_obat);

            $array_obat = [];
            foreach ($array_id_obat as $id_obat) {
                $obatData = $this->obats->find($id_obat);
                if ($obatData) {
                    $array_obat[$id_obat] = $obatData['nama'];
                }
            }
            
            return $array_obat;
        }
        catch (\Exception $e) {
            return null;
        }
    }

    public function createVisit() {
        $temp = $this->getKunjungan();
        $id = end($temp)['id'] + 1;

        $tanggal = $_POST['tanggal'] . ' ' . $_POST['waktu'];
        $id_pasien = $_POST['id_pasien'];
        $id_dokter = $_POST['id_dokter'];
        $keluhan = $_POST['keluhan'];
        $diagnosa = $_POST['diagnosa'];
        $preskripsi = $_POST['preskripsi'];

        $resArray = array_map(function($id_obat) {
            return ['id_obat' => intval($id_obat)];
        }, $preskripsi);

        $preskripsi = json_encode($resArray);

        $body = ['tanggal', 'id_pasien', 'id_dokter', 'keluhan', 'diagnosa', 'preskripsi'];
        
        $validationData = [
            // 'tanggal'  => 'required|Y-m-d H:i:s',
            'id_pasien'  => 'required|integer',
            'id_dokter'  => 'required|integer',
            'keluhan'  => 'required',
            'diagnosa'  => 'required',
            'preskripsi'  => 'required',
        ];

        if (!$this->validate($validationData, $body)) {
            return $this->response->setStatusCode(400)->setJSON($this->validator->getErrors());
        }

        $biaya_apotek = 0;
        $preskripsiArray = json_decode($preskripsi, true);
        $idObatArray = array_column($preskripsiArray, 'id_obat');

        foreach ($idObatArray as $idObat) {
            $obatData = $this->obats->find($idObat);
            if ($obatData) {
                $biaya_apotek += $obatData['harga'];
                // Kurangi stok obat
                $this->obats->update($idObat, ['stok' => $obatData['stok'] - 1]);
            }
        }

        try {
            $data = $this->kunjungan->insert([
                'tanggal' => $tanggal,
                'id_pasien' => $id_pasien,
                'id_dokter' => $id_dokter,
                'keluhan' => $keluhan,
                'diagnosa' => $diagnosa,
                'preskripsi' => $preskripsi,
            ]);

            $transaksi = $this->transaksis->insert([
                'tanggal'       => $tanggal,
                'biaya_rs'      => 100000,
                'biaya_apotek'  => $biaya_apotek,
                'status_rs'     => false,
                'status_apotek' => false,
                'id_kunjungan'  => $id
            ]);

            // Removed external API call for orders
    
            return redirect()->to('doctor/visits');
        }
        catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                // 'message' => 'An error occured'
                'message'   => $e->getMessage()
            ]);
        }
    }
}
