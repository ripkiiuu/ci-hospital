<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dokter;
use CodeIgniter\API\ResponseTrait;

class Register extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'nama'             => 'required',
            'spesialisasi'     => 'required',
            'username'         => ['rules' => 'required|is_unique[data_dokter.username]'],
            'password'         => 'required',
            'confirm_password' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $user = new Dokter();
            $data = [
                'nama'          =>  $this->request->getVar('nama'),
                'spesialisasi'  =>  $this->request->getVar('spesialisasi'),
                'username'      =>  $this->request->getVar('username'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];
            $user->save($data);

            return $this->setResponseFormat('json')->respond([
                'message'   => 'Register successful',
                'data'      => $data
            ]);
        }

        else {
            return $this->setResponseFormat('json')->respond([
                'message'   => $this->validator->getErrors()
            ]);
        }
    }
}
