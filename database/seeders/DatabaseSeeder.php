<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'pimpinan',
        ]);

        Role::create([
            'role_name' => 'mahasiswa',
        ]);

        // Menambahkan User

        User::create([
            'name' => 'Erin Fajrin Nugraha',
            'email' => 'erinfn@gmail.com',
            'organisasi' => 'ADMIN',
            'role_id' => 1,
            'password' => bcrypt('erinfn')
        ]);

        User::create([
            'name' => 'Darin Kamalia Basiti',
            'organisasi' => 'Pimpinan Darin',
            'email' => 'darinkb@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('darinkb')
        ]);

        User::create([
            'name' => 'Angga Ginasti',
            'organisasi' => 'Pimpinan Angga',
            'email' => 'angga@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('angga')
        ]);

        User::create([
            'name' => 'Romi Syahriar',
            'organisasi' => 'Organisasi Romi',
            'email' => 'romi@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('romirm')
        ]);

        User::create([
            'name' => 'Erin Fajrin Nugraha',
            'organisasi' => 'Organisasi Erin',
            'email' => 'erinfajrin@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('erinfajrin')
        ]);

        User::create([
            'name' => 'Faisal Abdul Majid',
            'organisasi' => 'Organisasi Faisal',
            'email' => 'faisalabdul@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('faisalabdul')
        ]);
    }
}