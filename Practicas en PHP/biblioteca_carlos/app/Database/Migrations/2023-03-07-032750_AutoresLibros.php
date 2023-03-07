<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AutorLibro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'autor_id' => [
                'type'       => 'INT',
                'constraint' => '100',
                'null' => FALSE,
            ],
            'libro_id' => [
                'type' => 'INT',
                'constraint' => '100',
                'null' => FALSE,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('autores_libros');
    }

    public function down()
    {
        $this->forge->dropTable('autores_libros');
    }
}
