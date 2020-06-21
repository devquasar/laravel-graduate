<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'disabled',
            ],
            [
                'name' => 'user',
            ],
            [
                'name' => 'admin',
            ],
        ];
        DB::table('roles')->insert($data);
    }
}
