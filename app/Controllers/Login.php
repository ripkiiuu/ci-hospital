<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dokter;
use App\Models\Pasien;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class Login extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $dokterModel = new Dokter();
        $pasienModel = new Pasien();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$username || !$password) {
            return $this->setResponseFormat('json')->respond(['message' => 'Invalid username or password']);
        }

        $isAdmin  = ($username === 'admin' && $password === 'password');
        $isDokter = false;
        $isPasien = false;

        if (!$isAdmin) {
            // Check dokter table
            $dokter = $dokterModel->where('username', $username)->first();
            if ($dokter && password_verify($password, $dokter['password'])) {
                $isDokter = true;
            }

            // Check pasien table
            if (!$isDokter) {
                $pasien = $pasienModel->where('username', $username)->first();
                if ($pasien && password_verify($password, $pasien['password'])) {
                    $isPasien = true;
                }
            }

            if (!$isDokter && !$isPasien) {
                return $this->setResponseFormat('json')->respond(['message' => 'Invalid username or password']);
            }
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'iss'      => 'localhost',
            'iat'      => $iat,
            'exp'      => $exp,
            'username' => $username,
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $this->response->setCookie('token', $token, 3600);
        session()->setFlashdata('success', 'Login successful');

        if ($isAdmin) {
            return redirect()->to('/admin')->withCookies('token', $token, 3600);
        } elseif ($isPasien) {
            return redirect()->to('/pasien')->withCookies('token', $token, 3600);
        } else {
            return redirect()->to('/doctor')->withCookies('token', $token, 3600);
        }
    }
    
    public function logout() {
        $this->response->deleteCookie('token');
        session()->setFlashdata('success', 'Logout successful');
        return redirect()->to('/')->withCookies('token', null);
    }
}
