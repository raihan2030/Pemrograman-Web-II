<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tahun_terbit' => [
                'type'       => 'YEAR',
            ]
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
