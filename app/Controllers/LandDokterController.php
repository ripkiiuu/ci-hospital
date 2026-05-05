<?php

namespace App\Controllers;

use App\Models\Obat;

class LandDokterController extends BaseController
{
    public function index()
    {
        $obatModel = new Obat();
        $recommendObat = $obatModel->findAll();

        return view('d_home', compact('recommendObat'));
    }
}