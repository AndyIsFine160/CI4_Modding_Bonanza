<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $password = password_hash('Password123!', PASSWORD_DEFAULT);

        $dataEntry = [
            [   // Test Client 1
                'user_name' => 'Last',
                'email' => 'placeholder@gmail.com',
                'password_hash' => 'samplepass',
                'type' => 'client',
                'account_status' => '1',
                'profile_image' => '/sampledirectory',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [   // Test Client 2
                'user_name' => 'Last2',
                'email' => 'placeholder2@gmail.com',
                'password_hash' => 'samplepass',
                'type' => 'client',
                'account_status' => '1',
                'profile_image' => '/sampledirectory',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [   // Test Client 3
                'user_name' => 'Last3',
                'email' => 'placeholder3@gmail.com',
                'password_hash' => 'samplepass',
                'type' => 'client',
                'account_status' => '1',
                'profile_image' => '/sampledirectory',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        $this->db->table('User')->insertBatch($dataEntry);
    }
}
