<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
  protected $rules;
  protected $error_messages;

  public function __construct()
  {
    $this->rules = [
        'username' => 'required',
        'email' => 'required|valid_email',
        'password' => 'required'
    ];
    $this->error_messages = [
        'username' => [
          'required' => 'Field ini harus diisi.'
        ],
        'email' => [
          'required' => 'Field ini harus diisi.',
          'valid_email' => 'Email tidak valid.'
        ],
        'password' => [
          'required' => 'Field ini harus diisi.'
        ]
    ];
  }

  public function login()
  {
    if (!$this->validate($this->rules, $this->error_messages)) {
      $validation = \Config\Services::validation();
      return redirect()->to('/login')->withInput()->with('validation', $validation);
    }

    $username = $this->request->getPost('username');
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new UserModel();
    $user = $userModel->where('username', $username)->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      session()->set('isLoggedIn', true);
      session()->set('user_id', $user['id']);
      session()->set('user_name', $user['username']);
      session()->set('user_email', $user['email']);
      return redirect()->to('/table');
    } else {
      return redirect()->to('/login')->withInput()->with('error', 'Username/email/password salah.');
    }
  }

  public function logout() {
    session()->destroy();

    return redirect()->to('/login');
  }
}
