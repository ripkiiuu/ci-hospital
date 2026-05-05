<?php

namespace App\Controllers;

use App\Models\Dokter;

class DoctorController extends BaseController
{
    protected $dokters;

    function __construct() {
        $this->dokters = new Dokter();
    }

    public function index(): string
    {
        return view('d_home');
    }
    public function visits(): string
    {
        return view('d_visits');
    }
    public function visitsid(): string
    {
        return view('d_visits_id');
    }
    public function profile(): string
    {
        return view('d_profile', compact('dokter'));
    }
}
