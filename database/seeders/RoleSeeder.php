<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->firstOrCreate(['name' => 'Administrador']);
        Role::query()->firstOrCreate(['name' => 'Colaborador']);
    }
}
