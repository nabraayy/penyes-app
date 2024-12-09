<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facedes\Db;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('roles')->instertOrIgnore([
            ['id'=>2, 'name'=>'User', 'created_at'=>now(), 'updated_at'=>now()],
            ['id'=>1, 'name'=>'Admin', 'created_at'=>now(), 'updated_at'=>now()],

        ]);
    }
}
