<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
  protected $bukuModel;
  protected $rules;
  protected $error_messages;

  public function __construct()
  {
    $this->bukuModel = new BukuModel();
    $this->rules = [
      'judul' => 'required',
      'penulis' => 'required',
      'penerbit' => 'required',
      'tahun_terbit' => 'required|numeric|greater_than[1900]|less_than[2024]'
    ];
    $this->error_messages = [
      'judul' => [
        'required' => 'Field ini harus diisi.'
      ],
      'penulis' => [
        'required' => 'Field ini harus diisi.'
      ],
      'penerbit' => [
        'required' => 'Field ini harus diisi.'
      ],
      'tahun_terbit' => [
        'required' => 'Field ini harus diisi.',
        'numeric' => 'Harus berupa angka.',
        'greater_than' => 'Tahun harus di atas 1900.',
        'less_than' => 'Tahun harus di bawah 2024.'
      ],
    ];
  }

  public function insert()
  {
    if (!$this->validate($this->rules, $this->error_messages)) {
      $validation = \Config\Services::validation();
      return redirect()->to('/add-data')->withInput()->with('validation', $validation);
    }

    $this->bukuModel->save([
      'judul' => $this->request->getPost('judul'),
      'penulis' => $this->request->getPost('penulis'),
      'penerbit' => $this->request->getPost('penerbit'),
      'tahun_terbit' => $this->request->getPost('tahun_terbit'),
    ]);

    session()->setFlashdata('pesan', 'Data telah berhasil ditambahkan.');

    return redirect()->to('/table');
  }

  public function update($id)
  {
    if (!$this->validate($this->rules, $this->error_messages)) {
      $validation = \Config\Services::validation();
      return redirect()->to('/edit-data/' . $id)->withInput()->with('validation', $validation);
    }

    $this->bukuModel->save([
      'id' => $id,
      'judul' => $this->request->getPost('judul'),
      'penulis' => $this->request->getPost('penulis'),
      'penerbit' => $this->request->getPost('penerbit'),
      'tahun_terbit' => $this->request->getPost('tahun_terbit'),
    ]);

    session()->setFlashdata('pesan', 'Data telah berhasil diubah.');

    return redirect()->to('/table');
  }

  public function delete($id)
  {
    $this->bukuModel->delete($id);

    session()->setFlashdata('pesan', 'Data telah berhasil dihapus.');

    return redirect()->to('/table');
  }
}
