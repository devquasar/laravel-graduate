<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactsSeeder extends Seeder
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
                'text' => 'Впервые мы вышли в свет в далеком 2010 году когда вы даже не слышали о нас'
            ],
            [
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'
            ],
            [
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia.'
            ]
        ];
        DB::table('facts')->insert($data);
    }
}
