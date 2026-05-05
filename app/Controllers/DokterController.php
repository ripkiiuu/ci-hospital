<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dokter;

class DokterController extends BaseController
{
    protected $dokters;

    function __construct() {
        $this->dokters = new Dokter();
    }

    public function index()
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            $tokenData = explode('.', $token);
            if (count($tokenData) === 3) {
                $payload = base64_decode($tokenData[1]);
                $payloadData = json_decode($payload, true);

                $username = $payloadData[0]['username'];

                $dokter = $this->dokters->where('username', $username)->first();
            }
            if ($dokter){
                return view('d_profile', compact('dokter'));
            }
        }
        $this->response->deleteCookie('token');
        session()->setFlashdata('success', 'Please Login with the Correct Account');
        return redirect()->to('/')->withCookies('token', null);


    }

    public function getDokter()
    {
        try {
            $data = $this->dokters->findAll();
            return $data;
        }
        catch (\Exception $e) {
            return null;
        }
    }

    public function getDokterById($id)
    {
        $data = $this->dokters->find($id);
        if (empty($data)) {
            return null;
        }
        else {
            return $data;
        }
    }
}
