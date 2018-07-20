<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'Пользователь')->first();
        $role_admin  = Role::where('name', 'Админ')->first();

        $employee = new User();
        $employee->name = 'Test Пользователь';
        $employee->email = 'test@test';
        $employee->password = bcrypt('testpassword');
        $employee->save();
        $employee->roles()->attach($role_employee);

        $manager = new User();
        $manager->name = 'Admin Пользователь';
        $manager->email = 'admin@test';
        $manager->password = bcrypt('testpassword');
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}
