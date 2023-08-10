<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class task_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks_users')->insert([
            ['users_id'=> 1 , 'tasks_id' => 1 ,'is_roles' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['users_id'=> 2 , 'tasks_id' => 1 , 'is_roles' => 1 ,'created_at' => now(), 'updated_at' => now()],
            ['users_id'=> 1 , 'tasks_id' => 2 , 'is_roles' => 2 ,'created_at' => now(), 'updated_at' => now()],
            ['users_id'=> 1 , 'tasks_id' => 3 , 'is_roles' => 1 ,'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
