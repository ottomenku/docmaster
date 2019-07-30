<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [1,'Szuperadmin', 'root@dolgozo.com'],
            [2,'admin', 'manager@dolgozo.com'],
            [3,'baseuser1', 'baseuser1@dolgozo.com'],
            [4,'baseuser2', 'baseuser2@dolgozo.com'],
            [5,'premiunuser1', 'premiunuser1@dolgozo.com'],
            [6,'premiunuser2', 'premiunuser2@dolgozo.com']
        ];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'id' => $user[0],
                'name' => $user[1],
                'email' => $user[2],
                'password' => bcrypt('aaaaaa'),
            ]);
        }
        ;
    }
}
