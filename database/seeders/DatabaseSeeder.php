<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'Developer'],
            ['role_name' => 'HR'],
            // Add more roles as needed
        ]);

        DB::table('departments')->insert([
            ['department_name' => 'IT'],
            ['department_name' => 'Management'],
            // Add more departments as needed
        ]);
    }
}
