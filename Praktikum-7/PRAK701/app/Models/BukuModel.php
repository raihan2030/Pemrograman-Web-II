<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
  protected $table = 'buku';
  protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];

  public function getBuku($id = false) {
    if($id == false){
      return $this->findAll();
    }

    return $this->where(['id' => $id])->first();
  }
}
