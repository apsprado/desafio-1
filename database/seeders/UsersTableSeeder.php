<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->criaAdmin();

    }

    private function criaAdmin(): void
    {
        $user = User::query()->firstOrCreate([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@dixbpo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->syncRoles(Role::findById('1'));
    }
}
