<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'mouadbnl',
            'email' => 'mouadbnl.2k01@gmail.com',
            'password' => bcrypt('qwertyuiop')
        ]);
        $user->assignRole('admin');
    }
}
