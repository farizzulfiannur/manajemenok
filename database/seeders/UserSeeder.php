<?php

namespace Database\Seeders;

use App\Models\profile;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Fariz Zulfiannur',
            'email' => 'fariz@admin.com',
            'password' => Hash::make('1234'),
        ]);
        $data2 = profile::create([
            'user_id' => $user->id,
            'image' => '',
        ]);
        $data2->save();
        $user2 = User::create([
            'name' => 'Hengky Suakila',
            'email' => 'hengky@admin.com',
            'password' => Hash::make('1234'),
        ]);
        $data3 = profile::create([
            'user_id' => $user2->id,
            'image' => '',
        ]);
        $data3->save();
    }
}
