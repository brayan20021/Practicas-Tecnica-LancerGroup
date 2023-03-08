<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Autores extends Migration
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
            'apellido' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ],
            'pais' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ],
            'fechaCreacion' => [
                'type'       => 'DATETIME',
                
            ],
            'fechaModificacion' => [
                'type'       => 'DATETIME',
            ],
            'fechaEliminacion' => [
                'type'       => 'DATETIME',
            ],
            
            'eliminado' => [
                'type' => 'BOOLEAN',
                'default' => TRUE
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('autores');
    }

    public function down()
    {
        $this->forge->dropTable('autores');
    }
}
