<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'f_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'm_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'l_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'password_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'client',
                'null'       => false,
            ],
            'account_status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1, // 1 = active, 0 = inactive
                'null'       => false,
            ],
            'profile_image' => [    // File Directory as varchar
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'deleted_at' => [   // Deleted At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [   // Created At
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [   // Updated At
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('table_name_here', true);
    }

    public function down()
    {
        $this->forge->dropTable('table_name_here', true);
    }
}
