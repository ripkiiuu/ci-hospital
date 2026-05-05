<?php

namespace App\Controllers;

use App\Models\Pasien;
use App\Models\Kunjungan;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class PasienDashboardController extends BaseController
{
    public function index()
    {
        $pasienModel   = new Pasien();
        $kunjunganModel = new Kunjungan();

        // Decode JWT to get username
        $token    = $this->request->getCookie('token');
        $username = null;

        if ($token) {
            try {
                $key      = getenv('JWT_SECRET');
                $decoded  = JWT::decode($token, new Key($key, 'HS256'));
                $username = $decoded->username ?? null;
            } catch (\Exception $e) {
                return redirect()->to('/')->with('error', 'Sesi berakhir, silakan login kembali.');
            }
        }

        $pasien = $pasienModel->where('username', $username)->first();

        if (! $pasien) {
            return redirect()->to('/');
        }

        // Get kunjungan for this patient
        $kunjungans = $kunjunganModel->where('id_pasien', $pasien['id'])->findAll();

        return view('pasien_home', [
            'pasien'     => $pasien,
            'kunjungans' => $kunjungans,
        ]);
    }
}
