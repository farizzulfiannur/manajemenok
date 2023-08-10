<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ['name' => 'TASK 1','desc' => 'test 1 ', 'link' => 'www', 'status' => 'success', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TASK 2','desc' => 'test 2 ', 'link' => 'www', 'status' => 'success', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TASK 3','desc' => 'test 3 ', 'link' => 'www', 'status' => 'success', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
