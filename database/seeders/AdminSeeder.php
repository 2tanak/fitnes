<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()->whereIn('name', [
            'admin',
            
        ])->get();
		 if (count($users) <= 0) {
             $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
			'email_verified_at' => now(),
            'password' => 12345678,
        ]);
		  $user->assignRole('admin');
        }
		
		
		
		$role_admin = Role::findByName('admin');
		$role_admin->givePermissionTo('read blog');
		$role_admin->givePermissionTo('add blog');
		$role_admin->givePermissionTo('update blog');
		$role_admin->givePermissionTo('delete blog');
		$role_admin->givePermissionTo('read role');
        $role_admin->givePermissionTo('update role');
		$role_admin->givePermissionTo('add role');
		$role_admin->givePermissionTo('delete role');
    }
}
