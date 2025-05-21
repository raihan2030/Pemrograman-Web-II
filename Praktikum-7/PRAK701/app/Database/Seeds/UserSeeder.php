<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
       $data = [
            [
                'username' => 'Muhammad Raihan',
                'email'    => 'mraihan@example.com',
                'password' => password_hash('raihan123', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'Muhammad Fulan',
                'email'    => 'fulan@example.com',
                'password' => password_hash('fulan123', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
