<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$roles = Role::query()->whereIn('name', [
            'admin',
            'user',
			'manager',
			'trener'
        ])->get();
		Role::destroy($roles->pluck('id'));
		
        $role_admin = Role::create(['name' => 'admin','slug'=>'Админ']);
        $role_user = Role::create(['name' => 'user','slug'=>'Пользователь']);
		$role_manager = Role::create(['name' => 'manager','slug'=>'Менеджер']);
		$role_trener = Role::create(['name' => 'trener','slug'=>'Тренер']);
		
		
		
		
		
    }
}
