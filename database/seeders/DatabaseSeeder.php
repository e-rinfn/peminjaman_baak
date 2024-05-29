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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'organisasi' => 'ADMIN',
            'role_id' => 1,
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Pimpinan 1',
            'organisasi' => 'Pimpinan 1',
            'email' => 'pimpinan1@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('pimpinan1')
        ]);

        User::create([
            'name' => 'Pimpinan 2',
            'organisasi' => 'Pimpinan 2',
            'email' => 'pimpinan2@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('pimpinan2')
        ]);

        User::create([
            'name' => 'Ketua UKM ABC',
            'organisasi' => 'UKM ABC UNPER',
            'email' => 'ukmabc@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('ukmabc')
        ]);

        User::create([
            'name' => 'Ketua UKM XYZ',
            'organisasi' => 'UKM XYZ UNPER',
            'email' => 'ukmxyz@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('ukmxyz')
        ]);

        User::create([
            'name' => 'Ketua UKM RTX',
            'organisasi' => 'UKM RTX UNPER',
            'email' => 'rtx@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('ukmrtx')
        ]);
    }
}