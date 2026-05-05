<?php

namespace App\Controllers;

class LandAdminController extends BaseController
{
    public function index(): string
    {
        return view('a_home');
    }
}