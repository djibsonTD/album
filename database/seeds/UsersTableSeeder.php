<?php

use App\Models\User;
use Carbon\Carbon;
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
        User::create([
            'name' => 'Durand',
            'email' => 'durand@chezlui.fr',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'Martin',
            'email' => 'martin@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
