<?php

namespace App\Controllers;

class ProfilController extends BaseController
{
    public function index() 
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            $tokenData = explode('.', $token);
            if (count($tokenData) === 3) {
                $payload = base64_decode($tokenData[1]);
                $payloadData = json_decode($payload, true);

                $username = $payloadData[0]['username'];
                
            }
            if ($username == 'admin'){
                return view('a_profile');
            }
        }
        $this->response->deleteCookie('token');
        session()->setFlashdata('success', 'Please Login with the Correct Account');
        return redirect()->to('/')->withCookies('token', null);
    }
}