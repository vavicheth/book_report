<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Adminstrator',
                'email' => 'admin@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BQ98HEbSRgvXb/3mRtyOpewaiCtjQWyt5YPBBgy8eSIca718gbnJW',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-12-29 06:40:06',
                'deleted_at' => NULL,
                'department_id' => 33,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Urgences Port',
                'email' => 'up@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cZsT9uD7oqHJ1CEAibE6WeGdGZv8nM.puT2NP2C9GSj2Zjwp3FMvi',
                'remember_token' => NULL,
                'created_at' => '2019-12-29 06:36:08',
                'updated_at' => '2019-12-29 06:36:08',
                'deleted_at' => NULL,
                'department_id' => 12,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Medicine A',
                'email' => 'meda@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$kJk8AfWCQgw31G91Y7GYKO9mz6nt/zfiFv7pMbgOXpvpD.QmxivzK',
                'remember_token' => NULL,
                'created_at' => '2019-12-29 06:37:30',
                'updated_at' => '2019-12-29 06:37:30',
                'deleted_at' => NULL,
                'department_id' => 8,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Medicine B',
                'email' => 'medb@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Vo24pQiw5jKmGGhASKhTP.oXND55T.63elECNRxyKD3rkbHO1Dbzu',
                'remember_token' => NULL,
                'created_at' => '2019-12-29 06:38:16',
                'updated_at' => '2019-12-29 06:38:16',
                'deleted_at' => NULL,
                'department_id' => 9,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Medicine A4',
                'email' => 'meda4@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vmckEp7d3hSTHT6pQWuvYOK1.lBRZTwuLnuCAwOkmJxAr1ydjNktC',
                'remember_token' => NULL,
                'created_at' => '2019-12-29 06:38:47',
                'updated_at' => '2019-12-29 06:38:47',
                'deleted_at' => NULL,
                'department_id' => 10,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Medicine A5',
                'email' => 'meda5@calmette.org',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/zt5HcYaywv/nKqKNbsVnupkbhCfVmpVL2grlglcbfovHAtTMX81q',
                'remember_token' => NULL,
                'created_at' => '2019-12-29 06:39:36',
                'updated_at' => '2019-12-29 06:39:36',
                'deleted_at' => NULL,
                'department_id' => 44,
            ),
        ));
        
        
    }
}