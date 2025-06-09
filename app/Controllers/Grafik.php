<?php

namespace App\Controllers;

use App\Models\ModelGrafik;

use App\Controllers\BaseController;

class Grafik extends BaseController
{
    protected $grafik;

    public function __construct() 
    {
        $this->grafik = new ModelGrafik();
    }

    public function index() 
    {
        $data = [
            'title' => 'Grafik',
            'program_studi' => $this->grafik->prodi(),
            'jenis_kelamin' => $this->grafik->jenis_kelamin(),
            'mahasiswa' => $this->grafik->findAll()
        ];
          
        return view('grafik/index', $data);
    }
}