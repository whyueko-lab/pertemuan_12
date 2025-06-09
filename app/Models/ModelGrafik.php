<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGrafik extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $returnType = 'array';
    protected $protectFields = true;

    public function prodi()
    {
        return $this->db->table('mahasiswa')
            ->select('count(*) as jumlah, prodi')->groupBy('prodi')
            ->get()->getResultArray();
    }

    public function jenis_kelamin()
    {
        return $this->db->table('mahasiswa')
            ->select('count(*) as jumlah, jenis_kelamin')->groupBy('jenis_kelamin')
            ->get()->getResultArray();
    }
}

