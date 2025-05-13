<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Pages extends BaseController
{
    private $profile;

    public function __construct()
    {
        $this->profile = new ProfileModel (
            "Muhammad Raihan",
            "2310817110008",
            "Teknologi Informasi",
            "Ngoding, Mendengarkan musik",
            "Editing, Pemrograman",
            "Jalan Martapura Lama, Kelurahan Sungai Lulut",
            "/images/pas_foto.jpg"
        );
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'profile' => $this->profile->getAllData()
        ];

        return view('pages/home.php', $data);
    
    }
    public function about()
    {
        $data = [
            'title' => 'About Me',
            'profile' => $this->profile->getAllData()
        ];

        return view('pages/about.php', $data);
    }
}
