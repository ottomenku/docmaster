<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //jogok létrehozása
        $roles=[[1,'superadmin','SuperAdmin'],[2,'admin','Admin']
        ,[3,'alap','Alap'],[4,'premium','Premium']];
        foreach($roles as $role){
              DB::table('roles')->insert([
            'id' => $role[0],     
            'name' => $role[1],
            'label' => $role[2],
        ]);
        };
        //jadmin jogok userekhez kapcsolása
        $roleusers=[
            [1,1],[1,2],[1,3],[1,4],  //superadmin minden jog 1,2,3,4
            [2,2], //admin 
        ];
            foreach($roleusers as $roleuser){
                  DB::table('role_user')->insert([
                'role_id' => $roleuser[1],
                'user_id' => $roleuser[0],
            ]);
            }
        

/*
        $roleusers=[
        [1,1],[1,2],[1,3],[1,4],  //superadmin minden jog 1,2,3,4
        [2,2], //admin 
        [3,3],[4,3], //alap felhasználók
        [5,4],[6,4], //prmiun felhasználók
    ];
        foreach($roleusers as $roleuser){
              DB::table('role_user')->insert([
            'role_id' => $roleuser[1],
            'user_id' => $roleuser[0],
        ]);
        }
    }
  */ 
    } 
}
