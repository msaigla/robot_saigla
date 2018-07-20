<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'Пользователь';
        $role_employee->description = 'Обычный человек';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'Админ';
        $role_manager->description = 'Всемогущий человек';
        $role_manager->save();
  }
}
