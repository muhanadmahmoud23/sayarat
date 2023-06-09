<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Department */
        \App\Models\Department::factory()->create([
            'name' => 'HR'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'Marketing'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'IT'
        ]);
        /* Department */

        /* Managers */
        \App\Models\User::factory()->create([
            'name' => 'HR MANAGER',
            'last_name' => 'Last Name 1',
            'email' => 'manager@hr.com',
            'salary' => 12505,
            'password' => bcrypt(123456),
            'department_id' => 1,
            'manager_id' => null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'MARKETING MANAGER',
            'last_name' => 'Last Name 2',
            'email' => 'manager@marketing.com',
            'salary' => 18905,
            'password' => bcrypt(123456),
            'department_id' => 2,
            'manager_id' => null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'IT MANAGER',
            'last_name' => 'Last Name 3',
            'salary' => 12235,
            'email' => 'manager@it.com',
            'password' => bcrypt(123456),
            'department_id' => 3,
            'manager_id' => null,
        ]);
        /* Managers */

        /* HR Empolyee */
        \App\Models\User::factory()->create([
            'name' => 'HR Employee One ',
            'last_name' => 'Last Name 4',
            'email' => 'emp@hr1.com',
            'salary' => 123123,
            'password' => bcrypt(123456),
            'department_id' => 1,
            'manager_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'HR Employee Two ',
            'last_name' => 'Last Name 5',
            'email' => 'emp@hr2.com',
            'salary' => 132505,
            'password' => bcrypt(123456),
            'department_id' => 1,
            'manager_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'HR Employee Three ',
            'last_name' => 'Last Name 6',
            'email' => 'emp@hr3.com',
            'salary' => 1254405,
            'password' => bcrypt(123456),
            'department_id' => 1,
            'manager_id' => 1,
        ]);
        /* HR Employee */

        /* Marketing Empolyee */
        \App\Models\User::factory()->create([
            'name' => 'Marketing Employee One ',
            'last_name' => 'Last Name 7',
            'email' => 'emp@marketing1.com',
            'salary' => 12345,
            'password' => bcrypt(123456),
            'department_id' => 2,
            'manager_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Marketing Employee Two ',
            'last_name' => 'Last Name 8',
            'email' => 'emp@marketing2.com',
            'salary' => 1251205,
            'password' => bcrypt(123456),
            'department_id' => 2,
            'manager_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Marketing Employee Three ',
            'last_name' => 'Last Name 9',
            'email' => 'emp@marketing3.com',
            'salary' => 121235,
            'password' => bcrypt(123456),
            'department_id' => 2,
            'manager_id' => 2,
        ]);
        /* Marketing Employee */

        /* IT Empolyee */
        \App\Models\User::factory()->create([
            'name' => 'IT Employee One ',
            'last_name' => 'Last Name 10',
            'email' => 'emp@it1.com',
            'password' => bcrypt(123456),
            'salary' => 125035,
            'department_id' => 3,
            'manager_id' => 3,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'IT Employee Two ',
            'last_name' => 'Last Name 11',
            'email' => 'emp@it2.com',
            'salary' => 1251205,
            'password' => bcrypt(123456),
            'department_id' => 3,
            'manager_id' => 3,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'IT Employee Three ',
            'last_name' => 'Last Name 12',
            'email' => 'emp@it3.com',
            'salary' => 125445,
            'password' => bcrypt(123456),
            'department_id' => 3,
            'manager_id' => 3,
        ]);
        /* IT Employee */

        /*Tasks*/
        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject One',
            'task' => 'Task Details One',
            'status' => 'PENDING',
            'manager_id' => 1,
            'user_id' => 4,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Two',
            'task' => 'Task Details Two',
            'status' => 'PENDING',
            'manager_id' => 1,
            'user_id' => 5,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Three',
            'task' => 'Task Details Three',
            'status' => 'PENDING',
            'manager_id' => 1,
            'user_id' => 5,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Four',
            'task' => 'Task Details Four',
            'status' => 'PENDING',
            'manager_id' => 2,
            'user_id' => 8,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject FIve',
            'task' => 'Task Details Five',
            'status' => 'PENDING',
            'manager_id' => 2,
            'user_id' => 8,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Six',
            'task' => 'Task Details Six',
            'status' => 'PENDING',
            'manager_id' => 2,
            'user_id' => 8,
        ]);


        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Seven',
            'task' => 'Task Details Seven',
            'status' => 'PENDING',
            'manager_id' => 3,
            'user_id' => 10,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject Eight',
            'task' => 'Task Details Eight',
            'status' => 'PENDING',
            'manager_id' => 3,
            'user_id' => 11,
        ]);

        \App\Models\Tasks::factory()->create([
            'subject' => 'Task Subject 9',
            'task' => 'Task Details 9',
            'status' => 'PENDING',
            'manager_id' => 3,
            'user_id' => 12,
        ]);
        /*Tasks*/
    }
}
