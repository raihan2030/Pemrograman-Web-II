<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    private $nama;
    private $nim;
    private $asalProdi;
    private $hobi;
    private $skill;
    private $alamat;
    private $pasFoto;

    public function __construct($nama, $nim, $asalProdi, $hobi, $skill, $alamat, $pasFoto)
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->asalProdi = $asalProdi;
        $this->hobi = $hobi;
        $this->skill = $skill;
        $this->alamat = $alamat;
        $this->pasFoto = $pasFoto;
    }

    public function getAllData() {
        return [
            'nama' => $this->nama,
            'nim' => $this->nim,
            'asalProdi' => $this->asalProdi,
            'hobi' => $this->hobi,
            'skill' => $this->skill,
            'alamat' => $this->alamat,
            'pasFoto' => $this->pasFoto
        ];
    }
}