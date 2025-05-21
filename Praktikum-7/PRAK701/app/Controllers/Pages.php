<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Pages extends BaseController
{
  protected $bukuModel;

  public function __construct()
  {
    $this->bukuModel = new BukuModel();
  }

  public function index()
  {
    session();
    $data = [
      'title' => 'Login',
      'validation' => session('validation') ?? \Config\Services::validation()
    ];
    return view('pages/login', $data);
  }

  public function table()
  {
    $data = [
      'title' => 'Tabel Buku',
      'listBuku' => $this->bukuModel->getBuku()
    ];
    return view('pages/table', $data);
  }

  public function addData()
  {
    session();
    $data = [
      'title' => 'Tambah Data',
      'validation' => session('validation') ?? \Config\Services::validation()
    ];
    return view('pages/addForm', $data);
  }

  public function editData($id)
  {
    session();
    $data = [
      'title' => 'Edit Data',
      'buku' => $this->bukuModel->getBuku($id),
      'validation' => session('validation') ?? \Config\Services::validation()
    ];
    return view('pages/editForm', $data);
  }
}
