<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::query()->whereIn('name', [
            'read blog',
            'add blog',
			'update blog',
			'delete blog',
			'read role',
            'add role',
			'update role',
			'delete role',
			'add permission role',
			'delete permission role',
		])->get();
		Permission::destroy($permission->pluck('id'));
		
		
		Permission::create(['name' => 'read blog','slug'=>'Чтение статьи']);
		Permission::create(['name' => 'add blog','slug'=>'Добавить статью']);
		Permission::create(['name' => 'update blog','slug'=>'Обновить статью']);
	    Permission::create(['name' => 'delete blog','slug'=>'Создать статью']);
		
		Permission::create(['name' => 'read role','slug'=>'Смотреть роль']);
		Permission::create(['name' => 'add role','slug'=>'Добавить роль']);
		Permission::create(['name' => 'update role','slug'=>'Обновить роль']);
		Permission::create(['name' => 'delete role','slug'=>'Удалить роль']);
		
		Permission::create(['name' => 'add permission role','slug'=>'Добавить права']);
		Permission::create(['name' => 'delete permission role','slug'=>'Удалить права']);
		
		
		
    }
}
