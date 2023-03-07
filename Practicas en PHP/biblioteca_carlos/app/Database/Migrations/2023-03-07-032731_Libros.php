<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Libros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ],
            'edicion' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'fechaPublicacion' => [
                'type'       => 'DATE',
                'null' => FALSE,
            ],
            'fechaCreacion' => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
            'fechaModificacion' => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
            'fechaEliminacion' => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],


        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('libros');
    }

    public function down()
    {
        $this->forge->dropTable('libros');
    }
}
