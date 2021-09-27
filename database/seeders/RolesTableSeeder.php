<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'description'=> 'A super admin can get all access. And none can delete him',
            'status'=>'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
